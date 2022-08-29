<div class="card-body"><?php
if (isset($msg)) {
    
    ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Action Success!</h5>
                  <?php 
                  echo $msg;?>
                </div>
                <center><a href="login" class="btn btn-success">Login now</a></center>
    <?php
}
if (isset($err)) {
    
    ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Oops!</h5>
                  <?php echo $err;?>
                </div>
                <center><a href="login" class="btn btn-success">Login now</a></center>
    <?php
}
?>
</div>