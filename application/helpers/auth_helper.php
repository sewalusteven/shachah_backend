<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_logged_in(){
	$CI =& get_instance();
	if(!$CI->session->userdata('admin_loggedin')){
		redirect('/login?r='.current_url(),'refresh');
	}
}