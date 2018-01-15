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
        //get visitor
        //$this->web->counter_visitor();
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

    public function detail($url)
    {
        //library disqus
        $this->load->library('disqus');

        $data = array(
            'detail_produk'    => $this->web->detail_produk($url),
            'title'            => $this->web->detail_produk($url)->judul_produk .' - ' .systems('site_title'),
            'keywords'         => $this->web->detail_produk($url)->keywords,
            'descriptions'     => $this->web->detail_produk($url)->descriptions,
            'author'           => $this->web->detail_produk($url)->nama_user,
            'disqus'           => $this->disqus->get_html()
        );
        //get id
        $id = $this->web->detail_produk($url)->id_produk;
        //query
        $query = $this->db->query("SELECT id_produk, views FROM tbl_produk WHERE id_produk = '$id'");
        $row   = $query->row();

        //update views articles
        $key['id_produk']  = $id;
        $update['views'] = $this->web->detail_produk($url)->views+1;
        $insert = $this->db->update("tbl_produk",$update,$key);

        //load view
        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/produk/detail');
        $this->load->view('public/part/footer');
    }

}