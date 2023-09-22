<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ruleta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free-6.4.0/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free-6.4.0/css/solid.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/botones/css/bootstrap.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
  
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

   <!-- DataTables --
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  -->

  <link rel="stylesheet" href="{{asset('plugins/datatables/responsive/css/dataTables.bootstrap4.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('plugins/datatables/responsive/css/responsive.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('plugins/datatables/botones/css/buttons.bootstrap4.min.css')}}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  @yield('css')

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <span id="hora"></span>  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Opciones de usuario</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('perfil.index')}}" class="dropdown-item">
            <i class="fas fa-user"></i>
            <i class="fas fa-edit"></i>
                Editar Perfil
          </a>
          <div class="dropdown-divider"></div>
            
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fas fa-out"></i> Salir
                

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> 
            </a>
        </div>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link elevation-4">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}"
           alt="Ruleta Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ruleta</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ request()->is('home')? 'active' : '' }}">
              <i class="fa-solid fa-home"></i>
              <p>
                Hogar
              </p>
            </a>
          </li>
                    
          @can('animalito.index')

            <!--Administrador-->

            <li class="nav-item">
              <a href="{{route('contabilidadTotal.index')}}" class="nav-link {{ request()->is('contabilidadTotal')? 'active' : '' }}">
                <i class="fa-solid fa-money-bill-wave"></i>
                <p>
                  Contabilidad Total
                </p>
              </a>
            </li>
          <li class="nav-item">
              <a href="{{route('animalito.index')}}" class="nav-link {{ request()->is('animalito')? 'active' : '' }}">
                <i class="fa-solid fa-dog"></i>
                <p>
                  Animalitos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('loteria.index')}}" class="nav-link {{ request()->is('loteria')? 'active' : '' }}">
                <i class="fa-solid fa-dice"></i>
                <p>
                  Loterias
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('sorteo.index')}}" class="nav-link {{ request()->is('sorteo')? 'active' : '' }}">
                <i class="fa-solid fa-shuffle "></i>
                <p>
                  Sorteos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('banca.index')}}" class="nav-link {{ request()->is('banca')? 'active' : '' }}">
                <i class="fa-solid fa-bank"></i>
                <p>
                  Bancas
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('resultado.index')}}" class="nav-link {{ request()->is('resultado')? 'active' : '' }}">
                <i class="fa-solid fa-outdent fa-flip-horizontal"></i>
                <p>
                  Resultados
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link {{ request()->is('user')? 'active' : '' }}">
                <i class="fa-solid fa-user"></i>
                <p>
                  Usuarios
                </p>
              </a>
            </li>
          
          @endcan  
          
          <!--Usuario-->
          
          <li class="nav-item">
            <a href="{{route('ticket.index')}}" class="nav-link {{ request()->is('ticket')? 'active' : '' }}">
              <i class="fa-solid fa-ticket"></i>
              <p>
                Tickets
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('contabilidad.index')}}" class="nav-link {{ request()->is('contabilidad')? 'active' : '' }}">
              <i class="fa-solid fa-money-bill-wave"></i>
              <p>
                Contabilidad
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; 2023 <a href="http://adminlte.io">Ruleta</a>.</strong> Todos los derechos reservados
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery-3.5.1.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery-datatables/jquery.dataTables.js')}}"></script>
      
<script src="{{asset('plugins/datatables/responsive/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables/responsive/js/responsive.bootstrap4.min.js')}}"></script>
      
<script src="{{asset('plugins/datatables/botones/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables/botones/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables/botones/js/jszip.min.js')}}"></script>
<script src="{{asset('plugins/datatables/botones/js/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/datatables/botones/js/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables/botones/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables/botones/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables/botones/js/buttons.colVis.min.js')}}"></script>
    
<!-- bs-custom-file-input -->
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- date-range-picker -->

<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/bootstrap-datepicker.es.js')}}" charset="UTF-8"></script>

<script type="text/javascript">
  
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  });

  @if( session()->has('mensaje') )

     toastr.{{session('mensaje')['estado']}}('{{session('mensaje')['mensaje']}}') 
    
  @endif

  function hora(){

    var url = 'api/hora';

    $.ajax(url,{
      beforeSend:function(){
        
      },
      type:'get'
    }).done(function(response){
          $('#hora').html(response);
    }).always(function(){
      setTimeout(hora2,10000);
    });
  }
  
  function hora2(){
    hora();
  }
  
  $(document).ready(function () {
    bsCustomFileInput.init();
    
    hora();

    //setInterval(hora,5000);

    /*
    $.daterangepicker.regional['es'] = {
      closeText:'Cerrar',
      prevText:'Anterior',
      currentText:'Hoy',
      monthNames:["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
      monthNamesShort:["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
      dayNames:["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
      dayNamesShort:["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
      dayNamesMin:["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
      weekHeader:'Sm',
      dateFormat:'yyyy-mm-dd',
      firstDay:7,
      isRTL:false,
      showMonthAfterYear:false,
      yearSuffix:''
    };
    $.daterangepicker.setDefaults($.daterangepicker.regional['es']);
    */
    
    /*
    (function($){
      $.fn.daterangepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        monthsTitle: "Meses",
        clear: "Borrar",
        weekStart: 1,
        format: "dd/mm/yyyy"
      };
    });
    */
  });

  $.ajaxSetup({

    error: function( jqXHR, textStatus, errorThrown ) {

      if (jqXHR.status === 0) {

        //alert('Not connect: Verify Network.');
        toastr.error('No hay conexion: Verifique la red.');

      } else if (jqXHR.status == 404) {

        //alert('Requested page not found [404]');
        toastr.error('Pagina no encontrada [404]');


      } else if (jqXHR.status == 500) {

        //alert('Internal Server Error [500].');
        toastr.error('Error interno del servidor [500].');

      } else if (textStatus === 'parsererror') {

        //alert('Requested JSON parse failed.');
        toastr.error('Solicitud de analisis Json fallida.');


      } else if (textStatus === 'timeout') {

        //alert('Time out error.');
        toastr.error('Error de tiempo de espera.');

      } else if (textStatus === 'abort') {

        //alert('Ajax request aborted.');
        toastr.error('Solicitud ajax abortada.');

      } else {

        //alert('Uncaught Error: ' + jqXHR.responseText);
        toastr.error('Error no detectado: ' + jqXHR.responseText);
      }
    }
  });

</script>

@yield('scripts')


</body>
</html>