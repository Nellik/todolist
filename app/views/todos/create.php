<?php
require_once 'header.php';
?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header col-md-12">
              <h3 class="box-title">Add Todo</h3>
            </div>
            <div class="box-body">
              <form data-toggle="validator" method="POST" action="/public/todos/postCreate">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="creator">Creator</label>
                    <input type="text" class="form-control" name="creator" id="creator" placeholder="Enter creator name" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="description">Description</label>
                  <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter description" rows="3" required></textarea>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="statusSelect">Status</label>
                  <select class="form-control" name="statusSelect" id="statusSelect">
                    <option>Not Started</option>
                    <option>Pending</option>
                    <option>On Going</option>
                    <option>Deferred</option>
                    <option>Completed</option>
                  </select>
                </div>
                <div class="form-group col-md-6" id="test">
                  <label for="fileupload" class="control-label">Upload image</label>
                  <input type="file" name="fileupload" id="fileupload">
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Add Todo</button>
                  <input type="button" value="Preview" class="btn btn-primary" id="preview_btn">
                </div>
              </form>
            </div>
            <div id="preview" class="col-md-12" style="margin-top: 50px;">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>id</th><th>Status</th><th>Creator</th><th>Email</th><th>Description</th><th>Image</th><th>Done</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td id="pId">#</td>
                    <td id="pStatusSelect"></td>
                    <td id="pCreator"></td>
                    <td id="pEmail"></td>
                    <td id="pDescription"></td>
                    <td id="pImage"></td>
                    <td id="pDone" style="text-align: center;"><span class="glyphicon glyphicon-remove" style="color: red; margin-right: 5px;"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->

<?php
require_once 'footer.php';
?>
