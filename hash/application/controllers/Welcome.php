<?php defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
function __construct()
{
    parent::__construct();
    $this->load->library('session');
    
    $this->load->model('Common_model');
    $this->load->helper('date');
    $this->load->helper('url','form','html');

    date_default_timezone_set('Asia/Kolkata');
}

/*====This Function used for Load-Login-Page=====*/
public function index()
{   
    $this->load->view('Login/index');
}

/*===== This function used For Login-Action ===============*/

public function login_action()
{    

   //echo"<pre>";print_r($_POST);exit;

    $email = $this->input->post('email');

    $password = $this->input->post('password');

    $hash2 = $this->input->post('hash2');

    $hash_3 = $this->input->post('hash_3'); //compare password
    //print_r($hash_3);exit;

    $data = array('password' => $password,
    );
    $this->Common_model->SaveData('users',$data,"email = '".$email."'");

   
    $chk_login = $this->Common_model->admin_action($email, $password);
    

    $dbHash1= $chk_login->password; // db-hash password (128bit)

    if ($chk_login)
    {
       $sess_array[SESSION_NAME] = array(
            'id'        => $chk_login->id,
            'name'      => $chk_login->name,
            'email'     => $chk_login->email,
            'mobile'    => $chk_login->mobile,
            'address'   => $chk_login->address,
            'image'     => $chk_login->image,
            'status'    => $chk_login->status, 
            'salt'    => "123", 
            'logged_in' => true ,   
        );
        
         $this->session->set_userdata($sess_array);

        $db_session_salt = $sess_array[SESSION_NAME]['salt']; //session salt value 

        $dbhash2= $dbHash1.$db_session_salt; //add salt value

        $comphash3 = hash('sha512', $dbhash2);

        if($hash_3 == $comphash3) //compare client== serverside
        {
            echo "Success";
        }
        else
        {
            echo 'Wrong'; 
        }

        //redirect(site_url('Admin_dashboard'));
        //redirect(HOME);
    }
    else
    {
        echo "<script>alert('Invalid Login email And Password');</script>";
        $this->load->view('Welcome/index');
    }

}
public function Logout()
{
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('name');
    $this->load->driver('cache');
    $this->session->sess_destroy();
    $this->cache->clean();
    ob_clean();
    return redirect(site_url('Welcome'));
}

}



