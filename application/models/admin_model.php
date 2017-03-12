<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */

class admin_model extends CI_Model{
    public function admin_model(){
        parent::__construct();
    }
    public function login($data){
        $query = $this->db->get_where('admin',$data);
        if($query){
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function intro($data){
        $query = $this->db->replace('intro',$data);
        if($this->db->affected_rows()>0){
            return TRUE;
        }
    }
    public function about_me($data){
        $check = $this->db->get_where('about_me',array('published'=>1));

        if ($check ) {
            $this->db->where('published', 1);
            $this->db->update('about_me', array('published'=>0));
        }

        $query = $this->db->insert('about_me',$data);
        if($this->db->affected_rows()>0){
            return TRUE;
        }
    }
    //skill add
    public function skills($data){
        $query = $this->db->insert('skills',$data);
        if($this->db->affected_rows()>0){
            return TRUE;
        }
    }
    //skills get
    public function skill_show(){
        $query = $this->db->get('skills');
        if($query){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
    //skill show by id
    public function skill_show_by_id($id){
        $query = $this->db->get_where('skills',$id);
        if($query){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
    //skill update
    public function skill_update($data){
        $this->db->where('skill_id',$data['skill_id']);
        unset($data['skill_id']);
        $query = $this->db->update('skills',$data);
        if ($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    //skill delete
    public function skill_delete($id){
        $query = $this->db->delete('skills',$id);
        if($query){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    //services
    public function services($data){
        $query = $this->db->insert('services',$data);
        if($this->db->affected_rows()>0){
            return TRUE;
        }
    }
    
    //add work group
    public function add_work_group($data){
        $this->db->insert('workgroup',$data);
        if($this->db->affected_rows()>0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    //show work
    public function show_work_group(){
        $query = $this->db->get('workgroup');
        if($query->num_rows()>0){
            return $query->result();
        } else {
            return FALSE;
        }
    }
}