@extends('layout.base_admin')
@section('style')
    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
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
          <!-- Quick Overview + Actions -->

          <!-- END Quick Overview + Actions -->

          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <a href="/admin/pesanan-wa">
                <span class="fa fa-arrow-left text-secondary m-3"></span>
              </a>
              <h3 class="block-title">Tambah Pesanan Via Whatsapp</h3>
            </div>
            <div class="block-content">
              <div class="row m-auto">
                <div class="col-lg-12">
                  <form
                  action="/admin/pesanan-wa/tambah"
                  method="POST"
                  enctype="multipart/form-data">
                  @csrf
                    <div class="row g-4">
                      <div class="col-6">
                        <label class="form-label">Nama Pelanggan</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Nama Pelanggan"
                          name="nama"
                          required />
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="example-select"
                          >Pilihan Paket</label
                        >
                        <select
                          class="js-select2 form-select"
                          id="example-select"
                          name="id_paket"
                          required>
                          @foreach ($data as $item)
                            <option value="{{ $item->id_paket }}">{{ $item->nama_paket }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="example-flatpickr-custom"
                          >Tanggal Mulai</label
                        >
                        <input
                          type="text"
                          class="js-flatpickr form-control"
                          id="example-flatpickr-custom"
                          name="tanggal_booking"
                          placeholder="d/m/y"
                          required />
                      </div>
                      
                      <div class="col-6">
                        <label class="form-label" for="example-flatpickr-custom"
                          >Tanggal Selesai</label
                        >
                        <input
                          type="text"
                          class="js-flatpickr form-control"
                          id="example-flatpickr-custom"
                          name="tanggal_selesai"
                          placeholder="d/m/y"
                          required />
                      </div>
                      <!-- <div class="col-6">
                        <label class="form-label" for="example-select"
                          >Status</label
                        >
                        <select
                          class="form-select"
                          id="example-select"
                          name="example-select"
                          required>
                          <option selected>Pilih Status</option>
                          <option value="1">Tervalidasi</option>
                          <option value="2">Menunggu Validasi</option>
                          <option value="3">Pesanan Ditolak</option>
                        </select>
                      </div> -->
                      <div class="col-6">
                        <label
                          class="form-label"
                          for="one-ecom-product-description-short"
                          >Alamat</label
                        >
                        <textarea
                          class="form-control"
                          id="one-ecom-product-description-short"
                          name="alamat"
                          rows="4"
                          placeholder="Masukkan Alamat"
                          required></textarea>
                      </div>
                      <div class="col-6">
                        <label class="form-label">No HP</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Masukkan No HP"
                          name="no_hp"
                          required />
                      </div>
                      
                    </div>

                    <div class="mb-7">
                      <button type="submit" class="btn btn-primary float-end">
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->

          <!-- Meta Data -->

          <!-- END Meta Data -->

          <!-- Media -->

          <!-- END Media -->
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

    <!-- jQuery (required for Select2 + Bootstrap Maxlength plugin) -->
    <script src={{ URL::asset("assets/js/lib/jquery.min.js")}}></script>

    <!-- Page JS Plugins -->
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

    <!-- Page JS Helpers (Select2 + Bootstrap Maxlength + CKEditor plugins) -->

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
    </script>
 @endsection
