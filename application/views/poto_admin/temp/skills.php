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

        <form class="" method="post" action="<?php echo isset($editvalue)?base_url().'admin/skillupdate':''?>" enctype="multipart/form-data">
            <p><?php echo validation_errors();?></p>
            <?php 
            if(isset($error)){
                echo $error;
            }
            if(isset($message)){
                echo $message;
            }
            
            ?>
            <h1>
                Our <span class="em text-success">Skills</span>
            </h1>
            <?php
            if(isset($editvalue)){
            ?>
            <input type="hidden" id="skill_id" class="form-control" name="skill_id" placeholder="skill_id" value='<?php echo $editvalue[0]['skill_id'];?>'/>
                <?php }?>

            <p>
                <input type="text" id="skill" class="form-control" name="skill" placeholder="skill" value='<?php echo isset($editvalue)?$editvalue[0]['skill_name']:""?>'/>
            </p>
            
            <p>
                <input type="number" id="skill_percentege" class="form-control" name="skill_percentege" placeholder="skill percentege" value='<?php echo isset($editvalue)?$editvalue[0]['skill_parcentege']:""?>'/>
            </p>

            <p>
                <input type="submit" name="<?php echo isset($editvalue)?'skill_update':'skill_submit'?>" value="<?php echo isset($editvalue)?'Update':'Add';?>" class="btn btn-success" style="color: black" />
            </p>
        </form>
    </div>
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12 well-success table-responsive">
        <?php
        if(isset($skills)){
            $i = 1;  
            ?>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>S.L</th>
                    <th>Skill Name</th>
                    <th>Skill Percentage</th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($skills as $skill){?>
                <tr>
                    <td class="active"><?php  echo $i++;?></td>
                    <td class="success"><?php echo $skill['skill_name']?></td>
                    <td class="info"><?php echo $skill['skill_parcentege']?></td>
                    <td>
                        <a href="skilledit/<?php echo $skill['skill_id'];?>"><button class="btn btn-success" style="color: black"><span class="glyphicon glyphicon-pencil"></span>Edit</button></a>
                        |<a id="skill_del" href="skill_delete/<?php echo $skill['skill_id'];?>"><button  class="btn btn-danger" style="color: black"><span class="glyphicon glyphicon-trash"></span>Delete</button></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
            
            <?php
            
        } else {
            
        }
        ?>
    </div>
</div>
<script>
    (function($){
        $('a#skill_del').on('click',function(e){
            if(confirm("Are Sure!") == true){
                return true;
            }else{
                e.preventDefault();
                return false;
            }
        });
    })(jQuery);
</script>