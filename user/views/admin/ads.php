<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"></div>
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
                    $result = $conn->query("SELECT * FROM ads ORDER BY id DESC");
                    if ($result->num_rows > 0) {
                      while ($trow = $result->fetch_assoc()) {
                        extract($trow);
                        ?>
                    <tr>
                      <td><b><?php echo $ads_id;?></b></td>
                      <td><?php echo $location;?></td>
                      <td><img src="../user/uploads/ads/<?php echo $ads; ?>" height="50px" /></td>
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
                      <button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Acivate Ad</button>
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete Ad</button>
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
                      <th>Status</th>
                      <th>#</th>
                    </tr>
                    </tfoot>
                  </table>
            </div>
        </div>
    </div>
</div>