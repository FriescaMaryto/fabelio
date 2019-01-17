<!DOCTYPE html>
<html lang="en">
<?php
include("config.php");
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
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="products.php">Products</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <?php
        $koneksi= koneksi_db();
        $id = $_GET['id_p'];
        $sql  = "select * from product where id_p='$id'";
        $aksi = mysql_query($sql,$koneksi) or die(mysql_error());

        while($data = mysql_fetch_array($aksi)){
     ?>

    <section class="page-section about-heading">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/<?php echo $data['image']; ?>" alt="">
        <div class="about-heading-content">
          <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
              <div class="bg-faded rounded p-5">
                <h2 class="section-heading mb-4">
                  <span class="section-heading-lower"><?php echo $data['judul']; ?></span>
                  <?php echo "Rp " .number_format($data['harga']); ?>
                </h2>
                <p><?php echo $data['deskripsi']; ?></p>
                <table class="table">
                                      <thead class="bg-warning">
                                          <tr>
                                              <th scope="col">Price</th>
                                              <th scope="col">Time</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td> <?php echo "Rp " .number_format($data['harga']); ?></td>
                                              <td><?php echo $data['date_added']; ?></td>
                                          </tr>
                                      </tbody>
                                      <?php
                                          }
                                      ?>
                </table>
              </div>
            </div>
            <!--tes-->

          </div>
        </div>
      </div>
    </section>



    <section class="page-section cta">
       <div class="container">
         <div class="row">
           <div class="col-xl-9 mx-auto">
               <form method="post" action='addcomment.php'>
                  <div class="form-row">
                      <input type="hidden" value="<?php echo $data['id_p']; ?>" id="id_p" name="id_p">
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Title" name="title">
                    </div>
                    <div class="col-7">
                      <input type="text" class="form-control" placeholder="Add a Comment" name="comment">
                    </div>
                    <div class="col">
                        <input type="submit" name="submit" class="btn btn-success" value="Comment" />
                    </div>
                  </div>
                </form>
               <br />
               <?php
                   $display  = "select * from comment where id_p='$id'";
                   $d_display = mysql_query($display,$koneksi) or die(mysql_error());

                   while($v_display = mysql_fetch_array($d_display)){

                ?>

               <div class="card">
                  <h5 class="card-header">
                      <a href="addcomment.php?upvt=<?php echo $v_display['id']; ?>&id=<?php echo $v_display['id_p']; ?>" name="addscore" class="btn btn-primary">upvote</a>
                      <a href="addcomment.php?dnvt=<?php echo $v_display['id']; ?>&id=<?php echo $v_display['id_p']; ?>" name="addscore" class="btn btn-primary">downvote</a>
					  <a><?php echo $v_display['score']; ?></a>
                  </h5>
                  <div class="card-body">
                    <h5 class="card-title"> <?php echo $v_display['title']; ?> </h5>
                    <p class="card-text"> <?php echo $v_display['comment']; ?> </p>

                  </div>
                </div>

                <?php
                    }
                 ?>
           </div>
         </div>
        </div>
    </section>

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