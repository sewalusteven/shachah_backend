<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 7/3/2017
 * Time: 7:59 PM
 */
class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data','slug'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model','slides_model','gallery_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));


        $this->data['page'] = 'gallery';
    }

    public function index()
    {
        $this->data['title'] = "Shachah Gallery";
        
        $this->data['s'] = '';
        $this->data['message'] = '';


        if($this->input->post())
        {
            $fData = $this->input->post();

            $file_element_name = 'img';
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1024 * 9;
            $config['encrypt_name'] = TRUE;
            $config['min_width'] = 1000;
            $config['min_height'] = 972;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)){
                $imgData = $this->upload->data();
                $dbdata = array(
                    'name' => $fData['name'],
                    'tmp_name' => $imgData['file_name'],
                    'gcategory_id' => $fData['category_id']
                );
                $this->gallery_model->add_gallery($dbdata);
            }        

            redirect('gallery','refresh');
        }
        else
        {
            $galleries = $this->gallery_model->get_galleries();

            foreach ($galleries as $key => $gallery) {
                # get category
                $cat = $this->gallery_model->get_gcategory(array('gcategory_id'=> $gallery['gcategory_id']));
                $galleries[$key]['category'] = $cat['category'];
            }

            $gcategories = $this->gallery_model->get_gcategories();


            #load page
            $this->data['galleries'] = $galleries;
            $this->data['categories'] = $gcategories;
            $this->load->view('gallery',$this->data);
        }
    }

}