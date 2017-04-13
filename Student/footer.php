<script type="text/javascript">
    function validateForm(){
      document.getElementById("VisaValidate").innerHTML = "";
      document.getElementById("CSVValidate").innerHTML = "";
      document.getElementById("YearValidate").innerHTML = "";
      document.getElementById("MonthValidate").innerHTML = "";

      var VisaNumber   = document.forms["myForm"]["VisaNumber"].value.trim();
      var CSV   = document.forms["myForm"]["CSV"].value.trim();
      var Year   = document.forms["myForm"]["Year"].value.trim();
      var Month   = document.forms["myForm"]["Month"].value.trim();

      if(isNaN(VisaNumber)){
        document.getElementById("VisaValidate").innerHTML = "Please Enter Valid Visa Number";
        document.forms["myForm"]["VisaNumber"].focus();
        return false;
      }

      if(VisaNumber.length != 16){
        document.getElementById("VisaValidate").innerHTML = "Visa Number Should be 16 Digit";
        document.forms["myForm"]["VisaNumber"].focus();
        return false;
      }

      if(isNaN(CSV)){
        document.getElementById("CSVValidate").innerHTML = "Please Enter Valid CSV!";
        document.forms["myForm"]["CSV"].focus();
        return false;
      }

      if(CSV.length != 3){
        document.getElementById("CSVValidate").innerHTML = "CSV Should be 3 Digit";
        document.forms["myForm"]["VisaNumber"].focus();
        return false;
      }

      if(isNaN(Year)){
        document.getElementById("YearValidate").innerHTML = "Please Enter Valid Year!";
        document.forms["myForm"]["Year"].focus();
        return false;
      }

      if(Year.length != 2){
        document.getElementById("YearValidate").innerHTML = "Year Should be 2 Digit";
        document.forms["myForm"]["VisaNumber"].focus();
        return false;
      }

      if(isNaN(Month)){
        document.getElementById("MonthValidate").innerHTML = "Please Enter Valid Month!";
        document.forms["myForm"]["Month"].focus();
        return false;
      }

      if(Month.length != 2){
        document.getElementById("MonthValidate").innerHTML = "Month Should be 2 Digit";
        document.forms["myForm"]["VisaNumber"].focus();
        return false;
      }

      return true;
    }
</script>
        <!--[if lt IE 9]>
<script src="../res/assets/global/plugins/respond.min.js"></script>
<script src="../res/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../res/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../res/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../res/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../res/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../res/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../res/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../res/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../res/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../res/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../res/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../res/assets/apps/scripts/todo-2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../res/assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../res/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
