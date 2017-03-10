<!--

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */

-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
	<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-xs-12">

            <form class="" method="post" action="" enctype="multipart/form-data">
		
                <h1>
                    Our <span class="em text-info">Services</span>
                </h1>
                <?php 
                if(isset($error)){
                    echo $error;
                }
                if (isset($message)) {
                   echo $message;
                }
                ?>
                <h2 class="text-success">
                    <label for="service_icon">Service Icon</label>
                </h2>

                <p>
                    <input type="text" id="service_icon" class="form-control" name="service_icon"/>
                    <?php echo form_error('service_icon','<span class="bg-danger text-danger">','</span>')?>
                </p>
                <h2 class="text-success">
                    <label for="service_title">Service Title</label>
                </h2>

                <p>
                    <input type="text" id="service_title" class="form-control" name="service_title"/>
                    <?php echo form_error('service_title','<span class="bg-danger text-danger">','</span>')?>
                </p>
                <h2>
                    <label for="about_me">Service Details</label>
                </h2>
                <p>
                    <textarea name="service_details" id="service_details" cols="80" rows="10"></textarea>
                    <?php echo form_error('service_details','<span class="bg-danger text-danger">','</span>')?>
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
                    <input type="submit" name="service_submit" value="submit" class="btn btn-success" style="color: black" />
                </p>
            </form>
	</div>
</div>
