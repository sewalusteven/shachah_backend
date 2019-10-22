<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 8/25/2017
 * Time: 4:48 PM
 */
class Account extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model','partners_model','services_model','slides_model','content_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));
        //$this->data['role'] = $this->roles_model->get_role(array('ID' => $this->data['user']['arole_id']));

        $this->data['page']	= 'home';
        //$this->data['vote'] = $this->votes_model->get_vote(array('type' => 'core'));
        //$this->data['all_votes'] = $this->votes_model->get_votes();
    }

    public function index()
    {
        $this->data['title'] = "Account Settings";
        $user = $this->data['user'];

        if($this->input->post())
        {
            #form processing
            $fData = $this->input->post();
            $file_element_name = 'img';
            $status = "";
            $msg = "";

            switch ($fData['action'])
            {
                case 'chpro':
                    #update profile
                    $this->user_model->edit_user($user['admin_id'],array('fullname'=>$fData['fullname'],'email'=>$fData['email'], 'phone'=>$fData['phone']));
                    break;
                case 'chimg':
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
                        $this->load->view('settings/account', $this->data);
                    }else{
                        $status = 'success';
                        $imgData = $this->upload->data();
                        $msg = "Image successfully uploaded";

                        #unlink existing


                        $dbdata = array(
                            'tmp_name'=>$imgData['file_name']
                        );

                        //ADD DATA IN DB
                        $this->user_model->edit_user($user['admin_id'],$dbdata);
                    }
                    break;
                case 'chpass':
                    #confirm old pass
                    if($this->user_model->check_user($user['username'], $fData['oldpass']))
                    {
                        $this->user_model->edit_password($user['admin_id'],array('password'=>$fData['password']));
                    }else
                    {
                        #false old pass
                        $msg = "Incorrect current password";
                        $this->data['message'] = $msg;
                        $this->load->view('settings/account', $this->data);

                    }
                    break;
                default:
                    break;
            }

            redirect('/account','refresh');
        }
        else
        {
            $this->load->view('settings/account',$this->data);
        }
    }

}