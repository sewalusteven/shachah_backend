<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 7/3/2017
 * Time: 7:59 PM
 */
class Slides extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model','slides_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));


        $this->data['page'] = 'slides';
    }

    public function index()
    {
        $this->data['title'] = "Home Page Slides";
        $this->data['slides'] = $this->slides_model->get_slides();
        $this->data['s'] = '';
        $this->data['message'] = '';


        if($this->input->post())
        {
            $fData = $this->input->post();

            switch ($fData['action'])
            {
                case 'add':
                    #add slide
                    $this->data['s'] = '';
                    $msg = "";
                    $file_element_name = 'img';

                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size'] = 1024 * 9;
                    $config['encrypt_name'] = TRUE;
                    $config['min_width'] = 1920;
                    $config['min_height'] = 1060;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($file_element_name)){
                        $this->data['s'] = 'e';
                        $msg = $this->upload->display_errors('', '');
                        // header('Content-Type: application/json');
                        // echo json_encode(array('status' => $status, 'msg' => $msg));
                        $this->data['message'] = $msg;

                        $this->load->view('settings/slides', $this->data);
                    }else {
                        $this->data['s'] = 's';
                        $imgData = $this->upload->data();
                        $this->data['message'] = "Slide Uploaded successfully successfully uploaded";

                        $dbdata = array(
                            'caption' => $fData['caption'],
                            'link_text' => $fData['link_text'],
                            'tmp_name' => $imgData['file_name'],
                            'url' => $fData['url']
                        );

                        $this->slides_model->add_slide($dbdata);

                    }

                    break;

                case 'edit':
                    #edit slide info

                    $dbdata = array(
                        'caption' => $fData['caption'],
                        'link_text' => $fData['link_text'],
                        'url' => $fData['url'],
                        'updated'=> date('Y-m-d H:i:s')
                    );

                    $this->slides_model->update_slide($dbdata,$fData['slide_id']);
                    redirect('slides','refresh');

                    break;

                case 'delete':
                    $this->slides_model->delete_slide($fData['slide_id']);

                    break;

                default:
                    #do nothing

                    break;
            }

            redirect('slides','refresh');
        }
        else
        {
            #load page
            $this->load->view('settings/slides',$this->data);
        }
    }

}