<?php
require_once 'header.php';
?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <?php if (isset($data['data'][0]) && '1' == $data['data'][0]) { ?>
              <div class="alert alert-danger">
                Incorect username and/or password is specified!
              </div>
            <?php } ?>
            <div class="box-header">
              <h3 class="box-title">Please sign in</h3>
            </div>
            <div class="box-body">
              <form class="form-signin" method="POST" action="/public/login/authenticate" data-toggle="validator">
                <div class="form-group" style="width: 300px;">
                  <input type="text" class="form-control" id="username" required autofocus name="username" placeholder="Username">
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group" style="width: 300px;">
                  <input type="password" class="form-control" id="pwd" required name="password" placeholder="Password">
                  <div class="help-block with-errors"></div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->

<?php
require_once 'footer.php';
?>
