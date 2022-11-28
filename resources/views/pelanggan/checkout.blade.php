<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet" />

    <link rel="icon" type="image/x-icon" href="assets/images/logo-rm.png" />
    <title>Rosi Music</title>

    <!-- Bootstrap core CSS -->
    <link href={{ URL::asset("vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet" />

    <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous" />
    <link rel="stylesheet" href={{ URL::asset("assets/css/pesanan.css")}} />
    <link rel="stylesheet" href={{ URL::asset("assets/css/animated.css")}} />
    <link rel="stylesheet" href={{ URL::asset("assets/css/owl.css")}} />
  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
   @include('layout.user_nav')
    <!-- ***** Header Area End ***** -->

    {{-- <?php dd($data); ?> --}}

    

    <div class="container">
      <div class="deskripsi"><p>Checkout</p></div>
    </div>
    <div
      class="main-banner wow fadeIn"
      id="top"
      data-wow-duration="1s"
      data-wow-delay="0.5s"></div>
    <div class="container checkout m-auto" style="margin: -200px">
      <div class="row">
        <div class="card text-center border-0">
          <div class="card-body">
            <h5 class="card-title label-checkout mb-5">
              Selamat Pesanan Anda Telah Tervalidasi
            </h5>
            <p class="card-text bayar-dp mb-5">
              Silahkan lakukan pembayaran minimal sebesar {{ rupiah(0.5*$pesanan->total_bayar) }} ke rekening
              berikut: <br />
              <b>Bank BCA</b> <br />
              No. Rekening: 1234567890 <br />
              Atas Nama: Rosi Music
            </p>
            <!-- upload bukti pembayaran -->
            <p class="card-text bayar-dp">
              Masukkan bukti pembayaran dibawah ini
            </p>
            <form
            action="/checkout"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_transaksi" value="{{ $pesanan->id_transaksi }}">
              <div class="row g-4">
                <div class="col-6">
                  <label class="form-label">Nominal</label>
                  <input
                    type="number"
                    class="form-control"
                    min="{{ 0.5*$pesanan->total_bayar }}"
                    value="{{ 0.5*$pesanan->total_bayar }}"
                    placeholder="Masukkan Nominal"
                    name="nominal"
                    required />
                </div>
                <div class="col-6">
                  <label class="form-label" for="example-file-input"
                    >Bukti Pembayaran</label
                  >
                  <input
                    class="form-control"
                    type="file"
                    id="example-file-input"
                    name="bukti"
                    required />
                    @if ($errors->has('bukti'))
                      <span class="text-danger">{{ $errors->first('bukti') }}</span>
                    @endif
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

    <footer id="newsletter">
      <div class="container">
        <!-- <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="section-heading">
              <h4>
                Join our mailing list to receive the news &amp; latest trends
              </h4>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3">
            <form id="search" action="#" method="GET">
              <div class="row">
                <div class="col-lg-6 col-sm-6">
                  <fieldset>
                    <input
                      type="address"
                      name="address"
                      class="email"
                      placeholder="Email Address..."
                      autocomplete="on"
                      required />
                  </fieldset>
                </div>
                <div class="col-lg-6 col-sm-6">
                  <fieldset>
                    <button type="submit" class="main-button">
                      Subscribe Now <i class="fa fa-angle-right"></i>
                    </button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div> -->
        <div class="row mt-3">
          <div class="col-lg-4">
            <div class="footer-widget">
              <h4>ROSI MUSIC</h4>
              <div class="social_footer">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter m-3"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer-widget">
              <h4>Informasi</h4>
              <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Daftar Paket</a></li>
                <li><a href="#">Galeri</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer-widget">
              <h4>Hubungi Kami</h4>
              <ul>
                <li><a href="#">+62895347363386</a></li>
                <li><a href="#">rosimusic46@gmail.com</a></li>
              </ul>
            </div>
          </div>
          <!-- <div class="col-lg-3">
            <div class="footer-widget">
              <h4>About Our Company</h4>
              <div class="logo">
                <img src="assets/images/white-logo.png" alt="" />
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore.
              </p>
            </div>
          </div> -->
          <!-- <div class="col-lg-12">
            <div class="copyright-text">
              <p>
                Copyright © 2022 Chain App Dev Company. All Rights Reserved.
                <br />Design:
                <a
                  href="https://templatemo.com/"
                  target="_blank"
                  title="css templates"
                  >TemplateMo</a
                >
              </p>
            </div>
          </div> -->
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src={{ URL::asset("vendor/jquery/jquery.min.js")}}></script>
    <script src={{ URL::asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <script src={{ URL::asset("assets/js/owl-carousel.js")}}></script>
    <script src={{ URL::asset("assets/js/animation.js")}}></script>
    <script src={{ URL::asset("assets/js/imagesloaded.js")}}></script>
    <script src={{ URL::asset("assets/js/popup.js")}}></script>
    <script src={{ URL::asset("assets/js/custom.js")}}></script>
    <script>
      $("#myForm").on("submit", function (e) {
        $("#myModal").modal("show");
        e.preventDefault();
      });
    </script>
  </body>
</html>
