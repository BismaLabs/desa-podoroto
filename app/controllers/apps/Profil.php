<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Profil extends CI_Controller{

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
            $config['base_url'] = base_url().'apps/profil/index/';
            $config['total_rows'] = $this->apps->count_profil()->num_rows();
            $config['per_page'] = 10;
            //instalasi paging
            $this->pagination->initialize($config);
            //deklare halaman
            $halaman            =  $this->uri->segment(4);
            $halaman            =  $halaman == '' ? 0 : $halaman;
            //create data array
            $data = array(
                'title'           => 'Profil Desa',
                'profil'           => TRUE,
                'data_profil'   => $this->apps->index_profil($halaman,$config['per_page']),
                'paging'          => $this->pagination->create_links()
            );
            if($data['data_profil'] != NULL)
            {
                $data['profil'] = $data['data_profil'];
            }else{
                $data['profil'] = NULL;
            }
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/profil/data');
            $this->load->view('apps/part/footer');

        } else {
            show_404();
            return FALSE;
        }
    }

    public function search()
    {
        if($this->apps->apps_id())
        {
            $limit = 10;
            $this->load->helper('security');
            $keyword = $this->security->xss_clean($_GET['q']);
            $data['keyword'] = strip_tags($keyword);
            $check = strlen(preg_replace('/[^a-zA-Z]/', '', $keyword));
            if(!empty($keyword) && $check > 2)
            {
                $offset = (isset($_GET['page'])) ? $this->security->xss_clean($_GET['page']) : 0 ;
                $total  = $this->apps->total_search_profil($keyword);
                //config pagination
                $config['base_url'] = base_url().'apps/profil/search?q='.$keyword;
                $config['total_rows'] = $total;
                $config['per_page'] = $limit;
                $config['page_query_string'] = TRUE;
                $config['use_page_numbers'] = TRUE;
                $config['display_profil']   = TRUE;
                $config['query_string_segment'] = 'page';
                $config['uri_segment']  = 4;
                //instalasi paging
                $this->pagination->initialize($config);

                $data = array(
                    'title'         => 'Profil Desa',
                    'profil'         => TRUE,
                    'data_profil'    => $this->apps->search_index_profil(strip_tags($keyword),$limit,$offset),
                    'paging'        => $this->pagination->create_links()
                );
                if($data['data_profil'] != NULL)
                {
                    $data['profil'] = $data['data_profil'];
                }else{
                    $data['profil'] = '';
                }
                //load view with data
                $this->load->view('apps/part/header', $data);
                $this->load->view('apps/part/sidebar');
                $this->load->view('apps/layout/profil/data');
                $this->load->view('apps/part/footer');
            }else{
                redirect('apps/profil/');
            }
        }else{
            show_404();
            return FALSE;
        }
    }

    public function add()
    {
        if($this->apps->apps_id())
        {
            //create data array
            $data = array(
                'title'         => 'Tambah Profil',
                'profil'         => TRUE,
            );
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/profil/add');
            $this->load->view('apps/part/footer');
        }else{
            show_404();
            return FALSE;
        }
    }

    public function edit($id_page)
    {
        if($this->apps->apps_id())
        {
            //get id
            $id_page = $this->encryption->decode($this->uri->segment(4));
            //create data array
            $data = array(
                'title'         => 'Edit profil',
                'profil'         => TRUE,
                'data_profil'    => $this->apps->edit_profil($id_page)->row_array()
            );
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/profil/edit');
            $this->load->view('apps/part/footer');
        }else{
            show_404();
            return FALSE;
        }
    }

    public  function save()
    {
        if($this->apps->apps_id())
        {
            $id['id_page'] = $this->encryption->decode($this->input->post("id_page"));
            $update = array(
                'judul_page'    => $this->input->post("judul"),
                'slug'          => url_title(strtolower($this->input->post("judul"))),
                'kategori'      => 'profil',
                'isi_page'      => $this->input->post("isi_page"),
                'user_id'       => $this->session->userdata("apps_id"),
                'meta_keywords' => $this->input->post("meta_keywords"),
                'meta_descriptions' => $this->input->post("meta_descriptions"),
                'updated_at'    => date("Y-m-d H:i:s")
            );
            $this->db->update("tbl_pages", $update, $id);
            //deklarasi session flashdata
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
                                                                <i class="fa fa-check"></i> Data Berhasil Diupdate.
                                                            </div>');
            //redirect halaman
            redirect('apps/profil?source=edit&utf8=✓');
        }else{
            show_404();
            return FALSE;
        }
    }
    
    public  function simpan()
    {
        if($this->apps->apps_id())
        {
            
            $insert = array(
                'judul_page'    => $this->input->post("judul"),
                'slug'          => url_title(strtolower($this->input->post("judul"))),
                'kategori'      => 'profil',
                'isi_page'      => $this->input->post("isi_page"),
                'user_id'       => $this->session->userdata("apps_id"),
                'meta_keywords' => $this->input->post("meta_keywords"),
                'meta_descriptions' => $this->input->post("meta_descriptions"),
                'updated_at'    => date("Y-m-d H:i:s")
            );
            $this->db->insert("tbl_pages", $insert);
            //deklarasi session flashdata
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
                                                                <i class="fa fa-check"></i> Data Berhasil Disimpan.
                                                            </div>');
            //redirect halaman
            redirect('apps/profil?source=edit&utf8=✓');
        }else{
            show_404();
            return FALSE;
        }
    }

    public function delete()
    {
        if ($this->apps->apps_id()) {
            $id = $this->encryption->decode($this->uri->segment(4));
            
            $key['id_page'] = $id;
            $this->db->delete("tbl_pages", $key);
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
                                                                <i class="fa fa-check"></i> Data Berhasil Dihapus.
                                                            </div>');
            //redirect halaman
            redirect('apps/profil?source=delete&utf8=✓');
        } else {
            show_404();
            return FALSE;
        }
    }

}