<!DOCTYPE html>
<html lang="en">
<?php
include("config.php");
include("crawler.php");
$koneksi= koneksi_db();
?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fabelio Price Monitor</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">

  </head>

  <body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Welcome to Fabelio!</span>
      <!-- <span class="site-heading-lower">Business Casual</span> -->
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-3" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active px-lg-3">
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item px-lg-3">
              <a class="nav-link text-uppercase text-expanded" href="products.php">Products</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/intro.jpg" alt="">
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Fabelio</span>
              <span class="section-heading-lower">Price Monitor</span>
            </h2>
            <form method="post">
            <p class="mb-3">
              <div class="form-group">
                <input type="text" class="form-control" id="main_url" name="main_url" placeholder="Product Link">
              </div>
            </p>
            <div class="intro-button mx-auto">
              <!-- <a class="btn btn-primary btn-xl" href="#">Check!</a> -->
              <input type="submit" name="submit" class="btn btn-primary btn-xl" onclick="myFunction()" value="Check !" />
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php
        if(isset($_POST['main_url'])){
            $query = $_POST['main_url'];
			
        //}

        // if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
        //     $query = htmlspecialchars($query);
        //     $query = mysql_real_escape_string($query);
			crawling();

            $raw_results = mysql_query("SELECT * FROM crawl
                            WHERE (`internal_link` LIKE '%".$query."%')") or die(mysql_error());

                if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
                     while($results = mysql_fetch_array($raw_results)){
                         echo "<script language='javascript'>alert('ada');</script>";
                    }
                 }else {
                     echo "<script language='javascript'>alert('tidak ada');</script>";
                 }

            }
     ?>


    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
