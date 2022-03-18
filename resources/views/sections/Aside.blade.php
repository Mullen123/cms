  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="http://project-cms.test/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    
 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
       
              <a href="{{route('inicio')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              
              </p>
            </a>

           
          
          </li>
           <li class="nav-item">
            @can('users.index')
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              
              </p>
            </a>


            @endcan
          </li>


          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class=" fas fa-solid fa-key"></i>
              <p>
                Roles
              
              </p>
            </a>
          </li>



           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Slide
              
              </p>
            </a>
          </li>
           <li class="nav-item">
            @can('categorias.home')
            <a href="{{route('categorias.home')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Categorías
              
              </p>
            </a>

            @endcan
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bus"></i>
              <p>
                Excursiones
              
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Mensajes
              
              </p>
            </a>
          </li>
           
    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>