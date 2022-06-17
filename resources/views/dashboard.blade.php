<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .btn {
        border: 2px solid black;
        border-radius: 5px;
        background-color: rgb(109, 208, 205);
        color: black;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
    }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div><br><br>

    <center><div>
        <a href="{{Route('form')}}"><button type="button" class="btn btn-success">Add Your Article</button></a><br><br><br>
        <a href="{{Route('table')}}"><button type="button" class="btn btn-success">Read Your Article</button></a>

    </div></center>
</x-app-layout>
