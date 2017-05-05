<div id="main" style="padding-top: 20px">
    <div class="container">
        <div class="row">
            <div id="primary" class="widget content-area" style="margin-bottom:20px;background-color: white;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                <div id="content" class="site-content">

                    <div class="service-page">
                        <h1 class="entry-title">
                            <a href="#"><?php  echo $data_page->judul_page ?></a>
                        </h1>
                        <div class="entry-content">
                            <p>
                                <?php echo $data_page->isi_page ?>
                            </p>
                        </div><!-- end entry-content -->

                    </div><!-- end service page -->

                </div><!-- end #content -->

            </div>

            <div id="secondary" class="col-md-4">
                <div id="search-2" class="widget widget_search">
                    <div class="widget-title-outer">
                        <h3 class="widget-title">Cari Berita</h3>
                    </div>
                    <div class="searchform">
                        <form method="GET" action="<?php echo base_url('search/berita/');?>">
                            <input type="text" class="txt" name="q" placeholder="Type Keywords" minlength="3" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="submit" value="search" class="btn btn-sm">
                        </form>
                    </div><!-- end searchform -->
                </div><!-- end search widget -->
                <div class="widget post-type-widget">
                    <div class="widget-title-outer">
                        <h3 class="widget-title">Berita Terbaru</h3>
                    </div>
                    <ul>
                        <?php if (berita_sidebar_terbaru() != NULL) {
                            foreach(berita_sidebar_terbaru() as $hasil) {
                                ?>
                                <li>

                            <span class="post-category">
                               <i class="fa fa calendar"></i> <?php echo $this->apps->tgl_indo_no_hari($hasil->created_at) ?>
                            </span>
                                    <figure class="post-thumbnail">
                                        <a href="<?php echo base_url() ?>berita/<?php echo $hasil->slug ?>/"><img src="<?php echo base_url() ?>resources/images/berita/thumb/<?php echo $hasil->gambar ?>" alt="" width="110px" height="80px" style="object-fit: cover;"></a>
                                    </figure>
                                    <h2 class="post-title">
                                        <a href="<?php echo base_url() ?>berita/<?php echo $hasil->slug ?>/" style="text-decoration: none">
                                            <?php echo $hasil->judul_berita ?></a>
                                    </h2>

                                </li>
                            <?php }} ?>

                    </ul>
                </div><!-- end widget -->

                <div class="widget widget_categories">
                    <div class="widget-title-outer">
                        <h3 class="widget-title">Kategori Berita</h3>
                    </div>
                    <ul>

                        <?php if (kategori_sidebar() != NULL) {
                            foreach(kategori_sidebar() as $hasil) {
                                ?>

                                <li>
                                    <a class="pull-left" href="<?php echo base_url() ?>kategori/<?php echo $hasil->slug ?>/" style="text-decoration: none"><i class="fa fa-folder"></i> <?php echo $hasil->nama_kategori ?></a>
                                    <span class="pull-right"></span>
                                </li>

                            <?php }} ?>

                    </ul>
                </div>

                <div class="widget widget_categories">
                    <div class="widget-title-outer">
                        <h3 class="widget-title">Tag Berita</h3>
                    </div>

                    <?php if (kategori_sidebar() != NULL) {
                        foreach(kategori_sidebar() as $hasil) {
                            ?>
                            <a href="<?php echo base_url() ?>kategori/<?php echo $hasil->slug ?>/" class="btn btn-sm btn-default" style="border-radius: 25px;font-weight: 300;text-transform: none;margin-bottom: 5px"><i class="fa fa-tags"></i> <?php echo $hasil->nama_kategori ?></a>
                        <?php }} ?>

                </div><!-- end widget -->
            </div><!-- end #secondary -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>

