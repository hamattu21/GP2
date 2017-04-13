<?php
  include 'header.php';


?>
        <div class="wrapper">
            <?php include 'menu.php' ?>
            <div class="container-fluid">
                <div class="page-content">
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <div class="page-content-col">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="todo-ui">
                                            <div class="todo-content">
                                                <div class="portlet light bordered">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-bar-chart font-green-sharp hide"></i>
                                                            <span class="caption-subject font-green-sharp bold uppercase">Payment</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                              <div class="tabbable-line">
                                                                  <div class="tab-content">
                                                                      <div class="tab-pane active" id="tab_1">
                                                                          <!-- TASK COMMENTS -->
                                                                          <div class="form-group">
                                                                              <div class="col-md-12">
                                                                                  <form name="myForm" onsubmit="return validateForm();" action="Ctrl/AcceptDealCtrl.php" method="post">
                                                                                    <div class="form">
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-12">
                                                                                                <input class="form-control todo-taskbody-tasktitle" name="CardHolder" id="CardHolder" placeholder="Card Holder" type="text" required>
                                                                                              </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-12">
                                                                                                <span class="help-block" id="VisaValidate"></span>
                                                                                                <input class="form-control todo-taskbody-tasktitle" name="VisaNumber" id="VisaNumber" placeholder="Visa Number" type="text" max-length="16" min-length="16" required>
                                                                                              </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-12">
                                                                                                <span class="help-block" id="CSVValidate"></span>
                                                                                                <input class="form-control todo-taskbody-tasktitle" name="CSV" id="CSV" placeholder="CSV" type="text" required>
                                                                                              </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-6">
                                                                                                <span class="help-block" id="YearValidate"></span>
                                                                                                <input class="form-control todo-taskbody-tasktitle" name="Year" id="Year" placeholder="Expired Year" type="text" required>
                                                                                              </div>
                                                                                            <div class="col-md-6">
                                                                                                <span class="help-block" id="MonthValidate"></span>
                                                                                                <input class="form-control todo-taskbody-tasktitle" name="Month" id="Month" placeholder="Expired Month" type="text" required>
                                                                                              </div>
                                                                                            <div class="col-md-6">
                                                                                                <input class="form-control todo-taskbody-tasktitle" name="post_id"  type="hidden" value="<?php echo $_GET['post_id']; ?>" required>
                                                                                              </div>
                                                                                            <div class="col-md-6">
                                                                                                <input class="form-control todo-taskbody-tasktitle" name="deal_id"  type="hidden" value="<?php echo $_GET['deal_id']; ?>" required>
                                                                                              </div>
                                                                                        </div>
                                                                                        <div class="form-actions right todo-form-actions">
                                                                                            <button class="btn btn-circle btn-sm green" name="Payment">Pay</button>
                                                                                        </div>
                                                                                    </div>
                                                                                  </form>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="copyright">2015 © Metronic by keenthemes.
                    <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
                </p>
                <a href="#index" class="go2top" style="display: none;">
                    <i class="icon-arrow-up"></i>
                </a>
            </div>
        </div>


<?php
  include 'footer.php'
?>
