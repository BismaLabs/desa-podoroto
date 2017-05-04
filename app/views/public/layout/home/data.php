<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="centered-title">
                <h3><i class="fa fa-book"></i> BERITA TERBARU</h3>
            </div>
            <!-- blogs-title -->
            <?php

            foreach($data_berita->result() as $hasil){
            //check lenght title
            if(strlen($hasil->judul_berita)<40)
            {
                $judul = '<a href="'. base_url().'berita/'.$hasil->slug.'/" style="color:#4c4a45">
                            '.$hasil->judul_berita.'
                          </a>';
            }else{
                $judul = '<a href="'. base_url().'berita/'.$hasil->slug.'/" title="'.$hasil->judul_berita.'" style="color:#4c4a45">
                            '. substr($hasil->judul_berita, 0, 40).'....
                          </a>';
            }

            ?>
                <div class="col-md-3">
                    <img src="<?php echo base_url() ?>resources/images/berita/thumb/<?php echo $hasil->gambar ?>" alt="" style="object-fit: cover; width:100%; height:200px;">
                    <div class="inner" style="padding:10px;background-color: #ffffff;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                        <div class="entry-header">
                            <time class="published"  title="<?php echo $this->apps->tgl_indo_lengkap($hasil->created_at) ?>" style="color: #4c4a45">
                                <?php echo $this->apps->tgl_indo_lengkap($hasil->created_at) ?></time>
                            <h6 class="post-title entry-title">
                                <?php echo $judul ?>
                            </h6>
                        </div><!-- end entry-header -->
                        <div class="entry-content">
                            <p class="wrap-berita" style="color: #333"><?php echo substr($hasil->descriptions, '0', '90') ?>.....</p>
                        </div>
                    </div><!-- end inner -->
                </div><!-- end col -->
            <?php } ?>

        </div><!-- end row -->
        <div class="row" style="text-align: center">
            <a href="<?php echo base_url() ?>berita/" class="btn btn-md btn-default">Lihat Berita Lainnya <i class="fa fa-arrow-right"></i> </a>
        </div>

    </div><!-- end container -->
</div>
<div class="brand-section" style="background-color: #ffffff">
    <div class="container">
        <div class="row">

            <div class="centered-title">
                <h3>Aplikasi Desa</h3>
            </div><!-- blogs-title -->

            <div class="col-md-12 content-center">
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img src="<?php echo base_url() ?>resources/images/app/simdes.png"></a>
                    </div>
                </div><!-- end column -->
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img src="<?php echo base_url() ?>resources/images/app/perpus.png" style="width :167px;"></a>
                    </div>
                </div><!-- end column -->
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img src="<?php echo base_url() ?>resources/images/app/aduan.png"></a>
                    </div>
                </div><!-- end column -->
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img src="<?php echo base_url() ?>resources/images/app/letter.png"></a>
                    </div>
                </div><!-- end column -->
                <div class="col-partner">
                    <div>
                        <a href="#" class="linkcls"><img src="<?php echo base_url() ?>resources/images/app/healty.png" style="width : 167px;"></a>
                    </div>
                </div><!-- end column -->
            </div><!-- end inner -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>