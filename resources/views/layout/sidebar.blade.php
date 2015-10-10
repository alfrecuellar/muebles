      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li>
              <a href="{{ url('home') }}">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
            <li>
              <a href="{{ url('project') }}">
                <i class="fa fa-files-o"></i> <span>Proyectos</span></i>
              </a>
            </li>
            <li>
              <a href="{{ url('client') }}">
                <i class="fa fa-users"></i> <span>Clientes</span></i>
              </a>
            </li>
            <li>
              <a href="{{ url('resource') }}">
                <i class="fa fa-list"></i> <span>Materiales</span></i>
              </a>
            </li>
            <li>
              <a href="{{ url('home/calendar') }}">
                <i class="fa fa-calendar"></i> <span>Calendario</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="{{ url('home/optimizer') }}">
                <i class="fa fa-calculator"></i> <span>Optimizador</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
