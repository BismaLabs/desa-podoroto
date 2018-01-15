
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-male"></i> Tambah Staff</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="">
                            <?php
                            $attributes = array('id' => 'frm_login');
                            echo form_open_multipart('apps/staff/save?source=header&utf8=✓', $attributes)
                            ?>
                            <div class="form-group">
                                <label>Foto Staff</label>
                                <input type="file" class="form-control" name="userfile" style="margin-bottom: 10px">
                                <input type="hidden" name="type" value="<?php echo $type ?>">
                                <input type="hidden" name="id_staff" value="<?php echo $this->encryption->encode($data_staff['id_staff']) ?>">
                                <span class="label label-danger">
                                   NOTE!
                                </span>
                                <span>
                                    Foto Staff disarankan ukuran 600 X 300 PX
                                 </span>
                            </div>
                            <div class="form-group">
                                <label>Nama Staff</label>
                                <input type="text" class="form-control" value="<?php echo $data_staff['nama'] ?>" name="nama" placeholder="Nama Staff">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" value="<?php echo $data_staff['jabatan'] ?>" name="jabatan" placeholder="Jabatan">
                            </div>
                            <!-- <div class="form-group">
                                <label>No. Telephone</label>
                                <input type="text" class="form-control" value="<?php echo $data_staff['telephone'] ?>" name="telephone" placeholder="No. Telephone">
                            </div>
                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="email" class="form-control" value="<?php echo $data_staff['email'] ?>" name="email" placeholder="Alamat Email">
                            </div> -->
                            <div class="form-group">
                                <label for="artilces">Alamat Rumah</label>
                                <textarea class="form-control" id="post" name="alamat" rows="3" placeholder="Masukkan Alamat Rumah"><?php echo $data_staff['alamat'] ?></textarea>
                            </div>
                            <div class="submit" style="margin-bottom: 7px">
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