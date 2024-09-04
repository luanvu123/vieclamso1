@extends('layouts.app')

@section('title', 'Plan Features')

@section('content')
    <h1>Plan Features</h1>
    <a href="{{ route('plan-features.create') }}">Add New Plan Feature</a>

    <table id="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Feature</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($planFeatures as $planFeature)
                <tr>
                    <td>{{ $planFeature->id }}</td>
                    <td>{{ $planFeature->feature }}</td>
                    <td>
                        <a href="{{ route('plan-features.show', $planFeature->id) }}"><i class="fa fa-eye"></i>View</a>
                        <a href="{{ route('plan-features.edit', $planFeature->id) }}"><i class="fa fa-pencil"></i>Edit</a>
                        {{-- <form action="{{ route('plan-features.destroy', $planFeature->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
