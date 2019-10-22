<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 6/21/2017
 * Time: 3:39 PM
 */
class Logs_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function addlog($data)
    {
        $this->db->insert('adminlogs',$data);
        return $this->db->insert_id();
    }

}