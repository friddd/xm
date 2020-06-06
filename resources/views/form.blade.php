@extends('layout')
@section('content')
    <br><h2>Company history</h2><br>
    {{ Form::open(['class' => 'history-form']) }}
    <div class="form-group">
        {{ Form::label('company_symbol', 'Company Symbol') }}
        {{ Form::select('company_symbol', $dictionary, '', ['class' => 'form-control', 'data-validetta' => 'required,regExp[symbol]']) }}
        @if ($errors->has('company_symbol'))
            <span class="text-danger">{{ $errors->first('company_symbol') }}</span>
        @endif
    </div>
    <div class="form-group">
        {{ Form::label('start_date', 'Start Date') }}
        {{ Form::text('start_date', '', ['class' => 'form-control datepicker', 'data-validetta' => 'required,regExp[date],callback[start]']) }}
        @if ($errors->has('start_date'))
            <span class="text-danger">{{ $errors->first('start_date') }}</span>
        @endif
    </div>
    <div class="form-group">
        {{ Form::label('end_date', 'End Date') }}
        {{ Form::text('end_date', '', ['class' => 'form-control datepicker', 'data-validetta' => 'required,regExp[date],callback[end]']) }}
        @if ($errors->has('end_date'))
            <span class="text-danger">{{ $errors->first('end_date') }}</span>
        @endif
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', '', ['class' => 'form-control', 'data-validetta' => 'required,email']) }}
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    {{ Form::submit('Send', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
