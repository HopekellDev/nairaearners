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
                                echo '<img src="'. $front->logo .'" width="100%" />';
                            }
                        ?>
                    </div>
                    <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
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
                            echo '<img src="' . $front->icon .' " width="100%" />';
                        }
                        ?>
                    </div>
                    <div class="col-9">
                        <form action="" method="post" enctype="multipart/form-data"></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>