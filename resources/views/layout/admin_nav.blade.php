<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
      <!-- Logo -->
      <a class="fw-semibold text-dual" href="/admin/dashboard">
        <span class="smini-visible">
          <i class="fa fa-circle-notch text-primary"></i>
        </span>
        <span class="smini-hide fs-5 tracking-wider"
          >Rosi<span class="fw-normal">Musik</span></span
        >
      </a>
      <!-- END Logo -->

      <!-- Extra -->
      <div>
        <!-- Dark Mode -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <!-- <button
          type="button"
          class="btn btn-sm btn-alt-secondary"
          data-toggle="layout"
          data-action="dark_mode_toggle">
          <i class="far fa-moon"></i>
        </button> -->
        <!-- END Dark Mode -->

        <!-- Options -->

        <!-- END Options -->

        <!-- Close Sidebar, Visible only on mobile screens -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <a
          class="d-lg-none btn btn-sm btn-alt-secondary ms-1"
          data-toggle="layout"
          data-action="sidebar_close"
          href="javascript:void(0)">
          <i class="fa fa-fw fa-times"></i>
        </a>
        <!-- END Close Sidebar -->
      </div>
      <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
      <!-- Side Navigation -->
      <div class="content-side">
        <ul class="nav-main">
          <li class="nav-main-item">
            <a class="nav-main-link active" href="/admin/dashboard">
              <i class="nav-main-link-icon si si-speedometer"></i>
              <span class="nav-main-link-name">Dashboard</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a
              class="nav-main-link nav-main-link-submenu"
              data-toggle="submenu"
              aria-haspopup="true"
              aria-expanded="false"
              href="#">
              <i class="nav-main-link-icon si si-envelope-letter"></i>
              <span class="nav-main-link-name">Pesanan</span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
               <a class="nav-main-link" href="/admin/pesanan-sistem">
                  <span class="nav-main-link-name"
                    >Pesanan Via Sistem</span
                  >
                </a>
              </li>
              <li class="nav-main-item">
                <a
                  class="nav-main-link"
                  href="/admin/pesanan-wa">
                  <span class="nav-main-link-name"
                    >Pesanan Via Whatsapp</span
                  >
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-main-item">
            <a
              class="nav-main-link nav-main-link-submenu"
              data-toggle="submenu"
              aria-haspopup="true"
              aria-expanded="false"
              href="#">
              <i class="nav-main-link-icon fa fa-fw fa-money-check"></i>
              <span class="nav-main-link-name">Transaksi</span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a
                  class="nav-main-link"
                  href="/admin/transaksisistem">
                  <span class="nav-main-link-name"
                    >Transaksi Masuk Via Sistem</span
                  >
                </a>
              </li>
              <li class="nav-main-item">
                <a
                  class="nav-main-link"
                  href="/admin/transaksiwa">
                  <span class="nav-main-link-name"
                    >Transaksi Masuk Via WA</span
                  >
                </a>
              </li>
              <li class="nav-main-item">
                <a
                  class="nav-main-link"
                  href="/admin/transaksi-keluar">
                  <span class="nav-main-link-name">Transaksi Keluar</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-main-item">
            <a
              class="nav-main-link nav-main-link-submenu"
              data-toggle="submenu"
              aria-haspopup="true"
              aria-expanded="false"
              href="#">
              <i class="nav-main-link-icon fa fa-fw fa-money-check"></i>
              <span class="nav-main-link-name">Hutang</span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/admin/hutang-sistem">
                  <span class="nav-main-link-name">Hutang Transaksi Sistem</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a
                  class="nav-main-link"
                  href="/admin/hutang-wa">
                  <span class="nav-main-link-name">Hutang Transaksi WA</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-main-item">
            <a  class="nav-main-link nav-main-link-submenu"
            data-toggle="submenu"
            aria-haspopup="true"
            aria-expanded="false"
            href="#">
              <i class="nav-main-link-icon fa fa-dollar"></i>
              <span class="nav-main-link-name">Keuangan</span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/admin/keuangan">
                  <span class="nav-main-link-name">Laporan Keuangan</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-main-item">
            <a  class="nav-main-link nav-main-link-submenu"
            data-toggle="submenu"
            aria-haspopup="true"
            aria-expanded="false"
            href="#">
              <i class="nav-main-link-icon si si-bar-chart"></i>
              <span class="nav-main-link-name">Barang dan Jenis Barang</span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/admin/barang">
                  <span class="nav-main-link-name">Barang</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a
                  class="nav-main-link"
                  href="/admin/jenis-barang">
                  <span class="nav-main-link-name">Jenis Barang</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-main-item">
            <a  class="nav-main-link nav-main-link-submenu"
            data-toggle="submenu"
            aria-haspopup="true"
            aria-expanded="false"
            href="#">
              <i class="nav-main-link-icon si si-bar-chart"></i>
              <span class="nav-main-link-name">Paket dan Jenis Paket</span>
            </a>
            <ul class="nav-main-submenu">
              <li class="nav-main-item">
                <a class="nav-main-link" href="/admin/paket">
                  <span class="nav-main-link-name">Paket</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="/admin/jenis-paket">
                  <span class="nav-main-link-name">Jenis Paket</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
  </nav>
  <!-- END Sidebar -->

  <!-- Header -->
  <header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
      <!-- Left Section -->
      <div class="d-flex align-items-center">
        <!-- Toggle Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
        <button
          type="button"
          class="btn btn-sm btn-alt-secondary me-2 d-lg-none"
          data-toggle="layout"
          data-action="sidebar_toggle">
          <i class="fa fa-fw fa-bars"></i>
        </button>
        <!-- END Toggle Sidebar -->

        <!-- Toggle Mini Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
        <button
          type="button"
          class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block"
          data-toggle="layout"
          data-action="sidebar_mini_toggle">
          <i class="fa fa-fw fa-ellipsis-v"></i>
        </button>
        <!-- END Toggle Mini Sidebar -->

        <!-- Open Search Section (visible on smaller screens) -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button
          type="button"
          class="btn btn-sm btn-alt-secondary d-md-none"
          data-toggle="layout"
          data-action="header_search_on">
          <i class="fa fa-fw fa-search"></i>
        </button>
        <!-- END Open Search Section -->

        <!-- Search Form (visible on larger screens) -->

        <!-- END Search Form -->
      </div>
      <!-- END Left Section -->

      <!-- Right Section -->
      <div class="d-flex align-items-center">
        <!-- User Dropdown -->
        <div class="dropdown d-inline-block ms-2">
          <button
            type="button"
            class="btn btn-sm btn-alt-secondary d-flex align-items-center"
            id="page-header-user-dropdown"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
            <img
              class="rounded-circle"
              src="{{ URL::asset("storage/avatar")}}/{{ Auth::guard('admin')->user()->avatar }}"
              alt="Header Avatar"
              style="width: 21px" />
            <span class="d-none d-sm-inline-block ms-2">{{ Auth::guard('admin')->user()->nama }}</span>
            <i
              class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
          </button>
          <div
            class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
            aria-labelledby="page-header-user-dropdown">
            <div
              class="p-3 text-center bg-body-light border-bottom rounded-top">
              <img
                class="img-avatar img-avatar48 img-avatar-thumb"
                src="{{ URL::asset("storage/avatar")}}/{{ Auth::guard('admin')->user()->avatar }}"
                alt="" />
              <p class="mt-2 mb-0 fw-medium">{{ Auth::guard('admin')->user()->nama }}</p>
              <p class="mb-0 text-muted fs-sm fw-medium">Admin</p>
            </div>

            <div role="separator" class="dropdown-divider m-0"></div>
            <div class="p-2">
              <form action="/admin/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center justify-content-between""><span class="fs-sm fw-medium">Log Out</span></button>
              </form>
            </div>
          </div>
        </div>
        <!-- END User Dropdown -->

        <!-- Notifications Dropdown -->

        <!-- END Notifications Dropdown -->

        <!-- Toggle Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

        <!-- END Toggle Side Overlay -->
      </div>
      <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-body-extra-light">
      <div class="content-header">
        <form
          class="w-100"
          action="be_pages_generic_search.html"
          method="POST">
          <div class="input-group">
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button
              type="button"
              class="btn btn-alt-danger"
              data-toggle="layout"
              data-action="header_search_off">
              <i class="fa fa-fw fa-times-circle"></i>
            </button>
            <input
              type="text"
              class="form-control"
              placeholder="Search or hit ESC.."
              id="page-header-search-input"
              name="page-header-search-input" />
          </div>
        </form>
      </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-body-extra-light">
      <div class="content-header">
        <div class="w-100 text-center">
          <i class="fa fa-fw fa-circle-notch fa-spin"></i>
        </div>
      </div>
    </div>
    <!-- END Header Loader -->
  </header>
  <!-- END Header -->