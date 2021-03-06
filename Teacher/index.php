<?php
  include 'header.php';
  include '../db/db.php';
  session_start();
  $query = "SELECT COUNT(*) AS COUNT FROM deals D WHERE D.user_id  = ".$_SESSION['id']."  AND D.status = 1";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $accept = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $accept[@count($accept)] = mysqli_fetch_object($result);
      }
  }

  $query = "SELECT COUNT(*) AS COUNT FROM deals D WHERE D.user_id  = ".$_SESSION['id']."  AND D.status = 2";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $rejected = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $rejected[@count($rejected)] = mysqli_fetch_object($result);
      }
  }

  $query = "SELECT count(*) as COUNT FROM deals d , post p , solution s where d.user_id = ".$_SESSION['id']." AND d.post_id = p.id and s.post_id = p.id";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $solution = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $solution[@count($solution)] = mysqli_fetch_object($result);
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
                    <div class="breadcrumbs">
                        <h1>Dashboard</h1>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $solution['0']->COUNT / 2; ?>"><?php echo $solution['0']->COUNT; ?></span>
                                    </div>
                                    <div class="desc"> Solving </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $rejected['0']->COUNT / 2; ?>"><?php echo $rejected['0']->COUNT; ?></div>
                                    <div class="desc"> Deal Rejected </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $accept['0']->COUNT / 2; ?>"><?php echo $accept['0']->COUNT ; ?></span>
                                    </div>
                                    <div class="desc"> Deal Accepted </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- BEGIN FOOTER -->
                <p class="copyright">2017 © Imam University.
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
