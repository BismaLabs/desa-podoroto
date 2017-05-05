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
    }

    public function index()
    {
        $limit = 12;
        $this->load->helper('security');
        $keyword = $this->security->xss_clean($_GET['q']);
        $data['keyword'] = strip_tags($keyword);
        $check = strlen(preg_replace('/[^a-zA-Z]/', '', $keyword));
        if(!empty($keyword) && $check > 2)
        {
            $offset = (isset($_GET['page'])) ? $this->security->xss_clean($_GET['page']) : 0 ;
            $total  = $this->web->total_search_kategori($keyword);
            //config pagination
            $config['base_url'] = base_url().'search/kategori?q='.$keyword;
            $config['total_rows'] = $total;
            $config['per_page'] = $limit;
            $config['page_query_string'] = TRUE;
            $config['use_page_numbers'] = TRUE;
            $config['display_pages']	= TRUE;
            $config['query_string_segment'] = 'page';
            $config['uri_segment']  = 3;
            //instalasi paging
            $this->pagination->initialize($config);

            $data = array(
                'title'         => 'Search Kategori' .' - ' .systems('site_title'),
                'keywords'         => systems('keywords'),
                'descriptions'     => systems('descriptions'),
                'data_kategori'   => $this->web->search_index_kategori(strip_tags($keyword),$limit,$offset),
                'paging'        => $this->pagination->create_links()
            );
            if($data['data_kategori'] != NULL)
            {
                $data['kategori'] = $data['data_kategori'];
            }else{
                $data['kategori'] = '';
            }
            //load view with data
            $this->load->view('public/part/header', $data);
            $this->load->view('public/layout/kategori/search');
            $this->load->view('public/part/footer');
        }else{
            redirect('kategori/');
        }
    }
}