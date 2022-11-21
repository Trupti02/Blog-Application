@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">User Table</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{ route('category.create') }}"><button type="button" class="btn btn-info">Add
                                    </button></a>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>

                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>

                                        <td>

                                        @if ($category->status == 1)
                                            <spam class="badge badge-primary">Active</spam>
                                        @else
                                            <spam class="badge badge-danger">Inactive</spam>
                                        @endif
                                        </td>
                                        <td><a href="{{ route('category.edit', $category->id) }}"><button type="button"
                                                    class="btn btn-success">Edit </button></a> <a
                                                href="{{ route('category.delete', $category->id) }}"><button type="button"
                                                    class="btn btn-danger">Delete </button></a></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{-- {{ $categories->links() }} --}}
                        <nav aria-label="Pagination">
                            <hr class="my-0" />
                            <ul class="pagination justify-content-center my-4">
                                {{$categories->links()}}
                            </ul>
                        </nav>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
