@extends('dashboard-employer')

@section('content')
    <h1>Company Details</h1>

    <div>
        <h2>{{ $company->name }}</h2>
        @if ($company->image)
            <img src="{{ asset('storage/' . $company->image) }}" alt="Company Image" width="200">
        @endif
        @if ($company->logo)
            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100">
        @endif
        <p><strong>Scale:</strong> {{ $company->scale }}</p>
        <p><strong>Address:</strong> {{ $company->address }}</p>
        <p><strong>Map:</strong> {{ $company->map }}</p>
        <p><strong>Detail:</strong> {{ $company->detail }}</p>
        <p><strong>Status:</strong> {{ $company->status ? 'Active' : 'Inactive' }}</p>
        <p><strong>URL:</strong> {{ $company->url }}</p>
        <p><strong>Website:</strong> {{ $company->website }}</p>
        <p><strong>Facebook:</strong> {{ $company->facebook }}</p>
        <p><strong>Twitter:</strong> {{ $company->twitter }}</p>
        <p><strong>LinkedIn:</strong> {{ $company->linkedin }}</p>
    </div>

    <a href="{{ route('companies.index') }}" class="btn btn-primary">Back to Companies</a>
@endsection
