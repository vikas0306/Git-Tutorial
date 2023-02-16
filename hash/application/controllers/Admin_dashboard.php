<?php
defined('BASEPATH') or exit('No direct script access allowed'); 
class Admin_dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('session');

        $this->load->helper('cookie');

        $this->load->model('admin_model');

        $this->load->model('Common_model');

        $this->load->library('image_lib');
        $this->load->helper('date');
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {
        //$this->load->view('common/header'); $this->load->view
        //('common/head'); $this->load->view
        //('common/sidebar'); $this->load->view
        //('common/topbar');*/ $this->load->view
        //('Admin_dashboard/admin_dashboard');
        $this->load->view('Admin_dashboard/new_admin_dashboard');
        //$this->load->view('common/footer');
    }


} ?>

