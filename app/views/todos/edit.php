<?php
require_once 'header.php';
?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header col-md-12">
              <h3 class="box-title">Edit Todo</h3>
            </div>
            <div class="box-body">
              <form data-toggle="validator" method="POST" action="/public/todos/postEdit/<?php echo $data['data'][0]['id']?>">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="creator">Creator</label>
                    <input type="text" class="form-control" name="creator" id="creator" value="<?php echo $data['data'][0]['creator']?>" readonly>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $data['data'][0]['email']?>" readonly>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="description">Description</label>
                  <textarea type="textarea" class="form-control" name="description" id="description" required rows="3"><?php echo $data['data'][0]['description']?></textarea>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="statusSelect">Status</label>
                  <select class="form-control" name="statusSelect" id="statusSelect" readonly>
                    <option><?php echo $data['data'][0]['status']?></option>
                  </select>
                </div>
                <div class="form-group col-md-6" id="test">
                  <label for="fileupload" class="control-label">Upload image</label>
                  <input type="file" name="fileupload" id="fileupload" value="<?php echo $data['data'][0]['image']?>" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-sm-1">Completed</label>
                    <div class="col-sm-11">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="completed" id="gridRadios1" value="true" checked>
                          Yes
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="completed" id="gridRadios2" value="false">
                          No
                        </label>
                      </div>
                    </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->

<?php
require_once 'footer.php';
?>
