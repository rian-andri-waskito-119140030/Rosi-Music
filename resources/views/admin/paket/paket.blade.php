@extends('layout.base_admin')

@section('style')
    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css")}} />
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css")}} />
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css")}} />

    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href={{ URL::asset("assets/css/oneui.min.css")}} />

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
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
@section('konten')
    <div
      id="page-container"
      class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-boxed">
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

      {{-- <?php dd($data); ?> --}}
     
      <!-- Main Container -->
      <main id="main-container">
         <!-- pop up success upload -->
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
          <strong>{{ session()->get('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        <!-- Page Content -->
        <div class="content">
          <!-- Quick Overview -->
          <div class="row">
            <div class="col-6 col-lg-3">
              <a
                class="block block-rounded block-link-shadow text-center"
                href="/admin/paket/tambah">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-success">
                    <i class="fa fa-plus"></i>
                  </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-success mb-0">Tambah Paket</p>
                </div>
              </a>
            </div>
          </div>
          <!-- END Quick Overview -->

          <!-- All Products -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Data Paket</h3>
            </div>
            <div class="block-content">
              <!-- Search Form -->

              <!-- END Search Form -->

              <!-- All Products Table -->
              <!-- Dynamic Table with Export Buttons -->
              <div class="block block-rounded">
                <!-- <div class="block-header block-header-default">
                  <h3 class="block-title">
                    Dynamic Table <small>Export Buttons</small>
                  </h3>
                </div> -->
                <div class="block-content block-content-full">
                  <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                  <table
                    class="table table-bordered table-vcenter js-dataTable-buttons">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th>Jenis Paket</th>
                        <th class="d-none d-sm-table-cell">Nama Paket</th>
                        <th class="d-none d-sm-table-cell">Gambar</th>
                        <th>Barang Barang</th>
                        <th class="d-none d-sm-table-cell">Harga Sewa</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $key => $item)
                      <tr>
                        <td class="text-center fs-sm">{{ $key+1 }}</td>
                        <td class="fw-semibold fs-sm">{{ $item->jenis_paket }}</td>
                        <td class="d-none d-sm-table-cell fs-sm">{{ $item->nama_paket }}</td>
                        <td class="d-none d-sm-table-cell">
                          <img
                            style="width: 71px; height: 107px"
                            src='{{ URL::asset("storage/paket/")}}/{{ $item->gambar }}' />
                        </td>
                        <td class="d-none d-sm-table-cell fs-sm">
                          <ul style="list-style: none">
                            <?= $data[$key]->deskripsi_panjang; ?>
                          </ul>
                        </td>

                        <td class="d-none d-sm-table-cell">
                          <span
                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success"
                            >{{ rupiah($item->harga_sewa) }}</span
                          >
                        </td>
                        <td class="text-center fs-sm">
                          <a
                            class="btn btn-sm btn-alt-secondary"
                            href="/admin/paket/edit/{{ $item->id_paket }}"
                            data-bs-toggle="tooltip"
                            title="Edit">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                          </a>
                          <button
                            class="btn btn-sm btn-alt-secondary"
                            onclick="hapus('{{ $item->id_paket }}')"
                            data-bs-toggle="tooltip"
                            title="Hapus">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- END Dynamic Table with Export Buttons -->
              <!-- END All Products Table -->

              <!-- Pagination -->

              <!-- END Pagination -->
            </div>
          </div>
          <!-- END All Products -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <!-- <footer id="page-footer" class="bg-body-light">
        <div class="content py-3">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
              Crafted with <i class="fa fa-heart text-danger"></i> by
              <a
                class="fw-semibold"
                href="https://1.envato.market/ydb"
                target="_blank"
                >pixelcave</a
              >
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
              <a
                class="fw-semibold"
                href="https://1.envato.market/AVD6j"
                target="_blank"
                >OneUI 5.3</a
              >
              &copy; <span data-toggle="year-copy"></span>
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
    <!-- jQuery (required for DataTables plugin) -->
    <script src={{  URL::asset("assets/js/lib/jquery.min.js") }}></script>

    <!-- Page JS Plugins -->
    <script src={{  URL::asset("assets/js/plugins/datatables/jquery.dataTables.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-buttons/dataTables.buttons.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-buttons-jszip/jszip.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-buttons/buttons.print.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/datatables-buttons/buttons.html5.min.js") }}></script>

    <!-- Page JS Code -->
    <script src={{  URL::asset("assets/js/pages/be_tables_datatables.min.js") }}></script>
    <script>
      function hapus(id_paket) {
      let url=`{{ URL::to('/') }}/admin/paket/hapus/${id_paket}`;

      fetch(url, {
         method: 'DELETE',
      })
      window.location.reload();
    }
    </script>
@endsection
