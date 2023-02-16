<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('Users_model');
    $this->load->database();
  }

  public function index()
  {   
        $breadcrumbs="<ol class='breadcrumb'><li><a href='".site_url(HOME)."'><i class='ace-icon fa fa-home home-icon'></i>Dashboard</a></li><li class='active'>Manage Users</li></ol>"; 
        $data = array(
          'breadcrumbs' => $breadcrumbs , 
          'heading' => 'Manage Admin Users',
          'actioncolumn'      => '5' ,
          'ajax_manage_page'  => site_url(USERSAJAX) ,
        );
        $this->load->view('Users/index',$data);
  }

  public function ajax_manage_page()
  {
      //$table="users";
      $condition="is_delete='No'";
      $Data = $this->Users_model->get_datatables($condition);
      
      $data = array();
      if(empty($_POST['start']))
      {
          $no =0;   
      }
      else
      {
          $no =$_POST['start'];
      }
      foreach ($Data as $row)
      {
             
              $btn ='<span class="action-buttons"><a title="Edit" href="'.site_url(USERSUPDATE.'/'.base64_encode($row->id)).'" class="btn btn-info btn-rounded btn-xs"><i class="ace-icon fa fa-pencil bigger-130"></i></a></span>';

              $btn .=' '.'<a href="#deleteData" data-toggle="modal" title="Delete" class="btn btn-danger btn-rounded btn-xs" onclick="checkStatus('.$row->id.')"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>';

              if($row->status=='Active')
              {
                  $status ="<a href='#checkStatus' data-toggle='modal' class='label-success label' onclick='checkStatus(".$row->id.")'> Active </a>";            
              }
              else
              {
                  $status ="<a href='#checkStatus' data-toggle='modal' class='label-danger label' onclick='checkStatus(".$row->id.")'> Inactive </a>";
              }
              $no++;
              $nestedData = array();
              $nestedData[] = $no;
              $nestedData[] = ucwords(strtolower($row->name));
              $nestedData[] = $row->email;
              $nestedData[] = $row->mobile;
              $nestedData[] = $status;
              $nestedData[] = date('d-m-Y',strtotime($row->created_date));
              $nestedData[] = $btn;
              $data[] = $nestedData;
              $selected = '';
          }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Users_model->count_all($condition),
            "recordsFiltered" => $this->Users_model->count_filtered($condition),
            "data" => $data,
        );
      echo json_encode($output);
  }


  public function create()
    {
        $breadcrumbs = "<ul class='breadcrumb'><li><i class='ace-icon fa fa-home home-icon'></i><a href='".site_url(HOME)."'> Dashboard</a></li><li class='active'>Manage Users</li></ul>";

        $data = array(
            'breadcrumbs'  => $breadcrumbs,
            'heading'      => 'Manage Admin Users',
            'button'       => 'Create',
            'action'       => site_url(USERSADDACTION),  
            'cancelbtn'    => site_url(USERS),
            'id'           => set_value('id',$this->input->post('id')),
            'name'         => set_value('name',$this->input->post('name')),
            'mobile'       => set_value('mobile',$this->input->post('mobile')),
            'email'        => set_value('email',$this->input->post('email')),
            'address'      => set_value('address',$this->input->post('address')),
        );
        $this->load->view('Users/form',$data);
    }

  public function create_action() 
	{  
	  $id = '0';
	  $this->_rules($id);
	  if($this->form_validation->run() == FALSE) 
	  {
	    $this->create();
	  } 
	  else
	  {  
	    $data = array(
	      'name' =>ucfirst(strtolower($this->input->post('name',TRUE))),
	      'email' 	  =>strtolower($this->input->post('email',TRUE)),
	      'mobile'    =>$this->input->post('mobile',TRUE),
	      'address'   =>$this->input->post('address',TRUE),
	     );  
	    $this->Users_model->SaveData("users",$data);

	    $this->session->set_flashdata('message', '<span class="label label-success text-center" style="margin-bottom:0px;">User has been added successfully</span>');
	    redirect('USERS');
	  }
	}

	public function update($id)
    {
        if(!empty($id))
        {
          $user_id = base64_decode($id);
          $row = $this->Users_model->GetData("users",'',"id='".$user_id."'",'','','','1');
          $breadcrumbs = "<ul class='breadcrumb'><li><i class='ace-icon fa fa-home home-icon'></i><a href='".site_url(HOME)."'> Dashboard</a></li><li class='active'>Manage Users</li></ul>";
          if(!empty($row))
          {
            $data = array(
            'breadcrumbs'  => $breadcrumbs,
            'heading'      => 'Manage Admin Users',
            'button'       => 'Update',
            'action'       => site_url(USERSUPDATEACTION),  
            'cancelbtn'    => site_url(USERS),
            'id'               => set_value('id',$row->id),
            'name'        => set_value('name',$row->name),
            'mobile'           => set_value('mobile',$row->mobile),
            'email'            => set_value('email',$row->email),
            'address'          => set_value('address',$row->address),
            );
            $this->load->view('Users/form',$data);
          }
          else
          {
              $this->session->set_flashdata('message', 'Record Not Found');
              redirect(USERS);
          } 
        }
        else
        {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(USERS);
        }        
    }

    public function update_action()
    {   
        $id = $this->input->post('id', TRUE);
        $this->_rules($id);
        if($this->form_validation->run() == FALSE) 
        {  
          $this->update($id);
        } 
        else
        {
            $data = array(
            'name'      => ucfirst(strtolower($this->input->post('name',TRUE))),
            'mobile'         => $this->input->post('mobile',TRUE),
            'email'          => strtolower($this->input->post('email',TRUE)),
            'address'        => $this->input->post('address',TRUE), 
            'modified'       =>date('Y-m-d H:i:s'), 
        );
        $this->Users_model->SaveData('users',$data,"id = '".$id."'");
        $this->session->set_flashdata('message', '<span class="label label-success text-center" style="margin-bottom:0px;">User has been updated successfully</span>');
          redirect(USERS);
        } 
    }

  


	public function changeStatus()
    {
      $change_status = $this->Users_model->GetData('users','',"id='".$_POST['id']."'",'','','','row');
        if($change_status->status=='Active')
      {
        $this->Users_model->SaveData('users',array('status'=>'Inactive'),"id='".$_POST['id']."'");
      }
      else
      {
        $this->Users_model->SaveData('users',array('status'=>'Active'),"id='".$_POST['id']."'");
      }
      $this->session->set_flashdata('message', '<span class="label label-success text-center" style="margin-bottom:0px;">Status has been changed successfully</span>');
      redirect(USERS);
    }

	  public function delete()
    {
      /*$cond = "id='".$this->input->post('id')."'";
      $this->Users_model->DeleteData('users',$con);*/

        $cond ="id=".$this->input->post('id');
        $delUserData = array('is_delete'=>'Yes','modified_date'=>date('Y-m-d H:i:s'));
        $this->Users_model->save('users',$delUserData,$cond);

      $this->session->set_flashdata('message', '<span class="label label-success text-center" style="margin-bottom:0px;">Users details deleted successfully</span>');
      redirect(USERS);
    }

    public function _rules($id)
    {
        $cond_email = "email='".$this->input->post('email',TRUE)."' and is_delete='No' and id!='".$id."'";
        $row = $this->Users_model->GetData("users",'',$cond_email,'','','','');
        $count = count($row); 
        if($count==0)
        {
            $is_unique3 = "";
        }
        else
        {
          $is_unique3 = "|is_unique[users.email]";
        }
        $cond_mobile = "mobile='".$this->input->post('mobile',TRUE)."' and is_delete='No' and id!='".$id."'";
        $row = $this->Users_model->GetData("users",'',$cond_mobile,'','','','');
        $count = count($row); 
        if($count==0)
        {
            $is_unique4 = "";
        }
        else
        {
          $is_unique4 = "|is_unique[users.mobile]";
        }
            
            $this->form_validation->set_rules('name', 'full name', 'required', array('required' => 'Please enter %s'));
            
            $this->form_validation->set_rules('mobile', 'mobile', 'trim|required'.$is_unique4,
            array(
              'required'      => 'Please enter %s',
              'is_unique'     => 'mobile already exists'
            ));

            $this->form_validation->set_rules('email', 'email', 'trim|required'.$is_unique3,
            array(
              'required'      => 'Please enter %s',
              'is_unique'     => 'email already exists'
            ));

            $this->form_validation->set_rules('address', 'address', 'required', array('required' => 'Please enter %s'));

            $this->form_validation->set_rules('id', 'id', 'trim');

            $this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');

    }

}