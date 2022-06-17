<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Information Table</h2>
  @if(session()->has('message'))
  <div class="alert alert-success">
      {{ session()->get('message') }}
  </div>
@endif
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tittle</th>
        <th>Discription</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($form as $form)
        <tr>
            <td>{{$form->id}}</td>
            <td>{{$form->tittle}}</td>
            <td>{{$form->dis}}</td>
            <td>
                <a href="{{route('edit', $form->id)}}" > <button type="button" class="btn btn-succes">Edit</button></a>
                <a href="{{route('delete', $form->id)}}" > <button type="button" class="btn btn-succes">Delete</button></a>
            </td>


        </tr>


        @endforeach

    </tbody>
  </table>
</div>

</body>
</html>
</x-app-layout>
