<div class="blog-section" style="padding-top: 20px">
    <div class="container">
        <div class="row">
            <!-- blogs-title -->
            <div class="col-md-12" style="margin-bottom: 20px">
                <?php echo $this->session->flashdata('notif') ?>
                <div class="search-events" style="text-align: center">
                    <form method="GET" action="<?php echo base_url('search/video/');?>" style="margin-top: 10px">
                        <div class = "input-group">
                            <input type = "text" name = "q" class = "form-control input-lg" placeholder="Masukkan Nama Galeri Video dan Enter" autocomplete="off" id="articles" minlength="3" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <span class = "input-group-btn">
                                  <button class = "btn btn-default btn-lg" type = "submit">
                                     <i class="fa fa-search"></i> Search
                                  </button>
                               </span>
                        </div>
                    </form>
                </div>
            </div>
            <div id="video">

            </div>

        </div><!-- end row -->
        <div class="row" style="text-align: center">
            <button class="btn btn-md btn-default" id="load_more_video" data-val = "0">Lihat Galeri Video Lainnya <img style="display: none" id="loader" src="<?php echo base_url('resources/images/loader.svg') ?>" style="width: 5px;height: 5px"> </button>
        </div>
    </div><!-- end container -->
</div>