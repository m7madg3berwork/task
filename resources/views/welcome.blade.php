@extends('layouts.app')

@section('title')
Home | @parent
@stop

@section('content')

<div class="mt-5">
      <p>Select service you needed.</p>
      <a href="{{ route('encrypt.show') }}" class="btn btn-danger">Encrypt File</a>
      <a href="{{ route('decrypt.show') }}" class="btn btn-danger">Decrypt File</a>
</div>

@if (session()->has('success'))
<div class="alert alert-success mt-5">
      <span>{{ session()->get('success') }}</span>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger mt-5">
      <span>{{ session()->get('error') }}</span>
</div>
@endif

@if (session()->has('file_data'))
@php
$file_data = session()->get('file_data');
@endphp
<div class="mt-5">
      <p>File Name: {{ $file_data['name'] }}</p>
      <p>File Extension: {{ $file_data['extension'] }}</p>
      <p>File Size: {{ $file_data['size'] }}</p>
</div>
@endif

@endsection