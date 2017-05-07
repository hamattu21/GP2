<?php
  include 'header.php';
  include '../db/db.php';
  session_start();
  $id = $_GET['id'];
  $id = (int) $id;
  if($id == 0){
    header("Location:MyPost.php", false);
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
    header("Location:MyPost.php", false);
  }

  $query = "SELECT d.* , u.full_name FROM deals d, user u WHERE d.post_id = ".$post['0']->id." AND d.user_id = u.id";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $deals = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $deals[@count($deals)] = mysqli_fetch_object($result);
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
                                                                <?php
                                                                  if($post[0]->img != ''){
                                                                    ?>
                                                                      <img src="../img/<?php echo $post[0]->img  ?>" alt="">
                                                                    <?php
                                                                  }
                                                                ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- end PROJECT HEAD -->
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                    <!-- TASK HEAD -->
                                                                    <?php
                                                                      if(@count($deals) > 0){
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
                                                                                                foreach ($deals as $key => $value) {
                                                                                                  ?>
                                                                                                  <li class="media">
                                                                                                      <div class="media-body todo-comment">
                                                                                                          <p class="todo-comment-head">
                                                                                                              <span class="todo-comment-username"><?php echo $value->full_name; ?></span> &nbsp;
                                                                                                          </p>
                                                                                                          <p class="todo-text-color"> <?php echo $value->comment; ?></p>
                                                                                                          <h4>Price Deal : <?php echo $value->amount; ?></h4>
                                                                                                          <?php
                                                                                                            if($post[0]->deal_id == 0){
                                                                                                              if($value->status != 2){
                                                                                                                $reject = "/GP2/Student/Ctrl/PsotStatusCtrl.php?status=1&deal_id=".$value->id."&post_id=".$post['0']->id;
                                                                                                                ?>
                                                                                                                  <div class="clearfix">
                                                                                                                    <a href="Payment.php?post_id=<?php echo $id; ?>&deal_id=<?php echo $value->id ?>">
                                                                                                                      <button type="button" class="btn btn-primary">Accept</button>
                                                                                                                    </a>
                                                                                                                    <a href="<?php echo $reject; ?>">
                                                                                                                      <button type="button" class="btn btn-danger">Reject</button>
                                                                                                                    </a>
                                                                                                                  </div>
                                                                                                                <?php
                                                                                                              }
                                                                                                            }
                                                                                                            if($value->id == $post['0']->deal_id){
                                                                                                              ?>
                                                                                                              <a href="NewMessage.php?to=<?php echo $value->user_id; ?>">New Message</a>
                                                                                                              <?
                                                                                                            }
                                                                                                          ?>
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
