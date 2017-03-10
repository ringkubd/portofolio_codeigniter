<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
?>

<!-- *** ABOUT ***
_________________________________________________________ -->
<div class="section" id="about">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h2 class="title" data-animate="fadeInDown">About me</h2>
            </div>
            <div class="col-sm-12">

                <div class="row">
                    <?php foreach ($about_me as $about){?>
                    <div class="col-sm-6 text-left" data-animate="fadeInUp">

                        <?php 
                        if($about->published == 1){
                            echo $about->about_me;
                        } else {
                            echo 'Please Published One About Me Articale';
                        }
                        ?>

                    </div>
                    <?php }?>

                    <div class="col-sm-6" data-animate="fadeInUp">
                        
                        <?php foreach ($skills as $skill){
                            
                        ?>

                        <div class="skill-item">
                            <div class="progress-title">
                                <?php echo(ucwords($skill->skill_name));?>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-skill1" role="progressbar" aria-valuenow="<?php echo $skill->skill_parcentege?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $skill->skill_parcentege?>%;">
                                    <span class="sr-only"><?php echo $skill->skill_parcentege?></span>
                                </div>
                            </div>
                        </div>
                        

                        <?php }?>

                    </div>
                </div>

            </div>
             <?php foreach ($about_me as $about){
                            
                        ?>

            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 mt-big" data-animate="bounceIn">
                <img src="<?php echo $about->image?>" class="image img-circle img-responsive" alt="This is me - IT worker">
            </div>
            <?php }?>
        </div>

    </div>
</div>
<!-- /#about -->

<!-- *** ABOUT END *** -->
