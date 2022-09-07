<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Country List</h3>
                <a href="" class="btn btn-primary btn-sm" style="float: right;" data-toggle="modal" data-target="#modal-default"> Add new Country</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Country</th>
                            <th>Currency Code</th>
                            <th>Currency Symbol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("SELECT * FROM countries");
                        if ($result->num_rows > 0) {
                            while ($country = $result->fetch_assoc()) {
                                extract($country);
                                ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $country_name;?></td>
                            <td><?php echo $country_currency;?></td>
                            <td><?php echo $country_symbol;?></td>
                        </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new country</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="" >
                    <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="country_name" required />
                    </div>
                    <div class="form-group">
                        <label for="">Curreny Code</label>
                        <input type="text" class="form-control" name="currency_code" required />
                    </div>
                    <div class="form-group">
                        <label for="">Currency Symbol</label>
                        <input type="text" class="form-control" name="currency_symbol" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="create_country">Create Country</button>
                    </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->