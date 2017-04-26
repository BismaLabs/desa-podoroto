
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title ?>
            <small>Web Applications</small>
        </h1>
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-shopping-cart"></i> Edit Produk</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="add-user">
                            <?php
                            $attributes = array('id' => 'frm_login');
                            echo form_open_multipart('apps/produk/save?source=header&utf8=✓', $attributes)
                            ?>
                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="file" class="form-control" name="userfile" style="margin-bottom: 10px">
                                <input type="hidden" name="type" value="<?php echo $type ?>">
                                <input type="hidden" name="id_produk" value="<?php echo $this->encryption->encode($data_produk['id_produk']) ?>">
                                <span class="label label-danger">
                                   NOTE!
                                </span>
                                <span>
                                    Gambar Produk disarankan ukuran 600 X 300 PX
                                 </span>
                            </div>
                            <div class="form-group">
                                <label>Judul Produk</label>
                                <input type="text" class="form-control" value="<?php echo $data_produk['judul_produk'] ?>" name="judul_produk" placeholder="Judul Produk">
                            </div>
                            <div class="form-group">
                                <label for="artilces">Isi Produk</label>
                                <textarea class="ckeditor" id="post" name="isi_produk" rows="6" placeholder="Masukkan Isi Produk"><?php echo $data_produk['isi_produk'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" class="form-control" value="<?php echo $data_produk['judul_produk'] ?>" name="keywords" placeholder="Masukkan Kata Kunci Produk">
                            </div>
                            <div class="form-group">
                                <label for="artilces">Descriptions</label>
                                <textarea class="form-control" id="post" name="descriptions" rows="3" placeholder="Masukkan Deskripsi Singkat Produk"><?php echo $data_produk['descriptions'] ?></textarea>
                            </div>
                            <div class="submit" style="margin-bottom: 7px">
                                <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" class="btn bg-orange btn-flat btn-fill"><i class="fa fa-repeat"></i> Reset</button>
                            </div>
                            <?php echo form_close(); ?>
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