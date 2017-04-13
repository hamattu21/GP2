<?php
  include 'header.php'
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
                                        <!-- BEGIN SAMPLE FORM PORTLET-->
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption font-red-sunglo">
                                                    <i class="icon-settings font-red-sunglo"></i>
                                                    <span class="caption-subject bold uppercase"> New Post</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <form method="post" action="Ctrl/NewPostCtrl.php"> 
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control spinner" placeholder="Title" type="text" name="title" required> </div>
                                                        <div class="form-group">
                                                            <label>Content</label>
                                                            <textarea class="form-control" rows="20" name="content" required=""></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn blue" name="NewPost">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
