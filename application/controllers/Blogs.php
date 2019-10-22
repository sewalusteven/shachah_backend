<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 7/3/2017
 * Time: 7:59 PM
 */
class Blogs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model','slides_model','blogs_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));


        $this->data['page'] = 'blogs';
    }

    public function index()
    {
        $this->data['title'] = "Media & Articles";
        $blogs = $this->blogs_model->get_blogs();

        foreach ($blogs as $key => $blog) {
            $blogs[$key]['tags'] = $this->blogs_model->get_tags(array('blog_id' =>$blog['blog_id']));
        }

        $this->data['blogs'] = $blogs;

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

                    $config['upload_path'] = './cblogs/';
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size'] = 1024 * 9;
                    $config['encrypt_name'] = TRUE;
                    $config['min_width'] = 500;
                    $config['min_height'] = 500;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($file_element_name)){

                        $this->data['s'] = 's';
                        $tags = explode(',',$fData['tags']);

                        $dbdata = array(
                            'title' => $fData['title'],
                            'details' => $fData['detail'],
                            'author' => $fData['author']
                        );

                        $blog_id = $this->blogs_model->add_blog($dbdata);

                        foreach ($tags as $key => $tag)
                        {
                            $this->blogs_model->add_tag(array('blog_id'=> $blog_id, 'tag' => $tag));
                        }

                        $this->data['message'] = "Article successfully successfully uploaded";

                    }else {
                        $this->data['s'] = 's';
                        $imgData = $this->upload->data();

                        $tags = explode(',',$fData['tags']);

                        $dbdata = array(
                            'title' => $fData['title'],
                            'details' => $fData['detail'],
                            'tmp_name' => $imgData['file_name'],
                            'author' => $fData['author']
                        );

                        $blog_id = $this->blogs_model->add_blog($dbdata);

                        foreach ($tags as $key => $tag)
                        {
                            $this->blogs_model->add_tag(array('blog_id'=> $blog_id, 'tag' => $tag));
                        }

                        $this->data['message'] = "Article successfully successfully uploaded";

                    }

                    break;

                case 'edit':
                    #edit slide info

                    $dbdata = array(
                        'title' => $fData['title'],
                        'details' => $fData['detail'],
                        'author' => $fData['author']
                    );

                    $this->blogs_model->update_blog($dbdata,$fData['blog_id']);
                    redirect('blogs','refresh');

                    break;

                case 'delete':
                    $this->blogs_model->delete_blog($fData['blog_id']);

                    break;

                default:
                    #do nothing

                    break;
            }

            redirect('blogs','refresh');
        }
        else
        {
            #load page
            $this->load->view('blogs',$this->data);
        }
    }

}