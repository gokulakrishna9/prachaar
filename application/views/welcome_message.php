<div class="container-fluid">
      <div class="row">
        
          <div class="col-sm-9 col-sm-offset-4 col-md-10 col-md-offset-2 main">
        <div class="starter-template text-center">
        <h1>Telangana State Medical Services <br> Infrastructure Development Corporation</h1>
        <img src="<?php echo base_url()."assets/images/gandhi_hospital.jpeg";?>" alt="Image" style="width:50%;height:50%" />
      </div>
       
        <div class="row">&nbsp;</div>
        
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
                <th><b>Title</b></th>
                <th><b>Link</b></th>
            </tr>
            
                <?php foreach($notification_records as $notification){?>
                <tr >
                <td><?php echo $sno++;?></td>
                <td><?php echo $notification->notification_category;?></td>
                <td><?php echo date("d-M-Y",strtotime($notification->notification_date));?></td>                
                <td><?php echo $notification->title ;?></td>
                <td><a href="<?php echo $notification->link;?>" target="_blank">Notification File</a></td>
                </tr>
                <?php } ?>
            
        </table>
        <?php } ?>

          </div>
              
      </div>
</div>
   