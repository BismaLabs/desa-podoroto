<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Galeri extends CI_Controller
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
            'title' => 'Album Galeri' . ' - ' . systems('site_title'),
            'keywords' => systems('keywords'),
            'descriptions' => systems('descriptions'),
        );

        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/galeri/data');
        $this->load->view('public/part/footer');
    }
    public function foto($id_album)
    {
        $id_album = $this->encryption->decode($id_album);

        $data = array(
            'title'          => $this->web->detail_album_array($id_album)->nama_album . ' - ' . systems('site_title'),
            'nama_album'     => $this->web->detail_album_array($id_album)->nama_album,
            'keywords'         => systems('keywords'),
            'descriptions'     => systems('descriptions'),
            'data_foto'      => $this->web->detail_album($id_album),
        );
        //load view with data
        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/galeri/detail');
        $this->load->view('public/part/footer');

    }
}