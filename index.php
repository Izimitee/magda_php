<!DOCTYPE html>
<?php
require_once 'bd/init.php';


$mysqli = db_connect();
$query = "select * from juizes;";
//------------------------------------------------------------------------------

$query = "SELECT * FROM juizes_texto,regulamento";
$query2 = "Select count(*) as id from participantes";
$query3 = "Select count(*) as edicoes from concursos";
$query_juiz = "Select count(*) as juiz from users where level = 1";
	if($result = $mysqli->query($query)){
			$user = $result->fetch_assoc();
		if (count($user) <= 0)
		{
			exit;
		}	 
		session_start();
		//header('Location: backoffice/');
  }
  $facto = 0;
  if($result = $mysqli->query($query2)){
	    $facto = $result->fetch_assoc()['id'];
    
		
		//header('Location: backoffice/');
  }
  $facto_edicao = 0;
  if($result = $mysqli->query($query3)){
    $facto_edicao = $result->fetch_assoc()['edicoes'];
  
  
  //header('Location: backoffice/');
}
$facto_juiz = 0;
if($result = $mysqli->query($query_juiz)){
  $facto_juiz = $result->fetch_assoc()['juiz'];


//header('Location: backoffice/');
}
	



?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Concurso do Cãodela</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Modal Images from Edições-->
  <link rel="stylesheet" href="css/modal.css">
  <script src="js/modal.js"></script>

  <!-- =======================================================
    Theme Name: Regna
    Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!--<a href="#hero"><img src="" alt="" title="" /></img></a>-->
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="#hero">CAODELA</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#team">Juízes</a></li>
          <li><a href="#services">Parcerias</a></li>
          <li><a href="#portfolio">Edições</a></li>
          <li><a href="#contact">Contacto</a></li>
          <!--<li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>-->
          <!--<li><a href="#call-to-action">Regulamento</a></li>-->
          <li><a href="login/index.php">Entrar</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <h1>Concurso do Cãodela</h1>
      <h2>Concurso canino com votação e prémios</h2>
      <a href="#call-to-action" class="btn-get-started">Regulamento</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Factos</h3>
          <p class="section-description">Texto relacionado com os factos.</p>
        </div>
        <div class="row counters">
          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $facto;?></span>
            <p>Total de participantes em edições anteriores</p>
				  </div>

          

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $facto_edicao;?></span>
            <p>Edições</p>
		      </div>

      	  <div class="col-lg-4 col-6 text-center">
	          <span data-toggle="counter-up"><?php echo $facto_juiz;?></span>
	          <p>Número total de Juízes</p>
		      </div>
		    </div>
      </div>
    </section><!-- #facts -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container wow fadeIn">
          <div class="section-header">
            <h3 class="section-title">Parcerias</h3>
            <p class="section-description">Os nossos agradecimentos às seguintes entidades, sem as quais o nosso concurso, não seria possível.</p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
              <div class="box">
                <div class="icon"><a href=""><img src="pata.png" height="32px" width="32px"></a></div>
                <h4 class="title"><a href="">Feira Regional Caça e Pesca</a></h4>
                <p class="description">No presente ano, o concurso Cãodela, está inserido na Feira nacional de Caça e Pesca.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
              <div class="box">
                <div class="icon"><a href=""><img src="pata.png" height="32px" width="32px"></a></div>
                <h4 class="title"><a href="">Aprovado pela FPC</a></h4>
                <p class="description">Concurso aprovado pela Federação Portuguesa de Canicultura</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
              <div class="box">
                <div class="icon"><a href=""><img src="pata.png" height="32px" width="32px"></a></div>
                <h4 class="title"><a href="">Parceria Royal Canin</a></h4>
                <p class="description">Todos os prémios alimentares são fornecidos pela marca de qualidade Royal Canin.</p>
              </div>
            </div>
          </div>
        </div>
      </section><!-- #services -->

    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <?php echo $user["reg_text"];?>
                </div>
            </div>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Edições</h3>
          <p class="section-description">Texto relacionado com as edições.</p>
        </div>
        <div class="row">

          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <?php
              $query_edicoes = "SELECT * FROM concursos order by ano DESC";
              $result1 = $mysqli->query($query_edicoes);
              ?><li data-filter=".filter-2019, .filter-card, .filter-logo, .filter-web" class="filter-active">Todas</li><?php
              while($row = $result1->fetch_array())
              {
                echo '<li data-filter=".filter-'.$row['ano'].'">'.$row['ano'].'</li>';
              }
              
              ?>
              
              
            </ul>
          </div>
        </div>
        <div class="row" id="portfolio-wrapper">
        <?php
        $query_busca_cao = "SELECT * FROM participantes left join concursos on participantes.concurso_id = concursos.id";
        $result2 = $mysqli->query($query_busca_cao);
        while($row = $result2->fetch_array())
              {
                ?><div class="col-lg-3 col-md-6 portfolio-item filter-web filter-<?php echo $row['ano'];?>">
                    <a href="">
                      <img src="backoffice/participar/uploads/<?php echo $row['img'];?>" alt="" style="max-width: 100%;max-height: 100%;">
                      <div class="details">
                        <h4><?php echo $row['nome'];?></h4>
                        <span>Participante na edição de <?php echo $row['ano'];?></span>
                      </div>
                    </a>
          </div>
              <?php
              
              }
              $mysqli->close();
        
        ?>





        
          

        </div>

      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Juízes</h3>
          <p class="section-description">Texto relacionado com os Juízes.</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo $user["j1_cam"];?>" alt=""></div>
              <h4><?php echo $user['j1_nome'];?></h4>
              <span><?php echo $user['j1_prof'];?></span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo $user["j2_cam"];?>" alt=""></div>
              <h4><?php echo $user['j2_nome'];?></h4>
              <span><?php echo $user['j2_prof'];?></span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo $user["j3_cam"];?>" alt=""></div>
              <h4><?php echo $user['j3_nome'];?></h4>
              <span><?php echo $user['j3_prof'];?></span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?php echo $user["j4_cam"];?>" alt=""></div>
              <h4><?php echo $user['j4_nome'];?></h4>
              <span><?php echo $user['j4_prof'];?></span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Contacto</h3>
          <p class="section-description">Texto relacionado com o Contacto.</p>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
      -->
      <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>caodela@gmail.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensagem"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Enviar Mensagem</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Regna</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
