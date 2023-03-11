@extends('layouts.master')

@section('content')
<!-- You need this element to prevent the content of the page from jumping up -->
<div class="header-fixed-placeholder"></div>

<!-- The content of your page would go here. -->

<div class="video-player">


	<iframe class="responsive-iframe"
		src="http://callingcab.in/sagai%20small%20size.mp4"
		frameborder="0" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">

	</iframe>


</div>

@endsection
