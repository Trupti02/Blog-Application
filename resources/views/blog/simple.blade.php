@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
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
                <h3 class="card-title">Add Some Article</h3>
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
            <form action="{{ Route('update', $form->id) }}" method="POST">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="titlle">Title</label>
                        <input type="tittle" class="form-control" id="tittle" name="tittle"
                            value="{{ $form->tittle }}">
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea id="body" name="dis" rows="4" cols="50" class="form-control" value="{{ $form->dis }}">value="{{ $form->dis }}"</textarea>



                    </div>


                    <div class="form-group">
                        <label>Select Category</label>
                        <select name="category_id"class="form-control">
                            <option value="" class="option_colour">Select Category</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}"
                                    @if ($c->id == $form->category->id) selected='selected' @endif>
                                    {{ $c->name }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status"class="form-control">
                            <option value="" class="option_colour">Select Status</option>
                            <option value="1" @if ($form->status == '1') selected='selected' @endif>Active
                            </option>
                            <option value="0" @if ($form->status == '0') selected='selected' @endif>Inactive
                            </option>

                        </select>
                    </div>
                    <!-- /.card-body -->
                    <div class="form-group">
                        <label for="image"> Image</label>
                        <input type="file" class="form-control" name="image" id="upload_image"
                            placeholder="Upload_image" value="{{ old('upload_image') }}">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('blog.index') }}"><button type="button" class="btn btn-info">Back </button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
        console.error(error);
        });
        </script>
@endsection
