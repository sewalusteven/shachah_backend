<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 6/17/2017
 * Time: 3:13 PM
 */
class Content extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));
        $this->data['page'] = 'content';
        //$this->data['vote'] = $this->votes_model->get_vote(array('type' => 'core'));

    }

    public function index(){
        $this->data['title']= 'Web Content';
        $allcontent = $this->content_model->get_allcontent(array());
        $this->data['categories'] = $this->content_model->get_categories();

        if($this->input->post())
        {
            //form post
            $fData = $this->input->post();

            switch ($fData['action'])
            {
                case 'add':
                    $data = array(
                        'admin_id' =>$this->data['user']['admin_id'],
                        'ctype_id' =>$fData['category_id'],
                        'title' => $fData['title'],
                        'details'=>$fData['detail']
                    );

                    #addcontent
                    $content_id =  $this->content_model->add_content($data);

                    #addlog
                    $logdata = array(
                        'admin_id'=> $this->data['user']['admin_id'],
                        'log' => 'New web content has been added',
                        'explanation' => $this->data['user']['fullname'].' added '.$fData['title'].' article',
                        'link' => '/content'
                    );
                    $this->logs_model->addlog($logdata);

                    $this->data['s'] = 's';
                    $this->data['message'] = "Content successfully been added";

                    break;
                case 'edit':

                    $data = array(
                        'admin_id' =>$this->data['user']['admin_id'],
                        'title' => $fData['title'],
                        'details'=>$fData['detail']
                    );

                    #addcontent
                    $this->content_model->edit_content($fData['content_id'],$data);

                    #addlog
                    $logdata = array(
                        'admin_id'=> $this->data['user']['admin_id'],
                        'log' => 'Web content has been updated',
                        'explanation' => $this->data['user']['fullname'].' just updated '.$fData['title'].' article',
                        'link' => '/content'
                    );
                    $this->logs_model->addlog($logdata);

                    break;


                case 'delete':
                    $this->content_model->delete_content($fData['content_id']);
                    #addlogs
                    $logdata = array(
                        'admin_id'=> $this->data['user']['admin_id'],
                        'log' => 'An article has been deleted',
                        'explanation' => $this->data['user']['fullname'].' deleted an article',
                        'link' => '/content'
                    );
                    $this->logs_model->addlog($logdata);
                    break;

                default:
                    #do nothing

                    break;
            }

            redirect('content','refresh');
        }
        else
        {
            //the page
            foreach ($allcontent as $key => $content)
            {
                $allcontent[$key]['admin'] = $this->user_model->get_user(array('admin_id'=>$content['admin_id']));
                $allcontent[$key]['ctype'] = $this->content_model->get_category(array('ctype_id'=>$content['ctype_id']));

            }

            $this->data['allcontent'] = $allcontent;

            $this->load->view('content/index',$this->data);

        }


    }


}