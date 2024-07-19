 @extends('dashboard-employer')

 @section('content')
     <div class="container">
         <h2>Applications</h2>
         <table class="table" id="user-table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Candidate</th>
                     <th>CV</th>
                     <th>Status</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($jobPosting->applications as $key => $application)
                     <tr>
                         <td>{{ $key }}</td>
                         <td>{{ $application->candidate->fullname_candidate }}</td>
                         <td><a href="{{ asset('storage/' . $application->cv->cv_path) }}" target="_blank">View CV</a></td>
                         <td>
                             <select id="{{ $application->id }}" class="application_choose">
                                 @if ($application->status == 1)
                                     <option selected value="1">Chưa xem</option>
                                     <option value="2">Phù hợp</option>
                                     <option value="3">Không phù hợp</option>
                                 @elseif ($application->status == 2)
                                     <option value="1">Chưa xem</option>
                                     <option selected value="2">Phù hợp</option>
                                     <option value="3">Không phù hợp</option>
                                 @elseif ($application->status == 3)
                                     <option value="1">Chưa xem</option>
                                     <option value="2">Phù hợp</option>
                                     <option selected value="3">Không phù hợp</option>
                                 @else
                                     <option value="1">Chưa xem</option>
                                     <option value="2">Phù hợp</option>
                                     <option value="3">Không phù hợp</option>
                                 @endif
                             </select>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 @endsection
