<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct(){
		$this->load->database();
		$this->load->library('bcrypt');
	}

	// public function get_users($data = array()){
	// 	$this->db->select('user.admin_id, user.dept_id, user.username, user.fullname, user.email, user.phone, user.position, user.time_stamp, dept.department ', false);
	// 	$this->db->where($data);
	// 	$this->db->from('administrators as user');
	// 	$this->db->join('vote_departments as dept', 'user.dept_id = dept.dept_id', 'inner');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	public function get_users($data = ""){

	    if($data == "")
	        $query = $this->db->get('administrators');
	    else
	        $query = $this->db->get_where('administrators',$data);

		return $query->result_array();
	}

	public function get_user($data){
		$query = $this->db->get_where('administrators',$data);
		return $query->row_array();
	}




	public function check_user($username, $password){
		$query = $this->db->get_where('administrators',array('username'=>$username));
		if($query->num_rows() === 1){
			$user = $this->get_user(array('username'=>$username));
			$user_password = $user['password'];
			if (($this->bcrypt->check_password($password, $user_password))) {
			    $this->edit_user($user['admin_id'],array('status'=>1));
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	public function check_username($username){
	   $query = $this->db->get_where('administrators', array('username'=>$username));
	   if($query->num_rows() === 1){
	        return TRUE;
	   }else{
	       return FALSE;
	   }
	}

	public function check_username_2($username){
	   $query = $this->db->get_where('administrators', array('username'=>$username, 'isactive'=>1));
	   if($query->num_rows() === 1){
	        return TRUE;
	   }else{
	       return FALSE;
	   }
	}

	public function add_user($data){
	    $data['password'] = $this->bcrypt->hash_password($data['password']);

	    $this->db->insert('administrators',$data);
	    return $this->db->insert_id();
	}

	public function edit_user($id, $data ){
		$this->db->where('admin_id', $id);
		return $this->db->update('administrators', $data);
	}

	public function add_temppass($email,$data)
    {
        $data['password'] = $this->bcrypt->hash_password($data['password']);
        $this->db->where('email',$email);
        return $this->db->update('administrators',$data);
    }

	public function confirm_signup($code){
		$array = array(
			'status'=> 1,
		);

		$this->db->where('confirmation_code',$code);
		return $this->db->update('administrators', $array);
	}

	public function confirm_email($email)
    {
        $this->db->get_where('administrators',array('email'=>$email));
        return $this->db->affected_rows();

    }

	public function edit_password($id,$data){
		$data_free = array(
			'password' => $this->bcrypt->hash_password($data['password']),
			);
		$this->db->where('admin_id',$id);
		return $this->db->update('administrators', $data_free);
	}
}
