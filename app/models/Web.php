<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Website Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/website-podoroto/
 */
class Web extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_berita_terbaru()
    {
        $this->db->order_by('id_berita DESC');
        $this->db->limit(8, 0);
        return $this->db->get('tbl_berita');
    }

    function get_produk_terbaru()
    {
        $this->db->order_by('id_produk DESC');
        $this->db->limit(8, 0);
        return $this->db->get('tbl_produk');
    }

    //get berita
    function get_berita($page){
        //offset
        $offset = 12 * $page;
        //limit
        $limit  = 12;
        //query
        $query  = "SELECT * FROM tbl_berita ORDER BY id_berita DESC limit $offset ,$limit";
        //get result
        $result = $this->db->query($query)->result();
        //callback return
        return $result;
    }

    //get berita
    function get_produk($page){
        //offset
        $offset = 12 * $page;
        //limit
        $limit  = 12;
        //query
        $query  = "SELECT * FROM tbl_produk ORDER BY id_produk DESC limit $offset ,$limit";
        //get result
        $result = $this->db->query($query)->result();
        //callback return
        return $result;
    }


    function detail_pages($url)
    {
        $query = $this->db->query("SELECT * FROM tbl_pages WHERE slug = '$url'");
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

}