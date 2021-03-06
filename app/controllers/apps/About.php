<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Website Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/website-podoroto/
 */
class About extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('apps');
    }

    public function index()
    {
        if ($this->apps->apps_id()) {
            //create data array
            $data = array(
                'about' => TRUE,
                'title' => 'Tentang Aplikasi'
            );
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/tentang/data');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
        }
    }
}