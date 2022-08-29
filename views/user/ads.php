        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Campaigns</h3>
                        <button class="btn btn-primary btn-sm" style="float:right" data-toggle="modal" data-target="#CreateAdd"><i class="fa fa-plus"></i> Create new ads</button>
                    </div>
                    <div class="card-body">
                      <?php ?>
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
        <!-- Modal -->
        <div class="modal fade" id="CreateAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="ads type">Ads Type (Size)</label>
                        <select name="type" id="" class="form-control" required>
                          <option value="">Select Ads type</option>
                          <option value="580x400">Netboard (580x400)</option>
                          <option value="750x200">Leaderboard (750x200)</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="landing">Ads Landing page</label>
                        <input type="url" class="form-control" placeholder="E.G https://example.com" name="landing" required />
                      </div>
                      <div class="form-group">
                        <label for="banner">Ads Banner</label>
                        <div class="custom-file">
                          <input type="file" accept="image/png" class="custom-file-input" id="customFile" name="banner" required />
                          <label class="custom-file-label" for="customFile">Choose Banner Image (Only PNG)</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="create-ad">Create AD</button>
                      </div>
                    </form>
              </div>
            </div>
          </div>
        </div>