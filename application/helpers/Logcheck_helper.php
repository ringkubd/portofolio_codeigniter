<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
    function Logcheck_helper(){
        $seesion_loged_in   = $_SESSION['logged_in'];
        $session_email      = $_SESSION['email'];
        if($seesion_loged_in==FALSE || !isset($seesion_loged_in)){
            $this->load->view('poto_admin/login');
        }else{
            return true;
        }
}
