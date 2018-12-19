<?php
?>

<div class="container-fluid">
      <div class="row">        
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <div class="alert alert-warning" role="alert">
                <p><?php echo $response; ?></p>
             </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Log complaint</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open_multipart('welcome/add_grievance');?>
                <div class="row alt">       
                        <div class="col-md-3 col-xs-6">
                            <label class="control-label">Name</label>
                            <input type="text" name="complainee_name" class="form-control" placeholder="Title" required>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <label class="control-label">Designation</label>
                            <input type="text" name="complainee_designation" class="form-control" placeholder="Title" >
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <label class="control-label">Wing</label>
                            <select name="wings_category_id" class="form-control">
                            <option value="">--Select--</option>
                            <?php 
                                foreach($wing_categories as $wing_category){
                                    echo "<option value='".$wing_category->wings_category_id."'>".$wing_category->wing_category."</option>";
                                }
                            ?>
                            </select>
                        </div>
                </div>
                <div class="row alt">                    
                     <div class="col-md-3 col-xs-6">
                        <label class="control-label">Division</label>
                        <select name="division_category_id" class="form-control">
                        <option value="">--Select--</option>
                        <?php 
                            foreach($division_categories as $division_category){
                                echo "<option value='".$division_category->division_id."'>".$division_category->division."</option>";
                            }
                        ?>
                        </select>
                     </div>
                    <div class="col-md-3 col-xs-6">                        
                        <label class="control-label">Grievance</label>
                        <textarea name="grievance_text" placeholder="Enter Grievance here, max 250 characters..." required></textarea>                 
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <label class="control-label">File Upload</label>
                        <input type="file" name="userfile" size="30" placeholder="File" />
                    </div>
            </div>
            <div class="row alt">
                <div class="col-md-3 col-xs-6">
                    <label class="control-label">Captcha</label>
                    <?php echo $image; ?>
                </div>
                <div class="col-md-3 col-xs-6">
                    <label class="control-label">Enter image text:</label>
                    <input type="text" name="captcha" class="form-control" placeholder="Captcha Text" required>
                </div>
                <div class="col-md-3 col-xs-6">
                    &nbsp;
                </div>
            </div>
            <div class="row alt">
                <div class="col-md-3 col-xs-6">
                    &nbsp;
                </div>
                <div class="col-md-3 col-xs-6"align="center">
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-md-3 col-xs-6">
                    &nbsp;
                    <input type="hidden" name="add_grievance" value="add_grievance" class="form-control">
                </div>
            </div> 
          </form>
        </div>
      </div>
    </div>              
  </div>          
</div>
