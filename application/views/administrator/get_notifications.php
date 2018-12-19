<link rel="stylesheet" href="<?php echo base_url();?>assets/css/metallic.css" >
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.tablesorter.widgets.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.tablesorter.colsel.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.tablesorter.print.js"></script>
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
    tr:hover td{
        background: #ADD8E6;
    }
</style>

<script>
$(function(){
    $("#from_date").Zebra_DatePicker();
    $("#to_date").Zebra_DatePicker({
        direction:['<?php echo date("d-M-Y");?>',false]
    });
    var options = {
            widthFixed : true,
            showProcessing: true,
            headerTemplate : '{content} {icon}', // Add icon for jui theme; new in v2.7!

            widgets: [ 'default', 'zebra', 'print', 'stickyHeaders','filter'],

            widgetOptions: {

      print_title      : 'table',          // this option > caption > table id > "table"
      print_dataAttrib : 'data-name', // header attrib containing modified header name
      print_rows       : 'f',         // (a)ll, (v)isible or (f)iltered
      print_columns    : 's',         // (a)ll, (v)isible or (s)elected (columnSelector widget)
      print_extraCSS   : '.table{border:1px solid #ccc;} tr,td{background:white}',          // add any extra css definitions for the popup window here
      print_styleSheet : '', // add the url of your print stylesheet
      // callback executed when processing completes - default setting is null
      print_callback   : function(config, $table, printStyle){
            // do something to the $table (jQuery object of table wrapped in a div)
            // or add to the printStyle string, then...
            // print the table using the following code
            $.tablesorter.printTable.printOutput( config, $table.html(), printStyle );
            },
            // extra class name added to the sticky header row
              stickyHeaders : '',
              // number or jquery selector targeting the position:fixed element
              stickyHeaders_offset : 0,
              // added to table ID, if it exists
              stickyHeaders_cloneId : '-sticky',
              // trigger "resize" event on headers
              stickyHeaders_addResizeEvent : true,
              // if false and a caption exist, it won't be included in the sticky header
              stickyHeaders_includeCaption : false,
              // The zIndex of the stickyHeaders, allows the user to adjust this to their needs
              stickyHeaders_zIndex : 2,
              // jQuery selector or object to attach sticky header to
              stickyHeaders_attachTo : null,
              // scroll table top into view after filtering
              stickyHeaders_filteredToTop: true,

              // adding zebra striping, using content and default styles - the ui css removes the background from default
              // even and odd class names included for this demo to allow switching themes
              zebra   : ["ui-widget-content even", "ui-state-default odd"],
              // use uitheme widget to apply defauly jquery ui (jui) class names
              // see the uitheme demo for more details on how to change the class names
              uitheme : 'jui'
            }
      };
    $("#table-sort").tablesorter(options);
    $('.print').click(function(){
	$('#table-sort').trigger('printTable');
    });
});

</script>

<?php 
    $from_date=0;$to_date=0;
    if($this->input->post('from_date')) $from_date=date("Y-m-d",strtotime($this->input->post('from_date'))); else $from_date = date("Y-m-d");
    if($this->input->post('to_date')) $to_date=date("Y-m-d",strtotime($this->input->post('to_date'))); else $to_date = date("Y-m-d");
?>
<div class="row "><br></div>
<div class="container">
    <?php echo form_open("notification_admin_access/search_notfications",array('role'=>'form','class'=>'form-custom')); ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Search for Notification</div>
        <div class="panel-body">
            <div class="row alt">
                <div class="col-md-4 col-xs-12">
                    <label class="control-label">From Date : <input class="form-control from_date" type="date" value="<?php echo date("d-M-Y",strtotime($from_date)); ?>" name="from_date" id="from_date" /></label>
                </div>
                <div class="col-md-4 col-xs-12">
                    <label class="control-label">To Date : <input class="form-control to_date" type="date" value="<?php echo date("d-M-Y",strtotime($to_date)); ?>" name="to_date" id="to_date"/></label>
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
                   
                </div>
            </div>
            <div class="row alt">                
                <div class="col-md-4 col-xs-12">
                    &nbsp;
                </div>
                <div class="col-md-4 col-xs-12" align="center">
                    
                    <br>
                    <input class="btn btn-primary" type="submit" value="Submit" />
                </div>
                <div class="col-md-4 col-xs-12">
                    &nbsp;
                </div>
            </div>            
        </div>
    </form>
        <!-- Table -->
        <?php $sno = 1;?>
        <?php if(isset($notification_records) && !empty($notification_records)){?>
        <table class="table" id="table-sort">
            <thead>
            <th colspan="6">Notifications</th>
            </thead>
            <tr>
                <th>SNo</th>
                <th><b>Category</b></th>
                <th><b>Date</b></th>
                <th><b>ID</b></th>
                <th><b>Title</b></th>
                <th><b>Office File Number</b></th>
                <th><b>Link</b></th>
                <th><b>View Allowed</b></th>
            </tr>
            
                <?php foreach($notification_records as $notification){?>
                <tr onclick="$('#update_notification_<?php echo $notification->notification_id;?>').submit();">
                    <td><?php echo $sno++;?></td>
                <td><?php echo $notification->notification_category;?></td>
                <td><?php echo date("d-M-Y",strtotime($notification->notification_date));?></td>
                <td>
                    <?php echo form_open('notification_admin_access/update_notification',array('id'=>'update_notification_'.$notification->notification_id,'role'=>'form'),array('notification_id'=>$notification->notification_id)); ?>
                    </form>
                    <?php echo $notification->notification_id ;?>
                </td>
                <td><?php echo $notification->title ;?></td>
                <td><?php echo $notification->office_file_number ;?></td>
                <td><a href="<?php echo $notification->link;?>" target="_blank">Notification File</a></td>
                <td><?php echo $notification->view_flag ;?></td>
                </tr>
                <?php } ?>
            
        </table>
        <?php } ?>
    </div>
    
    
</div>
