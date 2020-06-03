<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS — Register</title>

    <!-- Styles -->
    <link href="assets/css/page.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="bsv4/css/bootstrap.min.css">
  </head>

  <body class="layout-centered bg-img" style="background-image: url(assets/img/bg/4.jpg);">


    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
        <h5 class="mb-7">Create an account</h5>
        <div class="tampil">
          
        </div>
        
        <form>
          <div class="form-group">
            <input type="text" class="form-control" name="f_name" placeholder="Your F_Name">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="l_name" placeholder="Your L_Name">
          </div>

          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address">
          </div>

          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>

          <div class="form-group">
            <input type="password" class="form-control" name="repassword" placeholder="Password (confirm)">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="address1" placeholder="address1">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="address2" placeholder="address2">
          </div>

          <div class="form-group py-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input">
              <label class="custom-control-label">I agree to the <a class="ml-1" href="terms.html">terms of service</a></label>
            </div>
          </div>

          <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Register</button>
          </div>
        </form>

        <div class="divider">Or Register With</div>
        <div class="text-center">
          <a class="btn btn-circle btn-sm btn-facebook mr-2" href="#"><i class="fa fa-facebook"></i></a>
          <a class="btn btn-circle btn-sm btn-google mr-2" href="#"><i class="fa fa-google"></i></a>
          <a class="btn btn-circle btn-sm btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
        </div>

        <hr class="w-30">

        <p class="text-center text-muted small-2">Already a member? <a href="user-login.html">Login here</a></p>
      </div>

    </main><!-- /.main-content -->


    <!-- Scripts -->
    <script src="assets/js/page.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="bsv4/js/bootstrap.min.js"></script>
    <script>

      $(".btn").click(function(event){
      event.preventDefault();
      var f_name = $("input[name=f_name]").val();
      var l_name = $("input[name=l_name]").val();
      var email = $("input[name=email]").val();
      var password = $("input[name=password]").val();
      var repassword = $("input[name=repassword]").val();
      var address1 = $("input[name=address1]").val();
      var address2 = $("input[name=address2]").val();

      $.ajax({
        url   : "register_cs.php",
        method  : "POST",
        data  : {f_name:f_name, l_name:l_name, email:email, password:password, repassword:repassword, address1:address1, address2:address2},
        success : function(data){
          
          $(".tampil").html(data);
        }
      });
    });
    </script>

  </body>
</html>
