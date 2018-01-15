<div class="featured-slider">
    <div class="flexslider">
        <ul class="slides">
            <?php

            foreach($data_sliders->result() as $hasil){

            ?>
                <li style="background-image: url('<?php echo base_url() ?>resources/images/sliders/<?php echo $hasil->images ?>')">
                    <div class="flex-caption">
                        <h2 class="animated fadeInRight"><span><?php echo $hasil->caption ?></span></h2>

                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <!-- <div class="blue-box">


        <div class="row-box">
            <div class="title-box">
                <h3><i class="fa fa-fw fa-map-marker"></i> Alamat</h3>
            </div>
            <div class="content-box" id="slideralamat">
                <p><?php echo systems('lokasi') ?></p>
            </div>
        </div>

        <div class="row-box" id="cuaca">
            <div class="title-box">
                <h3><i class="fa fa-fw fa-sun-o"></i> Cuaca Saat Ini</h3>
            </div>
            <div class="content-box">
                <p>Monday &dash; Friday : 08.00 &dash; 21.00</p>
                <p>Saturday : 08.00 &dash; 15.00</p>
                <p>Sunday : Closed</p>
            </div>
        </div>

    </div> -->

</div>