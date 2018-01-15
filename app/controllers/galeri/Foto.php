<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Foto extends CI_Controller
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
            'title' => 'Album Galeri Foto' . ' - ' . systems('site_title'),
            'keywords' => systems('keywords'),
            'descriptions' => systems('descriptions'),
        );

        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/galeri/data');
        $this->load->view('public/part/footer');
    }
    public function foto($slug)
    {

        $data = array(
            'title'          => $this->web->detail_album_array($slug)->nama_album . ' - ' . systems('site_title'),
            'nama_album'     => $this->web->detail_album_array($slug)->nama_album,
            'keywords'         => systems('keywords'),
            'descriptions'     => systems('descriptions'),
            'data_foto'      => $this->web->detail_album($slug),
        );
        //load view with data
        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/galeri/detail');
        $this->load->view('public/part/footer');

    }
}