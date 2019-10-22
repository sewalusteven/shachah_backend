<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'email'));

		$this->load->helper(array('url', 'auth', 'slug'));

		$this->load->model(array('user_model'));
	}

	public function index(){

	}

	public function login(){
		if(!$this->session->userdata('admin_loggedin')){
			$redirect = !$this->input->get('r') ? '/':$this->input->get('r');
			if(!$this->input->post()){
				$this->data['title'] = 'Login';
				$this->data['message'] = '';
				$this->data['redirect'] = $redirect;
				$this->load->view('login',$this->data);
			}else{
				$query = $this->input->post();

				switch ($query['action'])
                {
                    case 'login':
                        if($this->user_model->check_username_2($query['username'])){
                            if($this->user_model->check_user($query['username'], $query['password'])){
                                $user = $this->user_model->get_user(array('username' => $query['username']));
                                $user['admin_loggedin'] = 1;
                                $this->session->set_userdata($user);
                                redirect($query['redirect'], 'refresh');
                            }else{
                                $this->data['title'] = 'Login';
                                $this->data['class'] = 'danger';
                                $this->data['redirect'] = $query['redirect'];
                                $this->data['message']    = 'Wrong password';
                                $this->load->view('login',$this->data);
                            }
                        }else{
                            $this->data['title'] = 'Login';
                            $this->data['class'] = 'danger';
                            $this->data['redirect'] = $query['redirect'];
                            $this->data['message']    = 'The account does not exist.';
                            $this->load->view('login',$this->data);
                        }

                        break;
                    case 'forgotpass':
                        #forgot pass action
                        $check = $this->user_model->confirm_email($query['email']);

                        if($check == 0)
                        {
                            #that email doesn't exist
                            $this->data['title'] = 'Login';
                            $this->data['class'] = 'danger';
                            $this->data['redirect'] = $query['redirect'];
                            $this->data['message']    = 'The email does not exist.';
                            $this->load->view('login',$this->data);

                        }
                        else
                        {
                            #create rand pass and send it to the db.
                            $temp_pass = randPass(8);
                            $dbdata = array(
                                'password' => $temp_pass
                            );
                            $this->user_model->add_temppass($query['email'],$dbdata);

                            #send email
                            $config['protocol'] = 'smtp';
                            $config['smtp_host'] = 'webmail.conexusoilandgas.com';
                            $config['smtp_user'] = 'info@conexusoilandgas.com';
                            $config['smtp_pass'] = '%Admin%2015';
                            $config['charset'] = 'iso-8859-1';
                            $config['wordwrap'] = TRUE;
                            $this->email->initialize($config);

                            $this->email->from('info@conexusoilandgas.com', 'Conexus Password recovery');
                            $this->email->to($query['email']);

                            $this->email->subject('Conexus Web Panel Password Recovery');

                            $body = "Hi";
                            $body .= "Your temporary password is :".$temp_pass;
                            $body .= "Regards";

                            $this->email->message($body);
                            $this->email->send();

                            #echo message
                            $this->data['title'] = 'Login';
                            $this->data['class'] = 'success';
                            $this->data['redirect'] = $query['redirect'];
                            $this->data['message']    = 'An email has been sent with a temporary password you can use.';
                            $this->load->view('login',$this->data);
                        }

                        break;
                }
			}
		}else{
			redirect('/','refresh');
		}
	}

	public function logout(){
		if(!$this->session->userdata('email')){
			redirect('/login','refresh');
		}

		$this->session->sess_destroy();
		redirect('/','refresh');
	}


	public function send_confirmation_email($id){
		$user = $this->user_model->get_user_by_id($id);
		$this->data['user'] = $user;
		$message = $this->load->view('email/confirmation',$this->data,true);

		$this->email->set_mailtype('html');
		$this->email->from('donotreply@ctk.com', 'CTK');
		$this->email->to($user['email']);
		$this->email->subject('Confirmation email');
		$this->email->message($message);
		$this->email->send();
	}

	public function confirmation(){
		$code = $this->input->get('code');
		$this->user_model->confirm_signup($code);
		$this->data['title'] = 'Login';
		$this->data['class'] = 'success';
		$this->data['redirect'] = '/';
		$this->data['message'] = 'You have confirmed your account. Login to continue';
		$this->load->view('login',$this->data);
	}

	public function success(){
		$this->data['title'] = 'Success';
		$this->data['message'] = 'You have succesfully registered! A confirmation email has been sent to your email address to complete the signup process.';
		$this->load->view('success',$this->data);
	}
}
