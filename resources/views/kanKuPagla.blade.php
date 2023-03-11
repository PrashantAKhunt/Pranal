@extends('layouts.master')

@section('content')
<!-- You need this element to prevent the content of the page from jumping up -->
<div class="header-fixed-placeholder"></div>

<!-- The content of your page would go here. -->

<div class="video-player">


	<iframe class="responsive-iframe"
		src="https://drive.google.com/file/d/16ZKtlqQLfWSS7r5DbxvlkD2kUBnrjpof/preview"
		frameborder="0" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">

	</iframe>


</div>
@endsection
