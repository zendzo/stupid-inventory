<!-- begin sidebar scrollbar -->
<div class="sidebar-scrollbar">

  <!-- sidebar menu -->
  <ul class="nav sidebar-inner" id="sidebar-menu">
    <li class="has-sub {{ active(['admin.sales', 'admin.purchase'], 'expand active') }}">
      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
        aria-expanded="false" aria-controls="dashboard">
        <i class="mdi mdi-cart"></i>
        <span class="nav-text">Transaksi</span> <b class="caret"></b>
      </a>
      <ul class="collapse {{ active(['admin.sales', 'admin.purchase'], 'show') }}" id="dashboard" data-parent="#sidebar-menu">
        <div class="sub-menu">

          <li class="{{ active(['admin.sales'], 'active') }}">
            <a class="sidenav-item-link" href="{{ route('admin.sales') }}">
              <span class="nav-text">Penjualan</span>
              <span class="badge badge-warning">OUT</span>
            </a>
          </li>

          <li class="{{ active(['admin.purchase'], 'active') }}">
            <a class="sidenav-item-link" href="{{ route('admin.purchase') }}">
              <span class="nav-text">Pembelian</span>
              <span class="badge badge-success">IN</span>
            </a>
          </li>

        </div>
      </ul>
    </li>
    <li class="has-sub {{ active(['admin.category', 'admin.product', 'admin.unit', 'admin.sales-type', 'admin.purchase-type', 'admin.supplier'], 'expand active') }}">
      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app"
        aria-expanded="false" aria-controls="app">
        <i class="mdi mdi-pencil-box-multiple"></i>
        <span class="nav-text">MASTER DATA</span> <b class="caret"></b>
      </a>
      <ul class="collapse {{ active(['admin.category', 'admin.product', 'admin.unit', 'admin.sales-type', 'admin.purchase-type', 'admin.supplier'], 'show') }}" id="app" data-parent="#sidebar-menu">
        <div class="sub-menu">

          <li class="{{active(['admin.category'], 'active')}}">
            <a class="sidenav-item-link" href="{{ route('admin.category') }}">
              <span class="nav-text">Category</span>

            </a>
          </li>

          <li class="{{active(['admin.unit'], 'active')}}">
            <a class="sidenav-item-link" href="{{ route('admin.unit') }}">
              <span class="nav-text">Unit</span>

            </a>
          </li>

          <li class="{{active(['admin.sales-type'], 'active')}}">
            <a class="sidenav-item-link" href="{{ route('admin.sales-type') }}">
              <span class="nav-text">Sales type</span>

            </a>
          </li>

          <li class="{{active(['admin.purchase-type'], 'active')}}">
            <a class="sidenav-item-link" href="{{ route('admin.purchase-type') }}">
              <span class="nav-text">Purchase type</span>

            </a>
          </li>

          <li class="{{active(['admin.product'], 'active')}}">
            <a class="sidenav-item-link" href="{{ route('admin.product') }}">
              <span class="nav-text">Product</span>

            </a>
          </li>

          <li class="{{active(['admin.supplier'], 'active')}}">
            <a class="sidenav-item-link" href="{{ route('admin.supplier') }}">
              <span class="nav-text">Distributor</span>

            </a>
          </li>

        </div>
      </ul>
    </li>
    <li class="has-sub {{ active(['admin.user'], 'expand active') }}">
      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
        aria-expanded="false" aria-controls="user">
        <i class="mdi mdi-account-group"></i>
        <span class="nav-text">User</span> <b class="caret"></b>
      </a>
      <ul class="collapse {{ active(['admin.user'], 'show') }}" id="user" data-parent="#sidebar-menu">
        <div class="sub-menu">

          <li class="{{active(['admin.user'], 'active')}}">
            <a class="sidenav-item-link" href="{{ route('admin.user') }}">
              <i class="mdi mdi-account"></i>
              <span class="nav-text" style="margin-left: 5px;">User</span>
              <span class="badge badge-success">user-list</span>
            </a>
          </li>

        </div>
      </ul>

    <li class="has-sub">
      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#report"
        aria-expanded="false" aria-controls="report">
        <i class="mdi mdi-file-document-box-multiple"></i>
        <span class="nav-text">Laporan</span> <b class="caret"></b>
      </a>
      <ul class="collapse" id="report" data-parent="#sidebar-menu">
        <div class="sub-menu">

          <li>
            <a class="sidenav-item-link" href="{{ route('admin.sales') }}">
              <span class="nav-text">Penjualan</span>
              <span class="badge badge-warning">OUT</span>
            </a>
          </li>

          <li>
            <a class="sidenav-item-link" href="{{ route('admin.purchase') }}">
              <span class="nav-text">Pembelian</span>
              <span class="badge badge-success">IN</span>
            </a>
          </li>

        </div>
      </ul>
    </li>
  </ul>

</div>