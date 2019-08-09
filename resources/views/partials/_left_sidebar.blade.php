<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-0">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('favicon.ico') }}" alt="Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : null }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        @auth
        @approved
        <li class="nav-header">CLIENTS</li>
        <li class="nav-item has-treeview menu-{{ Request::is('clients/pilots*') ? 'open' : 'closed' }}">
          <a href="#" class="nav-link {{ Request::is('clients/pilots*') ? 'active' : null }}">
            <i class="nav-icon fa fa-plane"></i>
            <p>Pilot Clients<i class="right fa fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pilots.vpilot') }}" class="nav-link {{ Request::is('clients/pilots/vpilot*') ? 'active' : null }}">
                <p>vPilot</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pilots.others') }}" class="nav-link {{ Request::is('clients/pilots/others*') ? 'active' : null }}">
                <p>Others</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview menu-{{ Request::is('clients/atc*') ? 'open' : 'closed' }}">
          <a href="#" class="nav-link {{ Request::is('clients/atc*') ? 'active' : null }}">
            <i class="nav-icon fas fa-satellite-dish"></i>
            <p>ATC Clients<i class="right fa fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('atc.euroscope') }}" class="nav-link {{ Request::is('clients/atc/euroscope*') ? 'active' : null }}">
                <p>Euroscope</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('atc.vrc_vstars_veram') }}" class="nav-link {{ Request::is('clients/atc/vrc-vstars-veram*') ? 'active' : null }}">
                <p>VRC, vSTARS, vERAM</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview menu-{{ Request::is('clients/atis*') ? 'open' : 'closed' }}">
          <a href="#" class="nav-link {{ Request::is('clients/atis*') ? 'active' : null }}">
            <i class="nav-icon fas fa-cloud-sun"></i>
            <p>ATIS Clients<i class="right fa fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('atis.euroscope') }}" class="nav-link {{ Request::is('clients/atis/euroscope*') ? 'active' : null }}">
                <p>Euroscope</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('atis.vatis') }}" class="nav-link {{ Request::is('clients/atis/vatis*') ? 'active' : null }}">
                <p>vATIS</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">ISSUES</li>
        <li class="nav-item">
          <a href="{{ route('issues') }}" class="nav-link {{ Request::is('issues*') ? 'active' : null }}">
            <i class="nav-icon fas fa-poop"></i>
            <p>
              Reporting Issues
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('knowledge_base') }}" class="nav-link {{ Request::is('knowledge-base*') ? 'active' : null }}">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              Knowledge Base
            </p>
          </a>
        </li>
        @endapproved
        
        @admin
        <li class="nav-header">ADMIN</li>
        <li class="nav-item">
          <a href="{{ route('admin') }}" class="nav-link {{ Request::is('admin*') ? 'active' : null }}">
            <i class="nav-icon fas fa-user-shield"></i>
            <p>
              Admin Console
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link disabled text-secondary {{ Request::is('transceivers*') ? 'active' : null }}">
            <i class="nav-icon fas fa-broadcast-tower"></i>
            <p>
              Transceivers
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link disabled text-secondary {{ Request::is('positions*') ? 'active' : null }}">
            <i class="nav-icon fas fa-headset"></i>
            <p>
              Positions
            </p>
          </a>
        </li>
        @endadmin

        @endauth
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>