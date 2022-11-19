<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <title>Rosi Musik</title>

    <meta
      name="description"
      content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest" />
    <meta name="author" content="pixelcave" />
    <meta name="robots" content="noindex, nofollow" />

    <!-- Open Graph Meta -->
    <meta
      property="og:title"
      content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework" />
    <meta property="og:site_name" content="OneUI" />
    <meta
      property="og:description"
      content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href={{ URL::asset("assets/media/favicons/logo-rm.png")}} />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href={{ URL::asset("assets/media/favicons/logo-rm.png")}} />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href={{ URL::asset("assets/media/favicons/logo-rm.png")}} />
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href={{ URL::asset("assets/css/oneui.min.css")}} />

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
  </head>

  <body
    style="
      background-image: url({{ URL::asset("assets/media/photos/photo40.jpg")}});
      background-size: cover;
    ">
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
    <div id="page-container">
      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
          <div class="content">
            <div class="row justify-content-center push">
              <div class="col-md-8 col-lg-6 col-xl-4">
                <!-- Sign In Block -->
                <div class="block block-rounded mb-0">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Sign In</h3>
                    <div class="block-options">
                      <!-- <a
                        class="btn-block-option fs-sm"
                        href="op_auth_reminder.html"
                        >Forgot Password?</a
                      >
                      <a
                        class="btn-block-option"
                        href="op_auth_signup.html"
                        data-bs-toggle="tooltip"
                        data-bs-placement="left"
                        title="New Account">
                        <i class="fa fa-user-plus"></i>
                      </a> -->
                    </div>
                  </div>
                  <div class="block-content">
                    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                      <h1 class="h2 mb-1">Rosi Musik</h1>
                      <p class="fw-medium text-muted">Welcome, please login.</p>

                      <!-- Sign In Form -->
                      <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                      <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                      <form
                        class="js-validation-signin"
                        action="{{ route('admin.login-store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="py-3">
                          <div class="mb-4">
                            <input
                              type="text"
                              class="form-control form-control-alt form-control-lg"
                              id="login-username"
                              name="username"
                              placeholder="Username" />
                          </div>
                          <div class="mb-4">
                            <div class="input-group">
                              <input
                                type="password"
                                class="form-control form-control-alt form-control-lg"
                                id="login-password"
                                name="password"
                                placeholder="Password"
                                aria-describedby="password" />

                              <span class="input-group-text">
                                <i
                                  class="fa fa-eye-slash"
                                  id="togglePassword"
                                  style="cursor: pointer"></i
                              ></span>
                            </div>
                          </div>
                          <!-- <div class="mb-4">
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="login-remember"
                                name="login-remember" />
                              <label
                                class="form-check-label"
                                for="login-remember"
                                >Remember Me</label
                              >
                            </div>
                          </div> -->
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-6 col-xl-5">
                            <button
                              type="submit"
                              class="btn w-500 btn-alt-primary">
                              <i
                                class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i>
                              Sign In
                            </button>
                          </div>
                        </div>
                      </form>
                      <!-- END Sign In Form -->
                    </div>
                  </div>
                </div>
                <!-- END Sign In Block -->
              </div>
            </div>
            <!-- <div class="fs-sm text-muted text-center">
              <strong>OneUI 5.3</strong> &copy;
              <span data-toggle="year-copy"></span>
            </div> -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src={{ URL::asset("assets/js/oneui.app.min.js")}}></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src={{ URL::asset("assets/js/lib/jquery.min.js")}}></script>

    <!-- Page JS Plugins -->
    <script src={{ URL::asset("assets/js/plugins/jquery-validation/jquery.validate.min.js")}}></script>

    <!-- Page JS Code -->
    <script src={{ URL::asset("assets/js/pages/op_auth_signin.min.js")}}></script>
    <script>
      $("#togglePassword").click(function (e) {
        e.preventDefault();
        var type = $(this)
          .parent()
          .parent()
          .find("#login-password")
          .attr("type");
        if (type == "password") {
          $(this)
            .parent()
            .parent()
            .find("#login-password")
            .attr("type", "text");
          $(this).addClass("fa-eye");
          $(this).removeClass("fa-eye-slash");
        } else {
          $(this)
            .parent()
            .parent()
            .find("#login-password")
            .attr("type", "password");
          $(this).addClass("fa-eye-slash");
          $(this).removeClass("fa-eye");
        }
      });
    </script>
  </body>
</html>
