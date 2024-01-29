<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('Renacyt')</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Docentes Investigadores - UNA Puno" name="keywords">
  <meta content="RENACYT UNAP" name="description">

  <link href="logo-unap.png" rel="icon">
  <link rel="stylesheet" href="css/catalogo.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/ionicons.min.css" rel="stylesheet">
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <link href="css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!--añaido-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

  <!-- del forms-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="http://vriunap.pe/renacyt" class="scrollto"> <img src="img/logo.png" alt="" class="img-fluid"></a>
        <a href="http://vriunap.pe/renacyt" class="scrollto"> <img src="img/renacyt.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="https://vriunap.pe/renacyt/web/cronograma"> Cronograma</a></li>
          <li><a href="https://samuelcalderon.shinyapps.io/caluladora-renacyt/"> Calculadora </a></li>
          <!-- <li><a href="/renacyt/web/lista/"> Lista Docentes </a></li> -->
          <li><a href="https://vriunap.pe/renacyt/web/login"> Salir </a></li>
        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->

<style>
#introB {
    width: 100%;
    position: relative;
    background: url("/vriadds/siraa/img/intro-bg-1.png") center top no-repeat;
    background-size: auto;
    background-size: cover;
    padding: 100px 0 20px 0;
    height: 170px;

    background: #1a4ab7;
}

.section-header p{
    text-align: justify;
    margin: auto;
    font-size: 15px;
    padding-bottom: 30px;
    color: #c4740c;
    width: 94%;
}
.bg-custom {
    border: 2px solid #e5e2e2; /* Borde blanco de 2px #f4efef*/
}
</style>

  <!--==========================
    Intro Section
  ============================-->
  <section id="introB" class="clearfix">
    <div class="container">

      <div class="intro-info">
        <big style="color:rgb(255, 255, 255);"><b >RENACYT</b> UNA PUNO </big>
        <h3 style="color:white; font-size: 0.9em"> Plataforma para docentes investigadores de la UNA PUNO </h3>
      </div>

    </div>
  </section><!-- #intro -->
  <div class="w-100 my-1"></div>

<style>

    /* Estilos base para el sidebar */
    .sidebar {
        width: 300px !important; /* Ancho por defecto */
        transition: width 0.3s; /* Transición suave del ancho */
    }


    .sidebar .nav-item .nav-link {
        width: 100%; /* Ocupar todo el ancho disponible */
    }
    #collapseFor {
        overflow: hidden;
    }

</style>


<body id="page-top">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <!-- página -->
            <div id="wrapper">

                <!-- Barra lateral -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                    <!-- Barra lateral - Marca -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                        <div class="sidebar-brand-text mx-3">Docente Investigador</div>
                    </a>

                    <!-- Dividir -->
                    <hr class="sidebar-divider my-0 border-white">

                    <!-- Elemento de navegación - Docente -->
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}"> 
                            <span>Evaluación docente</span></a>
                    </li>

                    <!-- Dividir -->
                    <hr class="sidebar-divider border-white">

                    <!-- Título -->
                    <div class="sidebar-heading">
                        ACTIVIDADES
                    </div>

                    <!-- 1 -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-book" aria-hidden="true"></i> 
                            <span>Productos de Investigación</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Componentes:</h6>
                                <a class="collapse-item" href="{{ url('piarticulos.piarticulo') }}">Articulo</a>
                                <a class="collapse-item" href="{{ url('pidocumentos.pidocumento') }}">Documentos</a>
                            </div>
                        </div>
                    </li>
                    <!-- 2 -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFrh"
                            aria-expanded="true" aria-controls="collapseFrh">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            <span>Formación de Recursos Humanos</span>
                        </a>
                        <div id="collapseFrh" class="collapse" aria-labelledby="headingFrh" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Componentes:</h6>
                                <a class="collapse-item" href="{{ url('frhtesis.frhtesi') }}">Tesis</a>
                                <a class="collapse-item" href="{{ url('frhlibros.frhlibro') }}">Libros</a>
                            </div>
                        </div>
                    </li>
                    <!-- 3 -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('gesis.gesi') }}">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <span>Gestión de la Investigación</span></a>
                    </li>
                    <!-- 4 -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePgi"
                            aria-expanded="true" aria-controls="collapsePgi">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Participacion de Grupos de Investigación</span>
                        </a>
                        <div id="collapsePgi" class="collapse" aria-labelledby="headingPgi" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Componentes:</h6>
                                <a class="collapse-item" href="{{ url('pgi1s.pgi1') }}">Proyectos</a>
                                <a class="collapse-item" href="{{ url('pgi2s.pgi2') }}">Registro de Investigación</a>
                            </div>
                        </div>
                    </li>
                    <!-- 5 -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('evalis.evali') }}">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Evaluación de la Investigación</span></a>
                    </li>
                    <!--dividir-->
                    <hr class="sidebar-divider my-1 border-white">

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFor"
                            aria-expanded="true" aria-controls="collapseFor">
                            <i class="fa fa-book" aria-hidden="true"></i> 
                            <span>Control Formularios</span>
                        </a>
                        <div id="collapseFor" class="collapse" aria-labelledby="headingFor" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Formularios:</h6>
                                <a class="collapse-item" href="docentes">Docentes</a>
                                <a class="collapse-item" href="{{ url('piarticulos') }}">Productos de Investigación - Articulo</a>
                                <a class="collapse-item" href="{{ url('pidocumentos') }}">Productos de Investigación - Documentos</a>
                                <a class="collapse-item" href="{{ url('frhtesis') }}">Formación de Recursos HumanosTesis</a>
                                <a class="collapse-item" href="{{ url('frhlibros') }}">Formación de Recursos HumanosLibro</a>
                                <a class="collapse-item" href="{{ url('gesis') }}">Gestion de la Investigación</a>
                                <a class="collapse-item" href="{{ url('pgi1s') }}">Participación de Grupos de Investigación - Proyectos</a>
                                <a class="collapse-item" href="{{ url('pgi2s') }}">Participación de Grupos de Investigación - Registro de Investigación</a>
                                <a class="collapse-item" href="{{ url('evalis') }}">Evaluación de la Investigación</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePro"
                          aria-expanded="true" aria-controls="collapsePro">
                          <i class="fa fa-book" aria-hidden="true"></i> 
                          <span>Control Progreso</span>
                      </a>
                      <div id="collapsePro" class="collapse" aria-labelledby="headingPro" data-parent="#accordionSidebar">
                          <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Formularios:</h6>
                              <a class="collapse-item" href="{{ route('mostrar-datos-externos') }}">Progresos</a>
                          </div>
                      </div>
                  </li>

                    <!-- Dividir -->
                    <hr class="sidebar-divider d-none d-md-block">

                </ul>
                <!-- Fin de la barra lateral -->

                <!-- contenido -->

                <div id="content-wrapper" class="d-flex flex-column">
                <hr class="sidebar-divider m-0"> 
                    <!-- Contenido principal -->
                    <div id="content">

                        <!-- Barra superior -->
                        <nav class="navbar navbar-expand-lg navbar-light bg-custom topbar mb-4 static-top shadow">

                          <!-- Alternar barra lateral (barra superior) -->
                          
                          <!-- Barra de navegación de la barra superior -->
                          <ul class="navbar-nav ml-auto">
                      
                              <div class="topbar-divider d-none d-sm-block"></div>
                      
                              <!-- Elemento de navegación: información del usuario -->
                              <li class="nav-item dropdown no-arrow">
                                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                      <img class="img-profile rounded-circle"
                                          src="img/docent.png">
                                  </a>
                                  <!-- Menú desplegable - Información del usuario -->
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                      aria-labelledby="userDropdown">
                                      <a class="dropdown-item" href="#">
                                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                          Perfil
                                      </a>
                                      <a class="dropdown-item" href="#">
                                          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                          Ajustes
                                      </a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="/salir" data-toggle="modal" data-target="#logoutModal">
                                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                          Cerrar sesión
                                      </a>
                                  </div>
                              </li>
                      
                          </ul>
                      
                      </nav>
                      
                        <!-- inicio cont -->
                        
                        @yield('contenido')
                        <!-- cont fin -->
                    </div>
                </div>
            </div>
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- cerrar sesión Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere salir?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <a class="btn btn-primary" href="/salir'); ?>">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<div class="w-100 my-1"></div>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>RENACYT UNAP</h3>
            <p>Plataforma virtual de seguimiento y monitoreo para docentes investigadores UNA PUNO, el público usuario son todos los miembros de la comunidad universitaria que busque ser reconocido como investigador además de en el CONCYTEC en nuestra casa superrior de Estudios.</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Mapa de Sitio</h4>
            <ul>
              <li><a href="../">Inicio</a></li>
              <li><a href="web/lista">Listado</a></li>
              <li><a href="web/ingreso">Ingreso</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contacto</h4>
            <p>
              C.U. Puno<br>
              Av. Floral Nº 1153 - Puno<br>
              Puno - Perú<br>
              <strong>Telefono:</strong> +51 (051) 599430<br>
              <strong>Correo:</strong> - <br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        &copy; Oficina de Plataforma de Investigación y Desarrollo
      </div>
      <div class="credits">
        Vicerrectorado de Investigación<br>
        <strong>Universidad Nacional del Altiplano Puno 2022</strong>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="siraa/lib/jquery/jquery.min.js"></script>
  <script src="siraa/lib/jquery/jquery-migrate.min.js"></script>
  <script src="siraa/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="siraa/lib/wow/wow.min.js"></script>
  <!-- FORMS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>