<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Kategori extends CI_Controller
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
            'title' => 'Kategori Berita' . ' - ' . systems('site_title'),
            'keywords' => systems('keywords'),
            'descriptions' => systems('descriptions'),
        );

        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/kategori/data');
        $this->load->view('public/part/footer');
    }

    public function detail($url)
    {
        $slug = $this->uri->segment(2);
        //config pagination
        $config['base_url'] = base_url().'kategori/'.$slug.'/index/';
        $config['total_rows'] = $this->web->count_kategori($slug);
        $config['per_page'] = 12;
        //instalasi paging
        $this->pagination->initialize($config);
        //deklare halaman
        $halaman            =  $this->uri->segment(4);
        $halaman            =  $halaman==''? 0 : $halaman;

        $data = array(
            'title'        => $this->web->get_kategori_judul($slug)->nama_kategori. ' - ' . systems('site_title'),
            'keywords'     => systems('keywords'),
            'descriptions' => systems('descriptions'),
            'author'       => systems('site_title'),
            'nama_kategori'=> $this->web->get_kategori_judul($slug)->nama_kategori,
            'data_kategori'=> $this->web->index_kategori($halaman,$config['per_page'],$slug),
            'paging'       => $this->pagination->create_links()
        );

        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/kategori/detail');
        $this->load->view('public/part/footer');
    }
}