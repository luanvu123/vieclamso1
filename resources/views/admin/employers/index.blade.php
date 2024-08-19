@extends('layouts.app')

@section('content')
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>All Employer</h1>
                <style>
                    .table-container {
                        overflow-x: auto;
                        -webkit-overflow-scrolling: touch;
                        /* Hỗ trợ cuộn mượt trên thiết bị cảm ứng */
                    }

                    .table td.detail {
                        max-width: 200px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }
                </style>


                <div class="table-container">
                        <table id="user-table" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Avatar</th>
                                    <th>Business License</th>
                                    <th>Commission</th>
                                    <th>Identification Card</th>
                                    <th>Job Postings</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employers as $employer)
                                    <tr>
                                        <td>{{ $employer->id }}</td>
                                        <td>{{ $employer->name }}</td>
                                        <td>{{ $employer->email }}</td>
                                        <td>{{ ucfirst($employer->gender) }}</td>
                                        <td>{{ $employer->phone }}</td>
                                        <td>{{ $employer->status ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            @if ($employer->avatar)
                                                <img src="{{ asset('storage/' . $employer->avatar) }}" alt="Avatar"
                                                    style="max-width: 100px; max-height: 100px;">
                                            @else
                                                No Avatar
                                            @endif
                                        </td>
                                        <td>
                                            @if ($employer->business_license)
                                                @php
                                                    $fileExtension = pathinfo(
                                                        asset('storage/' . $employer->business_license),
                                                        PATHINFO_EXTENSION,
                                                    );
                                                @endphp
                                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset('storage/' . $employer->business_license) }}"
                                                        alt="Business License" style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    <a href="{{ asset('storage/' . $employer->business_license) }}"
                                                        target="_blank">View</a>
                                                @endif
                                            @else
                                                No Business License
                                            @endif
                                        </td>
                                        <td>
                                            @if ($employer->commission)
                                                @php
                                                    $fileExtension = pathinfo(
                                                        asset('storage/' . $employer->commission),
                                                        PATHINFO_EXTENSION,
                                                    );
                                                @endphp
                                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset('storage/' . $employer->commission) }}"
                                                        alt="Commission" style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    <a href="{{ asset('storage/' . $employer->commission) }}"
                                                        target="_blank">View</a>
                                                @endif
                                            @else
                                                No Commission
                                            @endif
                                        </td>
                                        <td>
                                            @if ($employer->identification_card)
                                                @php
                                                    $fileExtension = pathinfo(
                                                        asset('storage/' . $employer->identification_card),
                                                        PATHINFO_EXTENSION,
                                                    );
                                                @endphp
                                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{ asset('storage/' . $employer->identification_card) }}"
                                                        alt="Identification Card"
                                                        style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    <a href="{{ asset('storage/' . $employer->identification_card) }}"
                                                        target="_blank">View</a>
                                                @endif
                                            @else
                                                No Identification Card
                                            @endif
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach ($employer->jobPostings as $jobPosting)
                                                    <li>{{ $jobPosting->title }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('employers.show', $employer->id) }}"
                                                class="btn btn-info">View</a>
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
