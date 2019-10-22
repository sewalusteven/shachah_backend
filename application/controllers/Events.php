<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'auth', 'data'));
        is_logged_in();
        $this->load->model(array('user_model', 'content_model','logs_model','services_model','events_model'));
        $this->data['user'] = $this->user_model->get_user(array('username'=>$this->session->userdata('username')));


        $this->data['page'] = 'events';
    }

    public function index()
    {
        $this->data['title'] = "Events and Announcements";
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
                    $config['min_width'] = 657;
                    $config['min_height'] = 300;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($file_element_name)){

                        $this->data['s'] = 's';

                        $dbdata = array(
                            'name' => $fData['title'],
                            'when' => date('Y-m-d',strtotime($fData['date'])),
                            'description' => $fData['detail'],
                            'istype' => $fData['istype']
                        );

                        $this->events_model->add_event($dbdata);

                    }else {
                        $this->data['s'] = 's';
                        $imgData = $this->upload->data();

                        $dbdata = array(
                            'name' => $fData['title'],
                            'when' => date('Y-m-d',strtotime($fData['date'])),
                            'description' => $fData['detail'],
                            'tmp_name' => $imgData['file_name'],
                            'istype' => $fData['istype']
                        );

                        $this->events_model->add_event($dbdata);

                    }

                    break;

                case 'edit':
                    #edit slide info

                    $dbdata = array(
                        'name' => $fData['title'],
                        'when' => date('Y-m-d',strtotime($fData['date'])),
                        'description' => $fData['detail'],
                        'istype' => $fData['istype']
                    );

                    $this->events_model->update_event($dbdata,$fData['event_id']);
                    redirect('blogs','refresh');

                    break;

                case 'delete':
                $this->events_model->update_event(array('isactive' => 0),$fData['event_id']);

                    break;

                default:
                    #do nothing

                    break;
            }

            redirect('events','refresh');

        }
        else
        {
            //get both events and blogs(announcements)
            $events = $this->events_model->get_events(array('isactive'=> 1));
            $this->data['events'] = $events;

            $this->load->view('blogs',$this->data);

        }
    }

    
    
}
