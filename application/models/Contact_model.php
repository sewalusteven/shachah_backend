<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 7/4/2017
 * Time: 9:57 PM
 */
class Contact_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_contacts($data = "")
    {
        if($data == "")
        {
            //all contacts
            $qry = $this->db->get('contacts');
        }
        else
        {
            $qry = $this->db->get_where('contacts',$data);
        }

        return $qry->result_array();
    }

    public function get_contact($data)
    {
        //get all packages
        $qry = $this->db->get_where('contacts',$data);
        return $qry->row_array();
    }

    public function add_contact($data)
    {
        //add package
        $this->db->insert('contacts',$data);
        return $this->db->insert_id();
    }

    public function update_contact($data,$id)
    {
        //update package
        $this->db->where('contact_id',$id);
        return $this->db->update('contacts',$data);
    }

    public function delete_contact($id)
    {
        return $this->db->delete('contacts', array('contact_id' => $id));
    }



    public function count_contacts($data = "")
    {
        #count contacts
        $this->db->from('contacts');
        $this->db->where($data);
        return $this->db->count_all_results();
    }

}