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
                  <a href="/">Beranda</a>
                </li>
                <li class="scroll-to-section">
                  <a href="daftar-paket.html" class="active">Daftar Paket</a>
                </li>
                <li class="scroll-to-section">
                  <a href="galeri.html">Galeri</a>
                </li>
                <li class="scroll-to-section">
                  <a href="tentang-kami.html">Tentang Kami</a>
                </li>
                <!-- <li class="scroll-to-section">
                  <a href="#newsletter">Newsletter</a>
                </li> -->
                <li>
                  <div class="">
                    <a id="modal_trigger" href="#modal"
                      ><i class=""></i
                      ><img
                        src={{ URL::asset("assets/images/94084743_p0.jpg")}}
                        style="width: 46px; height: 46px; border-radius: 50%"
                    /></a>
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

    <div id="modal" class="popupContainer" style="display: none; float: left">
      <div class="popupHeader">
        <span class="header_title" style="color: white">Profile</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
      </div>
      <section class="popupBody">
        <!-- User Profile -->
        <div class="user_profile">
          <img
            src={{ URL::asset("assets/images/94084743_p0.jpg")}}
            class="mx-auto"
            style="
              width: 112px;
              height: 112px;
              border-radius: 50%;
              margin-left: 100px;
              margin-bottom: 10px;
            " />
          <h5>Hu Tao</h5>
          <img
            src={{ URL::asset("assets/images/heading-line-dec.png")}}
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
              <li>Nama: Hu Tao</li>
              <li>Email: hu.119140030@student.anime.an.jp</li>
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
            </ul>
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