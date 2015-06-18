<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crawler extends MY_Controller {
    

	public function crawl() {

		require_once($_SERVER['DOCUMENT_ROOT'] . '/application/third_party/simple_html_dom.php');
		
		$url = $this->input->get('u');
		if ($url !== '') {
		    
		    // Analizo la url que me viene
		    $url = urldecode($url);
			
			preg_match('~^(https?://)?(.*\.)?(.+\.[^/]+)~', $url, $parts);
			list($base, $protocol, $subdomains, $domain) = $parts;
			
			if (count($parts) === 0) {
				redirect('/');
			}
			
			// Saco los enlaces
			
			if ($protocol === '') {
				$url = 'http://' . $url;
				$base = 'http://' . $subdomains . $domain;
			}
		    $html = file_get_html($url);
		    
		    $anchors = array();
		    
		    foreach ($html->find('a') as $anchor) {
		    	$href = $anchor->href;
		    	if (strlen($href) === 0 || preg_match('~^\#|javascript:~', $href)) continue;
		    	
		    	$parsed_href = $href;
		    	if (substr($href, 0, 1) === '/') {
		    		$parsed_href = $base . $href;
		    	}
		    	
				$anchors[] = $parsed_href;
		    }

		    $this->data['anchors'] = $anchors;
		    $this->data['url_parts'] = $parts;
		    
		    $this->web_view('crawler/results', $this->data);
		    
		} else {
			redirect('/');
		}
	}
	
	function get_url_status($url = null) {
		
		if ($url === null) {
			$url = $this->input->get('url');
		}
		
		if ($url) {
			
			$parsed_href = $url;
			
			$ch = curl_init($parsed_href);
	    		curl_setopt_array($ch, array(
	    		//CURLOPT_CONNECT_ONLY => true,
	    		CURLOPT_FAILONERROR => true,
	    		//CURLOPT_FORBID_REUSE => true,
	    		//CURLOPT_FRESH_CONNECT => true,
	    		CURLOPT_NOBODY => true,
	    		//CURLOPT_RETURNTRANSFER => true,
	    		//CURLOPT_SSL_VERIFYPEER => false,
	    		
	    		
	    		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    		//CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
	    		CURLOPT_CONNECTTIMEOUT => 1,
	    		
	    		CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36'
	    	));
	    	
	    	curl_exec($ch);
	    	$info = curl_getinfo($ch);
	    	curl_close($ch);
	    	//$response = http_get($parsed_href, $options, $info);
	    	
	    	echo $parsed_href . ' -> ' . $info['http_code'] . ($info['http_code'] === 301 || $info['http_code'] === 302 ? ' => ' . $info['redirect_url'] : '') . "\n";
	    	//var_dump($info) . "\n";
	    	exit;
    	
		}
		
	}
}
