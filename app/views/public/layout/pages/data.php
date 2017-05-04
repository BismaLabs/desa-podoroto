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
                        <h3 class="widget-title">Cari Buku</h3>
                    </div>
                    <div class="searchform">
                        <form>
                            <input type="text" class="txt" name="s" placeholder="Type Keywords">
                            <input type="submit" value="search" class="btn btn-sm">
                        </form>
                    </div><!-- end searchform -->
                </div><!-- end search widget -->
                <div class="widget widget_categories">
                    <div class="widget-title-outer">
                        <h3 class="widget-title">Kategori Buku</h3>
                    </div>
                    <ul>

                    </ul>
                </div><!-- end widget -->
            </div><!-- end #secondary -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>

