<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <?php echo $app->site_name . "' General Settings";?>
                </h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-4 form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" name="site_name" required class="form-control" value="<?php echo $app->site_name;?>">
                        </div>
                        <div class="col-md-4 form-group">
                        <label for="site_name">Site URL</label>
                            <input type="url" name="site_url" required class="form-control" value="<?php echo $app->site_url;?>">
                        </div>
                        <div class="col-md-4 form-group">
                        <label for="site_name">Site Email</label>
                            <input type="email" name="site_email" required class="form-control" value="<?php echo $app->site_email;?>">
                        </div>
                        <div class="col-md-4 form-group">
                        <label for="site_name">Site Phone</label>
                            <input type="tel" name="site_phone" required class="form-control" value="<?php echo $app->site_phone;?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="site_name">Site SEO Title</label>
                            <input type="text" name="seo_title" required class="form-control" value="<?php echo $app->seo_title;?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="site_name">Site Description</label>
                            <input type="text" name="site_description" required class="form-control" value="<?php echo $app->site_description;?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="site_name">Site Currency</label>
                            <input type="text" name="site_currency" required class="form-control" value="<?php echo $app->currency;?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="site_name">Site Currency Symbol</label>
                            <input type="text" name="site_currency_symbol" required class="form-control" value="<?php echo $app->currency_symbol;?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="site_name">Rgistration Bonus</label>
                            <input type="text" name="reg_bonus" required class="form-control" value="<?php echo $app->reg_bonus;?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="site_name">Minimum Withdrawal</label>
                            <input type="text" name="min_withdraw" required class="form-control" value="<?php echo $app->min_withdraw;?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="site_name">Ads fee</label>
                            <input type="text" name="ads_fee" required class="form-control" value="<?php echo $app->ads_fee;?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="site_name">Paystack Public Key</label>
                            <input type="text" name="pstk_publick_key" required class="form-control" value="<?php echo $app->pstk_public_key;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="general" class="col-md-4 btn btn-primary btn-block">Save Setting</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>