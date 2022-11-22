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
    <header
      class="header-area header-sticky wow slideInDown"
      data-wow-duration="0.75s"
      data-wow-delay="0s">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a
                href="index.html"
                class="logo"
                style="
                  font-size: 32px;
                  color: black;
                  font-weight: 600px;
                  font-family: 'Source Serif Pro';
                ">
                ROSI MUSIC
              </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li class="scroll-to-section">
                  <a href="index.html">Beranda</a>
                </li>
                <li class="scroll-to-section">
                  <a href="#services" class="active">Daftar Paket</a>
                </li>
                <li class="scroll-to-section"><a href="#about">Galeri</a></li>
                <li class="scroll-to-section">
                  <a href="#pricing">Tentang Kami</a>
                </li>
                <!-- <li class="scroll-to-section">
                  <a href="#newsletter">Newsletter</a>
                </li> -->
                <li>
                  <div class="gradient-button">
                    <a id="modal_trigger" href="#modal"
                      ><i class="fa fa-sign-in-alt"></i> Login Sekarang</a
                    >
                  </div>
                </li>
              </ul>
              <a class="menu-trigger">
                <span>Menu</span>
              </a>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div id="modal" class="popupContainer" style="display: none">
      <div class="popupHeader">
        <span class="header_title">Login</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
      </div>

      <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login">
          <div class="">
            <a href="#" class="social_box fb">
              <span class="icon"><i class="fab fa-facebook"></i></span>
              <span class="icon_title">Connect with Facebook</span>
            </a>

            <a href="#" class="social_box google">
              <span class="icon"><i class="fab fa-google-plus"></i></span>
              <span class="icon_title">Connect with Google</span>
            </a>
          </div>

          <div class="centeredText">
            <span>Or use your Email address</span>
          </div>

          <div class="action_btns">
            <div class="one_half">
              <a href="#" id="login_form" class="btn">Login</a>
            </div>
            <div class="one_half last">
              <a href="#" id="register_form" class="btn">Sign up</a>
            </div>
          </div>
        </div>

        <!-- Username & Password Login form -->
        <div class="user_login">
          <form>
            <label>Email / Username</label>
            <input type="text" />
            <br />

            <label>Password</label>
            <input type="password" />
            <br />

            <div class="checkbox">
              <input id="remember" type="checkbox" />
              <label for="remember">Remember me on this computer</label>
            </div>

            <div class="action_btns">
              <div class="one_half">
                <a href="#" class="btn back_btn"
                  ><i class="fa fa-angle-double-left"></i> Back</a
                >
              </div>
              <div class="one_half last">
                <a href="#" class="btn btn_red">Login</a>
              </div>
            </div>
          </form>

          <a href="#" class="forgot_password">Forgot password?</a>
        </div>

        <!-- Register Form -->
        <div class="user_register">
          <form>
            <label>Full Name</label>
            <input type="text" />
            <br />

            <label>Email Address</label>
            <input type="email" />
            <br />

            <label>Password</label>
            <input type="password" />
            <br />

            <div class="checkbox">
              <input id="send_updates" type="checkbox" />
              <label for="send_updates">Send me occasional email updates</label>
            </div>

            <div class="action_btns">
              <div class="one_half">
                <a href="#" class="btn back_btn"
                  ><i class="fa fa-angle-double-left"></i> Back</a
                >
              </div>
              <div class="one_half last">
                <a href="#" class="btn btn_red">Register</a>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
    <div class="container">
      <div class="deskripsi"><p>Checkout</p></div>
    </div>
    <div
      class="main-banner wow fadeIn"
      id="top"
      data-wow-duration="1s"
      data-wow-delay="0.5s"></div>
    <div class="container pesanan m-auto" style="margin: -200px">
      <div class="row">
        <div class="col-sm-6">
          <div
            class="card"
            style="
              box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
              border-radius: 10px;
            ">
            <div class="card-body">
              <h5 class="card-title mb-5">Isi Data</h5>
              <form>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nama Lengkap"
                      required />
                  </div>
                  <div class="col-md-6">
                    <label for="">Nama Paket</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nama Paket"
                      value="{{ $data->nama_paket }}"
                      required />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Tanggal Mulai</label>
                    <input
                      id="tgl1"
                      type="date"
                      class="form-control"
                      placeholder="Last name"
                      required />
                  </div>
                  <div class="col-md-6">
                    <label for="">Tanggal Selesai</label>
                    <input
                      id="tgl2"
                      type="date"
                      class="form-control"
                      placeholder="Tanggal"
                      required />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">No Telepon</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="No Telepon"
                      required />
                  </div>
                  <div class="col-md-6">
                    <label for="">Alamat</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Alamat"
                      required />
                  </div>
                  <div class="col-12 mb-3">
                    <label for="">Catatan</label>
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                      required></textarea>
                  </div>
                  <div class="confirm-pesan mb-2">
                    <button class="btn btn-success btn" type="submit">
                      Simpan
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- <?php dd($data); ?> --}}
        <div class="col-sm-6">
          <div
            class="card"
            style="
              box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
              border-radius: 10px;
            ">
            <div class="card-body">
              <h5 class="card-title mb-5">Ringkasan Pemesanan</h5>
              <div class="row deskripsi-paket mb-4">
                <div class="col-md-6">
                  <img
                    src='{{ URL::asset("storage/paket/")}}/{{ $data->gambar }}'
                    alt=""
                    class="img-fluid"
                    style="width: 139px; height: 118px" />
                </div>
                <div class="col-md-6">
                  <p class="text-right nama-paket">{{ $data->nama_paket }}</p>
                  <p class="text-right harga-paket">{{ rupiah($data->harga_sewa) }}</p>
                </div>
              </div>
              <div class="rincian-paket mb-4">
                <h6>Pada Paket ini akan berisi:</h6>
                <ul class="aksesoris">
                  <?= $data->deskripsi_panjang; ?>
                </ul>
              </div>

              <div class="card-footer bg-transparent border-2 m-auto">
                <div class="harga-pesanan mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <p class="text-left nama-paket">Total Harga</p>
                    </div>
                    <div class="col-md-6">
                      <p id='selisih' class="text-right harga-paket"></p>
                    </div>
                  </div>
                </div>
                <div class="tombol-pesan">
                  <a href="checkout.html"
                    ><button class="btn btn-success btn" type="submit">
                      Pesan
                    </button></a
                  >
                </div>
              </div>
            </div>
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
      const formatRupiah = (money) => {
        return new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 0
        }).format(money);
      }
        $(document).ready(function() {
            $('#tgl1, #tgl2').on('change textInput input', function () {
                if ( ($("#tgl1").val() != "") && ($("#tgl2").val() != "")) {
                    var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                    var firstDate = new Date($("#tgl1").val());
                    var secondDate = new Date($("#tgl2").val());
                    var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
                    $("#selisih").html(formatRupiah((diffDays+1)*{{ $data->harga_sewa }}-(diffDays*200000)));
                }
            });
        });
    </script> 
  </body>
</html>
