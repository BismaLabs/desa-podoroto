<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Database extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('apps');
    }

    public function index()
    {
        if ($this->apps->apps_id()) {

            $data = array(
                'title' => 'Backup Database ',
                'database' => TRUE,
                'settings' => TRUE
            );
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/database/data');
            $this->load->view('apps/part/footer');

        } else {
            show_404();
            return FALSE;
        }
    }

    public function backup($type)
    {
        if($this->apps->apps_id())
        {
            $this->load->library('backup');

            $result = $this->backup->backup();

            // Return in string and force client to download the file
            $this->load->helper('download');
            //print_r($result);
            //exit();
            $date = date("Y-m-d H:i:s");
            if($type == 'sql')
            {
                force_download('database_desa-'.$date.'.sql', $result);
            }elseif($type == 'gz')
            {
                force_download('database_desa-'.$date.'.sql.gz', $result);
            }else{
                redirect('apps/database/');
            }
        }else{
            show_404();
            return FALSE;
        }
    }

}