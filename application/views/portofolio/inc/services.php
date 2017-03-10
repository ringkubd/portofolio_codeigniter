<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
?>
<!-- *** SERVICES ***
_________________________________________________________ -->
<div class="section text-gradient" id="services">
    <div class="container">
        <div class="col-md-12">
            <h2 class="title" data-animate="fadeInDown">Services</h2>

            <div class="row services">
                <?php if(isset($services)){
                foreach ($services as $service){
                    ?>

                <div class="col-md-4" data-animate="fadeInUp">
                    <div class="icon"><?php echo $service->service_icon;?></div>
                    <h3 class="heading"><?php echo $service->service_title;?></h3>
                    <p><?php echo $service->service_details;?></p>
                </div>
                <?php }}?>

            </div>

            <hr>

            <div class="text-center">

                <p class="lead">Would you like to know more or just discuss something?</p>

                <p><a href="#contact" class="btn btn-default btn-lg scrollTo">Contact me</a>
                </p>

            </div>

        </div>
        <!-- /.12 -->
    </div>
    <!-- /.container -->
</div>
<!-- /.section -->

<!-- *** SERVICES END *** -->
