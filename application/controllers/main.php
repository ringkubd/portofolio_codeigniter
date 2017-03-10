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
    public function main(){
        parent::__construct();
        $this->load->model('main_model');
    }
    //front index loader
    public function Index(){
        //get data from model
        $intro['intros'] = $this->main_model->intro();
        
        //get about me from model
        
        $about['about_me']  = $this->main_model->about();
        $about['skills']    = $this->main_model->skills();
        $services['services']    = $this->main_model->services();
        //view
        $this->load->view('portofolio/inc/header');
        $this->load->view('portofolio/inc/intro',$intro);
        $this->load->view('portofolio/inc/about',$about);
        $this->load->view('portofolio/inc/services',$services);
        $this->load->view('portofolio/index');
    }
}