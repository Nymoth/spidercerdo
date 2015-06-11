<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    var $data = array();
    
    function __construct()
    {
        parent::__construct();
        
        
    }
    
    function web_view($view, $data = array()) {
        
        $_data = array_merge($this->data, $data);
        
        $this->load->view('arch/header', $_data);
        $this->load->view($view, $_data);
        $this->load->view('arch/footer', $_data);
    }
}

