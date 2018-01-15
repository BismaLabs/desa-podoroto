
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user-circle-o"></i> Edit Profil</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="update-page">
                            <?php
                            $attributes = array('id' => 'frm_login');
                            echo form_open_multipart('apps/profil/save?source=login&utf8=✓', $attributes)
                            ?>
                            <div class="form-group">
                                <label for="artilces">Judul Pages</label>
                                <input type="text" class="form-control" name="judul" value="<?php echo $data_profil['judul_page'] ?>" id="articles" placeholder="Enter Judul Profil">
                                <input type="hidden" name="id_page" value="<?php echo $this->encryption->encode($data_profil['id_page']) ?>">
                            </div>
                            <div class="form-group">
                                <label for="artilces">Isi Pages</label>
                                <textarea class="ckeditor" id="post" name="isi_page" rows="6" placeholder="Enter Isi Pages"><?php echo $data_profil['isi_page'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="artilces">Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" value="<?php echo $data_profil['meta_keywords'] ?>" id="articles" placeholder="Enter Meta Keywords">
                            </div>
                            <div class="form-group">
                                <label for="artilces">Meta Descriptions</label>
                                <textarea class="form-control" name="meta_descriptions" rows="6" placeholder="Enter Meta Descriptions"><?php echo $data_profil['meta_descriptions'] ?></textarea>
                            </div>
                            <div class="submit">
                                <button type="submit" class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-save"></i> Update</button>
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