<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    function Logcheck(){
        if(isset($_SESSION['logged_in']) && isset($_SESSION['email'])){
            $seesion_loged_in   = $_SESSION['logged_in'];
            $session_email      = $_SESSION['email'];
            if($seesion_loged_in==FALSE || !isset($seesion_loged_in)){
                redirect('admin/admin_login');
            }else{
                return true;
            }
        }else{
            redirect('admin/admin_login');
            return FALSE;
        }
}
