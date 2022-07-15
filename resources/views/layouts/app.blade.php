@include('layouts/header')
@include('layouts/side')
@include('sweetalert::alert')
<div class="content-wrapper">
	@yield('content')
</div>
@include('layouts/footer')