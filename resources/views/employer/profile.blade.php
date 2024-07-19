@extends('dashboard-employer')

@section('content')
<div class="container">
    <h2>Employer Profile</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('employer.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employer->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $employer->email }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="male" {{ $employer->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $employer->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $employer->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $employer->phone }}">
        </div>

        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
            @if($employer->avatar)
                <img src=" {{ $employer->avatar ? asset('storage/' . $employer->avatar) : asset('storage/avatar/avatar-default.jpg') }}" alt="Avatar" style="width: 60px" alt="Avatar">

            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
