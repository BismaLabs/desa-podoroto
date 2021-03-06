<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Staff extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('web');
        //get visitor
        //$this->web->counter_visitor();
    }

    public function index()
    {
        $data = array(
            'title' => 'Staff Desa' . ' - ' . systems('site_title'),
            'data_staff'   => $this->web->get_staff(),
            'kepala_desa'   => $this->web->get_kepala_desa(),
            'keywords' => systems('keywords'),
            'descriptions' => systems('descriptions'),
        );

        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/staff/data');
        $this->load->view('public/part/footer');
    }
}