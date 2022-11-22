@extends('layout.base_admin')
@section('style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css")}}> />
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

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content">
          <!-- Quick Overview -->
          <div class="row">
            <div class="col-6 col-lg-3">
              <a
                class="block block-rounded block-link-shadow text-center"
                href="/admin/pesanan-wa/tambah">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-success">
                    <i class="fa fa-plus"></i>
                  </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-success mb-0">
                    Tambah Pesanan
                  </p>
                </div>
              </a>
            </div>
          </div>
          <!-- END Quick Overview -->

          <!-- All Products -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Data Pemesanan Via Whatsapp</h3>
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
                        <th class="text-center">No.</th>
                        <th class="text-center">ID Pesanan</th>
                        <th>Nama</th>
                        <th class="d-none d-sm-table-cell">Paket</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th class="d-none d-sm-table-cell">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- <?php dd($data); ?> --}}
                      @foreach ($data as $key => $item)
                      <tr>
                        <td class="text-center fs-sm">{{ $key+1 }}</td>
                        <td class="text-center fs-sm">{{ $item->id_pesanan }}</td>
                        <td class="fw-semibold fs-sm">{{ $item->nama }}</td>
                        <td class="d-none d-sm-table-cell fs-sm">
                          {{ $item->nama_paket }}
                        </td>
                        <td class="d-none d-sm-table-cell fs-sm">{{ $item->tanggal_booking }}</td>
                        <td class="d-none d-sm-table-cell fs-sm">{{ $item->tanggal_selesai }}</td>

                        <td class="text-center fs-sm">
                          <a
                            class="btn btn-sm btn-alt-secondary"
                            href="be_pages_ecom_product_edit_wa.html"
                            data-bs-toggle="tooltip"
                            title="Edit">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                          </a>
                          <a
                            class="btn btn-sm btn-alt-secondary"
                            href="be_pages_ecom_product_view_wa.html"
                            data-bs-toggle="tooltip"
                            title="View">
                            <i class="fa fa-fw fa-eye"></i>
                          </a>
                          <a
                            class="btn btn-sm btn-alt-secondary"
                            href="javascript:void(0)"
                            data-bs-toggle="tooltip"
                            title="Delete">
                            <i class="fa fa-fw fa-times"></i>
                          </a>
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
    <script src={{ URL::asset("assets/js/lib/jquery.min.js")}}></script>

    <!-- Page JS Plugins -->
    <script src={{ URL::asset("assets/js/plugins/datatables/jquery.dataTables.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons/dataTables.buttons.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons-jszip/jszip.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons/buttons.print.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons/buttons.html5.min.js")}}></script>

    <!-- Page JS Code -->
    <script src={{ URL::asset("assets/js/pages/be_tables_datatables.min.js")}}></script>
@endsection