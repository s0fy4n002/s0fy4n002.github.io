<html>
    <head>
        <meta charset="utf-8">
        <title>Sofyan Store</title>
        <link rel="stylesheet" href="bsv4/css/bootstrap.min.css">
        <link rel="stylesheet" href="bsv4/fa/css/all.min.css">
        
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
                    	<i class="fas fa-fw fa-sm fa-shopping-cart"></i>Cart <span class="badge badge-light">9</span>
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
        	<div class="row mt-4">
        		<div class="col-md-2">
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
        		<div class="col-md-10">

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
    </body>
</html>
