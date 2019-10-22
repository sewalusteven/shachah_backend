<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 8/25/2017
 * Time: 3:03 PM
 */
class Uploader extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));
        $this->data['page'] = 'settings';
    }

    public function index()
    {
        $this->data['title'] = "File Upload Manager";
        $this->data['message'] = "";
        $this->data['s'] = '';

        #load page
        $this->load->view('settings/uploader',$this->data);


    }

}