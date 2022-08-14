@extends('layouts.app')

@section('title')
Decrypt | @parent
@stop

@section('content')

<div class="mt-5">

      <div class="card">

            <div class="card-header bg-danger text-light">
                  Decrypt Service
            </div>

            <div class="card-body">

                  <form action="{{ route('decrypt.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group m-2">
                              <label>File</label>
                              <input type="file" name="file" class="form-control" required>
                        </div>

                        <div class="form-group m-2">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>

                        <div class="form-group m-2">
                              <label>Path { path/to/save/... }</label>
                              <input type="text" name="path" class="form-control" required value="{{ old('path') }}">
                        </div>

                        <div class="form-group m-2">
                              <button class="btn btn-danger" type="submit">Send</button>
                        </div>

                  </form>

            </div>
      </div>

</div>

@endsection