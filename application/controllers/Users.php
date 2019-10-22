<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 6/19/2017
 * Time: 11:06 AM
 */
class Users extends CI_Controller
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
        //$this->data['vote'] = $this->votes_model->get_vote(array('type' => 'core'));
    }

    public function index()
    {
        //load all users from the db
        $this->data['title']= 'User Management';
        if(!$this->input->post())
        {
            $this->data['users'] = $this->user_model->get_users(array('isactive'=> 1));
            $this->load->view('settings/users',$this->data);
        }
        else
        {
            //submitted results
            $fData = $this->input->post();
            $status = "";
            $msg = "";
            $file_element_name = 'img';

            switch ($fData['action'])
            {
                case 'add':


                    //check username
                    $check = $this->user_model->check_username($fData['username']);
                    if($check == TRUE)
                    {
                        $msg = "Sorry, this username already exists";
                        $this->data['message'] = $msg;
                        $this->load->view('setting/users', $this->data);

                    }
                    else
                    {
                        //username doesnt exist
                        if ($status != "error"){
                            $config['upload_path'] = './uploads/';
                            $config['allowed_types'] = 'jpg|png';
                            $config['max_size'] = 1024 * 9;
                            $config['encrypt_name'] = TRUE;
                            $config['min_width'] = 300;
                            $config['min_height'] = 300;

                            $this->load->library('upload', $config);

                            if (!$this->upload->do_upload($file_element_name)){
                                $status = 'error';
                                $msg = $this->upload->display_errors('', '');
                                // header('Content-Type: application/json');
                                // echo json_encode(array('status' => $status, 'msg' => $msg));
                                $this->data['message'] = $msg;
                                $this->load->view('settings/users', $this->data);
                            }else{
                                $status = 'success';
                                $imgData = $this->upload->data();
                                $msg = "Image successfully uploaded";

                                $dbdata = array(
                                    'fullname' => $fData['fullname'],
                                    'email' =>$fData['email'],
                                    'phone' =>$fData['phone'],
                                    'username'=>$fData['username'],
                                    'password'=>$fData['password'],
                                    'status'=>0,
                                    'tmp_name'=>$imgData['file_name'],
                                    'isactive'=>1
                                );

                                //ADD DATA IN DB
                                $this->user_model->add_user($dbdata);
                            }
                        }

                    }
                    #add user

                    break;
                case 'edit':
                    $this->user_model->edit_user($fData['admin_id'],array('email'=>$fData['email'], 'phone'=>$fData['phone']));
                    break;
                case 'delete':
                    $this->user_model->edit_user($fData['admin_id'],array('isactive'=>0));
                    break;
                default:
                    break;
            }

            redirect('/users','refresh');

        }


    }

    public function newuser(){
        $this->data['title']= 'Create New User';
        if($this->input->post())
        {
            //clean and submit form data
            $post = $this->input->post();
            $status = "";
            $msg = "";
            $file_element_name = 'img';

            //check username
            $check = $this->user_model->check_username($post['username']);
            if($check == TRUE)
            {
                $msg = "Sorry, this username already exists";
                $this->data['message'] = $msg;
                $this->load->view('configuration/newuser', $this->data);

            }
            else
                {
                    //username doesnt exist
                    if ($status != "error"){
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'jpg|png';
                        $config['max_size'] = 1024 * 9;
                        $config['encrypt_name'] = TRUE;
                        $config['min_width'] = 200;
                        $config['min_height'] = 200;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload($file_element_name)){
                            $status = 'error';
                            $msg = $this->upload->display_errors('', '');
                            // header('Content-Type: application/json');
                            // echo json_encode(array('status' => $status, 'msg' => $msg));
                            $this->data['message'] = $msg;
                            $this->load->view('configuration/newuser', $this->data);
                        }else{
                            $status = 'success';
                            $imgData = $this->upload->data();
                            $msg = "Image successfully uploaded";

                            $dbdata = array(
                                'fullname' => $post['fullname'],
                                'email' =>$post['email'],
                                'phone' =>$post['phone'],
                                'username'=>$post['username'],
                                'password'=>$post['password'],
                                'status'=>0,
                                'tmp_name'=>$imgData['file_name'],
                                'isactive'=>1
                            );

                            //ADD DATA IN DB
                            $this->user_model->add_user($dbdata);

                            //addlog
                            $logdata = array(
                                'admin_id'=> $this->data['user']['admin_id'],
                                'log' => $dbdata['fullname'].' has been added as a user',
                                'explanation' => $this->data['user']['fullname'].' registered '.$dbdata['fullname'].'as a new user on the system',
                                'link' => '/users'
                            );
                            $this->logs_model->addlog($logdata);

                            redirect('/users', 'refresh');
                        }
                    }

                }



        }
        else
            {
                //load the form page
                $this->data['title']= 'Create New User';
                $this->load->view('configuration/newuser',$this->data);
            }
    }

}