<?php
  include 'header.php';
  include '../db/db.php';
  $query = "SELECT COUNT(*) AS COUNT FROM user u WHERE u.role  = 4";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $students = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $students[@count($students)] = mysqli_fetch_object($result);
      }
  }

  $query = "SELECT COUNT(*) AS COUNT FROM user u WHERE u.role  = 2";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $teachers = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $teachers[@count($teachers)] = mysqli_fetch_object($result);
      }
  }

  $query = "SELECT COUNT(*) AS COUNT FROM user u WHERE u.role  = 3";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $experts = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $experts[@count($experts)] = mysqli_fetch_object($result);
      }
  }

  $query = "SELECT COUNT(*) AS COUNT FROM post";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $posts = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $posts[@count($posts)] = mysqli_fetch_object($result);
      }
  }

  $query = "SELECT COUNT(*) AS COUNT FROM solution";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $solution = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $solution[@count($solution)] = mysqli_fetch_object($result);
      }
  }

  $query = "SELECT COUNT(*) as COUNT FROM post p where p.id not in (SELECT s.post_id FROM solution s) ";
  $result = @mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  $not_solution = array();
  if ($count > 0) {
      for ($i = 0; $i < $count; $i++) {
          $not_solution[@count($not_solution)] = mysqli_fetch_object($result);
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
                                        <span data-counter="counterup" data-value="<?php echo $students[0]->COUNT/2 ?>"><?php echo $students[0]->COUNT ?></span>
                                    </div>
                                    <div class="desc"> Students </div>
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
                                        <span data-counter="counterup" data-value="<?php echo $teachers[0]->COUNT/2; ?>"><?php echo $teachers[0]->COUNT; ?></div>
                                    <div class="desc"> Teachers </div>
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
                                        <span data-counter="counterup" data-value="<?php echo $experts[0]->COUNT/2; ?>"><?php echo $experts[0]->COUNT; ?></span>
                                    </div>
                                    <div class="desc"> Experts </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $posts[0]->COUNT/2; ?>"><?php echo $posts[0]->COUNT; ?></span>
                                    </div>
                                    <div class="desc"> Posts </div>
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
                                        <span data-counter="counterup" data-value="<?php echo $solution[0]->COUNT/2; ?>"><?php echo $solution[0]->COUNT; ?></div>
                                    <div class="desc"> Posts Solving </div>
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
                                        <span data-counter="counterup" data-value="<?php echo $not_solution[0]->COUNT/2; ?>"><?php echo $not_solution[0]->COUNT; ?></span>
                                    </div>
                                    <div class="desc"> Post Not Solving </div>
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
