<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
         /*keep this code for start session*/
        $this->load->library('session');
        /*keep this code for form data*/
        $this->load->helper('form');
        /*keep this code for validation*/
        $this->load->library('form_validation');
        /*keep this code for load css and js or external page*/
        $this->load->helper('url');
        $this->load->helper('html');
        /*keep this code for load database*/
        $this->load->database();
        $this->load->helper('security');
    }
    function get_single_record($tablename,$condition)
    {
            $this->db->where($condition);   
            return $this->db->get($tablename)->row();
    }
    public function admin_action($email, $password) 
    {
        $this->db->where('Email', $email);
        $this->db->where('Password', $password);
        $this->db->where('Status = ', 'Active');
        return $this->db->get('users')->row();
     }
  // UPDATE QUERY STATEMENT WITH DYNAMIC TABLE NAME

    function updateData($tableName, $data, $condition )
    {
        $this->db->where($condition);
        $this->db->update($tableName, $data);
    }   
     public function save($table,$data,$condition='')
    {
        $DataArray = array();
        if(!empty($condition))
        {
            $data['modified']=date("Y-m-d H:i:s");
        }
        if(empty($condition))
        {
            $data['created']=date("Y-m-d H:i:s");
        }
        $table_fields = $this->db->list_fields($table);
        foreach($data as $field=>$value)
        {
            if(in_array($field,$table_fields))
            {
                $DataArray[$field]= $value;
            }
        }
        if($condition != '')
        {
            $this->db->where($condition);
            $this->db->update($table, $DataArray);
        }else{
            $this->db->insert($table, $DataArray);
        }
    }

    public function GetData($table,$field='',$condition='',$group='',$order='',$limit='',$result='')
        {
            //print_r("into to the function");die;
            if($field != '')
            $this->db->select($field);
            if($condition != '')
            $this->db->where($condition);
            if($order != '')
            $this->db->order_by($order);
            if($limit != '')
            $this->db->limit($limit);
            if($group != '')
            $this->db->group_by($group);
            if($result != '')
            {
                $return =  $this->db->get($table)->row();
            }else{
                $return =  $this->db->get($table)->result();
            }
            // print_r($return);die;
            return $return;
        }
    /*Delete any table data*/
    public function DeleteData($table,$condition='',$limit='')
    {
        if($condition != '')
        $this->db->where($condition);
        if($limit != '')
        $this->db->limit($limit);
        $this->db->delete($table);
    }  

    /*To Save Data*/
      public function SaveData($table,$data,$condition='')
      {
          $DataArray = array();
          if(!empty($data))
          {
              $data['modified']=date("Y-m-d H:i:s");
          }
          if(empty($condition))
          {
              $data['created']=date("Y-m-d H:i:s");
          }
          $table_fields = $this->db->list_fields($table);
          foreach($data as $field=>$value)
          {
              if(in_array($field,$table_fields))
              {
                  $DataArray[$field]= $value;
              }
          }
         
          if($condition != '')
          {
              $this->db->where($condition);
              $this->db->update($table, $DataArray);
          }else{
              $this->db->insert($table, $DataArray);
          }
      }
      function getNotification()
      {
          $this->db->select('admin_feedback.*,adminuser.Name as frenchise,users.Name as admin');
          $this->db->from('admin_feedback');
          $this->db->join('adminuser ','adminuser.UserID = admin_feedback.frenchise_id','inner');
          $this->db->join('users ','users.UserID = admin_feedback.admin_id','inner');
          $this->db->order_by('admin_feedback.id desc');
          return $this->db->get()->result();
      }
       function singlenotification($UserID)
      {
          $this->db->select('admin_feedback.*,adminuser.Name as frenchise,users.Name as admin');
          $this->db->from('admin_feedback');
          $this->db->join('adminuser ','adminuser.UserID = admin_feedback.frenchise_id','inner');
          $this->db->join('users ','users.UserID = admin_feedback.admin_id','inner');
          $this->db->where('admin_feedback.id=',$UserID);
          return $this->db->get()->row();
      }
      function getflexi()
      {
        $this->db->select('flexi.*,connect_user.Name as flexi_manager');
          $this->db->from('flexi');
          $this->db->join('connect_user ','connect_user.id = flexi.user_id','inner');
          $this->db->where('connect_user.type=','Flexi');
          return $this->db->get()->result();
      }
//      public function VerifyOTP($email,$password,$otp){
//      $this->db->where('email', $email);
//     $this->db->where('password', $password);
//      $this->db->where('otp', $otp);
//     return $this->db->get('user')->row();
// }

// public function ForgotPassword($email)

// {
//     $this->db->select('email');
//     $this->db->from('user');
//     $this->db->where('email', $email);
//     $query=$this->db->get();
//     return $query->row_array();
// }

// public function sendpassword($data)

// {
//     $email = $data['email'];

//     $query1=$this->db->query("SELECT *  from user where email = '".$email."' ");
//     $row=$query1->result_array();
//     if ($query1->num_rows()>0)
// {
//         $passwordplain = "";
//         $passwordplain  = rand(999999999,9999999999);
//         $newpass['password'] = $passwordplain;
//         $this->db->where('email', $email);
//         $this->db->update('user', $newpass);

//          $subject = 'FROM WELNESS REDEFINED: Forgot password';
//         $message = '<html><body>';
//         $message .= "<p><strong>Hii, ".$row[0]['name']."</strong></p><br>";
//         $message .= "<p>Thanks for contacting regarding to forgot password,</p><br>";
//         $message .= '<table rules="all" style="border:none;" cellpadding="10">';
//         $message .= "<tr style='background: #eee;'><th colspan='2'><strong> Your Password </strong> </th></tr>";
//         $message .= "<tr><td><strong>New Password:</strong> </td><td>" . $passwordplain . "</td></tr>";
//         $message .= "</table><br><br><br>";
//         $message .= '<p><strong>Thanks and Regards,</strong></p>';
//         $message .= '<p><strong>GYM Management</strong></p>';
//         $message .= "</body></html>";
//         $config = [
//             'protocol' => 'smtp',
//             'smtp_host' => 'smtp.gmail.com',
//             'smtp_port' => 465,
//             'smtp_user' => 'wellnessredefinedums@gmail.com', // change it to yours
//             'smtp_pass' => 'umsitish123', // change it to yours
//             'mailtype' => 'html',
//             'smtp_crypto' => 'ssl',

//             'charset' => 'iso-8859-1',
//         ];

//         $this->email->initialize($config);
//         $this->load->library('email');
//         $this->load->library('email', $config);
//         $this->email->set_newline("\r\n");
//         $this->email->from('wellnessredefinedums@gmail.com'); // change it to yours
//         $this->email->to($email); // change it to yours
//         $this->email->subject($subject);



//         $this->email->message($message);
//         if ($this->email->send()) {
//             //echo 'Email sent.';
//         } else {
//             //show_error($this->email->print_debugger());
//             //echo 'Email NOT sent.';
//         }

//         echo "<script>alert('Check Your Email For Password!')</script>";
//         redirect(base_url().'Welcome/index','refresh');
//     }
//     else
//     {
//         echo "<script>alert('msg','Email not found try again!')</script>";

//         redirect(base_url().'Welcome/index','refresh');

//     }

// }



}
?>