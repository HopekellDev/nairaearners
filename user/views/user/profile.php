        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="./assets/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $name;?></h3>

                <p class="text-muted text-center"><?php echo '@' . $username .' | ' . $email;?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone:</b> <a class="float-right"><?php echo $phone;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Province:</b> <a class="float-right"><?php echo $province;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Country:</b> <a class="float-right"><?php echo $country;?></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block" role="button"><b>Update Photo</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <?php if (isset($msg)){ echo $msg; };?>
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Update profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
                    <form class="form-horizontal" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="<?php echo $name;?>" placeholder="Fullname" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" value="<?php echo $phone?>" name="phone" placeholder="Phone number" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea name="address" placeholder="Enter resiential address" class="form-control"><?php echo $address?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="city" placeholder="City"  value="<?php echo $city?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="state" placeholder="State"  value="<?php echo $province?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                          <select name="country" id="" class="form-control">
                            <?php
                            if ($country != null) {
                            ?>
                            <option value="<?php echo $country;?>" selected><?php echo $country;?></option>
                            <?php
                            }
                            $result = $conn->query("SELECT * FROM countries");
                            if ($result->num_rows > 0) {
                              $c = $result->fetch_assoc();
                              extract($c);
                              echo '<option value="'.$country_name.'">'.$country_name.'</option>';
                            }else{
                              echo '<option value="">No country in database</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success" name="update_profile" ><i class="fa fa-check"></i> Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="password">
                    <form class="form-horizontal" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="old_pass" placeholder="Old password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password" placeholder="New Password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="repass" placeholder="Confirm Password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" name="update_pass" ><i class="fa fa-lock"></i> Change password</button>
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