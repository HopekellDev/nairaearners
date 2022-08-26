        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Campaigns</h3>
                        <button class="btn btn-primary btn-sm" style="float:right"><i class="fa fa-plus"></i> Create new ads</button>
                    </div>
                    <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ADS ID</th>
                      <th>Ads Type</th>
                      <th>Banner</th>
                      <th>Landing</th>
                      <th>Status</th>
                      <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM ads WHERE user_id = '$id' ORDER BY id DESC");
                    if ($result->num_rows > 0) {
                      while ($trow = $result->fetch_assoc()) {
                        extract($trow);
                        ?>
                    <tr>
                      <td><b><?php echo $ads_id;?></b></td>
                      <td><?php echo $location;?></td>
                      <td><img src="./uploads/ads/<?php echo $ads; ?>" height="50px" /></td>
                      <td><?php echo $landing; ?></td>
                      <td>
                        
                      <?php
                        if ($status =='1') {
                        echo ' <span class="badge badge-success">Active</span>';
                        }elseif($status =='0'){
                          echo ' <span class="badge badge-warning">Inactive</span>';
                        }else{
                            echo ' <span class="badge badge-danger">Expired</span>';
                        }
                      ?>
                      </td>
                      <td>
                      <?php
                        if ($status =='1') {
                        echo ' <span class="badge badge-success">Active</span>';
                        }elseif($status =='0'){
                          echo ' <a href="payads?action='.$ads_id.'" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Activate Ads</a>';
                        }else{
                            echo ' <a href="payads?action='.$ads_id.'" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i> Re-activate Ads</a>';
                        }
                      ?>
                      </td>
                    </tr>
                        <?php
                      }
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ADS ID</th>
                      <th>Ads Type</th>
                      <th>Banner</th>
                      <th>Landing</th>
                      <th colspan="2">Status</th>
                    </tr>
                    </tfoot>
                  </table>
                    </div>
                </div>
            </div>
        </div>