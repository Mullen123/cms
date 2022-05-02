  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="{{asset('img/cms.jpg')}}"  class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color:#7FB0DA; font-weight: bold;"><strong>CMS</strong></span>
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
              @can('roles.index')
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class=" fas fa-solid fa-key"></i>
              <p>
                Roles
              
              </p>
            </a>
            @endcan
          </li>



           <li class="nav-item">
                @can('slide.index')
            <a href="{{route('slide.home')}}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Slide
              
              </p>
            </a>
               @endcan
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
             @can('excursiones.index')
            <a href="{{route('excursiones.index')}}" class="nav-link">
              <i class="nav-icon fas fa-bus"></i>
              <p>
                Excursiones
              
              </p>
            </a>
                 @endcan
          </li>
           <li class="nav-item">
               @can('mensajes.home')
            <a href="{{route('mensajes.home')}}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Mensajes
              
              </p>
            </a>
            @endcan
          </li>
           
    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
