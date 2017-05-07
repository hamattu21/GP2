<?php
  include 'header.php';
  include '../db/db.php';
  session_start();
  $query = "SELECT I.* , U.full_name FROM inbox I , user U WHERE I.FROM = ".$_SESSION['id']." AND I.FROM = U.ID";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $array = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $array[@count($array)] = mysqli_fetch_object($result);
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
                    <!-- BEGIN BREADCRUMBS -->
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-social-dribbble font-green"></i>
                                                    <span class="caption-subject font-green bold uppercase">Posts</span>
                                                </div>

                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-scrollable">
                                                  <?php
                                                    if(@count($array) > 0){
                                                      ?>
                                                      <table class="table table-hover">
                                                          <thead>
                                                              <tr>
                                                                  <th> # </th>
                                                                  <th> Title </th>
                                                                  <th> From </th>
                                                                  <th> View </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              <?php
                                                                  foreach ($array as $key => $value) {
                                                                    ?>
                                                                    <tr>
                                                                        <td> <?php echo $key+1; ?> </td>
                                                                        <td> <?php echo $value->title; ?> </td>
                                                                        <td> <?php echo $value->full_name; ?> </td>
                                                                        <td>
                                                                          <a href="ViewMail.php?id=<?php echo $value->id;  ?>" class="btn btn-outline btn-circle red btn-sm blue">
                                                                                <i class="fa fa-share"></i> View </a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                  }
                                                              ?>
                                                          </tbody>
                                                      </table>
                                                      <?php
                                                    }
                                                    else{
                                                      ?>
                                                      <div class="alert alert-danger">
                                                          <strong>Note!</strong> There is No Message
                                                      </div>
                                                      <?php
                                                    }

                                                  ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- END SAMPLE TABLE PORTLET-->
                                    </div>
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
                <a href="#index" class="go2top" style="display: inline;">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
        </div>
<?php
  include 'footer.php'
?>
