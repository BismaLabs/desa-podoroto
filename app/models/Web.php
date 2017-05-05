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

    function get_staff()
    {
        $this->db->order_by('id_staff ASC');
        $this->db->where_not_in('jabatan', 'KEPALA DESA');
        return $this->db->get('tbl_staff');
    }

    function get_kepala_desa()
    {
        $this->db->where('jabatan', 'KEPALA DESA');
        return $this->db->get('tbl_staff');
    }

    function get_sliders()
    {
        $this->db->order_by('id_slider DESC');
        return $this->db->get('tbl_sliders');
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

    //get detail berita
    function detail_berita($url)
    {
        $query = $this->db->query("SELECT a.id_berita, a.user_id, a.judul_berita, a.slug, a.isi_berita, a.gambar, a.views, a.keywords, a.descriptions, a.created_at, b.id_user, b.nama_user FROM tbl_berita as a JOIN tbl_users as b ON a.user_id = b.id_user WHERE a.slug = '$url'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

    //get detail produk
    function detail_produk($url)
    {
        $query = $this->db->query("SELECT a.id_produk, a.user_id, a.judul_produk, a.slug, a.isi_produk, a.gambar, a.views, a.keywords, a.descriptions, a.created_at, b.id_user, b.nama_user FROM tbl_produk as a JOIN tbl_users as b ON a.user_id = b.id_user WHERE a.slug = '$url'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
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

    //total search berita
    function total_search_berita($keyword)
    {
        $query = $this->db->like('judul_berita',$keyword)->get('tbl_berita');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    //index search berita
    public function search_index_berita($keyword,$limit,$offset)
    {
        $query = $this->db->select('*')
            ->from('tbl_berita')
            ->limit($limit,$offset)
            ->like('judul_berita',$keyword)
            ->limit($limit,$offset)
            ->order_by('id_berita','DESC')
            ->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return NULL;
        }
    }

    //total search produk
    function total_search_produk($keyword)
    {
        $query = $this->db->like('judul_produk',$keyword)->get('tbl_produk');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    //index search produk
    public function search_index_produk($keyword,$limit,$offset)
    {
        $query = $this->db->select('*')
            ->from('tbl_produk')
            ->limit($limit,$offset)
            ->like('judul_produk',$keyword)
            ->limit($limit,$offset)
            ->order_by('id_produk','DESC')
            ->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return NULL;
        }
    }

}