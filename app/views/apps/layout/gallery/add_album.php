
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-picture-o"></i> Add Album Gallery</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="add-album">
                        <?php
                        $attributes = array('id' => 'frm_login');
                        echo form_open_multipart('apps/gallery/save?source=login&utf8=✓', $attributes)
                        ?>
                        <div class="form-group">
                            <label for="artilces">Nama Album</label>
                            <input type="text" class="form-control" name="nama_album" id="articles" placeholder="Enter Nama Album gallery">
                            <input type="hidden" name="type" value="<?php echo $type ?>">
                        </div>
                        <div class="submit">
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