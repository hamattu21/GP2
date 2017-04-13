<?php
  include 'header.php';
  include '../db/db.php';
  session_start();
  $id = $_GET['id'];
  $id = (int) $id;
  if($id == 0){
    header("Location:Posts.php", false);
  }
  $query = "SELECT * FROM POST P WHERE P.id = ".$id;
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $post = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $post[@count($post)] = mysqli_fetch_object($result);
      }
  }

  if(@count($post) == 0 ){
    header("Location:Posts.php", false);
  }

  $query = "SELECT * FROM DEALS D WHERE D.POST_ID = ".$id. " AND D.USER_ID = ".$_SESSION['id'];
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $deal = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $deal[@count($deal)] = mysqli_fetch_object($result);
      }
  }

  $solution = array();
  $solving = array();
  $flag = false;
  if($post[0]->deal_id != 0){
    $query = "select d.user_id from deals d where d.id = ".$post['0']->deal_id;
    $result = @mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $solution[@count($solution)] = mysqli_fetch_object($result);
        }
    }

    if($solution['0']->user_id == $_SESSION['id']){
      $flag = true;
      $query = "SELECT s.* FROM solution s WHERE s.post_id = ".$post['0']->id;
      $result = @mysqli_query($connection, $query);
      $count = mysqli_num_rows($result);
      if ($count > 0) {
          for ($i = 0; $i < $count; $i++) {
              $solving[@count($solving)] = mysqli_fetch_object($result);
          }
      }
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
                                                            <span class="caption-subject font-green-sharp bold uppercase">Title : <?php echo $post[0]->title; ?></span>
                                                            <div class="media-body todo-comment">
                                                                <p class="todo-text-color"><?php echo $post[0]->content; ?></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- end PROJECT HEAD -->
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                    <!-- TASK HEAD -->
                                                                    <?php
                                                                    if(@count($solving) > 0){
                                                                      ?>
                                                                      <div class="tabbable-line">
                                                                          <ul class="nav nav-tabs ">
                                                                              <li class="active">
                                                                                  <a href="#tab_1" data-toggle="tab" aria-expanded="true"> Solution </a>
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
                                                                                                        <p class="todo-text-color"> <?php echo $solving['0']->solution; ?></p>
                                                                                                    </div>
                                                                                                </li>
                                                                                                <hr>
                                                                                          </ul>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>

                                                                          </div>
                                                                      </div>
                                                                      <?php
                                                                    }else{
                                                                      if(@count($deal) > 0){
                                                                        ?>
                                                                        <div class="tabbable-line">
                                                                            <ul class="nav nav-tabs ">
                                                                                <li class="active">
                                                                                    <a href="#tab_1" data-toggle="tab" aria-expanded="true"> Deals </a>
                                                                                </li>

                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div class="tab-pane active" id="tab_1">
                                                                                    <!-- TASK COMMENTS -->
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <ul class="media-list">
                                                                                              <?php
                                                                                                foreach ($deal as $key => $value) {
                                                                                                  ?>
                                                                                                  <li class="media">
                                                                                                      <div class="media-body todo-comment">
                                                                                                          <p class="todo-text-color"> <?php echo $value->comment; ?></p>
                                                                                                          <h4>Price Deal : <?php echo $value->amount; ?></h4>
                                                                                                      </div>
                                                                                                  </li>
                                                                                                  <hr>
                                                                                                  <?php
                                                                                                }
                                                                                              ?>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                      }
                                                                    }

                                                                    ?>
                                                                    <?php
                                                                    if($post[0]->deal_id == 0 AND @count($deal) == 0){
                                                                      ?>
                                                                      <form action="Ctrl/NewDeal.php" method="post" class="form-horizontal">
                                                                        <div class="form">
                                                                            <!-- TASK TITLE -->
                                                                            <!-- TASK DESC -->
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Your Cooment" name="comment" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <input class="form-control todo-taskbody-tasktitle" placeholder="Amount of Deal" name="amount" type="number" min="0" required>
                                                                                    <input class="form-control todo-taskbody-tasktitle" name="post_id" type="hidden" value="<?php echo $post['0']->id;  ?>" required>
                                                                                  </div>
                                                                            </div>

                                                                            <!-- END TASK DESC -->
                                                                            <!-- TASK DUE DATE -->
                                                                            <!-- TASK TAGS -->                                                                        <!-- TASK TAGS -->
                                                                            <div class="form-actions right todo-form-actions">
                                                                                <button class="btn btn-circle btn-sm green" name="NewDeal">Save Changes</button>
                                                                            </div>
                                                                        </div>
                                                                      </form>
                                                                      <?php
                                                                    }
                                                                    ?>



                                                                    <?php
                                                                    if($flag){
                                                                      if(@count($solving) == 0){
                                                                        ?>
                                                                        <form action="Ctrl/SolutionCtlr.php" method="post" class="form-horizontal">
                                                                          <div class="form">
                                                                              <!-- TASK TITLE -->
                                                                              <!-- TASK DESC -->
                                                                              <div class="form-group">
                                                                                  <div class="col-md-12">
                                                                                      <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Your Solution" name="solution" required></textarea>
                                                                                      <input class="form-control todo-taskbody-tasktitle" name="post_id" type="hidden" value="<?php echo $post['0']->id;  ?>" required>
                                                                                  </div>
                                                                              </div>

                                                                              <!-- END TASK DESC -->
                                                                              <!-- TASK DUE DATE -->
                                                                              <!-- TASK TAGS -->                                                                        <!-- TASK TAGS -->
                                                                              <div class="form-actions right todo-form-actions">
                                                                                  <button class="btn btn-circle btn-sm green" name="PostSolution">Save Solution</button>
                                                                              </div>
                                                                          </div>
                                                                        </form>
                                                                        <?php
                                                                      }else{

                                                                      }
                                                                    }
                                                                    ?>


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
  include 'footer.php'
?>
