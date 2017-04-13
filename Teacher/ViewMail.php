<?php
  include 'header.php';
  include '../db/db.php';
  session_start();
  $id = $_GET['id'];
  $id = (int) $id;
  if($id == 0){
    header("Location:inbox.php", false);
  }
  $query = "SELECT * FROM inbox I WHERE I.id = ".$id;
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $inbox = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $inbox[@count($inbox)] = mysqli_fetch_object($result);
      }
  }

  $query = "SELECT R.*, u.full_name FROM replay R , user U WHERE R.inbox_id = ".$id." AND R.from = U.id";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $replay = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $replay[@count($replay)] = mysqli_fetch_object($result);
      }
  }



?>
        <!-- BEGIN CONTAINER -->
        <div class="wrapper">
            <!-- BEGIN HEADER -->
            <?php include 'menu.php' ?>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">

                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN TODO SIDEBAR -->
                                        <div class="todo-ui">
                                            <!-- BEGIN TODO CONTENT -->
                                            <div class="todo-content">
                                                <div class="portlet light bordered">
                                                    <!-- PROJECT HEAD -->
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-bar-chart font-green-sharp hide"></i>
                                                            <span class="caption-subject font-green-sharp bold uppercase">Title : <?php echo $inbox[0]->title; ?></span>
                                                            <div class="media-body todo-comment">
                                                                <p class="todo-text-color"><?php echo $inbox[0]->content; ?></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- end PROJECT HEAD -->
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                              <div class="tabbable-line">
                                                                <?php
                                                                  if(@count($replay) > 0){
                                                                    foreach ($replay as $key => $value) {
                                                                      ?>
                                                                      <ul class="nav nav-tabs ">
                                                                          <li class="active">
                                                                              <a href="#tab_1" data-toggle="tab" aria-expanded="true"> From : <?php echo $value->full_name; ?> </a>
                                                                          </li>

                                                                      </ul>
                                                                      <div class="tab-content">
                                                                          <div class="tab-pane active" id="tab_1">
                                                                              <!-- TASK COMMENTS -->
                                                                              <div class="form-group">
                                                                                  <div class="col-md-12">
                                                                                      <ul class="media-list">

                                                                                            <li class="media">
                                                                                                <div class="media-body todo-comment">
                                                                                                    <p class="todo-text-color"> <?php echo $value->replay; ?></p>
                                                                                                </div>
                                                                                            </li>
                                                                                            <hr>
                                                                                      </ul>
                                                                                  </div>
                                                                              </div>
                                                                          </div>

                                                                      </div>
                                                                      <?php
                                                                    }
                                                                  }
                                                                ?>
                                                              </div>

                                                              <form action="Ctrl/NewReplay.php" method="post" class="form-horizontal">
                                                                  <div class="form">
                                                                      <div class="form-group">
                                                                          <div class="col-md-12">
                                                                              <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Your Replay" name="replay" required></textarea>
                                                                              <input type="hidden" name="inbox_id" value="<?php echo $inbox['0']->id; ?>">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-actions right todo-form-actions">
                                                                          <button class="btn btn-circle btn-sm green" name="NewReplay">Replay</button>
                                                                      </div>
                                                                  </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END TODO CONTENT -->
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT-->
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                <!-- BEGIN FOOTER -->
                <p class="copyright">2015 © Metronic by keenthemes.
                    <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
                </p>
                <a href="#index" class="go2top" style="display: none;">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>
<?php
  include 'footer.php';
?>
