<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 7/4/2017
 * Time: 9:57 PM
 */
class Blogs_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_blogs($data = "")
    {
        if($data == "")
        {
            //all blogs
            $qry = $this->db->get('blogs');
        }
        else
        {
            $qry = $this->db->get_where('blogs',$data);
        }

        return $qry->result_array();
    }

    public function get_tags($data)
    {
        $qry = $this->db->get_where('tags',$data);
        return $qry->result_array();
    }

    public function get_blog($data)
    {
        //get all packages
        $qry = $this->db->get_where('blogs',$data);
        return $qry->row_array();
    }

    public function add_blog($data)
    {
        //add package
        $this->db->insert('blogs',$data);
        return $this->db->insert_id();
    }

    public function add_tag($data)
    {
        //add package
        $this->db->insert('tags',$data);
        return $this->db->insert_id();
    }

    public function update_blog($data,$id)
    {
        //update package
        $this->db->where('blog_id',$id);
        return $this->db->update('blogs',$data);
    }

    public function delete_blog($id)
    {
        $this->db->delete('tags', array('blog_id'=> $id));
        return $this->db->delete('blogs', array('blog_id' => $id));
    }



    public function count_blogs($data = "")
    {
        #count blogs
        $this->db->from('blogs');
        $this->db->where($data);
        return $this->db->count_all_results();
    }

}