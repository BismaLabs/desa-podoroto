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

    //get produk
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

    //get kategori
    function get_kategori($page){
        //offset
        $offset = 12 * $page;
        //limit
        $limit  = 12;
        //query
        $query  = "SELECT * FROM tbl_kategori ORDER BY id_kategori DESC limit $offset ,$limit";
        //get result
        $result = $this->db->query($query)->result();
        //callback return
        return $result;
    }

    //get album
    function get_album($page){
        //offset
        $offset = 12 * $page;
        //limit
        $limit  = 12;
        //query
        $query  = "SELECT * FROM tbl_album ORDER BY id_album DESC limit $offset ,$limit";
        //get result
        $result = $this->db->query($query)->result();
        //callback return
        return $result;
    }

    //get album
    function get_video($page){
        //offset
        $offset = 12 * $page;
        //limit
        $limit  = 12;
        //query
        $query  = "SELECT * FROM tbl_video ORDER BY id_video DESC limit $offset ,$limit";
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

    //total search kategori
    function total_search_kategori($keyword)
    {
        $query = $this->db->like('nama_kategori',$keyword)->get('tbl_kategori');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    //index search kategori
    public function search_index_kategori($keyword,$limit,$offset)
    {
        $query = $this->db->select('*')
            ->from('tbl_kategori')
            ->limit($limit,$offset)
            ->like('nama_kategori',$keyword)
            ->limit($limit,$offset)
            ->order_by('id_kategori','DESC')
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

    function count_kategori($slug)
    {
        $query = $this->db->select('a.id_berita, a.judul_berita, a.kategori_id, a.gambar, a.descriptions, a.created_at, b.id_kategori, b.slug, b.nama_kategori')
            ->from('tbl_berita a')
            ->join('tbl_kategori b','a.kategori_id = b.id_kategori')
            ->where('b.slug',$slug)
            ->order_by('a.id_berita','DESC')
            ->get();

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    function index_kategori($halaman,$batas,$slug)
    {
        $query = "SELECT a.id_berita, a.judul_berita, a.kategori_id, a.slug, a.gambar, a.descriptions, a.created_at, b.id_kategori, b.slug, b.nama_kategori FROM tbl_berita as a JOIN tbl_kategori as b ON a.kategori_id = b.id_kategori WHERE b.slug = '$slug' limit $halaman, $batas";
        return $this->db->query($query);
    }

    function get_kategori_judul($slug)
    {
        $query = $this->db->query("SELECT * FROM tbl_kategori WHERE slug = '$slug'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }


    //total search galeri/album
    function total_search_galeri($keyword)
    {
        $query = $this->db->like('nama_album',$keyword)->get('tbl_album');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    //index search kategori
    public function search_index_galeri($keyword,$limit,$offset)
    {
        $query = $this->db->select('*')
            ->from('tbl_album')
            ->limit($limit,$offset)
            ->like('nama_album',$keyword)
            ->limit($limit,$offset)
            ->order_by('id_album','DESC')
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

    public function detail_album($slug)
    {
        $query = $this->db->query("SELECT a.id_foto, a.album_id, a.caption_foto, a.foto_gallery, b.id_album, b.nama_album FROM tbl_foto_gallery a LEFT JOIN tbl_album b ON a.album_id = b.id_album WHERE b.slug = '$slug'");
        return $query;
    }

    public function detail_album_array($slug)
    {
        $query = $this->db->query("SELECT a.id_foto, a.album_id, a.caption_foto, a.foto_gallery, b.id_album, b.nama_album FROM tbl_foto_gallery a LEFT JOIN tbl_album b ON a.album_id = b.id_album WHERE b.slug = '$slug'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

       //total search galeri/album
    function total_search_video($keyword)
    {
        $query = $this->db->like('judul_video',$keyword)->get('tbl_video');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    //index search kategori
    public function search_index_video($keyword,$limit,$offset)
    {
        $query = $this->db->select('*')
            ->from('tbl_video')
            ->limit($limit,$offset)
            ->like('judul_video',$keyword)
            ->limit($limit,$offset)
            ->order_by('id_video','DESC')
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
    
    public function counter_visitor()
    {
        setcookie("pengunjung", "sudah berkunjung", time()+60*60*24);
        if (!isset($_COOKIE["pengunjung"])) {
            $d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $d_in['date_visit'] = date("Y-m-d H:i:s");
            $this->db->insert("tbl_counter",$d_in);
        }
    }
    
    function sitemap_berita()
    {
        $query  =   $this->db->order_by("id_berita","DESC")->get("tbl_berita");
        return $query->result_array();
    }

    function sitemap_produk()
    {
        $query  =   $this->db->order_by("id_produk","DESC")->get("tbl_produk");
        return $query->result_array();
    }



}