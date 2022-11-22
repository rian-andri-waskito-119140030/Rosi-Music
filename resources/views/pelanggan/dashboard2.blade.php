<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/images/logo-rm.png" />
    <title>Rosi Music</title>

    <!-- Bootstrap core CSS -->
    <link href={{ URL::asset('vendor/bootstrap/css/bootstrap.min.css')}} rel="stylesheet" />

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
     
    <link rel="stylesheet" href={{ URL::asset('assets/css/templatemo-chain-app-dev.css')}} />
    <link rel="stylesheet" href={{ URL::asset('assets/css/animated.css')}} />
    <link rel="stylesheet" href={{ URL::asset('assets/css/owl.css')}} />
  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <!-- {{-- <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div> --}} -->
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
                  color: white;
                  font-weight: 600px;
                  font-family: 'Source Serif Pro';
                ">
                ROSI MUSIC
              </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li class="scroll-to-section">
                  <a href="/" class="active">Beranda</a>
                </li>
                <li class="scroll-to-section">
                  <a href="#pricing">Daftar Paket</a>
                </li>
                <li class="scroll-to-section"><a href="/galeri">Gallery</a></li>
                <li class="scroll-to-section">
                  <a href="/tentang-kami">Tentang Kami</a>
                </li>
                <!-- <li class="scroll-to-section">
                  <a href="#newsletter">Newsletter</a>
                </li> -->
                @auth
                <link rel="stylesheet" type="text/css" href={{ URL::asset('assets/css/dashboard.css'); }} />
                <li>
                  <div class="">
                    <a id="modal_trigger" href="#modal"
                    ><i class=""></i
                      ><img
                        src="{{ auth()->guard('pelanggan')->user()->avatar }}"
                        style="width: 46px; height: 46px; border-radius: 50%"
                        /></a>
                    </div>
                </li>
            
               
            
                  @else
                  <li>
                    <div class="gradient-button">
                      <a id="modal_trigger" href="#modal"
                        ><i class=""></i>Login Sekarang</a
                      >
                    </div>
                  </li>
                  
                
                @endauth
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
@auth
    <div id="modal" class="popupContainer" style="display: none; float: left">
                  <div class="popupHeader">
                    <span class="header_title" style="color: white">Profile</span>
                    <span class="modal_close"><i class="fa fa-times"></i></span>
                  </div>
                  <section class="popupBody">
                    <!-- User Profile -->
                    <div class="user_profile">
                      <img
                        src="{{ auth()->guard('pelanggan')->user()->avatar }}"
                        class="mx-auto"
                        style="
                          width: 112px;
                          height: 112px;
                          border-radius: 50%;
                          margin-left: 100px;
                          margin-bottom: 10px;
                        " />
                      <h5>{{ auth()->guard('pelanggan')->user()->nama }}</h5>
                      <img
                        src="assets/images/heading-line-dec.png"
                        alt=""
                        style="width: 33px; height: 4px" />
                    </div>
            
                    <div class="detail_profile">
                      <!-- Detail Profile -->
                      <!-- dropdown animated -->
                      <nav>
                        <label for="btn" class="button">
                          Profile
                          <span class="fas fa-caret-right"></span>
                        </label>
                        <input type="checkbox" id="btn" />
                        <ul class="menu">
                          <li>Nama : {{ auth()->guard('pelanggan')->user()->nama }}</li>
                          <li>Email: {{ auth()->guard('pelanggan')->user()->email }}</li>
                        </ul>
                      </nav>
                      <nav>
                        <label for="btn-1" class="button">
                          Status Pemesanan
                          <span class="fas fa-caret-right"></span>
                        </label>
                        <input type="checkbox" id="btn-1" />
                        <ul class="menu">
                          <li>Status Pesanan : Menunggu Validasi</li>
                          Informasi Pesanan :
              <p
                style="
                  margin-top: 10px;
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 600;
                  font-size: 14px;
                  line-height: 19px;
                  /* identical to box height */

                  letter-spacing: -0.006em;

                  color: #000000;
                ">
                Paket 1 Non-MC :
              </p>
              <ul style="display: block; list-style: decimal-leading-zero">
                <li>1 Paket sound system</li>
                <li>1 Paket sound system</li>
                <li>1 Paket sound system</li>
                <li>1 Paket sound system</li>
              </ul>
                        </ul>
                      </nav>
                     <nav>
                      
            <form action="/logout" method="post">
              @csrf
              <button
                type="submit"
                class="btn mt-3"
                style="
                  background-color: white;
                  width: 108%;
                  border-bottom: 1px solid #e8e8e8;
                  border-top: 1px solid #e8e8e8;
                ">
                <p
                  style="
                    float: left;
                    margin-left: -5%;
                    font-family: 'Source Serif Pro';
                    font-style: normal;
                    font-weight: 600;
                    font-size: 18px;
                    line-height: 23px;

                    letter-spacing: -0.006em;

                    color: #000000;
                  ">
                  Log Out
                </p>
                <img
                  src="assets/images/image-12.png"
                  style="width: 20px; height: 20px; float: right" />
              </button>
            </form>
          </nav>
                    </div>
                    <!-- Social Login -->
                    <!-- <div class="social_login">
                      <div class="">
                        <a href="#" class="social_box google">
                          <span class="icon"><i class="fab fa-google-plus"></i></span>
                          <span class="icon_title">Connect with Google</span>
                        </a>
                      </div>
                    </div> -->
            
                    <!-- Username & Password Login form -->
            
                    <!-- Register Form -->
                  </section>
                </div>
    

        <!-- Username & Password Login form -->

        <!-- Register Form -->
       
      </section>
    </div>
    @else
     <div id="modal" class="popupContainer" style="display: none">
      <div class="popupHeader">
        <span class="modal_close"><i class="fa fa-times"></i></span>
        <span class="header_title">Login</span>
      </div>

      <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login">
          <div class="">
            <a href="/auth/google" class="social_box google">
              <span class="icon"><img src="assets/images/image-6.png" /></span>
              <span class="icon_title">Login menggunakan Google</span>
            </a>
          </div>
        </div>

        <!-- Username & Password Login form -->

        <!-- Register Form -->
      </section>
    </div>
     @endauth
    {{-- <?php print(Auth::guard('pelanggan'))->user(); ?> --}}
    <div
      class="main-banner wow fadeIn"
      id="top"
      data-wow-duration="1s"
      data-wow-delay="0.5s">
      <div class="container m-19">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6 align-self-center">
                <div
                  class="left-content show-up header-text wow fadeInLeft"
                  data-wow-duration="1s"
                  data-wow-delay="1s">
                  <div class="row">
                    <div class="col-lg-12">
                      <h2>Rosi</h2>
                      <h2>Music</h2>
                    </div>
                    <!-- <div class="col-lg-12">
                      <div class="white-button first-button scroll-to-section">
                        <a href="#contact"
                          >Free Quote <i class="fab fa-apple"></i
                        ></a>
                      </div>
                      <div class="white-button scroll-to-section">
                        <a href="#contact"
                          >Free Quote <i class="fab fa-google-play"></i
                        ></a>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-6">
                <div
                  class="right-image wow fadeInRight"
                  data-wow-duration="1s"
                  data-wow-delay="0.5s">
                  <img src="assets/images/slider-dec.png" alt="" />
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="services" class="services section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div
              class="section-heading wow fadeInDown"
              data-wow-duration="1s"
              data-wow-delay="0.5s">
              <h4>Kenapa Harus Rosi Musik?</h4>
              <img src={{ URL::asset('assets/images/heading-line-dec.png')}} alt="" />
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="service-item first-service">
              <div class="icon"></div>
              <h4>Kru Berpengalaman</h4>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.
              </p>
              <!-- <div class="text-button">
                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
              </div> -->
            </div>
          </div>
          <div class="col-lg-3">
            <div class="service-item second-service">
              <div class="icon"></div>
              <h4>Pelayanan Yang Cepat</h4>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.
              </p>
              <!-- <div class="text-button">
                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
              </div> -->
            </div>
          </div>
          <div class="col-lg-3">
            <div class="service-item third-service">
              <div class="icon"></div>
              <h4>Banyak Pilihan Paket</h4>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.
              </p>
              <!-- <div class="text-button">
                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
              </div> -->
            </div>
          </div>
          <div class="col-lg-3">
            <div class="service-item fourth-service">
              <div class="icon"></div>
              <h4>Bebas Konsultasi</h4>
              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.
              </p>
              <!-- <div class="text-button">
                <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="pricing" class="pricing-tables">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="section-heading">
              <h4>Pilihan Paket Harga</h4>
              <img src={{ URL::asset('assets/images/heading-line-dec.png')}} alt="" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eismod tempor incididunt ut labore et dolore magna.
              </p>
            </div>
          </div>
          {{-- <?php dd($data[0]->id_jenis_paket); ?> --}}
          @foreach ($data as $item)
          <div class="col-lg-6">
            <div class="pricing-item-regular">
              <div class="img-thumbnail m-3">
                <img src='storage/jenis_paket/{{ $item->gambar }}' alt={{ $item->jenis_paket }} />
              </div>
              <h4>{{ $item->jenis_paket }}</h4>
              <p>
                {{ $item->deskripsi }}
              </p>
              <div class="border-button">
                <a href="/jenis-paket/{{ $item->id_jenis_paket }}">Lihat Semua</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div id="clients" class="the-clients">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="section-heading">
              <h4>Testimoni Dari</h4>
              <h4>Pelanggan Rosi Music</h4>
              <img src={{ URL::asset('assets/images/image-3.png')}} alt="" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eismod tempor incididunt ut labore et dolore magna.
              </p>
            </div>
          </div>
          <div class="">
            <ul class="nacc">
              <li class="active">
                <div>
                  <div class="thumb">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="client-content">
                          <img src={{ URL::asset('assets/images/quote.png')}} alt="" />
                          <p>
                            “Lorem ipsum dolor sit amet, consectetur adpiscing
                            elit, sed do eismod tempor idunte ut labore et
                            dolore magna aliqua darwin kengan lorem ipsum dolor
                            sit amet, consectetur picing elit massive big
                            blasta.”
                          </p>
                        </div>
                        <div class="down-content">
                          <img src={{ URL::asset('assets/images/client-image.jpg')}} alt="" />
                          <div class="right-content">
                            <h4>David Martino</h4>
                            <span>CEO of David Company</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="client-content">
                          <img src={{ URL::asset('assets/images/quote.png')}} alt="" />
                          <p>
                            “Lorem ipsum dolor sit amet, consectetur adpiscing
                            elit, sed do eismod tempor idunte ut labore et
                            dolore magna aliqua darwin kengan lorem ipsum dolor
                            sit amet, consectetur picing elit massive big
                            blasta.”
                          </p>
                        </div>
                        <div class="down-content">
                          <img src={{ URL::asset('assets/images/client-image.jpg')}} alt="" />
                          <div class="right-content">
                            <h4>David Martino</h4>
                            <span>CEO of David Company</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <!-- <div class="col-lg-6">
            <div class="client-item">
              <p>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eismod tempor incididunt ut labore et dolore magna."
              </p>
              <h4 style="text-align: center">John Doe</h4>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="client-item">
              <p>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eismod tempor incididunt ut labore et dolore magna."
              </p>
              <h4 style="text-align: center">John Doe</h4>
              <p style="text-align: center">Jakarta, Indonesia</p>
            </div>
          </div> -->
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
   
    <script src={{ URL::asset('vendor/jquery/jquery.min.js')}}></script>
    <script src={{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>
    <script src={{ URL::asset('assets/js/owl-carousel.js')}}></script>
    <script src={{ URL::asset('assets/js/animation.js')}}></script>
    <script src={{ URL::asset('assets/js/imagesloaded.js')}}></script>
    <script src={{ URL::asset('assets/js/popup.js')}}></script>
    <script src={{ URL::asset('assets/js/custom.js')}}></script>
  </body>
</html>
