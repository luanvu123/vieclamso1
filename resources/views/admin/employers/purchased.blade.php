@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Purchased Items</h1>
        <div class="table-container">
            <table class="display" id="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employer Name</th>
                        <th>Employer email</th>
                        <th>Product Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchasedItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->employer->name }}</td>
                            <td>{{ $item->employer->email }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ ucfirst($item->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
