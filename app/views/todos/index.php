<?php
require_once 'header.php';
?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Todos</h3>
            </div>
            <div class="box-body">
              <table id="todos_table" class="table table-striped table-bordered table-hover datatable">
                <thead>
                  <tr>
                    <?php foreach ($data['data'][0]['cols'] as $index => $col) { ?>
                      <th>
                        <label>
                          <?php echo $col['friendly']; ?>
                        </label>
                      </th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['data'][0]['rows'] as $row) { ?>
                  <tr>
                    <?php foreach ($data['data'][0]['cols'] as $index => $col) { ?>
                        <?php if( 'completed' == $index) { ?>
                          <td style="text-align: center;">
                          <?php if (true == $row[ $index ]) { ?>
                            <span class="glyphicon glyphicon-ok" style="color: green; margin-right: 5px;"></span><label style="display: none">A</label>
                          <?php } else { ?>
                            <span class="glyphicon glyphicon-remove" style="color: red; margin-right: 5px;"></span>
                          <?php  }
                          if (isset($data['data'][1]) && 'admin' === $data['data'][1]) { ?>
                            <a href="/public/todos/edit/<?php echo $row[ 'id' ]; ?>" class="btn btn-primary btn-xs" style="margin-left: 5px;">Edit</a>
                          <?php  }
                        }  elseif ('image' == $index && null != $row[ $index ]) { ?>
                           <td style="text-align: center;"><a href="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $row[ $index ]?>"  target="_blank">
                             <img width="60" height="30" src="<?php echo $row[ $index ];?>"></a>
                         <?php } else { ?>
                          <td>
                          <?php echo $row[ $index ];
                        } ?>
                      </td>
                    <?php } ?>
                  </tr>
                  <?php } ?>
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
