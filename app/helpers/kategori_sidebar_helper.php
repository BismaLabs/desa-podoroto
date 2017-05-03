<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Medical Top Team.
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://maulayya.com/portofolio/medical-top-team/
 */
if(!function_exists('kategori_sidebar'))
{
    function kategori_sidebar()
    {
        $CI = & get_instance();

        $query = $CI->db->select('*')->order_by('nama_kategori' ,'ASC')->limit(5,0)->get('tbl_kategori');

        if($query->num_rows() < 0){

            return NULL;
        }else{
            return $query->result();
        }
    }
}