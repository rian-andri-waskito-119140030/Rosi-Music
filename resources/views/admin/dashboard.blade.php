@extends('layout.base_admin')

@section('style')
  <link rel="stylesheet" id="css-main" href={{ URL::asset("assets/css/oneui.min.css")}} />
@endsection
    <!-- Page Container -->
    <!--
        Available classes for #page-container:

    GENERIC

      'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                  - Theme helper buttons [data-toggle="theme"],
                                                  - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                  - ..and/or One.layout('dark_mode_[on/off/toggle]')

    SIDEBAR & SIDE OVERLAY

      'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
      'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
      'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
      'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
      'sidebar-dark'                              Dark themed sidebar

      'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
      'side-overlay-o'                            Visible Side Overlay by default

      'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

      'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

      ''                                          Static Header if no class is added
      'page-header-fixed'                         Fixed Header

    HEADER STYLE

      ''                                          Light themed Header
      'page-header-dark'                          Dark themed Header

    MAIN CONTENT LAYOUT

      ''                                          Full width Main Content if no class is added
      'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
      'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

    DARK MODE

      'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
    -->
    {{-- <?php dd(Auth::guard('admin'))->user(); ?> --}}

@section('konten')
  <div
    id="page-container"
    class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
    <!-- Side Overlay-->

    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    @include('layout.admin_nav')

    <!-- Main Container -->
    <main id="main-container">
      <!-- Hero -->
      <div class="content">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
          <strong>{{ session()->get('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        <div
          class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
          <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-2">Dashboard</h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
              Welcome
              <a class="fw-semibold" href="be_pages_generic_profile.html"
                >{{ Auth::guard('admin')->user()->nama }}</a
              >, everything looks great.
            </h2>
          </div>
        </div>
      </div>
      <!-- END Hero -->

      <!-- Page Content -->
      <div class="content">
        <!-- Overview -->
        <div class="row items-push">
          <div class="col-sm-6 col-xxl-3">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
              <div
                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                <dl class="mb-0">
                  <dt class="fs-3 fw-bold">{{ $paket }}</dt>
                  <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">
                    Jumlah Paket
                  </dd>
                </dl>
                <div class="item item-rounded-lg bg-body-light">
                  <i class="fa fa-bars fs-3 text-primary"></i>
                </div>
              </div>
              <div class="bg-body-light rounded-bottom">
                <a
                  class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                  href="/admin/paket">
                  <span>Lihat Semua Paket</span>
                  <i
                    class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                </a>
              </div>
            </div>
            <!-- END Pending Orders -->
          </div>
          <div class="col-sm-6 col-xxl-3">
            <!-- New Customers -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
              <div
                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                <dl class="mb-0">
                  <dt class="fs-3 fw-bold">{{ $barang }}</dt>
                  <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">
                    Jumlah Barang
                  </dd>
                </dl>
                <div class="item item-rounded-lg bg-body-light">
                  <i class="fa fa-bars fs-3 text-primary"></i>
                </div>
              </div>
              <div class="bg-body-light rounded-bottom">
                <a
                  class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                  href="/admin/barang">
                  <span>Lihat Semua Barang</span>
                  <i
                    class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                </a>
              </div>
            </div>
            <!-- END New Customers -->
          </div>
          <div class="col-sm-6 col-xxl-3">
            <!-- Messages -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
              <div
                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                <dl class="mb-0">
                  <dt class="fs-3 fw-bold">{{ $pesanan_sistem }}</dt>
                  <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">
                    Pesanan Sistem Masuk
                  </dd>
                </dl>
                <div class="item item-rounded-lg bg-body-light">
                  <i class="far fa-envelope fs-3 text-primary"></i>
                </div>
              </div>
              <div class="bg-body-light rounded-bottom">
                <a
                  class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                  href="/admin/pesanan-sistem">
                  <span>Lihat Semua Pesanan Sistem Masuk</span>
                  <i
                    class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                </a>
              </div>
            </div>
            <!-- END Messages -->
          </div>
          <div class="col-sm-6 col-xxl-3">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
              <div
                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                <dl class="mb-0">
                  <dt class="fs-3 fw-bold">{{ rupiah($saldo) }}</dt>
                  <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">
                    Total Saldo
                  </dd>
                </dl>
                <div class="item item-rounded-lg bg-body-light">
                  <i class="fa fa-dollar fs-3 text-primary"></i>
                </div>
              </div>
              <div class="bg-body-light rounded-bottom">
                <a
                  class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                  href="/admin/keuangan">
                  <span>Lihat Informasi</span>
                  <i
                    class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                </a>
              </div>
            </div>
            <!-- END Conversion Rate-->
          </div>
        </div>
        <!-- END Overview -->

        <!-- Statistics -->
        <!-- <div class="row">
          <div class="col-xl-8 col-xxl-9 d-flex flex-column">
            Earnings Summary
            <div class="block block-rounded flex-grow-1 d-flex flex-column">
              <div class="block-header block-header-default">
                <h3 class="block-title">Earnings Summary</h3>
                <div class="block-options">
                  <button
                    type="button"
                    class="btn-block-option"
                    data-toggle="block-option"
                    data-action="state_toggle"
                    data-action-mode="demo">
                    <i class="si si-refresh"></i>
                  </button>
                  <button type="button" class="btn-block-option">
                    <i class="si si-settings"></i>
                  </button>
                </div>
              </div>
              <div
                class="block-content block-content-full flex-grow-1 d-flex align-items-center">
                Earnings Chart Container Chart.js Chart is initialized in
                js/pages/be_pages_dashboard.min.js which was auto compiled
                from _js/pages/be_pages_dashboard.js For more info and
                examples you can check out http://www.chartjs.org/docs/
                <canvas id="js-chartjs-earnings"></canvas>
              </div>
              <div class="block-content bg-body-light">
                <div class="row items-push text-center w-100">
                  <div class="col-sm-4">
                    <dl class="mb-0">
                      <dt
                        class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                        <i class="fa fa-caret-up fs-base text-success"></i>
                        <span>2.5%</span>
                      </dt>
                      <dd class="fs-sm fw-medium text-muted mb-0">
                        Customer Growth
                      </dd>
                    </dl>
                  </div>
                  <div class="col-sm-4">
                    <dl class="mb-0">
                      <dt
                        class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                        <i class="fa fa-caret-up fs-base text-success"></i>
                        <span>3.8%</span>
                      </dt>
                      <dd class="fs-sm fw-medium text-muted mb-0">
                        Page Views
                      </dd>
                    </dl>
                  </div>
                  <div class="col-sm-4">
                    <dl class="mb-0">
                      <dt
                        class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                        <i class="fa fa-caret-down fs-base text-danger"></i>
                        <span>1.7%</span>
                      </dt>
                      <dd class="fs-sm fw-medium text-muted mb-0">
                        New Products
                      </dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
            END Earnings Summary
          </div>
          <div class="col-xl-4 col-xxl-3 d-flex flex-column">
            Last 2 Weeks Chart.js Charts is initialized in
            js/pages/be_pages_dashboard.min.js which was auto compiled from
            _js/pages/be_pages_dashboard.js For more info and examples you can
            check out http://www.chartjs.org/docs/
            <div class="row items-push flex-grow-1">
              <div class="col-md-6 col-xl-12">
                <div
                  class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div
                    class="block-content flex-grow-1 d-flex justify-content-between">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">570</dt>
                      <dd class="fs-sm fw-medium text-muted mb-0">
                        Total Orders
                      </dd>
                    </dl>
                    <div>
                      <div
                        class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-danger bg-danger-light">
                        <i class="fa fa-caret-down me-1"></i>
                        2.2%
                      </div>
                    </div>
                  </div>
                  <div class="block-content p-1 text-center overflow-hidden">
                    Total Orders Chart Container
                    <canvas
                      id="js-chartjs-total-orders"
                      style="height: 90px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-12">
                <div
                  class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div
                    class="block-content flex-grow-1 d-flex justify-content-between">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">$5,234.21</dt>
                      <dd class="fs-sm fw-medium text-muted mb-0">
                        Total Earnings
                      </dd>
                    </dl>
                    <div>
                      <div
                        class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-success bg-success-light">
                        <i class="fa fa-caret-up me-1"></i>
                        4.2%
                      </div>
                    </div>
                  </div>
                  <div class="block-content p-1 text-center overflow-hidden">
                    Total Earnings Chart Container
                    <canvas
                      id="js-chartjs-total-earnings"
                      style="height: 90px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-xl-12">
                <div
                  class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div
                    class="block-content flex-grow-1 d-flex justify-content-between">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold">264</dt>
                      <dd class="fs-sm fw-medium text-muted mb-0">
                        New Customers
                      </dd>
                    </dl>
                    <div>
                      <div
                        class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-success bg-success-light">
                        <i class="fa fa-caret-up me-1"></i>
                        9.3%
                      </div>
                    </div>
                  </div>
                  <div class="block-content p-1 text-center overflow-hidden">
                    New Customers Chart Container
                    <canvas
                      id="js-chartjs-new-customers"
                      style="height: 90px"></canvas>
                  </div>
                </div>
              </div>
            </div>
            END Last 2 Weeks
          </div>
        </div> -->
        <!-- END Statistics -->

        <!-- Recent Orders -->

        <!-- END Recent Orders -->
      </div>
      <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <!-- <footer id="page-footer" class="bg-body-light">
      <div class="content py-3">
        <div class="row fs-sm">
          <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
          </div>
          <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
            <a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank">OneUI 5.3</a> &copy; <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer> -->
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!--
      OneUI JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
  -->
  <script src={{ URL::asset("assets/js/oneui.app.min.js")}}></script>

  <!-- Page JS Plugins -->
  <script src={{ URL::asset("assets/js/plugins/chart.js/chart.min.js")}}></script>

  <!-- Page JS Code -->
  <script src={{ URL::asset("assets/js/pages/be_pages_dashboard.min.js")}}></script>

@endsection
      
