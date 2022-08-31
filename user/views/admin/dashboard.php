        <style>
            .link { cursor: pointer; }
        </style>
        
        
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo activeUsers();?></h3>

                <p>Active Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="users" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo inactiveUsers();?></h3>

                <p>Inactive Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="users" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo withdrawCount();?></h3>

                <p>Withdrawals</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
              <a href="withdrawals" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo allAds();?></h3>

                <p>Advertisments</p>
              </div>
              <div class="icon">
                <i class="fas fa-bullhorn"></i>
              </div>
              <a href="ads" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Latest Users</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <?php
                            $result = $conn->query("SELECT * FROM users WHERE user_role='user' ORDER BY id DESC LIMIT 8");
                            ?>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Referer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($result->num_rows > 0){
                                    while ($urow = $result->fetch_assoc()) {
                                ?>
                                <tr class="link" onclick="window.location='./user?id=<?php echo base64_encode($urow['id']);?>';">
                                    <td><?php echo $urow['name'];?></td>
                                    <td><?php echo $urow['email'];?></td>
                                    <td><?php echo $urow['ref'];?></td>
                                    <td>
                                        <?php 
                                        if ($urow['status'] == '0') {
                                            echo '<span class="badge badge-danger">Inactive<span>';
                                        }else{
                                            echo '<span class="badge badge-success">Active<span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                }else{
                                    ?>
                                <tr>
                                    <td colspan="4" class="text-center"><small>No User in database yet!</small></td>
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if($result->num_rows > 0){ 
                        ?>
                    <div class="card-footer">
                        <span style="float: right;"><a href="users" class="btn btn-primary btn-sm">View All Users</a></span>
                    </div>
                        <?php 
                    }?>
                </div>
            </section>
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest Ads</h3>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped table-hover">
                            <?php
                            $result = $conn->query("SELECT u.*, a.* FROM users u, ads a WHERE u.id=a.user_id ORDER BY a.id DESC LIMIT 8");
                            ?>
                            <thead>
                                <tr>
                                    <th>Ad ID</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($result->num_rows > 0){
                                    while ($ad = $result->fetch_assoc()) {
                                ?>
                                <tr class="link" onclick="window.location='./ad?id=<?php echo base64_encode($ad['ads_id']);?>';">
                                    <td><?php echo $ad['ads_id'];?></td>
                                    <td><?php echo $ad['name'];?></td>
                                    <td>
                                        <?php 
                                        if ($ad['status'] == '0') {
                                            echo '<span class="badge badge-danger">Inactive<span>';
                                        }else{
                                            echo '<span class="badge badge-success">Active<span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $ad['updated_at'];?></td>
                                </tr>
                                <?php 
                                    }
                                }else{
                                    ?>
                                <tr>
                                    <td colspan="4" class="text-center"><small>No User in database yet!</small></td>
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if($result->num_rows > 0){ 
                        ?>
                    <div class="card-footer">
                        <span style="float: right;"><a href="ads" class="btn btn-primary btn-sm">View More Ads</a></span>
                    </div>
                        <?php 
                    }?>
                </div>
            </section>
        </div>
