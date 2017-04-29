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
        //$this->db->limit('0', '12');
        return $this->db->get('tbl_berita');
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