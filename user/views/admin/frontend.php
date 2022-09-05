<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-primary">Logo Settings</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($front->logo !='default') {
                                echo '<img src="../assets/images/'. $front->logo .'" height="60px%" />';
                            }
                        ?>
                    </div>
                    <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="logo" required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type='submit' name="_logo" class="btn btn-outline-info">Upload Logo</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-primary">Favicon Settings</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <?php if ($front->icon != 'default') {
                            echo '<img src="../assets/images/' . $front->icon .' " width="100%" />';
                        }
                        ?>
                    </div>
                    <div class="col-9">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="icon" required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type='submit' name="_icon" class="btn btn-outline-info">Upload Favicon</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>