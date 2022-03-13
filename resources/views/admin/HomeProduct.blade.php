@extends('admin.layouts.master')
@section('url')
    Admin / Product
@endsection
@section('content')
    <div class="mt-10 flex justify-between items-center">
        <div>
            <a class="p-2 bg-green-500 text-white rounded-lg shadow " href="/admin/product/create">+ Create
                Product</a>
        </div>
        <div>
            <form action="/" method="post">
                <input placeholder="Find Product" style="outline: red" class="border p-2 rounded-2xl border-grey-100 shadow"
                    type="search">
            </form>
        </div>
    </div>
    <table class="border-collapse shadow border-slate-500 mt-6 ... w-full mx-auto ">
        <thead>
            <tr>
                <th class="border py-2 border-slate-600  ...">No</th>
                <th class="border py-2 border-slate-600  ...">Image</th>
                <th class="border py-2 border-slate-600  ...">Name</th>
                <th class="border py-2 border-slate-600  ...">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="border border-slate-700 text-center ...">
                        {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                    <td class="border border-slate-700 py-2 ..."><img class="mx-auto w-20 h-20"
                            src="{{ asset('ProductImages/' . $product->images->pluck('image_1')->implode(' ')) }}" alt="">
                    </td>
                    <td class="border border-slate-700 pl-8 ...">{{ $product->name }}</td>
                    <td class="border border-slate-700 text-center    ...">
                        <div class="flex justify-center gap-3">
                            <a href="/admin/product/{{ $product->id }}"><i class=" far fa-eye text-yellow-400"></i></a>
                            <a href="/admin/product/edit/{{ $product->id }}"><i
                                    class=" fas fa-wrench text-blue-400"></i></a>
                            <form action="/admin/product/delete/{{ $product->id }}" method="POST">@method('delete')@csrf
                                <button id="delete" type="submit" style="all: unset"><i
                                        class="far fa-trash-alt cursor-pointer text-red-600"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center">{{ $products->links() }}</div>
@endsection
@push('js')
    <script>
    </script>
@endpush
