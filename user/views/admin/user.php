        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                    src="<?php if ($avatar!=null) { echo '../user/uploads/user/' . $avatar;}else { echo '../user/assets/dist/img/avatar.png';} ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row['name'];?></h3>

                <p class="text-muted text-center"><?php echo $row['user_role'];?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Status</b> 
                      <?php
                      if ($row['status'] == '1') {
                        echo  '<i class ="badge badge-success">Active</i>';
                      }else{
                        echo  '<i class ="badge badge-danger">Inactive</i>';
                      }
                       ?>
                  </li>
                  <li class="list-group-item">
                    <b>Email status</b> 
                    <?php
                      if ($row['email_verify'] == '1') {
                        echo  '<i class ="badge badge-success">Verified</i>';
                      }else{
                        echo  '<i class ="badge badge-danger">Unverified</i><br>';
                      }
                       ?>
                  </li>
                </ul>
                <?php
                if ($row['user_role'] == 'admin') {
                  echo  '<a href="?id='.$_GET['id'].'&removeadmin=true" class="btn btn-danger btn-block"><b>Remove Admin</b></a>';
                }elseif($row['user_role'] == 'user'){
                  echo  '<a href="?id='.$_GET['id'].'&makeadmin=true" class="btn btn-primary btn-block"><b>Make Admin</b></a>';
                }
                ?>
                <?php
                 if ($row['email_verify'] == '1') {
                   echo  '<a href="?id='.$_GET['id'].'&block=true" class="btn btn-danger btn-block"><b>Block user</b></a>';
                 }else{
                   echo  '<a href="?id='.$_GET['id'].'&activate=true" class="btn btn-success btn-block"><b>Unblock user</b></a>';
                 }
                ?>
                
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#userDetails" data-toggle="tab">User Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#bankDetails" data-toggle="tab">Bank Accounts</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="userDetails">
                  <form class="form-horizontal" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" placeholder="Fullname" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" value="<?php echo $row['phone']?>" name="phone" placeholder="Phone number" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea name="address" placeholder="Enter resiential address" class="form-control"><?php echo $row['address']?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="city" placeholder="City"  value="<?php echo $row['city']?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="state" placeholder="State"  value="<?php echo $row['province']?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                          <select name="country" id="" class="form-control">
                            <?php
                            if ($row['country'] != null) {
                            ?>
                            <option value="<?php echo $row['country'];?>" selected><?php echo $row['country'];?></option>
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
                  <div class="tab-pane" id="bankDetails">
                    <?php
                      $user = base64_decode($_GET['id']);
                      $result = $conn->query("SELECT * FROM bank_accounts WHERE user_id= '$user'");
                      if ($result->num_rows > 0) {
                       while ($bank = $result->fetch_assoc()) {
                        extract($bank);
                        ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="alert alert-info">
                          <p><b>Bank Name: </b> <?php echo $bank_name;?></p>
                          <p><b>Account Beneficiary: </b> <?php echo $beneficiary;?></p>
                          <p><b>Account Number: </b> <?php echo $account_number;?></p>
                        </div>
                      </div>
                    </div>
                        <?php
                       }
                      }
                    ?>
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