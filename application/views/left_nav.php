<div class="col-sm-2 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"></li>
            <li <?php if(preg_match("^welcome/projects_completed^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();  ?>welcome/projects_completed' <?php if(!preg_match("^welcome/projects_completed^",current_url())) echo 'style="color: black"'; ?> >Projects</a></li>
            <li <?php if(preg_match("^welcome/achievements^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();  ?>welcome/achievements' <?php if(!preg_match("^welcome/achievements^",current_url())) echo 'style="color: black"'; ?> >Achievements</a></li>
            <li <?php if(preg_match("^welcome/e_aushadhi^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();  ?>welcome/e_aushadhi' <?php if(!preg_match("^welcome/e_aushadhi^",current_url())) echo 'style="color: black"'; ?> >e-Aushadhi</a></li>
            <li <?php if(preg_match("^welcome/add_grievance^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();  ?>welcome/add_grievance' <?php if(!preg_match("^welcome/add_grievance^",current_url())) echo 'style="color: black"'; ?> >Help desk</a></li>
            <li <?php if(preg_match("^welcome/notification$^",current_url())) echo 'class="active"'; ?>><a href='<?php echo base_url(); ?>welcome/notification' <?php if(!preg_match("^welcome/notification$^",current_url())) echo 'style="color: black"'; ?> >Tenders</a></li>
            <li><a href="#" style="color:black">Gallery</a></li>
            <li <?php if(preg_match("^welcome/quick_links^",current_url())) echo 'class="active"';?>><a href='<?php echo base_url();  ?>welcome/quick_links' <?php if(!preg_match("^welcome/quick_links^",current_url())) echo 'style="color: black"'; ?>>Quick Links</a></li>
          </ul>
</div>