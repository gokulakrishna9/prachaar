<?php ?>

<link href="<?php  echo base_url().'assets/css/signin.css';?>" rel="stylesheet">

<div class="container-fluid">
      <div class="row">        
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <?php echo form_open("login",array('role'=>'form','class'=>'form-signin')); ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="user_name" class="sr-only">User Name</label>
        <input type="text" id="user_name" name='user_name' class="form-control" placeholder="User Name" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name='password' id="password" class="form-control" placeholder="Password" required>
    <!--    <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
          </div>              
      </div>          
</div>