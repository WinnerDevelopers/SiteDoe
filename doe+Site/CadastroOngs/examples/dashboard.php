

<?php session_start(); ?>
<?php
if(!isset($_SESSION["nomeOng"])) {
   header("Location: ../index.php"); 
  }

?>

<?php
    
    require_once('../global.php'); 

        try {
            $ong = new Ong();
            $ong->setIdOng($_SESSION["idOng"]);
            $ong = $ong->listarOng($ong);
        } catch(Exception $e) {
            echo '<pre>';
                print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }
?>


<?php include 'inicio.php' ?>

<div class="wrapper">
    <div class="sidebar" data-color="blue" >
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <img src="<?php echo $ong->getFotoOng(); ?>">
        </a>
        <a href="#" class="simple-text logo-normal">
                  
        <!-- Nome do usuario -->
        <?php echo $_SESSION["nomeOng"]?>
        <!-- Nome do usuario -->
        
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="./dashboard.php">
              <i class="now-ui-icons business_chart-pie-36"></i>
              <p>Painel de Controle</p>
            </a>
          </li>
          <li>
              <a href="./info-admin.php">
              <i class="now-ui-icons users_single-02"></i>
                <p>Meu perfil</p>
              </a>
          </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Campanhas
                <i class="now-ui-icons ui-1_calendar-60"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="./campanha.php">Realizar campanha</a>
                <a class="dropdown-item" href="./lista-campanha.php">Campanhas realizadas</a>
              
              </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Postagens
              <i class="now-ui-icons files_paper"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="./postagem.php">Realizar postagem</a>
              <a class="dropdown-item" href="./lista-postagem.php">Ver postagens</a>
              
            </div>
        </li>
          <li>
            <a href="./doacoes.php">
            <i class="far fa-heart"></i>
              <p>Doações</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent bg-dark navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#"><i class="now-ui-icons business_chart-pie-36"></i></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
<br>
              <!--<div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Pesquise...">
                <div class="input-group-append">
                  <div class="input-group-text ">
                   <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>-->
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <b>
                  <i class="now-ui-icons users_circle-08"></i>
                  

                  <?php echo $_SESSION["emailOng"]?>


                </b>
                  <p>
                    <span class="d-lg-none d-md-block"></span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./info-admin.php"><i class="now-ui-icons design_image"> </i>Editar foto</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./arquivados.php"><i class="now-ui-icons files_box"> </i>Arquivados</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item " href="../logout.php"><i class="now-ui-icons media-1_button-power text-danger"></i>Sair</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header">
      
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h6 class="card-title"> <?php echo $ong->getNomeOng(); ?> </h6>
<br>
                <p><?php echo $ong->getDescricaoOng(); ?></p>
                <img src="<?php echo $ong->getFotoOng(); ?>" style="widht:100px">
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="info-admin.php">Editar Perfil</a>
                    <a class="dropdown-item" href="doacoes.php">Doações</a>
                    <a class="dropdown-item" href="postagem.php">Adicionar Postagem</a>
                    <a class="dropdown-item" href="campanha.php">Adicionar Campanha</a>
                  </div>
                </div>
              </div>
              <div class="card-body" >
                
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Estatísticas:
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Status da Ong:</h5>
                <h4 class="card-title">Desde o Cadastro</h4>
              </div>
              <div class="card-body" style="height :400px;">
                <div class="table-responsive">
                <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action waves-effect">Numero total de Doações
                  <span class="badge badge-primary badge-pill pull-right">14</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Numero total de Seguidores
                  <span class="badge badge-primary badge-pill pull-right">123</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Numero total de Campanhas
                  <span class="badge badge-primary badge-pill pull-right">8</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Numero total de Postagens
                  <span class="badge badge-primary badge-pill pull-right">18</span>
                </a>
                </div>
              </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Número de Doações:</h5>
                <h4 class="card-title">Por mês</h4>
              </div>
              <div class="card-body" style="height :400px;">
              <div id="chart_div" style="width: 100%;"></div>
              </div>
              <div class="card-footer">
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Localização da Ong:</h5>
                <h4 class="card-title"><?php echo $_SESSION["logradouroOng"];
                                              echo ", "; 
                                              echo $_SESSION["numeroOng"];?></h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
                    <div class="card-body">
                      <!--Google map-->
                      <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
                        <iframe style="height: 100%; width: 100%" src="https://maps.google.com/maps?q=<?php echo $_SESSION["logradouroOng"];echo ", ";echo $_SESSION["numeroOng"];?>;&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                          style="border:0" allowfullscreen></iframe>
                      </div>
                      <!--Google Maps-->
                    </div>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Número de Seguidores:</h5>
                <h4 class="card-title">Por Mês</h4>
                </div>
                <div id="chart2_div"></div>
                <div class="card-body" style="">
                <div id="columnchart_values" style="width: 100%;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer">
        <div class=" container-fluid">
          <nav>
            <ul>
              <li>
              <a href="http://winnnerdevelopers.atwebpages.com">
                  Suporte
              </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>,  <a target="_blank">Winner&copy; </a>.
          </div>
        </div>
      </footer>
    </div>
  </div>

<!-- LINKS E FIM - PORÉM NÃO ESTÃO TODOS OS LINKS -->
 <!--   Core JS Files   -->
 <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 
</body>
</php>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
