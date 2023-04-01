<?php
$valida = true;
// require_once 'network/databaseconnect.php';
if(isset($_POST['submit'])){
  // echo "hay que buscar: ".$_POST["txtBuscar"];
  $buscar = 'https://www.googleapis.com/books/v1/volumes?q='.str_replace(" ", "+",$_POST["txtBuscar"]).'+intitle';
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $buscar,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
// $desde =31;
// $hasta = strlen($response)-35;
// // echo "cantidad" . strlen($response);
//  echo " hasta" . $hasta;

curl_close($curl);
// $rest = substr($response, $desde, $hasta);
// json_encode($response);
 //var_dump($response);
//  echo $response;
// $response= json_decode($response);
// $items = $response->items;
// for ($i=0; $i < count($items); $i++) { 
//   echo $i." ".$items[$i]->selfLink."<br>";
//   echo $items[$i]->volumeInfo->title."<br>";
// }

// $items = json_encode($response->items);
//var_dump($items->kind);
// var_dump($items);
// foreach($items as $valor){
//   var_dump($valor);
// }
//var_dump($items);
//  echo $response->totalItems;
$valida= false;
}

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
					<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> Inicio</a>
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
                <li class="active">
                  <a href="index.php" data-toggle="ajax">Inicio</a>
                </li>
                <li>
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
      <div id="content" class="content">
    <!-- begin page-header -->
    <h1 class="page-header">Formulario de busqueda de libros<small>...</small></h1>
    <!-- end page-header -->
    
    <!-- begin row -->
    <?php if ($valida) { ?>
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Input Types</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Buscador</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="El señor de los anillos" name="txtBuscar" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Buscar</label>
                            <div class="col-md-9">
                                <button type="submit" name="submit" class="btn btn-sm btn-success">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
    </div>
    <!-- end row -->
    <?php } else { ?>
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
                    <h4 class="panel-title">Responsive Table</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Fecha de Publicación</th>
                                    <th>Idioma</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $response= json_decode($response);
                              $items = $response->items;
                              $cont=1;
                              for ($i=0; $i < count($items); $i++) { 
                                // echo $i." ".$items[$i]->selfLink."<br>";
                                // echo $items[$i]->volumeInfo->title."<br>";
                            
                              ?>
                                <tr>
                                  <td><?php echo $cont; $cont++; ?></td>
                                  <td><?php echo $items[$i]->volumeInfo->title."<br>" ?></td>
                                  
                                  <td><?php echo $items[$i]->volumeInfo->authors[0]."<br>" ?></td>
                                  <td><?php echo $items[$i]->volumeInfo->publishedDate."<br>" ?></td>
                                  <td><?php echo $items[$i]->volumeInfo->language."<br>" ?></td>
                                  <td>
                                    <form action="agregar.php" method="POST">
                                      <input type="hidden" name="txtLink" value="<?php echo $items[$i]->selfLink; ?>">
                                      <button type="submit" class="btn btn-sm btn-success">Agregar</button>
                                    </form>
                                  </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="index.php" class="btn btn-sm btn-primary">atras</a>
                </div>

            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
      <!-- end row  -->
    <?php } ?>
    
</div>
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
