<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
class Main_model extends CI_Model{
    public function Main_model(){
        parent::__construct();
    }
    /*Get Data From Intro Table*/
    public function intro(){
        $query = $this->db->get('intro',1);
        return $query->result();
    }
    //Get About Me
    public function about(){
        $where = $this->db->where('published',1);
        $query = $this->db->get('about_me');
        return $query->result();
    }
    //Get Skills
    public function skills(){
        $this->db->order_by('skill_parcentege', 'DESC');
        $query = $this->db->get('skills',5);
        return $query->result();
    }
    /*Get Data From Intro Table*/
    public function services(){
        $this->db->where('service_status',1);
        $this->db->order_by('service_id', 'DESC');
        $query = $this->db->get('services',3);
        return $query->result();
    }
}
