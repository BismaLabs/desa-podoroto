<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Medical Top Team.
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://maulayya.com/portofolio/medical-top-team/
 */
if(!function_exists('profil_header'))
{
    function profil_header()
    {
        $CI = & get_instance();

        $query = $CI->db->select('*')->where('kategori', 'profil')->order_by('id_page' ,'ASC')->get('tbl_pages');

        if($query->num_rows() < 0){

            return NULL;
        }else{
            return $query->result();
        }
    }
}