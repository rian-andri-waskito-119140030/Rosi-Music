@extends('layout.base_admin')
@section('style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css")}}/>
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
    <link
      rel="stylesheet"
      href={{ URL::asset("assets/js/plugins/magnific-popup/magnific-popup.css")}} />

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

      {{-- <?php dd($data); ?> --}}
      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content">
          <!-- Quick Overview + Actions -->

          <!-- END Quick Overview + Actions -->

          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <a href="be_pages_ecom_products_sistem.html">
                <span class="fa fa-arrow-left text-secondary m-3"></span>
              </a>
              <h3 class="block-title">Info Pesanan Via Sistem</h3>
            </div>
            <div class="block-content">
              <div class="row m-auto">
                <div class="col-lg-12">
                  <form
                    action="{{ route('bukti-pembayaran.update', $pesanan->id_bukti_pembayaran) }}"
                    method="POST"
                    >
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                      <div class="col-6">
                        <label class="form-label">Id Bukti Pembayaran</label>
                        <input
                          type="text"
                          class="form-control"
                          name="id_bukti_pembayaran"
                          value="{{ $pesanan->id_bukti_pembayaran }}"
                           />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Id Transaksi</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="{{ $pesanan->id_transaksi }}"
                          disabled />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Nama</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="{{ $pesanan->nama }}"
                          disabled />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Jenis Paket</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="{{ $pesanan->jenis_paket }}"
                          disabled />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Tanggal Mulai</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="{{ $pesanan->tanggal_booking }}"
                          disabled />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Pilihan Paket</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="{{ $pesanan->nama_paket }}"
                          disabled />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Tanggal Selesai</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="{{ $pesanan->tanggal_selesai }}"
                          disabled />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Nominal</label>
                        <input
                          type="number"
                          min="{{ 0.5*$pesanan->total_bayar }}"
                          class="form-control"
                          name="nominal"
                          value="{{ $pesanan->nominal }}"
                          />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Total Bayar</label>
                        <input
                          type="number"
                          
                          class="form-control"
                          placeholder="{{ rupiah($pesanan->total_bayar) }}"
                          disabled
                          />
                      </div>
                      <div class="col-6">
                        <label class="form-label">Bukti Pembayaran</label>
                         <div class="row items-push js-gallery img-fluid-200">
                                                  <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                                                    <a
                                                      class="img-link img-link-zoom-in img-thumb img-lightbox"
                                                      href="{{ URL::asset("storage/bukti_pembayaran/")}}/{{ $pesanan->bukti }}">
                                                      <img
                                                        class="img-fluid"
                                                        src='{{ URL::asset("storage/bukti_pembayaran/")}}/{{ $pesanan->bukti }}' />
                                
                                                    </a>
                                                  </div>
                                              </div>
                      </div>
                      <!-- <div class="col-6">
                        <label class="form-label">Status</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="{{ $pesanan->status }}"
                          disabled />
                      </div>
                      
                      <div class="col-6">
                        <label
                          class="form-label"
                          for="one-ecom-product-description-short"
                          >Alamat</label
                        >
                        <textarea
                          class="form-control"
                          id="one-ecom-product-description-short"
                          name="one-ecom-product-description-short"
                          rows="4"
                          placeholder="{{ $pesanan->alamat }}"
                          disabled></textarea>
                      </div>
                      <div class="col-6">
                        <label class="form-label">No HP</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="{{ $pesanan->no_hp }}"
                          disabled />
                      </div>
                      <div class="col-6 mb-4">
                        <label
                          class="form-label"
                          for="one-ecom-product-description-short"
                          >Catatan</label
                        >
                        <textarea
                          class="form-control"
                          id="one-ecom-product-description-short"
                          name="one-ecom-product-description-short"
                          rows="4"
                          placeholder="{{ $pesanan->catatan }}"
                          disabled></textarea>
                      </div> -->
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
    <script src={{ URL::asset("assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js")}}></script>
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
        "jq-magnific-popup",
      ]);
    </script>
@endsection
