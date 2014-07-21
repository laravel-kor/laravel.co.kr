@if (count($errors->all()) > 0)
<div class="alert alert-error alert-block">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
	아래 폼을 확인해주세요.
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	{{ $message }}
</div>
@endif
