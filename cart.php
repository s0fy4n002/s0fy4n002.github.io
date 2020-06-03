<html>
    <head>
        <meta charset="utf-8">
        <title>Sofyan Store</title>
        <link rel="stylesheet" href="bsv4/css/bootstrap.min.css">
        <link rel="stylesheet" href="bsv4/fa/css/all.min.css">
        <script src="bsv4/js/jquery.js"></script>
        <script src="bsv4/js/popper.js"></script>
        <script src="bsv4/js/bootstrap.min.js"></script>
        <script src="bsv4/fa/js/all.min.js"></script>
        <script src="main.js"></script>
    </head>
    
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
                  <a class="navbar-brand" href="index.php">Navbar</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i class="fas fa-fw fa-sm fa-home"></i>Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-fw fa-sm fa-clipboard"></i>Product</a>
                  </li>
                  <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                </form> 

                </ul>
                <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                    <a class="nav-link" href="cart.php">
                      <i class="fas fa-fw fa-sm fa-shopping-cart"></i>Cart
                    </a>
              </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="login.php"><i class="fas fa-fw fa-user fa-sm"></i>Sign</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="register.php"><i class="fas fa-fw fa-user fa-sm"></i>SignUp</a>
                  </li>
                </ul>

                
              </div>
          </div>
        </nav>

        <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="card mt-4">
                  <div class="card-header bg-succeess">
                    <div class="row">
                      <div class="col-md-3">Sl.No</div>
                      <div class="col-md-3">Image</div>
                      <div class="col-md-3">Product</div>
                      <div class="col-md-3">Price in $</div>
                    </div>
                  </div>
                  <div class="card-body"></div>
                  <div class="card-footer bg-succeess"></div>
                </div>
              </div>
          </div>
        </div>
    </body>
</html>