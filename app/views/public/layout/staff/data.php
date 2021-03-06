<div id="main" style="padding-top: 20px">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area fullwidth">
                <div id="content" class="site-content">

                    <div class="row about-team-wrapper">

                        <div class="col-md-12">

                            <?php

                            foreach($kepala_desa->result() as $hasil){

                            ?>
                            <div class="head-office">
                                <div class="onleft">
                                    <figure>
                                        <img src="<?php echo base_url() ?>resources/images/staff/thumb/<?php echo $hasil->foto ?>" width="270px"
                                             height="270px" alt="" style="object-fit: cover;">
                                    </figure>
                                    
                                </div><!-- end onleft -->

                                <div class="onright"
                                     style="background-color: #ffffff;box-shadow: 1px 1px 2px 0 rgba(0,0,0,.1);padding: 10px">
                                    <h3><?php echo $hasil->nama ?></h3>
                                    <span><?php echo $hasil->jabatan ?></span>
                                    <div class="profile-desc">
                                        <table class="table table-striped table-bordered table-hover" style="margin: auto">
                                            <tbody>
                                            <tr>
                                                <td>JABATAN</td>
                                                <td><?php echo $hasil->jabatan ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <td>ALAMAT EMAIL</td>
                                                <td><?php echo $hasil->email ?></td>
                                            </tr> -->
                                            <tr>
                                                <td>ALAMAT RUMAH</td>
                                                <td><?php echo $hasil->alamat ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- end profile desc -->
                                </div><!-- end onright -->

                            </div><!-- end head-office -->

                            <?php } ?>

                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-12">

                            <div class="row team-member">

                                <?php

                                foreach($data_staff->result() as $hasil){

                                ?>

                                <div class="col-md-6" style="padding-bottom: 20px">
                                    <div class="onleft">
                                        <figure>
                                            <img src="<?php echo base_url() ?>resources/images/staff/thumb/<?php echo $hasil->foto ?>" width="150px"
                                                 height="195px" alt="" style="object-fit: cover;">
                                        </figure>
                                        
                                    </div><!-- end onleft -->

                                    <div class="onright"
                                         style="background-color: #ffffff;box-shadow: 1px 1px 2px 0 rgba(0,0,0,.1);;padding: 10px">
                                        <h3><?php echo $hasil->nama ?></h3>
                                        <span><?php echo $hasil->jabatan ?></span>
                                        <div class="profile-desc">
                                            <table class="table table-striped table-bordered table-hover" style="margin: auto">
                                                <tbody>
                                                <tr>
                                                    <td>JABATAN</td>
                                                    <td><?php echo $hasil->jabatan ?></td>
                                                </tr>
                                                <!-- <tr>
                                                    <td>ALAMAT EMAIL</td>
                                                    <td><?php echo $hasil->email ?></td>
                                                </tr> -->
                                                <tr>
                                                    <td>ALAMAT RUMAH</td>
                                                    <td><?php echo $hasil->alamat ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- end profile desc -->
                                    </div><!-- end onright -->
                                </div>

                                <?php } ?>
                            </div>
                        </div><!-- end row about team -->

                    </div><!-- end #content -->

                </div><!-- end #primary -->

            </div><!-- end row -->
        </div><!-- end container -->
    </div>