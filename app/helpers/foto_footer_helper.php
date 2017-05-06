<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Medical Top Team.
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://maulayya.com/portofolio/medical-top-team/
 */
if(!function_exists('foto_footer'))
{
    function foto_footer()
    {
        $CI = & get_instance();

        $query = $CI->db->select('*')->from('tbl_foto_gallery a')->join('tbl_album b','a.album_id = b.id_album')->order_by('a.id_foto' ,'DESC')->limit(6,0)->get();

        if($query->num_rows() < 0){

            return NULL;
        }else{
            return $query->result();
        }
    }
}