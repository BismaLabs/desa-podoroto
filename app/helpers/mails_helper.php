<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Website Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/website-podoroto/
 */
if(!function_exists('mails'))
{
    function mails($key)
    {
        $CI =& get_instance();

        $query = $CI->db->select($key)->where('id',1)->get('tbl_email_server');

        if($query->num_rows() != 1){

            return NULL;
        }else{
            $result = $query->row();

            return $result->$key;
        }
    }
}