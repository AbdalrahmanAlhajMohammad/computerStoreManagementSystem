@extends('layouts._customer_layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form>
            <div class="form-group row">
                <label class="col-md-2">@lang('account.first_name')</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="first_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">@lang('account.last_name')</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="last_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">@lang('account.email')</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">@lang('account.password')</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">@lang('account.gender')</label>
                <div class="col-md-2">
                    <input type="radio" class="form-control" name="gender" value="m">
                </div>
                <label class="col-md-1">@lang('account.male')</label>
                <div class="col-md-2">
                    <input type="radio" class="form-control" name="gender" value="f">
                </div>
                <label class="col-md-1">@lang('account.Female')</label>
            </div>
            <div class="form-group row">
                <label class="col-md-2">@lang('account.mobile')</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="mobile">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10">
                    <button type="submit" name="register" class="btn btn-primary">@lang('account.register')</button>
                </div>
            </div>


        </form>
    </div>
</div>

@endsection

@section('js')

@endsection