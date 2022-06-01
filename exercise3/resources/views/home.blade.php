@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Product') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Data</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Product</th>
                                    <th scope="col">Category Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $item->name_products }}</td>
                                        <td>{{ $item->category->name ?? '---' }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="" width="120px"></td>
                                        <td>
                                            <a href="" class="btn btn-success">Edit Data</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
