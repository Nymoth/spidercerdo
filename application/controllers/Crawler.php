<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crawler extends MY_Controller {
    

	public function crawl() {
		https://spidercerdo-nymoth.c9.io/
		require_once($_SERVER['DOCUMENT_ROOT'] . '/application/third_party/simple_html_dom.php');
		
		$url = $this->input->get('u');
		if ($url !== '') {
		    
		    // Analizo la url que me viene
		    $url = urldecode($url);
			
			preg_match('~^(https?://)?(?:.*\.)?(.+\.[^/]+)~', $url, $parts);
			list($base, $protocol, $domain) = $parts;
			
			if (count($parts) === 0) {
				redirect('/');
			}
			
			// Saco los enlaces
		    $html = file_get_html($url);
		    
		    echo '<pre>';
		    foreach ($html->find('a') as $anchor) {
		    	echo $anchor->href . "\n";
		    }
		    exit;
		    
		} else {
			redirect('/');
		}
	}
}
