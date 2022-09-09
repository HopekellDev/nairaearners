        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php if ($avatar!=null) { echo './uploads/user/' . $avatar;}else { echo './assets/dist/img/avatar.png';} ?>"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo $name; ?></h3>

                        <p class="text-muted text-center"><?php echo '@' . $username . ' | ' . $email; ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Phone:</b> <a class="float-right"><?php echo $phone; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Province:</b> <a class="float-right"><?php echo $province; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Country:</b> <a class="float-right"><?php echo $country; ?></a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default"><b>Update Photo</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <?php if (isset($msg)) {
                echo $msg;
              }; ?>
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profile" data-toggle="tab">Update profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#withdraw" data-toggle="tab">Widthdrawal Methods</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#password" data-toggle="tab">Password</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="profile">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Full name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"
                                                value="<?php echo $name; ?>" placeholder="Fullname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" value="<?php echo $phone ?>"
                                                name="phone" placeholder="Phone number" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea name="address" placeholder="Enter resiential address"
                                                class="form-control"><?php echo $address ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="city" placeholder="City"
                                                value="<?php echo $city ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">State</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="state" placeholder="State"
                                                value="<?php echo $province ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-10">
                                            <select name="country" id="" class="form-control">
                                                <?php
                            if ($country != null) {
                            ?>
                                                <option value="<?php echo $country; ?>" selected><?php echo $country; ?>
                                                </option>
                                                <?php
                            }
                            $result = $conn->query("SELECT * FROM countries");
                            if ($result->num_rows > 0) {
                              $c = $result->fetch_assoc();
                              extract($c);
                              echo '<option value="' . $country_name . '">' . $country_name . '</option>';
                            } else {
                              echo '<option value="">No country in database</option>';
                            }
                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-success" name="update_profile"><i
                                                    class="fa fa-check"></i> Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="withdraw">
                              <div class="row">
                                <div class="col-md-6">
                                  <h3>Bank Account</h3>
                                  <?php
                                  $user = $userRow['id'];
                                  $result = $conn->query("SELECT * FROM bank_accounts WHERE user_id ='$id'");
                                  $bank = $result->fetch_assoc();
                                  extract($bank);
                                  ?>
                                  <form action="" method="post">
                                    <div class="form-group">
                                      <label for="">Bank Name</label>
                                      <input type="text" class="form-control" name="bank" value="<?php echo $bank['bank_name'];?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Account Name</label>
                                      <input type="text" class="form-control" name="beneficiary" value="<?php echo $bank['beneficiary'];?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Account Number</label>
                                      <input type="tel" class="form-control" name="nuban" value="<?php echo $bank['account_number'];?>" required>
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-success btn-block" name="update_bank">Update Bank Details</button>
                                    </div>
                                  </form>
                                </div>
                                <div class="col-md-6">
                                <?php
                                  $result = $conn->query("SELECT * FROM crypto_wallets WHERE user_id ='$id'");
                                  $crypto = $result->fetch_assoc();
                                  extract($crypto);
                                  ?>
                                  <h3>Crypto Wallets</h3>
                                  <form action="" method="post">
                                    <div class="form-group">
                                      <label for="">USDT Bep-20</label>
                                      <input type="text" class="form-control" value="<?php echo $crypto['usdt'];?>" name="usdt" placeholder="Enetr USDT wallet Address">
                                    </div>
                                    <div class="form-group">
                                      <label for="">BUSD Bep-20</label>
                                      <input type="text" class="form-control" value="<?php echo $crypto['busd'];?>" name="busd" placeholder="Enetr BUSD wallet Address">
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-warning btn-block" name="update_crypto">Update Crypto wallets</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="password">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="old_pass"
                                                placeholder="Old password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="New Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="repass"
                                                placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger" name="update_pass"><i
                                                    class="fa fa-lock"></i> Change password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Modal -->
        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload Photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="" >
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="photo" accept="image/*" required>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button type='submit' name="upload_photo" class="btn btn-outline-info">Upload Photo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->