<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-xs-12">

            <form class="" method="post" action="" enctype="multipart/form-data">
		
                <h1>
                    About <span class="em text-danger">Us</span>
                </h1>
                <p class="text-danger"><?php echo validation_errors();?></p>
                <?php 
                if(isset($error)){
                    echo $error;
                }
                if (isset($message)) {
                   echo $message;
                }
                ?>
                
                <h2 class="text-success">
                    <label for="profile_img">Profile Image</label>
                </h2>

                <p>
                    <input type="file" id="profile_img" class="form-control" name="profile_img"/>
                     <?php echo form_error('profile_img')?>
                </p>
                <h2>
                    <label for="about_me">About Me</label>
                </h2>
                <p>
                    <textarea name="about_me" id="about_me" cols="80" rows="10"></textarea>
                    <?php echo form_error('about_me')?>
                </p>
                <h2>
                    <label for="published">Published</label>
                </h2>
                <p>
                    <select name="published" id="published">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <?php echo form_error('published')?>
                </p>
                <p>
                    <input type="submit" name="about_submit" value="submit" class="btn btn-success" style="color: black" />
                </p>
            </form>
	</div>
</div>
