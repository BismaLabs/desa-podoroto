<div class="blog-section" style="padding-top: 20px">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px">
                <label style="font-size: 25px;text-transform: uppercase"><i class="fa fa-picture-o"></i> ALBUM : <?php echo $nama_album ?></label>
                <?php echo $this->session->flashdata('notif') ?>
            </div>
            <?php
                if ($data_foto != NULL):
                foreach ($data_foto->result() as $hasil):
            ?>
                    <div class="col-md-3">
                        <div class="card-photo">
                            <a class="card-img" href="<?php echo base_url() ?>resources/foto_gallery/<?php echo url_title(strtolower($hasil->nama_album)) ?>/<?php echo $hasil->foto_gallery ?>" data-lightbox="image-1" data-title="<?php echo $hasil->caption_foto ?>" style="text-decoration: none">
                            <img src="<?php echo base_url() ?>resources/foto_gallery/<?php echo strtolower(url_title($hasil->nama_album)) ?>/<?php echo $hasil->foto_gallery ?>" alt="" style="object-fit: cover; width:100%; height:200px;">
                            <div class="inner" style="padding:10px;background-color: #ffffff;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                                <div class="entry-header">
                                    <h6 class="post-title entry-title wrap-berita" style="font-size: 15px;color: #333;text-transform: none;text-decoration: none">
                                        <?php echo $hasil->caption_foto ?>
                                    </h6>
                                </div><!-- end entry-header -->

                            </div>
                            </a>
                        </div><!-- end inner -->
                    </div>
            <?php
                endforeach;
            ?>
            <?php endif; ?>
        </div><!-- end row -->
    </div><!-- end container -->
</div>