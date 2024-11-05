@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Employer Details</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>ID:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $employer->id }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $employer->name }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $employer->email }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Gender:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ ucfirst($employer->gender) }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Phone:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $employer->phone }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Credit:</strong> 
                    </div>
                    <div class="col-md-8">
                        <span class="point">{{ $employer->credit }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $employer->status == 1 ? 'Active' : 'Inactive' }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Xác thực OTP SMS</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $employer->isVerify == 1 ? 'Active' : 'Inactive' }}
                    </div>
                </div>


                <!-- Thông tin công ty -->
                @if ($employer->company)
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Company Name:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $employer->company->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Company Address:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $employer->company->address }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Company Website:</strong>
                        </div>
                        <div class="col-md-8">
                            <a href="{{ $employer->company->website }}"
                                target="_blank">{{ $employer->company->website }}</a>
                        </div>
                    </div>
                @else
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Company:</strong>
                        </div>
                        <div class="col-md-8">
                            No company associated.
                        </div>
                    </div>
                @endif
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Avatar:</strong>
                </div>
                <div class="col-md-8">
                    @if ($employer->avatar)
                        <img src="{{ asset('storage/' . $employer->avatar) }}" alt="Avatar"
                            style="max-width: 100px; max-height: 100px;">
                    @else
                        No Avatar
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Business License:</strong>
                </div>
                <div class="col-md-8">
                    @if ($employer->business_license)
                        @php
                            $fileExtension = pathinfo(
                                asset('storage/' . $employer->business_license),
                                PATHINFO_EXTENSION,
                            );
                        @endphp
                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/' . $employer->business_license) }}" alt="Business License"
                                style="max-width: 100px; max-height: 100px;">
                        @else
                            <a href="{{ asset('storage/' . $employer->business_license) }}" target="_blank">View</a>
                        @endif
                    @else
                        No Business License
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Commission:</strong>
                </div>
                <div class="col-md-8">
                    @if ($employer->commission)
                        @php
                            $fileExtension = pathinfo(asset('storage/' . $employer->commission), PATHINFO_EXTENSION);
                        @endphp
                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/' . $employer->commission) }}" alt="Commission"
                                style="max-width: 100px; max-height: 100px;">
                        @else
                            <a href="{{ asset('storage/' . $employer->commission) }}" target="_blank">View</a>
                        @endif
                    @else
                        No Commission
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Identification Card:</strong>
                </div>
                <div class="col-md-8">
                    @if ($employer->identification_card)
                        @php
                            $fileExtension = pathinfo(
                                asset('storage/' . $employer->identification_card),
                                PATHINFO_EXTENSION,
                            );
                        @endphp
                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/' . $employer->identification_card) }}" alt="Identification Card"
                                style="max-width: 100px; max-height: 100px;">
                        @else
                            <a href="{{ asset('storage/' . $employer->identification_card) }}" target="_blank">View</a>
                        @endif
                    @else
                        No Identification Card
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Identification Card:</strong>
                </div>
                <div class="col-md-8">
                    @if ($employer->identification_card_behind)
                        @php
                            $fileExtension = pathinfo(
                                asset('storage/' . $employer->identification_card_behind),
                                PATHINFO_EXTENSION,
                            );
                        @endphp
                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/' . $employer->identification_card_behind) }}"
                                alt="Identification Card" style="max-width: 100px; max-height: 100px;">
                        @else
                            <a href="{{ asset('storage/' . $employer->identification_card_behind) }}"
                                target="_blank">View</a>
                        @endif
                    @else
                        No Identification Card
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Job Postings:</strong>
                </div>
                <div class="col-md-8">
                    <ul>
                        @foreach ($employer->jobPostings as $jobPosting)
                            <li>{{ $jobPosting->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('employers.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
