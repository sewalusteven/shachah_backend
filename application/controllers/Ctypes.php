<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 8/22/2017
 * Time: 3:50 PM
 */
class Ctypes extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model','gallery_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));
        $this->data['page'] = 'settings';

    }

    public function index()
    {
        $this->data['title'] = 'Content Categories';

        if($this->input->post())
        {
            #process all forms
            $fData = $this->input->post();

            switch ($fData['action'])
            {
                case 'add':
                    $data = array(
                        'type' => $fData['category']
                    );
                    $this->content_model->add_category($data);

                    break;

                case 'edit':
                    $data = array(
                        'type' => $fData['category']
                    );
                    $this->content_model->update_category($data,$fData['category_id']);

                    #addlogs
                    $logdata = array(
                        'admin_id'=> $this->data['user']['admin_id'],
                        'log' => ' A Content Category has been updated',
                        'explanation' => $this->data['user']['fullname'].' updated  the ( '.$fData['category'].' ) category',
                        'link' => '/categories'
                    );
                    $this->logs_model->addlog($logdata);

                    break;

                default:
                    #do nothing
                    break;
            }

            redirect('/ctypes','refresh');
        }
        else
        {
            $categories = $this->content_model->get_categories();
            #load page
            foreach ($categories as $key => $category)
            {
                $categories[$key]['count'] = $this->content_model->count_content(array('ctype_id'=>$category['ctype_id']));
            }

            $this->data['categories'] = $categories;

            $this->load->view('settings/categories',$this->data);
        }
    }

    public function gcategories()
    {
        $this->data['title'] = 'Gallery Categories';

        if($this->input->post())
        {
            #process all forms
            $fData = $this->input->post();

            switch ($fData['action'])
            {
                case 'add':
                    $data = array(
                        'category' => $fData['category']
                    );
                    $this->gallery_model->add_gcategory($data);

                    break;

                case 'edit':
                    $data = array(
                        'category' => $fData['category']
                    );
                    $this->gallery_model->update_gcategory($data,$fData['category_id']);

                    break;

                default:
                    #do nothing
                    break;
            }

            redirect('/ctypes/gcategories','refresh');
        }
        else
        {
            $categories = $this->gallery_model->get_gcategories();
            #load page
            

            $this->data['categories'] = $categories;

            $this->load->view('settings/gcategories',$this->data);
        }
    }

}