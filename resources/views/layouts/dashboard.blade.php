<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shipal Web</title>

  <!-- Behavioral Meta Data -->
	<meta content='width=device-width, initial-scale=1, user-scalable=no' name='viewport'>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="theme-color" content="#9d3399">
	
	<!-- Google Meta Data -->
	<meta name='description', content=''>
	<meta name='keywords', content=''>
	<meta name="robots" content="index, follow">

	<!-- Blog Meta Data -->
	<meta name="dc.language" content="es">
	<meta name="dc.source" content="">
	<meta itemprop="url" content="">

	<!-- Twitter Card Meta Data -->
	<meta content='summary' name='twitter:card'>
	<meta content='Shipal' name='twitter:site'>
	<meta content='Shipal' name='twitter:title'>
	<meta content='Shipal' name='twitter:description'>

	<!-- Open Graph Meta Data -->
	<meta content='website' property='og:type'>
	<meta content='' property='og:image'>
	<meta property="og:site_name" content="">
	<meta property="og:title" content="">
	<meta content='' property='og:description'>
	<meta property="og:type" content="">
	<meta property="og:image" content="">

  <!-- Links -->
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' rel='stylesheet'>
  <link href="{{ url('assets/css/animate/animate.css') }}" rel='stylesheet'>
  <link href="{{ url('assets/css/slick/slick.css') }}" rel='stylesheet'>
  <link href="{{ url('assets/css/slick/slick-theme.css') }}" rel='stylesheet'>
  <link href="{{ url('assets/css/offcanvas.css') }}" rel='stylesheet'>
  <link href="{{ url('assets/css/main.css') }}" rel='stylesheet'>
  <link href="{{ url('assets/css/forms.css') }}" rel='stylesheet'>
  <link href="{{ url('assets/izitoast/css/iziToast.min.css') }}" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/img/favicon-32x32.png') }}">
  <style>
    html {margin-top: 0!important;}
  </style>
</head>

<body>  
    
    <section class="main-admin">

        @include('partials.sidebar')

        <div class="main-wrapper">
            @yield("content")
        </div>

    </section>
    

    <script src='https://use.fontawesome.com/70a3cb5d53.js'></script>
    <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'></script>
    <script src="{{ url('assets/js/wow.min.js') }}"></script>
    <script src="{{ url('assets/js/slick.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="{{ url('js/app.js') }}"></script>

    @stack('scripts')

</body>
</html>