<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-xs-12">

            <form class="" method="post" action="" enctype="multipart/form-data">
		<p><?php echo validation_errors();?></p>
                <?php 
                if(isset($error))
                    echo $error;
                ?>
                <h1>
                    Our <span class="em text-success">Introduction</span>
                </h1>
                
                <p>
                    <input type="text" id="intro_title" class="form-control" name="intro_title" placeholder="Intro Title" value='<?php echo isset($intro_title)? $intro_title:""?>'/>
                </p>
                <h2 class="text-success">
                    <label for="intro_logo">Intro Logo</label>
                </h2>
                <p>
                    <input type="file" id="intro_logo" class="form-control" name="intro_logo"/>
                </p>
                
                <h2 class="text-success">
                    <label for="intro_bac_img">Intro Back Image</label>
                </h2>

                <p>
                    <input type="file" id="intro_bac_img" class="form-control" name="intro_bac_img"/>
                </p>
                <h2>
                    <label for="offer_desc">Offer Description</label>
                </h2>
                <p>
                    <textarea name="offer_desc" id="offer_desc" cols="80" rows="10"></textarea>
                </p>
                <p>
                    <input type="submit" name="intro_submit" value="submit" class="btn btn-success" style="color: black" />
                </p>
            </form>
	</div>
</div>
