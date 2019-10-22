<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 7/4/2017
 * Time: 10:17 PM
 */
class Contacts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data', 'string'));
        is_logged_in();
        $this->load->model(array('user_model', 'logs_model','content_model','contact_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));


        $this->data['page'] = 'contacts';
    }

    public function index()
    {
        //load all users from the db
        $this->data['title']= 'Contact Information Manager';
        $this->data['message'] = '';
        $this->data['s'] = '';
        if($this->input->post())
        {
            //submitted results
            $fData = $this->input->post();

            switch ($fData['action'])
            {
                case 'add':

                    $dbdata = array(
                        'category' => $fData['category'],
                        'contact' => $fData['contact']
                    );

                    $this->contact_model->add_contact($dbdata);


                    break;
                case 'edit':
                    $this->contact_model->update_contact(array('category'=>$fData['category'], 'contact'=>$fData['contact']),$fData['contact_id']);
                    break;
                case 'delete':
                    $this->contact_model->delete_contact($fData['contact_id']);
                    break;
                default:
                    break;
            }

            redirect('/contacts','refresh');
        }
        else
        {
            $this->data['contacts'] = $this->contact_model->get_contacts();
            $this->load->view('settings/contacts',$this->data);


        }
    }

}