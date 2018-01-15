<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('web');
        //get visitor
        //$this->web->counter_visitor();
    }

    public function detail($url)
    {

        $data = array(
            'title' 		=> $this->web->detail_pages($url)->judul_page .' - '. systems('site_title'),
            'data_page' 	=> $this->web->detail_pages($url),
            'keywords'      => systems('keywords'),
            'descriptions'  => systems('descriptions'),
        );

        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/pages/data');
        $this->load->view('public/part/footer');
    }
}