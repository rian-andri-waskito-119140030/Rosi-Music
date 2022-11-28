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
                href="/"
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
                  <a href="/" >Beranda</a>
                </li>
                <li class="scroll-to-section">
                  <a href="/#pricing">Daftar Paket</a>
                </li>
                <li class="scroll-to-section"><a href="/galeri" class="active">Gallery</a></li>
                <li class="scroll-to-section">
                  <a href="/tentang-kami">Tentang Kami</a>
                </li>
                <!-- <li class="scroll-to-section">
                  <a href="#newsletter">Newsletter</a>
                </li> -->
                @auth
                <li>
                  <link rel="stylesheet" href={{ URL::asset("assets/css/galeri-login.css")}} />
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
    @auth
    {{-- <?php dd($profil); ?> --}}
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

          @isset($data['pesanan'])
          <nav>
            <label for="btn-1" class="button">
              Status Pemesanan
              <span class="fas fa-caret-right"></span>
            </label>
            <input type="checkbox" id="btn-1" />
            <ul class="menu">
              <li>Status Pesanan : <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill <?php if($data['pesanan']->status=="Menunggu Validasi") {echo "bg-warning-light text-warning";} else if($data['pesanan']->status=="Tervalidasi") {echo "bg-success-light text-success";} else if($data['pesanan']->status=="Pesanan Ditolak") {echo "bg-danger-light text-danger";} ?>">{{ $data['pesanan']->status }}</span></li>
              <div style="margin-top: 5px !important">
                @if ($data['pesanan']->status== "Tervalidasi")
                <a
                href="checkout/{{ $data['pesanan']->id_pesanan }}"
                style="
                  text-decoration: none;
                  border: solid 1px #000000;
                  color: #fffdfd;
                  padding: 5px 10px;
                  border-radius: 5px;
                  background-color: rgb(54, 212, 54);
                  box-shadow: dimgray;
                  width: 20%;
                  height: 30%;
                ">
                Upload Bukti Pembayaran
              </a>
                @endif
                @if ($data['pesanan']->status== "Pesanan Ditolak")
                    <p  style="
                  margin-top: 10px;
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 600;
                  font-size: 14px;
                  line-height: 19px;
                  /* identical to box height */
                  letter-spacing: -0.006em;
                  color: #000000;
                ">Catatan Penolakan : {{ $data['ditolak']->catatan_penolakan }}</p>
                @endif
                
              </div>

              <br />
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
                {{ $data['pesanan']->paket->nama_paket }} :
              </p>
              <ul style="display: block; list-style: decimal-leading-zero">
                <?= $data['pesanan']->paket->deskripsi_panjang; ?>
              </ul>
            </ul>
          </nav>
          @endisset

          @if (!is_null($data['bukti']))
          <nav>
            <label for="btn2" class="button">
              Status Pembayaran
              <span class="fas fa-caret-right"></span>
            </label>
            <input type="checkbox" id="btn2" />
            
            <ul class="menu">
              @foreach ($data['bukti'] as $key => $item)
              <li>Bukti {{ $key+1 }} </li>
              <li>Nominal {{ rupiah($item->nominal) }}</li>
              <li>Status Pembayaran : {{ $item->status_pembayaran }}</li>
              @endforeach
            </ul>
           
          </nav> 
          @endif
          {{-- @isset($data['bukti'])
                    
          @endisset --}}

          @isset($data['hutang'])
          <nav>
            <label for="btn3" class="button">
              Hutang
              <span class="fas fa-caret-right"></span>
            </label>
            <input type="checkbox" id="btn3" />
            <ul class="menu">
              <li>Jumlah Hutang : {{ rupiah($data['hutang']->hutang) }} </li>
            </ul>
          </nav>              
          @endisset
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
                  src="assets/images/image-13.png"
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
              <span class="icon"><img src="{{ URL::asset("assets/images/image-6.png")}}" /></span>
              <span class="icon_title">Login menggunakan Google</span>
            </a>
          </div>
        </div>

        <!-- Username & Password Login form -->

        <!-- Register Form -->
      </section>
    </div>
    @endauth