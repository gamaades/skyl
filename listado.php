<?php
  //require_once 'network/databaseconnect.php';
  require_once 'network/conexion.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
  <!--<![endif]-->
  <head>
    <meta charset="utf-8" />
    <title id="page-title">Color Admin | Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
      name="viewport"
    />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link
      href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet"
    />
    <link
      href="./assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css"
      rel="stylesheet"
    />
    <link
      href="./assets/plugins/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="./assets/plugins/font-awesome/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link href="./assets/css/animate.min.css" rel="stylesheet" />
    <link href="./assets/css/style.min.css" rel="stylesheet" />
    <link href="./assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="./assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="./assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
  </head>
  <body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
      <!-- begin #header -->
      <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
          <!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> Listado</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
        </div>
        <!-- end container-fluid -->
      </div>
      <!-- end #header -->

      <!-- begin #sidebar -->
      <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
          <!-- begin sidebar user -->
          <ul class="nav">
            <li class="nav-profile">
              <div class="image">
                <a href="javascript:;"
                  ><img src="./assets/img/user-13.jpg" alt=""
                /></a>
              </div>
              <div class="info">
                Gustavo Mañán
                <small>Front end developer</small>
              </div>
            </li>
          </ul>
          <!-- end sidebar user -->
          <!-- begin sidebar nav -->
          <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub active">
              <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="fa fa-laptop"></i>
                <span>Dashboard</span>
              </a>
              <ul class="sub-menu">
                <li>
                  <a href="index.php" data-toggle="ajax">Buscar</a>
                </li>
                <li class="active">
                  <a href="listado.php" data-toggle="ajax">Listado</a>
                </li>
                <li>
                  <a href="agregar.php" data-toggle="ajax">Agregar</a>
                </li>
              </ul>
            </li>
            
            <li>
              <a
                href="javascript:;"
                class="sidebar-minify-btn"
                data-click="sidebar-minify"
                ><i class="fa fa-angle-double-left"></i
              ></a>
            </li>
            <!-- end sidebar minify button -->
          </ul>
          <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
      </div>
      <div class="sidebar-bg"></div>
      <!-- end #sidebar -->

      <!-- begin #ajax-content -->
      <!-- begin #content -->
<div id="content" class="content">
    <!-- begin page-header -->
    <h1 class="page-header">Listado de Libros <small>...</small></h1>
    <!-- end page-header -->
    
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="table-basic-7">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Libros</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Fecha de lanzamiento</th>
                                    <th>Descripción</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                    <th>Me gusta</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php //instanciamos la clase conexion
                                    $_conexion = new conexion;
                                    //creamos la consulta SELECT
                                    $query= "SELECT idLibro, titulo, fechaLanzamiento, Autor, descripcion, meGusta FROM libros AS L INNER JOIN autores AS A ON L.idAutor=A.idAutor";
                                    //enviamos la consulta para ser ejecutada
                                    $datosRecibidos = $_conexion->obtenerDatos($query);
                                    // $query= "INSERT INTO libros (idLibro, titulo, fechaLanzamiento, idAutor, idCategoria, idEditorial, idioma, descripcion, favorito, meGusta) VALUES (NULL, 'El Hobbit 2', '2010-03-07', '1', '1', '1', 'Ingles', 'Bueno', NULL, NULL)";
                                    // $rs = $_conexion->nonQuery($query);
                                    // echo $rs;
                                    $cont=1;
                                    // var_dump($datosRecibidos);
                                    foreach ($datosRecibidos as $valor){
                                    ?>
                                <tr>
                                    <td><?php echo $cont; $cont++; ?></td>
                                    <td><?php echo $valor["titulo"]; ?></td>
                                    <td><?php echo $valor["Autor"]; ?></td>
                                    <td><?php echo $valor["fechaLanzamiento"]; ?></td>
                                    <td><?php echo $valor["descripcion"]; ?></td>
                                    <td>
                                      <form action="modificar.php" method="POST">
                                        <input type="hidden" name="txtId" value="<?php echo trim($valor["idLibro"]); ?>" >
                                        <button type="submit" class="btn btn-sm btn-primary">modifica</button>
                                      </form></td>
                                    <td>
                                      <a href="elimina.php?id=<?php echo $valor["idLibro"] ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                    <td><form action="modMG.php" method="POST">
                                      <input type="hidden" name="txtIdLibro" value="<?php echo $valor["idLibro"]; ?>">
                                      <?php
                                        $estado = "";
                                        if ($valor["meGusta"] === "1") { 
                                          $estado = 0;
                                        } else if ($valor["meGusta"] === "0") {
                                          $estado = 1;
                                        } else {
                                          $estado = 1;                                          
                                        }
                                      ?>
                                      <input type="hidden" name="txtMG" value="<?php echo $estado; ?>">
                                      <button type="submit" class="btn btn-sm btn-success"><?php if ($valor["meGusta"] === "1") { echo "<3"; } else if ($valor["meGusta"] === "0") { echo "< / 3"; } else { echo "< / 3"; } ?></button>
                                    </form>
                                  </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->
      <!-- end #ajax-content -->

      <!-- begin scroll to top btn -->
      <a
        href="javascript:;"
        class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
        data-click="scroll-top"
        ><i class="fa fa-angle-up"></i
      ></a>
      <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="./assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="./assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="./assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/plugins/jquery-hashchange/jquery.hashchange.min.js"></script>
    <script src="./assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="./assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="./assets/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script>
      $(document).ready(function () {
        App.init();
        App.restartGlobalFunction();
        App.setPageTitle('Color Admin | Basic Tables');
      });
    </script>
  </body>
</html>
