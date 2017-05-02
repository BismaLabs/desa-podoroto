<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('web');
    }

    public function index()
    {
        $data = array(
            'title' => 'Produk' .' - ' .systems('site_title'),
            'keywords'         => systems('keywords'),
            'descriptions'     => systems('descriptions'),
        );

        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/produk/data');
        $this->load->view('public/part/footer');
    }
}