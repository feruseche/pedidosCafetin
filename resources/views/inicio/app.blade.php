<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CAFE | www.cafeapps.com.ve</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="css/cafetin.css">

    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="shortcut icon" href="img/favicon.ico">

  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>CAFE</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Café-Apps</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
               <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @guest
                <img src="img/guest.jpg" class="user-image" alt="User Image">
              @else
                <?php
                  $user=Auth::user()->id;
                  $ruta_img = "img/usuarios/u".$user.".jpg";
                  if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/usuario/u0.jpg";}
                ?>      
                <img src="{{ $ruta_foto }}" class="user-image" alt="User Image">                   
              @endguest
              <span class="hidden-xs">
                @guest
                  Invitado
                @else
                  {{ Auth::user()->name }} 
                @endguest
            </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              
              <li class="user-header">
                @guest
                  <img src="img/guest.jpg" class="img-circle" alt="User Image">
                  <p><small>Invitado</small></p>
                @else
                  <img src="{{ $ruta_foto }}" class='img-circle' alt='User Image'>
                  <p>{{ Auth::user()->name }}<small>{{ Auth::user()->email }}</small></p>
                @endguest
              </li>
              <!-- Menu Body 
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                @guest
                  <div class="pull-left">
                    <a href="login" class="btn btn-default btn-flat">Login</a>
                  </div>
                @else
                  <div class="pull-right">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </div>
                @endguest
              </li>
            </ul>
          </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel 
            <div class="user-panel">
              <div class="pull-left image">
                @guest
                  <img src="img/guest.jpg" class="img-circle" alt="User Image">
                @else
                  <img src="img/usuarios/u{{ Auth::user()->id}}.jpg" class="img-circle" alt="User Image">
                @endguest
              </div>
              <div class="pull-left info">
                @guest
                  Invitado
                @else
                  <p>{{ Auth::user()->name }}</p>
                @endguest
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
          -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            @guest
              <li>
                <a href="categorias.categoria">
                  <i class="fa fa-cart-plus"></i> <span>Menú del Cafetín </span>
                  <small class="label pull-right bg-red">PDF</small>
                </a>
              </li>
            @else
            
            <?php 
              $nivel = Auth::user()->nivel;
              if (($nivel == '0') or ($nivel == '1')){ ?>
                <li>
                  <a href="categorias.categoria">
                    <i class="fa fa-cart-plus"></i> <span>Tomar Pedido </span>
                    <small class="label pull-right bg-red">PDF</small>
                  </a>
                </li>
                <li>
                  <a href="clientes.index">
                    <i class="fa fa-plus-square"></i> <span>Clientes </span>
                    <small class="label pull-right bg-red">PDF</small>
                  </a>
                </li>
                <li>
                  <a href="pedido.abierto">
                    <i class="fa fa-plus-square"></i> <span>Pedido Abierto </span>
                    <small class="label pull-right bg-red">PDF</small>
                  </a>
                </li>
                <li>
                  <a href="pedidos.pedido">
                    <i class="fa fa-plus-square"></i> <span>Pedidos Espera </span>
                    <small class="label pull-right bg-red">PDF</small>
                  </a>
                </li>
                <li>
                  <a href="pedidos.porcobrar">
                    <i class="fa fa-plus-square"></i> <span>Pedidos por Cobrar </span>
                    <small class="label pull-right bg-red">PDF</small>
                  </a>
                </li>
                <li>
                  <a href="pedidos.corte">
                    <i class="fa fa-plus-square"></i> <span>Cuadre Mi Caja </span>
                    <small class="label pull-right bg-red">PDF</small>
                  </a>
                </li>

              <?php };
                if ($nivel == '1'){ ?>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-shopping-cart"></i>
                      <span>Informes</span>
                       <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="servicios.index"><i class="fa fa-circle-o"></i> Informe Diario</a></li>
                      <li><a href="servicios.index"><i class="fa fa-circle-o"></i> Informe Mensual</a></li>
                      <li><a href="servicios.index"><i class="fa fa-circle-o"></i> Informe Anual</a></li>
                    </ul>
                  </li>                           
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-folder"></i> <span>Configurar</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="vendedores.vendedores"><i class="fa fa-circle-o"></i> Registrar Usuarios</a></li>
                      <li><a href="insertar.categoria"><i class="fa fa-circle-o"></i> Registrar Categorias</a></li>
                      <li><a href="insertar.producto"><i class="fa fa-circle-o"></i> Registrar Productos</a></li>
                    </ul>
                  </li>
              <?php }; ?>
            @endguest      
            <li>  
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca de...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('contenido')

        <!-- Main content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versión</b> 1.7.0
        </div>
        <strong>Copyright &copy; 2015-2025 <a href="www.tucafe.com.ve">Café-Apps&reg;</a></strong>
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
    
  </body>
</html>
