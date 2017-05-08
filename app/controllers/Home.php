<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Home extends CI_Controller
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
            'title'         => systems('site_title'),
            'keywords'         => systems('keywords'),
            'descriptions'     => systems('descriptions'),
            'data_berita'   => $this->web->get_berita_terbaru(),
            'data_produk'   => $this->web->get_produk_terbaru(),
            'data_sliders'  => $this->web->get_sliders()
        );

        $this->load->view('public/part/header', $data);
        $this->load->view('public/part/slider');
        $this->load->view('public/layout/home/data');
        $this->load->view('public/part/footer');
    }

    function get_berita()
    {
        //declare page
        $page   =  $_GET['page'];
        //var articles define
        $berita = $this->web->get_berita($page);
        //loop
        foreach($berita as $hasil){

            //check lenght title
            if(strlen($hasil->judul_berita)<40)
            {
                $judul = '<a href="'. base_url().'berita/'.$hasil->slug.'/" style="color:#4c4a45">
                            '.$hasil->judul_berita.'
                          </a>';
            }else{
                $judul = '<a href="'. base_url().'berita/'.$hasil->slug.'/" title="'.$hasil->judul_berita.'" style="color:#4c4a45">
                            '. substr($hasil->judul_berita, 0, 40).'....
                          </a>';
            }

            echo '<div class="col-md-3">
                    <img src="'.base_url().'resources/images/berita/thumb/'.$hasil->gambar.'" alt="" style="object-fit: cover; width:100%; height:200px;">
                    <div class="inner" style="padding:10px;background-color: #ffffff;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                        <div class="entry-header">
                            <time class="published"  title="'.$this->apps->tgl_indo_lengkap($hasil->created_at).'" style="color: #4c4a45">
                                '. $this->apps->tgl_indo_lengkap($hasil->created_at).'</time>
                            <h6 class="post-title entry-title wrap-berita">
                                '. $judul .'
                            </h6>
                        </div><!-- end entry-header -->
                        <div class="entry-content">
                            <p class="wrap-berita" style="color: #333">'.substr($hasil->descriptions, "0","90") .'.....</p>
                        </div>
                    </div><!-- end inner -->
                </div>';
        }
        exit;
    }


    function get_produk()
    {
        //declare page
        $page   =  $_GET['page'];
        //var articles define
        $produk = $this->web->get_produk($page);
        //loop
        foreach($produk as $hasil){

            //check lenght title
            if(strlen($hasil->judul_produk)<40)
            {
                $judul = '<a href="'. base_url().'produk/'.$hasil->slug.'/" style="color:#4c4a45">
                            '.$hasil->judul_produk.'
                          </a>';
            }else{
                $judul = '<a href="'. base_url().'produk/'.$hasil->slug.'/" title="'.$hasil->judul_produk.'" style="color:#4c4a45">
                            '. substr($hasil->judul_produk, 0, 40).'....
                          </a>';
            }

            echo '<div class="col-md-3">
                    <img src="'.base_url().'resources/images/produk/thumb/'.$hasil->gambar.'" alt="" style="object-fit: cover; width:100%; height:200px;">
                    <div class="inner" style="padding:10px;background-color: #ffffff;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                        <div class="entry-header">
                            <time class="published"  title="'.$this->apps->tgl_indo_lengkap($hasil->created_at).'" style="color: #4c4a45">
                                '. $this->apps->tgl_indo_lengkap($hasil->created_at).'</time>
                            <h6 class="post-title entry-title wrap-berita">
                                '. $judul .'
                            </h6>
                        </div><!-- end entry-header -->
                        <div class="entry-content">
                            <p class="wrap-berita" style="color: #333">'.substr($hasil->descriptions, "0","90") .'.....</p>
                        </div>
                    </div><!-- end inner -->
                </div>';
        }
        exit;
    }

    function get_album()
    {
        //declare page
        $page   =  $_GET['page'];
        //var articles define
        $album = $this->web->get_album($page);
        //loop
        foreach($album as $hasil){

            echo '<div class="col-md-3">
                    <img src="'.base_url().'resources/foto_gallery/album.png" alt="" style="object-fit: cover; width:100%; height:200px;">
                    <div class="inner" style="padding:10px;background-color: #ffffff;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                        <div class="entry-header">
                            <h6 class="post-title entry-title wrap-berita">
                               <a href="'.base_url().'galeri/foto/'.$this->encryption->encode($hasil->id_album).'" style="color:#4c4a45"> '. $hasil->nama_album .'</a>
                            </h6>
                        </div><!-- end entry-header -->
                       
                    </div><!-- end inner -->
                </div>';
        }
        exit;
    }

    function get_kategori()
    {
        //declare page
        $page   =  $_GET['page'];
        //var articles define
        $kategori = $this->web->get_kategori($page);
        //loop
        foreach($kategori as $hasil){

            echo '<div class="col-md-3">
                    <div class="inner hover-app" style="text-align: center; background-color: white;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                        <div class="entry-header">
                            <h6 class="" style="">
                                <a href="'.base_url().'kategori/'.$hasil->slug.'/" style="color:#00695C;font-size: 25px;font-weight: 700;text-decoration:none">
                                '.$hasil->nama_kategori.'
                                </a>
                            </h6>
                        </div><!-- end entry-header -->
                    </div><!-- end inner -->
                </div>';
        }
        exit;
    }

}