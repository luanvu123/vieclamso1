@extends('layouts.app')

@section('title', 'My Carts')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Services</h1>
                    <a href="{{ route('carts.create') }}">Add service</a>

                    <table id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Plan Currency</th>
                                <th>Value</th>
                                <th>Description</th>
                                <th>Top Point</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->id }}</td>
                                    <td>{{ $cart->planCurrency->currency }}</td>
                                    <td>{{ $cart->value }}</td>
                                    <td>
                                        @foreach ($cart->planFeatures as $feature)
                                            <li>{{ $feature->feature }}</li>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($cart->top_point != 0)
                                            <li>Quà tặng: {{ $cart->top_point }} Credits</li>
                                        @endif
                                    </td>
                                    <td>{{ $cart->description }}</td>
                                    <td>{{ $cart->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('carts.show', $cart->id) }}"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('carts.edit', $cart->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                        {{-- <form action="{{ route('carts.destroy', $cart->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
