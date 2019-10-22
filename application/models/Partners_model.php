<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 8/25/2017
 * Time: 1:46 PM
 */
class Partners_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_partners($data = "")
    {
        if($data == "")
        {
            //all partners
            $qry = $this->db->get('partners');
        }
        else
        {
            $qry = $this->db->get_where('partners',$data);
        }

        return $qry->result_array();
    }

    public function get_cpartners($data = "")
    {
        if($data == "")
        {
            //all partners
            $qry = $this->db->get('cpartners');
        }
        else
        {
            $qry = $this->db->get_where('cpartners',$data);
        }

        return $qry->result_array();
    }

    public function get_partner($data)
    {
        //get all packages
        $qry = $this->db->get_where('partners',$data);
        return $qry->row_array();
    }

    public function get_cpartner($data)
    {
        //get all packages
        $qry = $this->db->get_where('cpartners',$data);
        return $qry->row_array();
    }

    public function add_partner($data)
    {
        //add package
        $this->db->insert('partners',$data);
        return $this->db->insert_id();
    }

    public function add_cpartner($data)
    {
        //add package
        $this->db->insert('cpartners',$data);
        return $this->db->insert_id();
    }

    public function update_partner($data,$id)
    {
        //update package
        $this->db->where('partner_id',$id);
        return $this->db->update('partners',$data);
    }

    public function update_cpartner($data,$id)
    {
        //update package
        $this->db->where('cpartner_id',$id);
        return $this->db->update('cpartners',$data);
    }

    public function delete_partner($id)
    {
        return $this->db->delete('partners', array('partner_id' => $id));
    }

    public function delete_cpartner($id)
    {
        return $this->db->delete('cpartners', array('cpartner_id' => $id));
    }



    public function count_partners()
    {
        #count partners
        $this->db->get('partners');
        return $this->db->affected_rows();
    }

    public function count_cpartners()
    {
        #count partners
        $this->db->get('cpartners');
        return $this->db->affected_rows();
    }

}