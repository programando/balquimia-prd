<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
  <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
<title>
  @if ($browser_title == '' )
   {{ trans('_app.APP_NAME') }}
   @else
   {{ trans('_app.APP_NAME') }} | {{ $browser_title }}
   @endif
</title>
<!-- Favicon-->
<link rel="shortcut icon" href="{{ asset('public/favicon.ico')}}">
