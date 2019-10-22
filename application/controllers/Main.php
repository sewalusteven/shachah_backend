<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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

	public function index(){

		$this->data['title'] = 'Home';
        $this->data['users'] = $this->user_model->get_users(array('isactive'=> 1));
        //$this->data['npartners'] = $this->partners_model->count_partners();
        $this->data['nservices'] = $this->services_model->count_services();
        $this->data['nslides'] = $this->slides_model->count_slides();
        $this->data['narticles'] = $this->content_model->count_content();

		$this->load->view('home/home', $this->data);

	}




	function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
		$sort_col = array();
		foreach ($arr as $key=> $row) {
			$sort_col[$key] = $row[$col];
		}
		array_multisort($sort_col, $dir, $arr);
	}
}