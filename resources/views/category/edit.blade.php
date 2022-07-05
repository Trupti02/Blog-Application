@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit the form</h3>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ Route('category.update', $category->id) }}" method="POST">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $category->name }}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status"class="form-control">
                            <option value="" class="option_colour">Select Status</option>
                            <option value="1" @if ($category->status == '1') selected='selected' @endif>Active
                            </option>
                            <option value="0" @if ($category->status == '0') selected='selected' @endif>Inactive
                            </option>

                        </select>
                    </div>
                    {{-- </div> --}}

                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="update" class="btn btn-primary">Update</button>
                        <a href="{{ route('category.index') }}"><button type="button" class="btn btn-info">Back
                            </button></a>

                    </div>
            </form>
        </div>
    </div>

@endsection
