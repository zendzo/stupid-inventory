<!-- begin sidebar scrollbar -->
<div class="sidebar-scrollbar">

  <!-- sidebar menu -->
  <ul class="nav sidebar-inner" id="sidebar-menu">



    <li class="has-sub">
      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
        aria-expanded="false" aria-controls="dashboard">
        <i class="mdi mdi-view-dashboard-outline"></i>
        <span class="nav-text">Dashboard</span> <b class="caret"></b>
      </a>
      <ul class="collapse" id="dashboard" data-parent="#sidebar-menu">
        <div class="sub-menu">

          <li>
            <a class="sidenav-item-link" href="#">
              <span class="nav-text">Stok Masuk</span>
              <span class="badge badge-success">new</span>
            </a>
          </li>

          <li>
            <a class="sidenav-item-link" href="analytics.html">
              <span class="nav-text">Stok Keluar</span>
              <span class="badge badge-warning">new</span>
            </a>
          </li>

        </div>
      </ul>
    </li>
    <li class="has-sub">
      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app"
        aria-expanded="false" aria-controls="app">
        <i class="mdi mdi-pencil-box-multiple"></i>
        <span class="nav-text">DATA</span> <b class="caret"></b>
      </a>
      <ul class="collapse" id="app" data-parent="#sidebar-menu">
        <div class="sub-menu">

          <li>
            <a class="sidenav-item-link" href="{{ route('admin.category') }}">
              <span class="nav-text">Category</span>

            </a>
          </li>

          <li>
            <a class="sidenav-item-link" href="chat.html">
              <span class="nav-text">Product</span>

            </a>
          </li>

        </div>
      </ul>
    </li>
  </ul>

</div>