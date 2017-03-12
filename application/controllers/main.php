<?php 
 /*
  * MD. Anwar Jahid 
  * Website Type : Portofolio
  * Email : ajr.jahid@gmail.com
  * Website: www.bdtiger.win
  * facebook: www.fb.com/ringkubd
  * Contact: +8801737956549  
  */
class Main extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
    }
    //front index loader
    public function Index(){
        //get data from model
        $intro['intros'] = $this->Main_model->intro();
        
        //get about me from model
        
        $about['about_me']  		= $this->Main_model->about();
        $about['skills']    		= $this->Main_model->skills();
        $services['services']    	= $this->Main_model->services();
        //view
        $this->load->view('portofolio/inc/header');
        $this->load->view('portofolio/inc/intro',$intro);
        $this->load->view('portofolio/inc/about',$about);
        $this->load->view('portofolio/inc/services',$services);
        $this->load->view('portofolio/inc/testimonial');
        $this->load->view('portofolio/inc/showcase');
        $this->load->view('portofolio/index');
    }
}