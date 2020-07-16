
<!DOCTYPE php>
<php lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logos/favicon.ico">
  <link rel="icon" type="image/png" href="../assets/img/logos/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administração e Controle
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/now-ui-dashboard.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  </head>

<!-- inicializando a sessao -->
<?php session_start(); ?>
<?php
if(!isset($_SESSION["emailOng"])) { header("../CadastroOngs/index.php"); }

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

<div class="wrapper">
    <div class="sidebar" data-color="blue" >
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <img src="<?php echo $ong->getFotoOng(); ?>" alt="">
        </a>
        <a href="#" class="simple-text logo-normal">
                  
        <!-- Nome do usuario -->
        <?php echo $ong->getNomeOng(); ?>
        <!-- Nome do usuario -->
        
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
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
          <li class="nav-item dropdown active">
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
              <!-- <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Pesquise...">
                <div class="input-group-append">
                  <div class="input-group-text ">
                   <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form> -->
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
                  <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./arquivados.php"><i class="now-ui-icons files_box"> </i>Arquivados</a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item " href="../logout.php"><i class="now-ui-icons media-1_button-power text-danger"></i>Sair</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <?php
        try {
            $postagem = new Postagem();
            $postagem->setIdOng($_SESSION["idOng"]);
            $lista = $postagem->ListarPostagens($postagem);
        } catch(Exception $e) {
            echo '<pre>';
                print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }
    ?>


        <!-- Modal de Edicao -->
      <div id="modalEdicao" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="../Postagem/editar-postagem.php" method="post">
              <div class="modal-body">
                <span id="visul_postagem"></span>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Salvar as Alterações</button>
              </div>
            </form>
          </div>
        </div>
      </div>


      <!-- Modal de Exclusao -->
      <div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Deseja Exlcuir a Postagem?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="../Postagem/excluir-postagem.php" method="post">
                
                  <span id="delete_postagem"></span>
                
            <div class="modal-footer">
              <button type="button" class="btn" style="background-color:#636e72" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn" style="background-color:#d63031">Excluir</button>
            </form>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal Sucesso -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo$_SESSION["nomeOng"] ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <?php if(isset($_SESSION['mensagem'])){
                echo $_SESSION['mensagem'];
              }
              ?>
              
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            
          <?php foreach ($lista as $linha) { ?>
            <div class="card">
              <div class="card-header">
                <h6 class="card-title"> Postagem </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <a class="nav-link p-0" href="#">
                            <img src="<?php echo $ong->getFotoOng(); ?>" class="rounded-circle z-depth-0"
                              alt="avatar image" height="90" width="100"> 
                          </a>
                        </td>
                        <td style="height: 100%;width: 70%;">
                          <p class="form-control" rows="3" style="border: none; max-height: 700px;" ><?php echo $linha['descPostagem']; ?></p>
                        </td>
                        <td>
                          <button type="button" class="btn view_data" style="background-color:#293985" id="<?php echo $linha['idPostagem']; ?>">Editar</button>
                        </td>
                        <td>
                          <button type="button" class="btn delete_data" style="background-color:#d63031"  id="<?php echo $linha['idPostagem']; ?>">Excluir</button>
                        </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <?php } ?>
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
      $(document).on('click', '.view_data', function(){
        var id = $(this).attr("id");
        if(id !== ""){
          var dados = {
            id: id
          };
          $.post('modalPostagem.php', dados, function(retorna){
            $('#visul_postagem').html(retorna);
            $('#modalEdicao').modal('show');
            /* alert(retorna) */
          });
        }
      });

    });

  </script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '.delete_data', function(){
            var id = $(this).attr("id");
            if(id !== ""){
              var dados = {
                del: id
              };
              $.post('modalPostagem.php', dados, function(retorna){
                $('#delete_postagem').html(retorna);
                $('#modalExclusao').modal('show');
                /* alert(retorna) */
              });
            }
          });
      });

  </script>

  <script>

    $(document).ready(function(){
        var sessao = "<?php echo $_SESSION['mensagem']; ?>";
        if(sessao){
            $('#myModal').modal('show');
        }
        
    });
    <?php
    unset($_SESSION['mensagem']);
    ?>

  </script>

