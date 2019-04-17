<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../bd/init.php';
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LeaderBoard</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">

</head>

<body id="page-top">
<?php include('navbar.php');?>
  <!-- Page Wrapper -->
  

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tabela de classificação</h1>
          <p class="mb-4">Os cães serão ordenados pela sua classificação e quantidade de votos por parte dos jurados.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Classificações actuais.</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

  
  
			
	
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Ano de Nascimento</th>
                      <th>Número CHIP</th>
                      <th>Raça</th>
                      <th>Classificação</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Ano de Nascimento</th>
                      <th>Número CHIP</th>
                      <th>Raça</th>
                      <th>Classificação</th>
                      
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
		
		$mysqli = db_connect();
		
		$query = "SELECT * FROM participantes";
		$result = $mysqli->query($query);
	
		while($row = $result->fetch_array())
		{
      $chip = $row['numero_chip'];
			?>
			
			<tr>
				<td><?php echo $row['id'];?></a></td>
				<td><?php echo $row['nome'];?></td>
				<td><?php echo $row['ano_nasc'];?></td>
				<td><?php echo $row['numero_chip'];?></td>
				<td><?php echo $row['raca'];?></td>
        <td><?php if($row['classificacao'] == NULL)
                  {
                    echo "0";
                  }
                  else
                  {
                    echo $row['classificacao'];
                  }?></td>
        
        
				<?php //$count = $count + 1;
						//if($count>4)
						//{
						//	exit;
						//}?>
      </tr>
      <tr align="center">
      <?php if($_SESSION['user_nivel'] == 1 && $row['classificacao'] == NULL)
        {?>
        <td colspan="42">
          <a class="btn btn-primary" data-toggle="collapse" href="#a<?php echo $chip;?>" role="button" aria-expanded="false" aria-controls="collapseExample"><b>Votar</b></a>
          <div class="collapse" id="a<?php echo $chip;?>">
            <div class="card card-body">
              <table>
                <tr>
              
				<td colspan="5"><img height="281.25px" width="500px"src="participar/uploads/<?php echo $row['img'];?>"></td>
				<td rowspan="2">
        <style>
        input[type="number"] {
   width:200px;
}</style>
          <form action="votar.php" method="post">
            Classificação de 0 a 20 <input width="100px" type="number" name="classificacao" id="classificacao" min="0" max="20" placeholder="Classificação de 0 a 20">
            <input type="hidden" id="img" name="img" value="<?php echo $row['img'];?>">
            <input type="submit" value="Validar">
            </form>
        </td>
				<?php //$count = $count + 1;
						//if($count>4)
						//{
						//	exit;
						//}?>
      
            </div>
          </div>


        </td></tr></table><?php
        }
        else if($_SESSION['user_nivel'] == 1 && $row['classificacao'] > 0)
        {?>
          <td colspan="42"><b><?php echo "Votação já efetuada.";?></b></td><?php
        }?>
        
      </tr>
      









      <?php 
    }
    $mysqli->close();?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../index.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
