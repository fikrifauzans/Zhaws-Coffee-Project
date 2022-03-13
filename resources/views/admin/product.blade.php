@extends('admin.layouts.master')
@section('url')
    Admin &nbsp; / &nbsp; Product
@endsection
@section('content')
    <div class="flex justify-center mt-4 ">
        <a class="" href="">
            <i class="fas fa-wrench text-blue-400  rounded-full border-2 p-2 border-blue-400"></i>
        </a>
    </div>
    <table class="border-collapse border border-slate-500 w-full mt-4 ... shadow-md">
        <thead>
            <tr>
                <th class="border border-slate-600 text-center ...">Name</th>
                <th class="border border-slate-600 text-center ...">Price</th>
                <th class="border border-slate-600 text-center ...">Rating</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-slate-700 text-center py-2 ...">{{ $product->name }}</td>
                <td class="border border-slate-700 text-center ...">{{ $product->price }}</td>
                <td class="border border-slate-700 text-center ...">{{ $product->rating }}</td>
            </tr>

        </tbody>
    </table>


    <div class="flex items-center mt-4">

        <div>
            <h1 class="text-2xl">Image :</h1>
        </div>

    </div>

    <div class="flex justify-between mt-4 gap-6">
        <div class="w-8/12">
            <img class="w-full h-96 object-cover " src="{{ asset('ProductImages/' . $product->images[0]->image_1) }}"
                alt="">
        </div>
        <div class=" flex flex-col justify-between w-4/12 h-96 gap-2 ">
            <div>
                <img class="w-full h-44 object-cover" src="{{ asset('ProductImages/' . $product->images[0]->image_2) }}"
                    alt="">
            </div>
            <div>
                <img class="w-full h-44 object-cover" src="{{ asset('ProductImages/' . $product->images[0]->image_3) }}"
                    alt="">
            </div>
        </div>
    </div>


    <div class="text-2xl my-4">
        Description : <br>
        <p class="text-sm text-justify mt-2"> {{ $product->description }}</p>
    </div>
@endsection
