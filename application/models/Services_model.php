<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 8/25/2017
 * Time: 1:44 PM
 */
class Services_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_services($data = "")
    {
        if($data == "")
        {
            //all services
            $qry = $this->db->get('services');
        }
        else
        {
            $qry = $this->db->get_where('services',$data);
        }

        return $qry->result_array();
    }

    public function get_service($data)
    {
        //get all packages
        $qry = $this->db->get_where('services',$data);
        return $qry->row_array();
    }

    public function add_service($data)
    {
        //add package
        $this->db->insert('services',$data);
        return $this->db->insert_id();
    }

    public function update_service($data,$id)
    {
        //update package
        $this->db->where('service_id',$id);
        return $this->db->update('services',$data);
    }

    public function delete_service($id)
    {
        return $this->db->delete('services', array('service_id' => $id));
    }



    public function count_services()
    {
        #count services
        $this->db->get('services');
        return $this->db->affected_rows();
    }

}