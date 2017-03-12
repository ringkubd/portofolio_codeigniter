<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public $message;
    public function Admin(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('Logcheck_helper');

        $seesion_loged_in   = $this->session->has_userdata('logged_in');
        $session_email      = $this->session->has_userdata('email');
        if(!isset($seesion_loged_in) || $seesion_loged_in !== TRUE || !isset($session_email)){
            $seesion_loged_in = FALSE;
            $this->load->view('poto_admin/login');
            }
    }
    public function Index(){
        $seesion_loged_in   = $this->session->has_userdata('logged_in');
        $session_email      = $this->session->has_userdata('email');
        if(isset($seesion_loged_in) && $seesion_loged_in == TRUE && isset($session_email)){
        $this->load->view('poto_admin/header');
        $this->load->view('poto_admin/main');
        $this->load->view('poto_admin/footer');
            } else {
                $this->load->view('poto_admin/login');
            }
//            $this->load->view('New_Folder/admin/login');
	}
        /*
         *
         * admin login control
         *          
         */
    public function admin_login(){
        $submit = $this->input->post('admin_log');
        if(isset($submit)){
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
                );
            if($this->form_validation->run()==FALSE){
                $this->load->view('poto_admin/login');
            }else{
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $password = sha1($password);
                $data=array(
                    'email'     => $email,
                    'password'  => $password
                );
                $this->load->model('Admin_model');
                $query = $this->Admin_model->login($data);
                if($query){
                    $array = array(
                        'email'     => $email,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($array);
                    redirect('admin');
                } else {
                    $error['loginError'] = "Password Or Email Doesnt Match";
                    $this->load->view('poto_admin/login',$error);
                }
            }
        }

    }
    /*
         *
         * admin logout control
         *          
         */
        public function logout(){
            unset(
                    $_SESSION['logged_in'],
                    $_SESSION['email']
            );
            redirect('admin');
        }
        
        //admin intro part
        
        public function intro(){
            $seesion_loged_in   = $this->session->has_userdata('logged_in');
            $session_email      = $this->session->has_userdata('email');
            if($seesion_loged_in==FALSE || !isset($seesion_loged_in)){
                $this->load->view('poto_admin/login');
            } else {
                $this->form_validation->set_rules('intro_title', 'Intro Title', 'required|trim');
                $this->form_validation->set_rules('offer_desc', 'Intro Desc', 'required|trim');
                if($this->form_validation->run() == FALSE){
                    $this->load->view('poto_admin/header');
                    $this->load->view('poto_admin/temp/intro');
                    $this->load->view('poto_admin/footer');
                } else {
                    $intro_logo = $_FILES['intro_logo']['name'];
                    $intro_back_img = $_FILES['intro_bac_img']['name'];
                    if($intro_logo !=" "){
                        $config = array();
                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = 100;
                        $config['max_width']            = 130;
                        $config['max_height']           = 130;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('intro_logo');
                    }
                    if($intro_back_img != ""){
                        $config = array();
                        $config['upload_path']          = './uploads/';
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = 0;
                        $config['min_width']            = 0;
                        $config['max_height']           = 0;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('intro_bac_img');
                    }
                    if (!$this->upload->do_upload('intro_logo') || !$this->upload->do_upload('intro_bac_img'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('poto_admin/header');
                        $this->load->view('poto_admin/temp/intro',$error);
                        $this->load->view('poto_admin/footer');
                }
                else
                {
                    $intro_title        =   $this->input->post('intro_title');
                    $intro_logo         =   base_url()."uploads/".$intro_logo;
                    $intro_back_img     =   base_url()."uploads/".$intro_back_img;
                    $intro_desc         =   $this->input->post('offer_desc');
                    $data = array(
                        'id'            =>  1,
                        'intro_title'   =>  $intro_title,
                        'intro_back_img'=>  $intro_back_img,
                        'intro_logo'    =>  $intro_logo,
                        'intro_desc'    =>  $intro_desc
                    );
                    $update             = $this->Admin_model->intro($data);
                    if($update){
                        $this->load->view('poto_admin/header');
                        $this->load->view('poto_admin/temp/intro',$data);
                        $this->load->view('poto_admin/footer');
                    }
                }
                }
            }
            
        }
    public function about(){
        $seesion_loged_in   = $this->session->has_userdata('logged_in');
        $session_email      = $this->session->has_userdata('email');
        if($seesion_loged_in==FALSE || !isset($seesion_loged_in)){
            $this->load->view('poto_admin/login');
        } else {
            //$this->form_validation->set_rules('profile_img', 'Profile Image', 'required|trim|" "');
            $this->form_validation->set_rules('about_me', 'About Me', 'required|trim|min_length[100]');
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('poto_admin/header');
                $this->load->view('poto_admin/temp/about');
                $this->load->view('poto_admin/footer');
            }else{
                $about_submit = $this->input->post('about_submit');
                if (isset($about_submit)) {
                    $config = array();
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 0;
                    $config['min_width']            = 0;
                    $config['max_height']           = 0;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('profile_img');

                    //insert data into module

                    $img_url    = $this->upload->data('file_name');
                    $img        = base_url()."uploads/".$img_url ;
                    $about_us   = $this->input->post('about_me');
                    $published  = $this->input->post('published');
                    //var_dump($this->upload->data());
                    $data       =array(
                        'about_me'  =>  $about_us,
                        'image'     =>  $img,
                        'published' =>  $published

                        );
                    $query      = $this->Admin_model->about_me($data);
                    if($query){
                        $message['message'] = "Success";
                        $this->load->view('poto_admin/header');
                        $this->load->view('poto_admin/temp/about',$message);
                        $this->load->view('poto_admin/footer');
                    }
                }
            }
        }
    }
    public function skillss(){
        $seesion_loged_in   = $this->session->has_userdata('logged_in');
        $session_email      = $this->session->has_userdata('email');
        if($seesion_loged_in==FALSE || !isset($seesion_loged_in)){
            $this->load->view('poto_admin/login');
        } else {
            $skill_show = $this->Admin_model->skill_show();
            $message['skills'] = $skill_show;
            
            $this->form_validation->set_rules('skill', 'Skill', 'required|trim');
            $this->form_validation->set_rules('skill_percentege', 'skill percentege', 'required|trim');
            if($this->form_validation->run()==FALSE){
                $this->load->view('poto_admin/header');
                $this->load->view('poto_admin/temp/skills',$message);
                $this->load->view('poto_admin/footer');
            } else {
                $skill_submit = $this->input->post('skill_submit',true);
                if (isset($skill_submit)) {
                    $skill_name = $this->input->post('skill');
                    $skill_percentege = $this->input->post('skill_percentege');
                    $data = array(
                        'skill_name'        => $skill_name,
                        'skill_parcentege'  => $skill_percentege
                        
                );
                    
                $query = $this->Admin_model->skills($data);
                
                if($query){
                        $message['message'] = "Success";
                        $this->load->view('poto_admin/header');
                        $this->load->view('poto_admin/temp/skills',$message);
                        $this->load->view('poto_admin/footer');
                    }
                }
            }  
        }
    }
    //skill edit
    public function skilledit($id){
        $seesion_loged_in   = $this->session->has_userdata('logged_in');
        $session_email      = $this->session->has_userdata('email');
        if($seesion_loged_in==FALSE || !isset($seesion_loged_in)){
            $this->load->view('poto_admin/login');
        } else 
    {$id_no = array('skill_id' =>$id);
        $query = $this->Admin_model->skill_show_by_id($id_no);
        if($query){
            $data['editvalue'] = $query;
            $this->load->view('poto_admin/header');
            $this->load->view('poto_admin/temp/skills',$data);
            $this->load->view('poto_admin/footer');
        } else{
            redirect('admin/skillss');
        }
        
        }
    }
    public function skillupdate(){
        $seesion_loged_in   = $this->session->has_userdata('logged_in');
        $session_email      = $this->session->has_userdata('email');
        if($seesion_loged_in==FALSE || !isset($seesion_loged_in)){
            $this->load->view('poto_admin/login');
        } else 
    {
            $this->form_validation->set_rules('skill_id', 'Skill ID', 'required|trim');
            $this->form_validation->set_rules('skill', 'Skill', 'required|trim');
            $this->form_validation->set_rules('skill_percentege', 'skill percentege', 'required|trim');
            if($this->form_validation->run()==FALSE){
                $this->load->view('poto_admin/header');
                $this->load->view('poto_admin/temp/skills',$message);
                $this->load->view('poto_admin/footer');
            } else {
                $skill_update = $this->input->post('skill_update',true);
                if (isset($skill_update)) {
                    $skill_id = $this->input->post('skill_id');
                    $skill_name = $this->input->post('skill');
                    $skill_percentege = $this->input->post('skill_percentege');
                    $data = array(
                        'skill_id'          => $skill_id,
                        'skill_name'        => $skill_name,
                        'skill_parcentege'  => $skill_percentege
                        
                );
                    
                $query = $this->Admin_model->skill_update($data);
                
                if($query){
                    redirect('admin/skillss','refresh');
                    }
                }
            } 
    }
    }
    public function skill_delete($id){
        $data = array(
            'skill_id' => $id
        );
        $query = $this->Admin_model->skill_delete($data);
        if($query){
            redirect('admin/skillss','refresh');
        }
    }
    
    //servicess
    public function services(){
        $seesion_loged_in   = $this->session->has_userdata('logged_in');
        $session_email      = $this->session->has_userdata('email');
        if($seesion_loged_in==FALSE || !isset($seesion_loged_in)){
            $this->load->view('poto_admin/login');
        } else 
    {
            $this->form_validation->set_rules('service_icon', 'Service Icon', 'required|xss_clean');
            $this->form_validation->set_rules('service_title', 'Service Title', 'required|trim|xss_clean');
            $this->form_validation->set_rules('service_details', 'Service Details', 'required|trim|xss_clean');
            if($this->form_validation->run()==FALSE){
                $this->load->view('poto_admin/header');
                $this->load->view('poto_admin/temp/services');
                $this->load->view('poto_admin/footer');
            } else {
                $title              = $this->input->post('service_title');
                $service_icon       = $this->input->post('service_icon');
                $service_details    = $this->input->post('service_details');
                $published          = $this->input->post('published');
                $data = array(
                    'service_title'     =>  $title,
                    'service_icon'      =>  '<i class="'.$service_icon.'"></i>',
                    'service_details'   =>  $service_details,
                    'service_status'    =>  $published
                );
                $query = $this->Admin_model->services($data);
                $message = "";
                if($this->db->affected_rows()>0){
                    $message['message'] = "Sucess";
                    $this->load->view('poto_admin/header');
                    $this->load->view('poto_admin/temp/services',$message);
                    $this->load->view('poto_admin/footer');
                } else {
                    $message['message'] = "There is something wrong";
                    $this->load->view('poto_admin/header');
                    $this->load->view('poto_admin/temp/services',$message);
                    $this->load->view('poto_admin/footer');
                }
            }
    }
    }
    
    //my work
    public function mywork(){
        Logcheck();
            $show_result = $this->Admin_model->show_work_group();
            if(isset($show_result)){
                $message['data'] = $show_result;
            }
        
        $this->form_validation->set_rules('group_name', 'Work Group Name', 'required|xss_clean',array('required'=>'Work Group Name Can not left Blank'));
        if(!$this->form_validation->run()){
            $this->load->view('poto_admin/header');
            $this->load->view('poto_admin/temp/work_group',$message);
            $this->load->view('poto_admin/footer');
        }else{
            $work_group_name = $this->input->post('group_name');
            $data = array(
                'work_group_name' => $work_group_name
            );
            $query = $this->Admin_model->add_work_group($data);
            if($query){
                $message['message'] = "Sucess";
                $this->load->view('poto_admin/header');
                $this->load->view('poto_admin/temp/work_group',$message);
                $this->load->view('poto_admin/footer');
            }
            
        }
    }
    
    //show and edit mywork
}
