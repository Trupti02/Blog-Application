@extends('layouts.master')
@section('content')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Blog</h1>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">Table</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{ route('blog.create') }}"><button type="button" class="btn btn-info">Add
                                    </button></a>
                                {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>


                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forms as $form)
                                    <tr>
                                        <td>{{ $form->id }}</td>
                                        <td>{{ $form->tittle }}</td>
                                        <td>{!!Str::words($form->dis,10, '.....')!!}</td>
                                        <td>{{ $form->category->name }}</td>


                                        <td>
                                            @if (empty($form->image))
                                                <img src="{{ asset('defaultblog.png') }}" width="100px" height="100px" />
                                            @else
                                                <img src="{{ asset('uploads/'. $form->image) }}" width="100px"
                                                    height="100px" />
                                            @endif
                                        </td>
                                        <td>
                                            {{-- {{$form->status == 1? 'Active' : 'Inactive'}} --}}

                                            @if ($form->status == 1)
                                                <spam class="badge badge-primary">Active</spam>
                                            @else
                                                <spam class="badge badge-danger">Inactive</spam>
                                            @endif
                                        </td>



                                        <td><a href="{{ route('blog.simple', $form->id) }}"><button type="button"
                                                    class="btn btn-success">Edit </button></a> <a
                                                href="{{ route('delete', $form->id) }}"><button type="button"
                                                    class="btn btn-danger">Delete </button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $forms->links() }}
                        {{-- {{$form->links()}} --}}

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
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
