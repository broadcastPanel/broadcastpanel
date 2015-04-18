@if (Session::has('error'))
	<div class="alert alert-danger {{ Session::get('class') }}" >{{ Session::get('error') }}</div>
@endif

@if (Session::has('success'))
	<div class="alert alert-success {{ Session::get('class') }}">{{ Session::get('success') }}</div>
@endif