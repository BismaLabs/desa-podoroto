
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <?php echo $this->session->flashdata('notif') ?>
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-book"></i> Berita </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="GET" action="<?php echo base_url('apps/berita/search');?>" style="margin-top: 10px">
                            <div class = "input-group">
                           <span class = "input-group-btn">
                              <a href="<?php echo base_url('apps/berita/add?source=add&utf8=✓') ?>" class = "btn btn-default btn-md" type = "button">
                                <i class="fa fa-plus-circle"></i> Tambah
                              </a>
                           </span>
                                <input type = "text" name = "q" class = "form-control input-md" placeholder="Masukkan Judul Berita dan Enter" autocomplete="off" id="articles">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <span class = "input-group-btn">
                              <button class = "btn btn-default btn-md" type = "submit">
                                 <i class="fa fa-search"></i> Search
                              </button>
                           </span>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" style="margin-top:20px;">
                                <tbody>
                                <thead>
                                <tr>
                                    <th class="text-center" style="color: #000;">No.</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-book"></i> JUDUL BERITA</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-folder"></i> KATEGORI</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-user-circle"></i> PENULIS</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-calendar-o"></i> UPDATED AT</th>
                                    <th class="text-center" style="color: #000;"><i class="fa fa-cogs"></i> OPTIONS</th>
                                </tr>
                                </thead>
                                <?php
                                if($berita != NULL):
                                $no = $this->uri->segment(4) + 1;
                                foreach($berita->result() as $hasil):

                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td><?php echo $hasil->judul_berita ?></td>
                                        <td><?php echo $hasil->nama_kategori ?></td>
                                        <td><?php echo $hasil->nama_user ?></td>
                                        <td> <?php echo $this->apps->tgl_jam_indo_no_hari($hasil->updated_at) ?></td>
                                        <td class="text-center">
                                            <a class="badge badge-success" style="background-color: #358420;" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url() ?>apps/berita/edit/<?php echo $this->encryption->encode($hasil->id_berita) ?>"><i class="fa fa-pencil"></i> Edit</a>
                                            <a a onclick="return confirm('Apakah Anda yakin ingin menghapus ini?');" class="badge badge-danger" style="background-color: #842020;" data-toggle="tooltip" data-placement="top" title="Delete ?" href="<?php echo base_url() ?>apps/berita/delete/<?php echo $this->encryption->encode($hasil->id_berita) ?>"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                            <?php echo $paging ?>
                            <?php else : ?>
                                </tbody>
                                </table>
                                <div class="alert alert-danger">
                                    <h4><i class="fa fa-info-circle"></i> Warning!</h4>
                                    Maaf!....data tidak ada didatabase sistem
                                </div>
                                <div class="reload" style="text-align: center;margin-bottom: 7px">
                                    <a  href="<?php echo base_url('apps/berita?source=reload&utf8=✓') ?>" class="btn btn-danger btn-reset btn-fill" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Reloading..."><i class="fa fa-repeat"></i> Reload Page</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->