<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 7/3/2017
 * Time: 8:00 PM
 */
class Gallery_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_galleries($data = "")
    {
        if($data == "")
        {
            //all gallerys
            $qry = $this->db->get('gallery');
        }
        else
        {
            $qry = $this->db->get_where('gallery',$data);
        }

        return $qry->result_array();
    }

    public function get_gallery($data)
    {
        //get all packages
        $qry = $this->db->get_where('gallery',$data);
        return $qry->row_array();
    }

    public function add_gallery($data)
    {
        //add package
        $this->db->insert('gallery',$data);
        return $this->db->insert_id();
    }

    public function update_gallery($data,$id)
    {
        //update package
        $this->db->where('gallery_id',$id);
        return $this->db->update('gallery',$data);
    }

    public function delete_gallery($id)
    {
        return $this->db->delete('gallery', array('gallery_id' => $id));
    }



    public function count_gallerys()
    {
        #count gallerys
        $this->db->get('gallery');
        return $this->db->affected_rows();
    }

    // gcategories
    public function get_gcategories($data = "")
    {
        //get all gcategories
        if($data == "")
            $qry = $this->db->get('gcategory');
        else
            $qry = $this->db->get_where('gcategory',$data);

        return $qry->result_array();
    }

    public function get_gcategory($data){
        $query = $this->db->get_where('gcategory',$data);
        return $query->row_array();
    }

    public function add_gcategory($data)
    {
        //add package
        $this->db->insert('gcategory',$data);
        return $this->db->insert_id();
    }

    public function update_gcategory($data,$id)
    {
        //update feature
        $this->db->where('gcategory_id',$id);
        return $this->db->update('gcategory',$data);
    }


}