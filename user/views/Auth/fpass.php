
<div class="card-body login-card-body">
      <p class="login-box-msg">Enter your registered email to recover password</p>
      <?php
        if (isset($msg)) { echo $msg; }
        ?>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="">
            <button type="submit" name="fpass" class="btn btn-primary btn-block">Send Password Reset Link</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>