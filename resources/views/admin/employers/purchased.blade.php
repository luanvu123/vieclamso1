@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Purchased Items</h1>

                    <table class="display" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employer Name</th>
                                <th>Employer Email</th>
                                <th>Product Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchasedItems as $item)
                                @php
                                    $isNew = $item->created_at->diffInHours(now()) < 2;
                                @endphp
                                <tr @if ($isNew) style="font-weight: bold;" @endif>
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
        </div>
    </div>
@endsection
