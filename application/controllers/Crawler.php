<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crawler extends MY_Controller {
    

	public function crawl() {
		
		$url = $this->input->get('u');
		if ($url !== NULL) {
		    
		    $url = urldecode($url);
		    
		    
		} else {
		    redirect('/');
		}
	}
}
