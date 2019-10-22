<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 8/25/2017
 * Time: 1:48 PM
 */
class Services extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model','services_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));


        $this->data['page'] = 'services';
    }

    public function index()
    {
        $this->data['title'] = "Co Curricullum";
        $this->data['services'] = $this->services_model->get_services();
        $this->data['s'] = '';
        $this->data['message'] = '';


        if($this->input->post())
        {
            $fData = $this->input->post();

            switch ($fData['action'])
            {
                case 'add':
                    #add service
                    $this->data['s'] = '';
                    $msg = "";

                    $this->data['s'] = 's';
                    $this->data['message'] = "Co Curriculum published successfully ";
                    $dbdata = array(
                        'service' => $fData['service'],
                        'description' => $fData['details']
                    );

                    $this->services_model->add_service($dbdata);
                    
                    break;

                case 'edit':
                    #edit service info

                    $dbdata = array(
                        'service' => $fData['service'],
                        'description' => $fData['details'],
                    );

                    $this->services_model->update_service($dbdata,$fData['service_id']);
                    redirect('services','refresh');

                    break;

                case 'delete':
                    $this->services_model->delete_service($fData['service_id']);

                    break;

                default:
                    #do nothing

                    break;
            }

            redirect('services','refresh');
        }
        else
        {
            #load page
            $this->load->view('services/index',$this->data);
        }
    }

}