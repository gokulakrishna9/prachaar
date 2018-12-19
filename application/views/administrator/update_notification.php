<link rel="stylesheet" href="<?php echo base_url();?>assets/css/metallic.css" >
<script type="text/javascript" src="<?php echo base_url();?>assets/js/zebra_datepicker.js"></script>
<style>
	.row{
		margin-bottom: 1.5em;
	}
	.alt{
		margin-bottom:0;
		padding:0.5em;
	}
	.alt:nth-child(odd){
		background:#eee;
	}
		.selectize-control.repositories .selectize-dropdown > div {
			border-bottom: 1px solid rgba(0,0,0,0.05);
		}
		.selectize-control.repositories .selectize-dropdown .by {
			font-size: 11px;
			opacity: 0.8;
		}
		.selectize-control.repositories .selectize-dropdown .by::before {
			content: 'by ';
		}
		.selectize-control.repositories .selectize-dropdown .name {
			font-weight: bold;
			margin-right: 5px;
		}
		.selectize-control.repositories .selectize-dropdown .title {
			display: block;
		}
		.selectize-control.repositories .selectize-dropdown .description {
			font-size: 12px;
			display: block;
			color: #a0a0a0;
			white-space: nowrap;
			width: 100%;
			text-overflow: ellipsis;
			overflow: hidden;
		}
		.selectize-control.repositories .selectize-dropdown .meta {
			list-style: none;
			margin: 0;
			padding: 0;
			font-size: 10px;
		}
		.selectize-control.repositories .selectize-dropdown .meta li {
			margin: 0;
			padding: 0;
			display: inline;
			margin-right: 10px;
		}
		.selectize-control.repositories .selectize-dropdown .meta li span {
			font-weight: bold;
		}
		.selectize-control.repositories::before {
			-moz-transition: opacity 0.2s;
			-webkit-transition: opacity 0.2s;
			transition: opacity 0.2s;
			content: ' ';
			z-index: 2;
			position: absolute;
			display: block;
			top: 12px;
			right: 34px;
			width: 16px;
			height: 16px;
			background: url(<?php echo base_url();?>assets/images/spinner.gif);
			background-size: 16px 16px;
			opacity: 0;
		}
		.selectize-control.repositories.loading::before {
			opacity: 0.4;
		}
</style>

<script>
$(function(){
    $(".notification_date").Zebra_DatePicker({
        direction:['<?php echo date("d-M-Y");?>',false]
    });
});

</script>
<?php $notification = $notification_record[0]; ?>
<?php if(isset($response)){?>
<div class="container"> <div class="alert alert-info" role="alert"><?php echo $response; ?></div></div>
<?php } ?>
<div class="row">&nbsp;</div>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Update Notification</h3>
        </div>
        <div class="panel-body">
        <?php echo form_open_multipart('notification_admin_access/update_notification');?>
     <div class="row alt">       
         <div class="col-md-4 col-xs-6">
            <label class="control-label">Title</label>
            <input type="text" name="title" value='<?php echo $notification->title; ?>' class="form-control" placeholder="Title">
            <input type="hidden" name="notification_id" value='<?php echo $notification->notification_id; ?>' class="form-control">
         </div>
         <div class="col-md-4 col-xs-6">
            <label class="control-label">Notification Category</label>
            <select name="notification_category_id" class="form-control">
                <option value="">--Select--</option>
                <?php 
                foreach($notification_categories as $notification_category){
                    echo "<option value='".$notification_category->notification_category_id."'".
                            ($notification_category->notification_category_id==$notification->notification_category_id ? 'selected' : '')." >".$notification_category->notification_category."</option>";
                }
                ?>
            </select>
         </div>
         <div class="col-md-4 col-xs-6">
            <label class="control-label">File Upload</label>
            <input type="file" name="userfile" size="30" placeholder="File" />
            <a href="<?php echo $notification->link;?>">Notification File</a>
        </div>
    </div>
  <div class="row alt">
      <div class="col-md-4 col-xs-6">
        <label class="control-label">External Link</label>
        <input type="text" name="link" value='<?php echo $notification->link ?>' class="form-control" placeholder="Title">
      </div>
      <div class="col-md-4 col-xs-6">
          <label class="control-label">Office File Number</label>
          <input type="text" name="office_file_number" value='<?php echo $notification->office_file_number?>' class="form-control" placeholder="Office File Number">
      </div>
     <div class="col-md-4 col-xs-6">
        <label class="control-label">Notification Date</label>
        <input type="date" name="notification_date" class="form-control notification_date" value="<?php echo date('d-M-Y',strtotime($notification->notification_date)); ?>" id="notification_date" />
      </div>
  </div>
  <div class="row alt">
    <div class="col-md-4 col-xs-6">
      <label class="control-label">Keep Active</label>
      <input type="radio" name="view_flag" class="" value="yes" <?php if($notification->view_flag == 'yes') echo "checked"?> >Yes
      <input type="radio" name="view_flag" class="" value="no" <?php if($notification->view_flag == 'no') echo "checked"?> >No
    </div>
    <div class="col-md-4 col-xs-6">
      &nbsp;
    </div>
    <div class="col-md-4 col-xs-6">
      &nbsp;
    </div>
  </div>
  <div class="row alt">
      <div class="col-md-4 col-xs-6">
          &nbsp;
      </div>
      <div class="col-md-4 col-xs-6" align="center">
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="col-md-4 col-xs-6">
          &nbsp;
          <input type="hidden" name="update_notification" value="update_notification" class="form-control">
      </div>
  </div>
  
  
</form>

        </div>
    </div>
</div>