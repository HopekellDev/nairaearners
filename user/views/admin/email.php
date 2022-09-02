<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="host">SMTP Host</label>
                            <input type="text" name="smtp_host" class="form-control" value="<?php echo $mailSend->smtp_host;?>">
                        </div>
                        <div class="col-md-3 col-6 form-group">
                            <label for="host">SMTP Port</label>
                            <input type="text" name="smtp_port" class="form-control" value="<?php echo $mailSend->smtp_port;?>">
                        </div>
                        <div class="col-md-3 col-6 form-group">
                            <label for="host">SMTP Encryption</label>
                            <input type="text" name="encryption" class="form-control" value="<?php echo $mailSend->encryption;?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="host">SMTP Username</label>
                            <input type="email" name="smtp_user" class="form-control" value="<?php echo $mailSend->smtp_user;?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="host">SMTP Password</label>
                            <input type="text" name="smtp_password" class="form-control" value="<?php echo $mailSend->smtp_pass;?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="host">SMTP From Email</label>
                            <input type="email" name="smtp_from_email" class="form-control" value="<?php echo $mailSend->smtp_email;?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="host">SMTP From  Name</label>
                            <input type="text" name="smtp_from_name" class="form-control" value="<?php echo $mailSend->smtp_from;?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="_email">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Test Email Server</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <label for="email">Enter Email Address</label>
                    <div class="input-group input-group-sm">
                        <input type="email" class="form-control" name="email" placeholder="example@gmail.com" value="<?php echo $email;?>" autofocus required />
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info btn-flat" name="send_email">Send Test Email</button>
                        </span>
                    </div>
                    <?php
                        if (isset($success)) {
                            echo '<div class="alert alert-info">'.$msg . '</div>';
                        }
                        if (isset($error)) {
                            echo '<div class="alert alert-success">'.$error . '</div>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>