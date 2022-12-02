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
       <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css")}} />
     <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")}} />
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/select2/css/select2.min.css")}} />
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css")}} />
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/dropzone/min/dropzone.min.css")}} />
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/flatpickr/flatpickr.min.css")}} />
    <!-- Page JS Plugins CSS -->
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/select2/css/select2.min.css")}} />
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/dropzone/min/dropzone.min.css")}} />
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href={{ URL::asset("assets/css/oneui.min.css")}} />

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
@endsection

@section('konten')
{{-- <?php dd($data); ?> --}}
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
          <!-- <div class="row">
            <div class="col-6 col-lg-3">
              <a
                class="block block-rounded block-link-shadow text-center"
                href="be_pages_ecom_reports_add.html">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-success">
                    <i class="fa fa-plus"></i>
                  </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-success mb-0">
                    Tambah Data Keuangan
                  </p>
                </div>
              </a>
            </div>
          </div> -->
          <!-- END Quick Overview -->

          <!-- All Products -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Laporan Keuangan</h3>
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
                <form id="form_date_range" action="/admin/keuangan" method="POST">
                @csrf

                <!-- <div class="row mb-3">
                  <div class="col-lg-5">
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                      <i class="fa fa-calendar"></i>&nbsp;
                          <span></span> <i class="fa fa-caret-down"></i>
                      </div>
                  </div>
                  <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </div>
                </div> -->
                <div class="row mb-3">
                  <div class="col-lg-5">
                    <label>Tanggal Mulai</label>
                    <input
                          type="text"
                          class="js-flatpickr form-control"
                          id="example-flatpickr-custom"
                          name="start"
                          placeholder="Y-m-d"
                          required />
                  </div>
                  <div class="col-lg-5">
                    <label>Tanggal Selesai</label>
                    <input
                          type="text"
                          class="js-flatpickr form-control"
                          id="example-flatpickr-custom"
                          name="end"
                          placeholder="Y-m-d"
                          required />
                  </div>
                  <div class="col-lg-8 mt-2">
                    
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </div>
                </div>
                </form>

              

                  <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                  <table id="example"
                    class="table table-bordered table-vcenter js-dataTable-buttons">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th>Waktu</th>
                        <th class="d-none d-sm-table-cell">Keterangan</th>
                        <th>Debit</th>
                        <th class="d-none d-sm-table-cell">Kredit</th>
                        <th>Saldo</th>
                      </tr>
                    </thead>
                    <tbody class="keuangan">
                      
                      @foreach ($data as $key => $item)
                      <tr>
                        <td class="text-center fs-sm">{{ $key+1 }}</td>
                        <td class="fw-semibold fs-sm">{{ $item->waktu }}</td>
                        <td class="d-none d-sm-table-cell fs-sm">
                          {{ $item->keterangan }}
                        </td>
                        @if (is_null($item->debit))
                        <td class="d-none d-sm-table-cell fs-sm"></td>
                        @else
                        <td class="d-none d-sm-table-cell fs-sm">
                          <span
                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success"
                            >{{ rupiah($item->debit) }}</span
                          >
                        </td>
                        @endif
                        
                        @if (is_null($item->kredit))
                        <td class="d-none d-sm-table-cell fs-sm"></td>
                        @else
                        <td class="d-none d-sm-table-cell fs-sm">
                          <span
                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning"
                            >{{ rupiah($item->kredit) }}</span
                          >
                        </td>
                        @endif
                        <td class="d-none d-sm-table-cell fs-sm">
                          <span
                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success"
                            >{{ rupiah($item->saldo) }}</span
                          >
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
    <script src={{ URL::asset("assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons/dataTables.buttons.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons-jszip/jszip.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons/buttons.print.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/datatables-buttons/buttons.html5.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/select2/js/select2.full.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/ckeditor/ckeditor.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/dropzone/min/dropzone.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/flatpickr/flatpickr.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/select2/js/select2.full.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js")}}></script>
    <script src={{ URL::asset("assets/js/plugins/dropzone/min/dropzone.min.js")}}></script>
    <!-- <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Page JS Code -->
    <script src={{ URL::asset("assets/js/pages/keuangan/be_tables_datatables.min.js")}}></script>
    <script>
      One.helpersOnLoad([
        "js-flatpickr",
        "jq-datepicker",
        "jq-maxlength",
        "jq-select2",
        "jq-masked-inputs",
        "jq-rangeslider",
        "jq-colorpicker",
        "js-ckeditor",
      ]);
      
      // $(function() {

      //     var start = moment().subtract(29, 'days');
      //     var end = moment();

      //     function cb(start, end) {
      //       $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      //     }

      //     $('#reportrange').daterangepicker({
      //         startDate: start,
      //         endDate: end,
      //         ranges: {
      //           'Hari Ini': [moment(), moment()],
      //           'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      //           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      //           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      //           'This Month': [moment().startOf('month'), moment().endOf('month')],
      //           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      //         }
      //     }, cb);
      //     //search date range
          

      //     cb(start, end);
      //     //search date range by default
      //     // $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
      //     //   var start = picker.startDate.format('YYYY-MM-DD');
      //     //   var end = picker.endDate.format('YYYY-MM-DD');
      //     //   //make form submit for start and end date
      //     //   $('#reportrange').val(start);
      //     //   $('#reportrange').val(end);
      //     //   $('#form_date_range').submit();
            
      //     // });
          
      //     //search date range by ajax and jquery
      //     $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
      //       var start = picker.startDate.format('YYYY-MM-DD');
      //       var end = picker.endDate.format('YYYY-MM-DD');
            
      //       var url = "/admin/keuangan";
      //       var _token = $('input[name="_token"]').val();
      //       $.ajax({
      //         url: url,
      //         method: "POST",
      //         data: {start: start, end: end, _token: _token},
      //         success: function(response) {
      //           showresult();
      //           //document.write(response);
      //            //console.log(response);
      //           // var keuangan = '';
      //           //   //forEach
      //           //   // keuangan += '<table id="example"  class="table table-bordered table-vcenter js-dataTable-buttons">';
      //           //   // keuangan += '<thead>';
      //           //   // keuangan += '<tr>';
      //           //   // keuangan += '<th class="text-center">No</th>';
      //           //   // keuangan += '<th class="d-none d-sm-table-cell fs-sm">waktu</th>';
      //           //   // keuangan += '<th class="d-none d-sm-table-cell fs-sm">Keterangan</th>';
      //           //   // keuangan += '<th class="d-none d-sm-table-cell fs-sm">Debit</th>';
      //           //   // keuangan += '<th class="d-none d-sm-table-cell fs-sm">Kredit</th>';
      //           //   // keuangan += '<th class="d-none d-sm-table-cell fs-sm">Saldo</th>';
      //           //   // keuangan += '</tr>';
      //           //   // keuangan += '</thead>';
      //           //   response.data.forEach(function(data,index){
                  
      //           //     keuangan += `<tr>`;
      //           //     keuangan += `<td class="text-center fs-sm">${index+1}</td>`;
      //           //     keuangan += `<td class="fw-semibold fs-sm">${data.waktu}</td>`;
      //           //     keuangan += `<td class="d-none d-sm-table-cell fs-sm">${data.keterangan}</td>`;
      //           //     if(data.debit === null){
      //           //       keuangan += `<td class="d-none d-sm-table-cell fs-sm"></td>`;
      //           //     }else{
      //           //       keuangan += `<td class="d-none d-sm-table-cell fs-sm"><span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">${data.debit}</span></td>`;
      //           //     }
      //           //     if(data.kredit === null){
      //           //       keuangan += `<td class="d-none d-sm-table-cell fs-sm"></td>`;
      //           //     }else{
      //           //       keuangan += `<td class="d-none d-sm-table-cell fs-sm"><span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">${data.kredit}</span></td>`;
      //           //     }
                    
                    
      //           //     keuangan += `<td class="d-none d-sm-table-cell fs-sm"><span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">${data.saldo}</span></td>`;
      //           //   });
      //           //   // keuangan += '</table>';
      //           //   $('.keuangan').append(keuangan);
      //           //   // datatable
                  


      //         }
      //       });
      //     });
      //     function showresult(){
      //       $.ajax({
      //         url: "/admin/keuangan",
      //         method: "POST",
      //         data: {action: view, _token: _token},
      //         success: function(response) {
      //           $('.keuangan').html(response);
      //         }
      //       });
      //     }


      // });
    </script>
@endsection
