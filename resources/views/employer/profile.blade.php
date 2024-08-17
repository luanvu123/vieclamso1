@extends('dashboard-employer')

@section('content')
    <div class="container">
        <h2>Employer Profile</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('employer.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employer->name }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employer->email }}"
                    required>
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
                @if ($employer->avatar)
                    <img src=" {{ $employer->avatar ? asset('storage/' . $employer->avatar) : asset('storage/avatar/avatar-default.jpg') }}"
                        alt="Avatar" style="width: 60px" alt="Avatar">
                @endif
            </div>
            <h2>Thông tin Giấy đăng ký doanh nghiệp</h2>
            <divclass="form-group"><label for="business_license">


                Business License:</label><input type="file" class="form-control" id="business_license"
                name="business_license">
            @if ($employer->business_license)
                @php
                    $fileExtension = pathinfo(asset('storage/' . $employer->business_license), PATHINFO_EXTENSION);
                @endphp
                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ asset('storage/' . $employer->business_license) }}"alt="Business License"
                        style="max-width: 100px; max-height: 100px;" />
                @else
                    <a href="{{ asset('storage/' . $employer->business_license) }}"target="_blank">View Business
                        License</a>
                @endif
            @endif
    </div>
    <div class="form-group"><label for="commission">Commission:</label><input type="file" class="form-control"
            id="commission" name="commission">
        @if ($employer->commission)
            @php
                $fileExtension = pathinfo(asset('storage/' . $employer->commission), PATHINFO_EXTENSION);
            @endphp
            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                <img src="{{ asset('storage/' . $employer->commission) }}"alt="Commission"
                    style="max-width: 100px; max-height: 100px;" />
            @else
                <a href="{{ asset('storage/' . $employer->commission) }}"target="_blank">View Commission</a>
            @endif
        @endif
    </div>
    <div class="form-group"><label for="identification_card">Identification Card:</label><input type="file"
            class="form-control" id="identification_card" name="identification_card">
        @if ($employer->identification_card)
            @php
                $fileExtension = pathinfo(asset('storage/' . $employer->identification_card), PATHINFO_EXTENSION);
            @endphp
            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                <img src="{{ asset('storage/' . $employer->identification_card) }}"alt="Identification Card"
                    style="max-width: 100px; max-height: 100px;" />
            @else
                <a href="{{ asset('storage/' . $employer->identification_card) }}"target="_blank">View Identification
                    Card</a>
            @endif
        @endif
    </div>


    <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
    </div>
@endsection
