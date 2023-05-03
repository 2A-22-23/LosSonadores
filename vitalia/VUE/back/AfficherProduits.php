<?php
include  "../../Controller/CategorieC.php";
include  "../../Controller/ProduitC.php";

$catC= new CategorieC();
$prodC= new ProduitC();
    $liste=$prodC->afficherProduits();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Afficher Produits</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
<?php include'navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include'sidebar.php' ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Produits</p>
                  <div class="table-responsive">
                                            <form>
                                                <input type="text" value="" class="form-control" placeholder="Recherche..."  id="rech">
                                            </form>

                    <table class="table table-striped table-borderless">
                      <thead>
                      <tr>
                                <th>Nom</th>
                                <th>Categorie</th>
                                <th>Prix</th>
                                <th>Image</th>
                                <th>Informations</th>
                                <th>Action</th>
                      </tr>
                      </thead>
                      <tbody id="tableau">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
    <?php include'footer.php' ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <script type = "text/javascript">
        $(document).ready(function(){
            load_data();
            function load_data(str)
            {
                $.ajax({
                    url:"AjaxProduit.php",
                    method:"post",
                    data:{str:str},
                    success:function(data)
                    {
                        $('#tableau').html(data);
                    }
                });
            }

            $('#rech').keyup(function(){
                var recherche = $(this).val();
                if(recherche != '')
                {
                    load_data(recherche);
                }
                else
                {
                    load_data();
                }
            });
        });
    </script>

</body>

</html>
