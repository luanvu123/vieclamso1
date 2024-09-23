@extends('layouts.app')

@section('title', 'Plan Currencies')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Đơn giá</h1>
                    <a href="{{ route('plan-currencies.create') }}">Add New Plan Currency</a>

                    <table id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Currency</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($planCurrencies as $planCurrency)
                                <tr>
                                    <td>{{ $planCurrency->id }}</td>
                                    <td>{{ $planCurrency->currency }}</td>
                                    <td>
                                        <a href="{{ route('plan-currencies.show', $planCurrency->id) }}"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('plan-currencies.edit', $planCurrency->id) }}"><i
                                                class="fa fa-pencil"></i> Edit</a>
                                        {{-- <form action="{{ route('plan-currencies.destroy', $planCurrency->id) }}" method="POST" style="display:inline;">
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
