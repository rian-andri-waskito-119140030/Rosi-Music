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
@endsection
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
  
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

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content">
          <!-- Quick Overview + Actions -->

          <!-- END Quick Overview + Actions -->

          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <a href="be_pages_ecom_products.html">
                <span class="fa fa-arrow-left text-secondary m-3"></span>
              </a>
              <h3 class="block-title">Tambah Jenis Paket</h3>
            </div>
            <div class="block-content">
              <div class="row m-auto">
                <div class="col-lg-12">
                  <form
                  action="/admin/barang/tambah"
                  method="POST"
                  enctype="multipart/form-data">
                  @csrf
                    <div class="row g-4">
                      <div class="col-6">
                        <label class="form-label">Nama Barang</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Masukkan Nama Barang"
                          name="nama_barang"
                          required />
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="example-file-input"
                          >Gambar</label
                        >
                        <input
                          class="form-control"
                          type="file"
                          id="example-file-input"
                          name="gambar"
                          required />
                      </div>
                      <div class="col-6 mb-4">
                        <!-- Select2 (.js-select2 class is initialized in Helpers.jqSelect2()) -->
                        <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                        <label
                          class="form-label"
                          for="one-ecom-product-category"
                          >Status</label
                        >
                        <select
                          class="js-select2 form-select"
                          id="one-ecom-product-category"
                          name="kondisi"
                          style="width: 100%"
                          data-placeholder="Pilih Status">
                          <option></option>
                          <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          <option value="Baik">Baik</option>
                          <option value="Rusak">Rusak</option>
                          <option value="Diperbaiki">Diperbaiki</option>
                        </select>
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
    <script src={{  URL::asset("assets/js/oneui.app.min.js") }}></script>

    <!-- jQuery (required for Select2 + Bootstrap Maxlength plugin) -->
    <script src={{  URL::asset("assets/js/lib/jquery.min.js") }}></script>

    <!-- Page JS Plugins -->
    <script src={{  URL::asset("assets/js/plugins/select2/js/select2.full.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/ckeditor/ckeditor.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/dropzone/min/dropzone.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/flatpickr/flatpickr.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/select2/js/select1.full.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js") }}></script>
    <script src={{  URL::asset("assets/js/plugins/dropzone/min/dropzone.min.js") }}></script>

    <!-- Page JS Helpers (Select2 + Bootstrap Maxlength + CKEditor plugins) -->

    <script>
      One.helpersOnLoad([
        "js-flatpickr",
        "jq-datepicker",
        "jq-maxlength",
        "jq-select2",
        "jq-select2",
        "jq-masked-inputs",
        "jq-rangeslider",
        "jq-colorpicker",
        "js-ckeditor",
      ]);
    </script>
@endsection