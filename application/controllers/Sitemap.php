<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
				
				
				header("Content-type: text/xml");

		//$xml_file = file_get_contents('home/avinashavi941/public_html/application/view/sitemap.xml');
		////$xml_file = file_get_contents('/home/avinashavi941/public_html/view/sitemap.xml');
		//$xml_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/view/sitemap.xml");
		//echo $xml_file;
		$this->load->view('sitemap.xml');
	}
	
	
}
