<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Medical Top Team.
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://maulayya.com/portofolio/medical-top-team/
 */
if(!function_exists('berita_sidebar'))
{
    function berita_sidebar()
    {
        $CI = & get_instance();

        $query = $CI->db->select('*')->order_by('id_berita' ,'DESC')->limit(5,0)->get('tbl_berita');

        if($query->num_rows() < 0){

            return NULL;
        }else{
            return $query->result();
        }
    }
}