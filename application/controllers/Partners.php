<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 8/25/2017
 * Time: 2:21 PM
 */
class Partners extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model','partners_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));


        $this->data['page'] = 'partners';
    }

    public function index()
    {
        $this->data['title'] = "Our Clients";
        $this->data['partners'] = $this->partners_model->get_partners();
        $this->data['cpartners'] = $this->partners_model->get_cpartners();
        $this->data['s'] = '';
        $this->data['message'] = '';


        if($this->input->post())
        {
            $fData = $this->input->post();

            switch ($fData['action'])
            {
                case 'add':
                    #add partner
                    $this->data['s'] = '';
                    $msg = "";
                    $file_element_name = 'img';

                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size'] = 1024 * 9;
                    $config['encrypt_name'] = TRUE;
                    $config['min_width'] = 400;
                    $config['min_height'] = 150;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($file_element_name)){
                        $this->data['s'] = 'e';
                        $msg = $this->upload->display_errors('', '');
                        // header('Content-Type: application/json');
                        // echo json_encode(array('status' => $status, 'msg' => $msg));
                        $this->data['message'] = $msg;

                        $this->load->view('partners/index', $this->data);
                    }else {
                        $this->data['s'] = 's';
                        $imgData = $this->upload->data();
                        $this->data['message'] = "partner uploaded successfully ";

                        $dbdata = array(
                            'partner' => $fData['partner'],
                            'url' => $fData['url'],
                            'tmp_name' => $imgData['file_name']
                        );

                        $this->partners_model->add_partner($dbdata);

                    }

                    break;
                case 'cadd':
                    $dbdata = array(
                        'partner' => $fData['cpartner'],
                        'explanation' => $fData['cdetail']
                    );

                    $this->partners_model->add_cpartner($dbdata);

                    break;

                case 'edit':
                    #edit partner info

                    $dbdata = array(
                        'partner' => $fData['partner'],
                        'url' => $fData['url'],
                    );

                    $this->partners_model->update_partner($dbdata,$fData['partner_id']);
                    redirect('partners','refresh');

                    break;

                case 'cedit':
                    #edit partner info

                    $dbdata = array(
                        'partner' => $fData['cpartner'],
                        'explanation' => $fData['cdetails'],
                    );

                    $this->partners_model->update_cpartner($dbdata,$fData['cpartner_id']);
                    redirect('partners','refresh');

                    break;

                case 'delete':
                    $this->partners_model->delete_partner($fData['partner_id']);

                    break;

                case 'cdelete':
                    $this->partners_model->delete_cpartner($fData['cpartner_id']);

                    break;

                default:
                    #do nothing

                    break;
            }

            redirect('partners','refresh');
        }
        else
        {
            #load page
            $this->load->view('partners/index',$this->data);
        }
    }

}