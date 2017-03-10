<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
?>
 <!-- *** INTRO IMAGE ***
_________________________________________________________ -->
        <div id="intro" class="clearfix">
            <?php 
                foreach($intros as $intro){
                
            ?>
            <div class="item" style="background-image: url('<?php echo $intro->intro_back_img;?>')">
                <div class="container">
                    <div class="row">
                        <div class="carousel-caption">
                            <div data-animate="fadeInDown" class="logo">
                                <img src="<?php echo $intro->intro_logo?>" alt="logo" width="130">
                            </div>
                            <h1 data-animate="fadeInDown"><?php echo $intro->intro_title;?></h1>
                            <h2 data-animate="slideInUp"><?php echo $intro->intro_desc;?></h2>
                        </div>
                    </div>
                </div>
            </div>
                <?php }?>
        </div>

        <!-- *** INTRO IMAGE END *** -->

