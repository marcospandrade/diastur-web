
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dias Tur Admin</title>

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!--form class="form-inline ml-3"-->
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" v-model="search" @keyup="searchit" type="search" placeholder="Pesquisar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    <!--/form -->   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/diastur-logo.png" alt="DiasTur Logo" class="brand-image img-circle elevation-3"
           style="margin-left: -1px; width: 62px; height: 102px;">
      <span class="brand-text font-weight-light">Painel Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <sidebar-user></sidebar-user>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
        <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt primary"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
          
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user primary"></i>
              <p>
                Perfil
              </p>
            </router-link>
          </li>

          @can('isAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog primary"></i>
              <p>
                Gerenciamento
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="fas fa-user-cog nav-icon primary"></i>
                  <p>Usuários</p>
                </router-link>
              </li>              
            </ul>
          </li>

          <li class="nav-item">
            <router-link to="/developer" class="nav-link">
              <i class="nav-icon fas fa-cogs primary"></i>
              <p>
                Desenvolvedor
              </p>
            </router-link>
          </li>
          @endcan
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-poll primary"></i>
              <p>
                Relatórios
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/relatorioUsuarios" class="nav-link">
                  <i class="fas fa-users nav-icon primary"></i>
                  <p>Usuários cadastrados</p>
                </router-link>
              </li>              
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-power-off red"></i>
                <p>
                  {{ __('Logout') }}
                </p>               
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!--content-wrapper-->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view> 

        <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar 
  <aside class="control-sidebar control-sidebar-dark">
    <-- Control sidebar content goes here 
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Tudo o que você quiser.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Wooser Corporation</a>.</strong> Todos os direitos reservados.
  </footer>
</div>
<!-- ./wrapper -->
@auth
<script>
  window.user = @json(auth()->user());
</script>
@endauth
  
<script src="/js/app.js"></script>
</body>
</html>
