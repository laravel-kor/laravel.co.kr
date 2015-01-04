@extends('layouts.default')

@section('content')
<div class="page-header">
    <h1>{{ $header }}</h1>
</div>
<div class="row">
    <div class="span6 offset3">
        <form class="form-horizontal" method="post">
            <input type="hidden" name="csrf_token" value="{{ Session::getToken() }}" />

            <h3>탈퇴 하시겠습니까?</h3>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">탈퇴</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
