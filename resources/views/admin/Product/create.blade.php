@extends('admin.layouts.master')
@section('url')
    Admin &nbsp; / &nbsp; Create
@endsection
@section('content')
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">@csrf
        <div class="flex mt-4 gap-4">
            {{-- name --}}
            <div class="w-4/12">
                <div class="mb-4 text-gray-600">Name :</div>
                <input class="border w-full py-2 outline-none" type="text" name="name">
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-4/12">
                <div class="mb-4 text-gray-600">Price :</div>
                <input class="border w-full py-2" type="text" name="price">
                @error('price')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-4/12">
                <div class="mb-4 text-gray-600">Category :</div>
                <input class="border w-full py-2" type="text" name="category">
                @error('category')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div>
            <div class="text-gray-600 my-4">Description</div>
            <textarea class="w-full outline-none border" name="description" id="" cols="30" rows="10"></textarea>
            @error('description')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <div class="w-full">
                <div class="my-4 text-gray-600 text-center">Image 1 :</div>
                <input name="image_1" type="file" class=" border w-full dropify" id="file"
                    aria-label="File browser example">
                @error('image_1')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-full">
                <div class="my-4 text-gray-600 text-center">Image 2 :</div>
                <input name="image_2" type="file" class=" border w-full dropify" id="file"
                    aria-label="File browser example">
                @error('image_2')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-full">
                <div class="my-4 text-gray-600 text-center">Image 3 :</div>
                <input name="image_3" type="file" class=" border w-full dropify" id="file"
                    aria-label="File browser example">
                @error('image_3')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="my-8 flex justify-center">

            <button type="submit " class="py-2 px-16 text-white text-md rounded-lg bg-green-400">Create
                Product</button>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
