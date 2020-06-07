<?php

session_start();
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}

?>

<html>

<head>
  <meta charset="utf-8">
  <title>Sofyan Store</title>
  <link rel="stylesheet" href="bsv4/css/bootstrap.min.css">
  <link rel="stylesheet" href="bsv4/fa/css/all.min.css">
 
  <style>
    .login-dropdown{
      width: 300px;
      margin-left: -130px !important;
      
    }
    .dropdown-menu{
      margin-left: -50px;
      
    }
    .form-control{
      
      box-shadow:none !important;
    }
    .form-control:focus{
      border-color:#ced4da;
    }
    
  </style>
  
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><i class="fas fa-fw fa-sm fa-home"></i>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-fw fa-sm fa-clipboard"></i>Product</a>
          </li>
          <form class="form-inline my-2 my-lg-0" id="formLogin">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" id="search" type="submit">Search</button>
          </form>

        </ul>
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle toggle-cart" href="#" id="navbarDropdownMenuLink" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-sm fa-shopping-cart"></i>Cart <span class="badge badge-light">9</span>
            </a>
            <div class="dropdown-menu cart-dropdown" aria-labelledby="navbarDropdownMenuLink">
              <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sl.No</th>
                      <th>Image</th>
                      <th>Product</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>image</td>
                      <td>Product</td>
                      <td>200</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>image</td>
                      <td>Product</td>
                      <td>200</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION["name"] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-sm fa-shopping-cart"></i> Cart</a>
                <a class="dropdown-item" href="#"><i class="fas fa-unlock"></i> Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </div>
        </li>


        </ul>


      </div>
    </div>
  </nav>

  <div class="container-fluid content">
    <div class="row mt-4">
      <div class="col-md-3">
        <div id="list-example" class="list-group mb-3">
          <div id="category"></div>
        </div>

        <!-- <div id="list-example" class="list-group mb-3">
                <a class="list-group-item active"><h5 class="text-white">Category</h5></a>
                <a class="list-group-item list-group-item-action" href="">Item 1</a>
                <a class="list-group-item list-group-item-action" href="">Item 2</a>
                <a class="list-group-item list-group-item-action" href="">Item 3</a>
                <a class="list-group-item list-group-item-action" href="">Item 4</a>
            </div> -->

        <div id="list-example" class="list-group mb-3">
          <div id="brand"></div>
          <!-- 
						<a class="list-group-item active"><h5 class="text-white">Brand</h5></a>
						<a class="list-group-item list-group-item-action" href="">Item 1</a>
						<a class="list-group-item list-group-item-action" href="">Item 2</a>
						<a class="list-group-item list-group-item-action" href="">Item 3</a>
						<a class="list-group-item list-group-item-action" href="">Item 4</a> -->
        </div>

      </div>

      <div class="col-md-9">

        <div class="card">
          <div class="card-header bg-primary text-white">
            Produk
          </div>
          <div class="card-body">
            <div class="row" id="product">






            </div !--end row--!>


          </div>


        </div>
      </div>
    </div>
  </div>



  <script src="bsv4/js/jquery.js"></script>
  <script src="bsv4/js/popper.js"></script>
  <script src="bsv4/js/bootstrap.min.js"></script>
  <script src="bsv4/fa/js/all.min.js"></script>
  <script src="main.js"></script>
  <script>

    $(".toggle-cart").click(function(){
        $(".cart-dropdown").toggle()
        $(".login-dropdown").hide()
        $(".cart-dropdown").click(function(){
            $(this).css({"display":"block", "visibility":"visible"})
        })

    })


    $(document).ready(function(){
        $(".login-toggle").click(function(){
            $(".login-dropdown").toggle()
            $(".cart-dropdown").hide()
            $(".login-dropdown").click(function(){
                $(this).css({"display":"block", "visibility":"visible"})
            })
        })
    })

    $(document).ready(function(){
        $(".content").click(function(){
            $(".cart-dropdown").hide()
            $(".login-dropdown").hide()
        })
    })
  </script>
  
</body>

</html>

