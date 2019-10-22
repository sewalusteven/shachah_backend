<?php

/**
 * Created by PhpStorm.
 * User: sewal
 * Date: 7/4/2017
 * Time: 9:57 PM
 */
class Events_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_events($data = "")
    {
        if($data == "")
        {
            //all events
            $qry = $this->db->get('events');
        }
        else
        {
            $qry = $this->db->get_where('events',$data);
        }

        return $qry->result_array();
    }

    public function get_event($data)
    {
        //get all packages
        $qry = $this->db->get_where('events',$data);
        return $qry->row_array();
    }

    public function add_event($data)
    {
        //add package
        $this->db->insert('events',$data);
        return $this->db->insert_id();
    }

    public function update_event($data,$id)
    {
        //update package
        $this->db->where('event_id',$id);
        return $this->db->update('events',$data);
    }

    public function delete_event($id)
    {
        return $this->db->delete('events', array('event_id' => $id));
    }



    public function count_events($data = "")
    {
        #count events
        $this->db->from('events');
        $this->db->where($data);
        return $this->db->count_all_results();
    }

}