@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                  <div class="table-responsive">
                        <h5 class="card-title">Candidate List</h5>
                        <table id="user-table" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th></th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th></th>
                                    <th>Số điện thoại</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>CVs</th>
                                    <th>Hành động</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $candidate)
                                    <tr>
                                        <td>{{ $candidate->id }}</td>
                                        <td>

                                            <div class="message-avatar"><img
                                                    src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                                                    alt="" /></div>

                                        </td>
                                        <td>
                                            <p class="mb-0 customer-name fw-bold"> {{ $candidate->fullname_candidate }}</p>


                                        </td>
                                        <td>{{ $candidate->email }}</td>
                                        <td>
                                            <button
                                                onclick="redirectToEmailPage('{{ $candidate->id }}', '{{ $candidate->email }}')"
                                                class="btn btn-primary">
                                                Gửi Email <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
                                            </button>
                                        </td>
                                        <td>{{ $candidate->phone_number_candidate }}</td>
                                        <td>
                                            {{ $candidate->status == 1 ? 'Active' : 'Inactive' }}
                                        </td>

                                        <td>{{ $candidate->created_at }}</td>
                                        <td>
                                            @if ($candidate->cvs->isNotEmpty())
                                                <ul>
                                                    @foreach ($candidate->cvs as $cv)
                                                        <li><a href="{{ asset('storage/' . $cv->cv_path) }}"
                                                                target="_blank">{{ $cv->cv_name ?? 'CV' }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                Không có CV
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('candidates.show', $candidate->id) }}"><i
                                                    class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('candidates.edit', $candidate->id) }}"><i
                                                    class="fa fa-edit"></i> Edit Status</a>
                                        </td>
                                        <td>
                                            @if ($candidate->created_at > \Carbon\Carbon::now()->subHour())
                                                <span class="label label-primary pull-right">new</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <script>
        function redirectToEmailPage(candidateId, emailCandidate) {
            window.location.href = "{{ route('admin.candidate.email') }}?candidate_id=" + candidateId + "&emailCandidate=" +
                emailCandidate;
        }
    </script>
@endsection
