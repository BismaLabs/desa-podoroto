<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package  : Website Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/website-podoroto/
 */
class Video extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('apps');
    }

    public function index()
    {
        if ($this->apps->apps_id()) {
            //config pagination
            $config['base_url'] = base_url() . 'apps/video/index/';
            $config['total_rows'] = $this->apps->count_video()->num_rows();
            $config['per_page'] = 10;
            //instalasi paging
            $this->pagination->initialize($config);
            //deklare halaman
            $halaman = $this->uri->segment(4);
            $halaman = $halaman == '' ? 0 : $halaman;
            //create data array
            $data = array(
                'title' => 'Video',
                'video' => TRUE,
                'data_video' => $this->apps->index_video($halaman, $config['per_page']),
                'paging' => $this->pagination->create_links()
            );
            if ($data['data_video'] != NULL) {

                $data['video'] = $data['data_video'];

            } else {

                $data['video'] = NULL;

            }
            //load view with data
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/video/data');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
        }
    }

    public function search()
    {
        if ($this->apps->apps_id()) {
            $limit = 10;
            $this->load->helper('security');
            $keyword = $this->security->xss_clean($_GET['q']);
            $data['keyword'] = strip_tags($keyword);
            $check = strlen(preg_replace('/[^a-zA-Z]/', '', $keyword));
            if (!empty($keyword) && $check > 2) {
                $offset = (isset($_GET['page'])) ? $this->security->xss_clean($_GET['page']) : 0;
                $total = $this->apps->total_search_video($keyword);
                //config pagination
                $config['base_url'] = base_url() . 'apps/video/search?q=' . $keyword;
                $config['total_rows'] = $total;
                $config['per_page'] = $limit;
                $config['page_query_string'] = TRUE;
                $config['use_page_numbers'] = TRUE;
                $config['display_pages'] = TRUE;
                $config['query_string_segment'] = 'page';
                $config['uri_segment'] = 4;
                //instalasi paging
                $this->pagination->initialize($config);

                $data = array(
                    'title' => 'Galeri Video',
                    'video' => TRUE,
                    'data_video' => $this->apps->search_index_video(strip_tags($keyword), $limit, $offset),
                    'paging' => $this->pagination->create_links()
                );
                if ($data['data_video'] != NULL) {

                    $data['video'] = $data['data_video'];
                } else {
                    $data['video'] = '';
                }
                //load view with data
                $this->load->view('apps/part/header', $data);
                $this->load->view('apps/part/sidebar');
                $this->load->view('apps/layout/video/data');
                $this->load->view('apps/part/footer');
            } else {
                redirect('apps/video');
            }
        } else {
            show_404();
            return FALSE;
        }
    }

    public function add()
    {
        if ($this->apps->apps_id()) {
            //create data array
            $data = array(
                'title' => 'Tambah Video',
                'video' => TRUE,
                'type' => 'add',
            );
            //load view with data
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/video/add');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
        }

    }

    public function edit($id_video)
    {
        if ($this->apps->apps_id()) {
            //get id
            $id_video = $this->encryption->decode($this->uri->segment(4));
            //create data array
            $data = array(
                'title' => 'Edit Video',
                'video' => TRUE,
                'type' => 'edit',
                'data_video' => $this->apps->edit_video($id_video)->row_array(),
            );
            //load view with data
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/video/edit');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
        }
    }


    public function save()
    {
        if($this->apps->apps_id())
        {

            $type = $this->input->post("type");

            $id['id_video'] = $this->encryption->decode($this->input->post("id_video"));


            if($type == "add")
            {

                $insert = array(
                    'judul_video'   => $this->input->post("judul_video"),
                    'embed_youtube' => $this->input->post("embed_youtube"),
                    'created_at'    => date("Y-m-d H:i:s"),
                    'updated_at'    => date("Y-m-d H:i:s")
                );

                $this->db->insert("tbl_video", $insert);
                //deklarasi session flashdata
                $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                //redirect halaman
                redirect('apps/video?source=edit&utf8=✓');

            }elseif ($type == "edit"){

                $update = array(
                    'judul_video'   => $this->input->post("judul_video"),
                    'embed_youtube' => $this->input->post("embed_youtube"),
                    'updated_at'    => date("Y-m-d H:i:s")
                );

                $this->db->update("tbl_video", $update, $id);
                //deklarasi session flashdata
                $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                //redirect halaman
                redirect('apps/video?source=edit&utf8=✓');

            }else{


            }


        }else{
            show_404();
            return FALSE;
        }
    }


}