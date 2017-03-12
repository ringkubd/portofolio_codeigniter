<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
?>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <h3><span class="text-warning">WORK</span> <span class="text-success text-parallax">GROUP</span></h3>
        <form class="" method="post" action="">
            <?php echo isset($message)?$message:""?>
            <div class="input-group">
                <i class="glyphicon glyphicon-forward input-group-addon"></i>
                <input type="text" name="group_name" class="form-control" id="group_name" value="" placeholder="Group Name"/><br/>
            </div>
            <span class="bg-danger text-danger"><?php echo form_error('group_name');?></span>
            <div class="input-group">
                <input type="submit" class="btn btn-block btn-success" value="Add Work" style="color: black"/>
            </div>
        </form>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <h3><span class="text-warning">Update</span> or <span class="text-success text-parallax">Delete</span></h3>
        <form method="post" action="">
            <div class="input-group">
                <select class="form-control">
                    <option>Work Group</option>
                    <?php 
                    //ar_dump($data);
                        if(isset($data)){
                            foreach ($data as $workgroup){?>
                    <option value="<?php echo $workgroup->id;?>"><?php echo $workgroup->work_group_name;?></option>
                           <?php }
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <input type="submit" class="btn btn-danger btn-sm" value="Delete" style="color: black"/>
                <input type="submit" class="btn btn-warning btn-sm" value="Update" style="color: black"/>
            </div>
        </form>
    </div>
    
</div>
