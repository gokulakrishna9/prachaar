<link rel="stylesheet" href="<?php echo base_url();?>assets/css/metallic.css" >
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.default.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/selectize.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/zebra_datepicker.js"></script>
<script>
$(function(){
    $("#from_date").Zebra_DatePicker();
    $("#to_date").Zebra_DatePicker({
        direction:['<?php echo date("d-M-Y");?>',false]
    });
});

</script>
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
<?php 
    $from_date=0;$to_date=0;
    if($this->input->post('from_date')) $from_date=date("Y-m-d",strtotime($this->input->post('from_date'))); else $from_date = date("Y-m-d");
    if($this->input->post('to_date')) $to_date=date("Y-m-d",strtotime($this->input->post('to_date'))); else $to_date = date("Y-m-d");
?>
<div class="row alt"><br></div>
<div class="container">
    
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Search for Notification</div>
        <div class="panel-body">
            <div class="row alt">
                <div class="col-md-4 col-xs-12">
                    <label class="control-label">From Date : <input class="form-control from_date" type="text" value="<?php echo date("d-M-Y",strtotime($from_date)); ?>" name="from_date" id="from_date" size="15" /></label>
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="control-label">To Date : <input class="form-control to_date" type="text" value="<?php echo date("d-M-Y",strtotime($to_date)); ?>" name="to_date" id="to_date" size="15" /></label>
                </div>
                <div class="col-md-4 col-xs-12">
                    
                    <label class="control-label">Notification Category
                    <select name="notification_category_id" class="form-control">
                    <option value="">--Select--</option>
                    <?php 
                    foreach($notification_categories as $notification_category){
                        echo "<option value='".$notification_category->notification_category_id."'>".$notification_category->notification_category."</option>";
                    }
                    ?>
                    </select>
                    </label>
                </div>
            </div>
            <div class='row alt'>                
                <div class="col-md-4 col-xs-12">
                    <label class="control-label">Title
                    <input type="text" name="title" value='' class="form-control" placeholder="Title">
                    </label>
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="control-label">Notification ID
                    <input type="text" name="notification_id" value='' placeholder="Notification ID" class="form-control">
                    </label>
                </div>
                <div class="col-md-4 col-xs-12">
                    <br>
                    <input class="btn btn-primary" type="submit" value="Submit" />
                </div>
            </div>
            <div class="row alt">                
                
            </div>            
        </div>
        <!-- Table -->
        <?php if(isset($notification_records) && !empty($notification_records)){?>
        <table class="table">
            <thead>
            <th colspan="6">Notifications</th>
            </thead>
            <tr>
                <td><b>ID</b></td>
                <td><b>Title</b></td>
                <td><b>Category</b></td>
                <td><b>Date</b></td>
                <td><b>Link</b></td>
                <td><b>View Allowed</b></td>
            </tr>
            <tr>
                <?php foreach($notification_records as $notification){?>
                <td><?php echo $notification->notification_id ;?></td>
                <td><?php echo $notification->title ;?></td>
                <td><?php echo $notification->notification_category ;?></td>
                <td><?php echo $notification->notification_date ;?></td>
                <td><a href="<?php echo $notification->link;?>">Notification File</a></td>
                <td><?php echo $notification->view_flag ;?></td>
                <?php } ?>
            </tr>
        </table>
        <?php } ?>
    </div>
    
    
</div>
