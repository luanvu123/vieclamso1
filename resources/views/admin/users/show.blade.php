@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Components</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card rounded-4">
        <div class="card-body p-4">
            <div class="position-relative mb-5">
                <img src="{{ asset('backend/codervent.com/maxton/demo/vertical-menu/assets/images/gallery/profile-cover.html') }}"
                    class="img-fluid rounded-4 shadow" alt="">
                <div class="profile-avatar position-absolute top-100 start-50 translate-middle">

                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}"
                            class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170">
                    @else
                        <p class="form-control-static">No avatar available</p>
                    @endif
                </div>
            </div>
            <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
                <div class="">
                    <h3>{{ $user->name }}</h3>
                    <p class="mb-0">{{ $user->address }}</p><br>

                </div>
                <div class="">
                    <a href="javascript:;" class="btn btn-grd-primary rounded-5 px-4"><i class="bi bi-chat me-2"></i>Send
                        Message</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">About</h5>
                        </div>
                    </div>
                    <div class="full-info">
                        <div class="info-list d-flex flex-column gap-3">
                            <div class="info-list-item d-flex align-items-center gap-3">
                                <span class="material-icons-outlined">account_circle</span>
                                <p class="mb-0">Full Name: {{ $user->name }}</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3">
                                <span class="material-icons-outlined">done</span>
                                @if ($user->status == 1)
                                    <p class="mb-0">Status: Đang hoạt động</p>
                                @else
                                    <p class="mb-0">Status: Dừng hoạt động</p>
                                @endif

                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3">
                                <span class="material-icons-outlined">event</span>
                                <p class="mb-0">Date-of-birth: {{ $user->date }}</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3">
                                <span class="material-icons-outlined">code</span>
                                <p class="mb-0">Role: @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <span class="badge badge-success">{{ $v }}</span>
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3">
                                <span class="material-icons-outlined">flag</span>
                                <p class="mb-0">Address: {{ $user->address }}</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3">
                                <span class="material-icons-outlined">language</span>
                                <p class="mb-0">Language: {{ $user->language }}</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3">
                                <span class="material-icons-outlined">send</span>
                                <p class="mb-0">Email: {{ $user->email }}</p>
                            </div>
                            <div class="info-list-item d-flex align-items-center gap-3">
                                <span class="material-icons-outlined">call</span>
                                <p class="mb-0">Phone: {{ $user->phone }}</p>
                            </div>

                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <a href="{{ route('users.index') }}" class="btn btn-grd-primary px-4">Back</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-grd-info px-4">Update</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="">
                            <h5 class="mb-0 fw-bold">Accounts</h5>
                        </div>
                    </div>

                    <div class="account-list d-flex flex-column gap-4">
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ asset('backend/codervent.com/maxton/demo/vertical-menu/assets/images/apps/05.png') }}"
                                width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Google</h6>
                                <a class="mb-0" href="{{ $user->google }}">{{ $user->google }}</a>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ asset('backend/codervent.com/maxton/demo/vertical-menu/assets/images/apps/02.png') }}"
                                width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Skype</h6>
                                <a class="mb-0" href="{{ $user->skype }}">{{ $user->skype }}</a>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ asset('backend/codervent.com/maxton/demo/vertical-menu/assets/images/apps/03.png') }}"
                                width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Slack</h6>
                                <a class="mb-0" href="{{ $user->slack }}">{{ $user->slack }}</a>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ asset('backend/codervent.com/maxton/demo/vertical-menu/assets/images/apps/06.png') }}"
                                width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Instagram</h6>
                                <a class="mb-0" href="{{ $user->instagram }}">{{ $user->instagram }}</a>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ asset('backend/codervent.com/maxton/demo/vertical-menu/assets/images/apps/17.png') }}"
                                width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Facebook</h6>
                                <a class="mb-0" href="{{ $user->facebook }}">{{ $user->facebook }}</a>
                            </div>
                        </div>
                        <div class="account-list-item d-flex align-items-center gap-3">
                            <img src="{{ asset('backend/codervent.com/maxton/demo/vertical-menu/assets/images/apps/11.png') }}"
                                width="35" alt="">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">Paypal</h6>
                                <a class="mb-0" href="{{ $user->paypal }}">{{ $user->paypal }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
@endsection
