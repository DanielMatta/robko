<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ropko</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
     {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</head>
<body>
    <div id="test" data-shortnames= {{$shortnames}} data-classnames = {{$schoolclassnames}}></div>
    <div id="app"> </div>

	@vite('resources/js/app.js')
{{-- <h3>{{$shortnames}}</h3> --}}
</body>
</html>
