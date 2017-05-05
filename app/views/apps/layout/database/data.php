
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
                <?php echo $this->session->flashdata('notif') ?>
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-database"></i> Backup Database</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="<?php echo base_url() ?>apps/database/backup/sql/"  class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-database"></i> Export to SQL File</a>
                        <br>
                        <hr>
                        <a href="<?php echo base_url() ?>apps/database/backup/gz/"  class="btn  bg-olive btn-flat btn-save btn-fill"><i class="fa fa-database"></i> Export to SQL File and Compress</a>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->