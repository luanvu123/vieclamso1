@extends('dashboard-employer')

@section('content')
    <style>
        .horizontal-form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .horizontal-form-grouplabel {
            min-width: 150px;
            /* Adjust as needed */
            margin-right: 10px;
            text-align: right;
        }

        .horizontal-form-group.form-control {
            flex: 1;
        }
    </style>
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>My Profile</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>My Profile</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
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

    <div class="row">

        <form action="{{ route('employer.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Profile -->
            <div class="col-lg-6 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Profile Details</h4>
                    <div class="dashboard-list-box-static">
                        <div class="edit-profile-photo">
                            <img src="{{ $employer->avatar ? asset('storage/' . $employer->avatar) : asset('storage/avatar/avatar-default.jpg') }}"
                                alt="">
                            <div class="change-photo-btn">
                                <div class="photoUpload">
                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                    <input type="file" class="upload" id="avatar" name="avatar">
                                </div>
                            </div>
                        </div>
                        <!-- Details -->
                        <div class="my-profile">

                            <label>Your Name</label>
                            <input value="{{ $employer->name }}" type="text"id="name" name="name">

                            <label>Phone</label>
                            <input id="phone" name="phone" value="{{ $employer->phone }}" type="text">

                            <label>Email</label>
                            <input id="email" name="email" value="{{ $employer->email }}"type="email">

                            <label>Gender</label>
                            <div class="form"><select class="chosen-select-no-single" id="gender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ $employer->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $employer->gender == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="other" {{ $employer->gender == 'other' ? 'selected' : '' }}>Other
                                    </option>
                                </select></div>

                        </div>

                        <button type="submit" class="button margin-top-15">Save Changes</button>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12"style="margin-bottom: 20px;">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Thông tin Giấy đăng ký doanh nghiệp</h4>
                    <div class="dashboard-list-box-static"><!-- Change Password -->
                        <div class="my-profile">
                            <div class="form-group horizontal-form-group"><label for="business_license">Business
                                    License:</label><input type="file" class="form-control" id="business_license"
                                    name="business_license">
                                @if ($employer->business_license)
                                    @php
                                        $fileExtension = pathinfo(
                                            asset('storage/' . $employer->business_license),
                                            PATHINFO_EXTENSION,
                                        );
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ asset('storage/' . $employer->business_license) }}"alt="Business License"
                                            style="max-width: 100px; max-height: 100px;" />
                                    @else
                                        <a href="{{ asset('storage/' . $employer->business_license) }}"target="_blank">View
                                            Business License</a>
                                    @endif
                                @endif
                            </div>
                            <div class="form-group horizontal-form-group"><label for="commission">Commission:</label><input
                                    type="file" class="form-control" id="commission" name="commission">
                                @if ($employer->commission)
                                    @php
                                        $fileExtension = pathinfo(
                                            asset('storage/' . $employer->commission),
                                            PATHINFO_EXTENSION,
                                        );
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ asset('storage/' . $employer->commission) }}"alt="Commission"
                                            style="max-width: 100px; max-height: 100px;" />
                                    @else
                                        <a href="{{ asset('storage/' . $employer->commission) }}"target="_blank">View
                                            Commission</a>
                                    @endif
                                @endif
                            </div>
                            <div class="form-group horizontal-form-group"><label for="identification_card">Identification
                                    Card:</label><input type="file" class="form-control" id="identification_card"
                                    name="identification_card">
                                @if ($employer->identification_card)
                                    @php
                                        $fileExtension = pathinfo(
                                            asset('storage/' . $employer->identification_card),
                                            PATHINFO_EXTENSION,
                                        );
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ asset('storage/' . $employer->identification_card) }}"alt="Identification Card"
                                            style="max-width: 100px; max-height: 100px;" />
                                    @else
                                        <a href="{{ asset('storage/' . $employer->identification_card) }}"target="_blank">View
                                            Identification Card</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Change Password -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4 class="gray">Change Password</h4>
                <div class="dashboard-list-box-static"><!-- Change Password -->
                    <div class="my-profile">
                        <form method="POST" action="{{ route('employer.change-password') }}">
                            @csrf
                            <label class="margin-top-0">Current Password</label><input type="password"
                                name="current_password" required><label>New Password</label><input type="password"
                                name="new_password" required><label>Confirm New Password</label><input type="password"
                                name="new_password_confirmation" required><button type="submit"
                                class="button margin-top-15">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
