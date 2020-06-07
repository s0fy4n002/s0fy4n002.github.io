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
    <style>
      
    </style>
  </head>

  <body class="layout-centered bg-img" style="background-image: url(assets/img/bg/4.jpg);">


    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
        <h5 class="mb-7">Create an account</h5>
        <div class="tampil">
          
        </div>
        
        <form id="formRegister">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="f_name" placeholder="first name" require>
                  <span class="pesan-fname d-none"></span>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="l_name" placeholder="last name" require>
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address" require>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="mobile" placeholder="phone" require>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" require>
              </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <input type="password" class="form-control" name="repassword" placeholder="Password (confirm)" require>
            </div>
            </div>
          </div>  
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="address1" placeholder="address1" require>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="address2" placeholder="address2" require>
              </div>
            </div>

          </div>

          <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Register</button>
          </div>
        </form>


        <p class="text-center text-muted small-2">Already a member? <a href="index.php">Login here</a></p>
      </div>

    </main><!-- /.main-content -->


    <!-- Scripts -->
    <script src="assets/js/page.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="bsv4/js/bootstrap.min.js"></script>
    <script>
  $(document).ready(function(){

 

    if( $("input[name=f_name]").val() == null ){
        $("input[name=f_name]").css({'background-color':'red'})
      }
  })
      
    

    

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
        url   : "proses_register.php",
        method  : "POST",
        // data  : {f_name:f_name, l_name:l_name, email:email, password:password, repassword:repassword, address1:address1, address2:address2},
        data: $("#formRegister").serialize(),
        success : function(data){
          $(".tampil").html(data);
        }
      });
    });

    
    </script>

  </body>
</html>
