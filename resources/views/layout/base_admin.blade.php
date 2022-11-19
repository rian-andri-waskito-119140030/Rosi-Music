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
    @yield('style')

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
  </head>

  <body>
    @yield('konten')
  </body>
</html>