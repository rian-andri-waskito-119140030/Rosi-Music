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

    <link rel="icon" type="image/x-icon" href={{ URL::asset("assets/images/logo-rm.png")}} />
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
    
    @include('layout.user_nav')
    
    <div class="container">
      <div class="deskripsi"><p>Checkout</p></div>
    </div>
    
    <div
      class="main-banner wow fadeIn"
      id="top"
      data-wow-duration="1s"
      data-wow-delay="0.5s"></div>
      <div id="alert">
          
        </div>
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
              <h5 class="card-title mb-5">Ringkasan Pemesanan</h5>
              <div class="row deskripsi-paket mb-4">
                <div class="col-md-6">
                  <img
                    src='{{ URL::asset("storage/paket/")}}/{{ $paket->gambar }}'
                    alt=""
                    class="img-fluid"
                    style="width: 139px; height: 118px" />
                </div>
                <div class="col-md-6">
                  <p class="text-right nama-paket">{{ $paket->nama_paket }}</p>
                  <p class="text-right harga-paket">{{ rupiah($paket->harga_sewa) }}</p>
                </div>
              </div>
              <div class="rincian-paket mb-4">
                <h6>Pada Paket ini akan berisi:</h6>
                <ul class="aksesoris">
                  <?= $paket->deskripsi_panjang; ?>
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
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div
            class="card"
            style="
              box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
              border-radius: 10px;
            ">
            <div class="card-body">
              <h5 class="card-title mb-5">Isi Data</h5>
              <form action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="">Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nama Lengkap"
                      value="{{Auth::guard('pelanggan')->user()->nama}}"
                      required />
                    <input type="text" class="form-control"  name="id_pelanggan" value="{{Auth::guard('pelanggan')->user()->id}}" style='display:none'>
                  </div>
                  <div class="col-md-6">
                    <label for="">Nama Paket</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nama Paket"
                      value="{{ $paket->nama_paket }}"
                      required />
                      <input type="text" class="form-control"  name="id_paket" value="{{ $paket->id_paket }}" style='display:none'>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Tanggal Mulai</label>
                    <input
                      id="tgl1"
                      name="tanggal_booking"
                      type="date"
                      class="form-control"
                      placeholder="Last name"
                      required />
                  </div>
                  <div class="col-md-6">
                    <label for="">Tanggal Selesai</label>
                    <input
                      id="tgl2"
                      name="tanggal_selesai"
                      type="date"
                      class="form-control"
                      placeholder="Tanggal"
                      required />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">No Hp.</label>
                    <input
                      type="text"
                      name="no_hp"
                      class="form-control"
                      placeholder="No Hp."
                      required />
                  </div>
                  <div class="col-md-6">
                    <label for="">Alamat</label>
                    <input
                      type="text"
                      name="alamat"
                      class="form-control"
                      placeholder="Alamat"
                      required />
                  </div>
                  <div class="col-12 mb-3">
                    <label for="">Catatan</label>
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      name="catatan"
                      rows="3"
                      ></textarea>
                  </div>
                  {{-- <div class="confirm-pesan mb-2">
                    <button class="btn btn-success btn" type="submit">
                      Pesan
                    </button>
                  </div> --}}
                  <div class="tombol-pesan">
                    <button
                      class="btn btn-success btn"
                      type="submit"
                      data-bs-toggle="modal"
                      data-bs-target="#exampleModal">
                      Pesan
                    </button>
                    {{-- <div
                      class="modal fade"
                      id="exampleModal"
                      tabindex="-1"
                      aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <!-- <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Modal title
                      </h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    </div> -->
                          <div class="modal-body text-center">
                            <img
                              src="assets/images/image-12.png"
                              alt=""
                              style="margin-bottom: 20px" />
                            <p
                              style="
                                font-family: 'Roboto';
                                font-style: normal;
                                font-weight: 400;
                                font-size: 20px;
                                line-height: 23px;
                                text-align: center;
                                letter-spacing: -0.006em;
                                color: #000000;
                                margin-bottom: 20px;
                              ">
                              Silahkan Menunggu Status Pemesanan Di Menu Profile
                            </p>
                            <a href="/"
                              ><button
                                style="
                                  width: 250px;
                                  height: 52px;
                                  background: linear-gradient(
                                    267.4deg,
                                    #5676ed 6.18%,
                                    #30d3fc 100%
                                  );
                                  border-radius: 10px;
                                  border: none;
                                  color: white;
                                ">
                                Kembali Ke Beranda
                              </button></a
                            >
                          </div>
                          <!-- <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Close
                      </button>
                      <button type="button" class="btn btn-primary">
                        Save changes
                      </button>
                    </div> -->
                        </div>
                      </div> --}}
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- <?php dd($data); ?> --}}
       
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
      // check datepicker not less than today
      $(document).ready(function () {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, "0");
        var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + "-" + mm + "-" + dd;
        $("#tgl1").attr("min", today);
      });
      $(document).ready(function () {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, "0");
        var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + "-" + mm + "-" + dd;
        $("#tgl2").attr("min", today);
      });

      // check datepicker not less than tgl1
      $(document).ready(function () {
        $("#tgl2").change(function () {
          var tgl1 = $("#tgl1").val();
          var tgl2 = $("#tgl2").val();
          if (tgl1 > tgl2) {
            //custom alert
            var alert = '';
            alert += '<div class="alert alert-danger alert-dismissible fade show m-5" role="alert">';
            alert += '<strong>Peringatan!</strong> Tanggal kedua tidak boleh kurang dari tanggal pertama.';
            alert += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            alert += '</div>';
            $("#alert").html(alert);
            $("#tgl2").val("");
          }
        });
      });


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
                    $("#selisih").html(formatRupiah((diffDays+1)*{{ $paket->harga_sewa }}-(diffDays*200000)));
                    if (diffDays < 0) {
                        $("#selisih").html(' ');
                    }


                }
              

            });
        });
    </script> 
  </body>
</html>
