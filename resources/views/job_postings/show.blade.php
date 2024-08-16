 @extends('dashboard-employer')

 @section('content')
     <!-- Titlebar -->
     <div id="titlebar">
         <div class="row">
             <div class="col-md-12">
                 <h2>Manage Applications</h2>
                 <!-- Breadcrumbs -->
                 <nav id="breadcrumbs">
                     <ul>
                         <li><a href="#">Home</a></li>
                         <li><a href="#">Dashboard</a></li>
                         <li>Manage Applications</li>
                     </ul>
                 </nav>
             </div>
         </div>
     </div>


     <div class="row">

         <!-- Table-->
         <div class="col-lg-12 col-md-12">

             <div class="notification notice">
                 The job applications for <strong><a href="#">Power Systems User Experience Designer</a></strong> are
                 listed below.
             </div>
         </div>

         <div class="col-md-6">
             <!-- Select -->
             <select data-placeholder="Filter by status" class="chosen-select-no-single" style="display: none;">
                 <option value="">Filter by status</option>
                 <option selected value="1">Đã ứng tuyển</option>
                 <option value="2">NTD đã xem hồ sơ</option>
                 <option value="3">Hồ sơ phù hợp</option>
                 <option value="4">Hồ sơ chưa phù hợp</option>
             </select>
             <div class="margin-bottom-15"></div>
         </div>
         <div class="col-md-6">
             <!-- Select -->
             <select data-placeholder="Newest first" class="chosen-select-no-single" style="display: none;">
                 <option value="">Newest first</option>
                 <option value="name">Sort by name</option>
                 <option value="rating">Sort by rating</option>
             </select>
             <div class="margin-bottom-35"></div>
         </div>


         <!-- Applications -->
         <div class="col-md-12">

             @foreach ($jobPosting->applications as $key => $application)
                 <div class="application">
                     <div class="app-content">
                         <div class="info">
                             <img src="{{ $application->candidate->avatar_candidate ? asset('storage/' . $application->candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                                 alt="">
                             <span>{{ $application->candidate->fullname_candidate }}</span>
                             <ul>
                                 <li><a href="{{ asset('storage/' . $application->cv->cv_path) }}"><i
                                             class="fa fa-file-text"></i> CV</a></li>
                                 <li><a href="{{ route('candidates.show.cv', $application->candidate->id) }}"><i
                                             class="fa fa-user"></i> Profile</a></li>
                                 <li><a href="{{ route('messages.show', $application->candidate) }}"><i
                                             class="fa fa-envelope"></i> Message</a></li>
                             </ul>
                         </div>
                         <div class="buttons">
                             <a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
                             <a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>
                             <a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show
                                 Details</a>
                         </div>
                         <div class="clearfix"></div>
                     </div>
                     <div class="app-tabs">
                         <a href="#" class="close-tab button gray" style="display: none;"><i
                                 class="fa fa-close"></i></a>
                         <!-- First Tab -->
                         <div class="app-tab-content" id="one-1" style="display: none;">
                             <div class="select-grid">
                                 <select id="{{ $application->id }}" class="chosen-select-no-single">
                                     @if ($application->status == 1)
                                         <option selected value="1">Đã ứng tuyển</option>
                                         <option value="2">NTD đã xem hồ sơ</option>
                                         <option value="3">Hồ sơ phù hợp</option>
                                         <option value="4">Hồ sơ chưa phù hợp</option>
                                     @elseif ($application->status == 2)
                                         <option value="1">Đã ứng tuyển</option>
                                         <option selected value="2">NTD đã xem hồ sơ</option>
                                         <option value="3">Hồ sơ phù hợp</option>
                                         <option value="4">Hồ sơ chưa phù hợp</option>
                                     @elseif ($application->status == 3)
                                         <option value="1">Đã ứng tuyển</option>
                                         <option value="2">NTD đã xem hồ sơ</option>
                                         <option selected value="3">Hồ sơ phù hợp</option>
                                         <option value="4">Hồ sơ chưa phù hợp</option>
                                     @else
                                         <option value="1">Đã ứng tuyển</option>
                                         <option value="2">NTD đã xem hồ sơ</option>
                                         <option value="3">Hồ sơ phù hợp</option>
                                         <option selected value="4">Hồ sơ chưa phù hợp</option>
                                     @endif
                                 </select>
                             </div>
                             <form id="rating-form" action="{{ route('applications.update.rating', $application->id) }}"
                                 method="POST">
                                 @csrf
                                 @method('PUT')
                                 <div class="select-grid">
                                     <input name="rating" type="number" min="1" max="5"
                                         placeholder="Rating (out of 5)" value="{{ old('rating', $application->rating) }}">
                                 </div>
                                 <div class="clearfix"></div>
                                 <button type="submit" class="button margin-top-15">Save</button>
                             </form>
                         </div>
                         <!-- Second Tab -->
                         <form id="note-form" action="{{ route('applications.update.note', $application->id) }}"
                             method="POST">
                             @csrf
                             @method('PUT')
                             <div class="app-tab-content" id="two-1">
                                 <textarea name="note" placeholder="Private note regarding this application">{{ old('note', $application->note) }}</textarea>
                                 <button type="submit" class="button margin-top-15">Add Note</button>
                             </div>
                         </form>
                         <!-- Third Tab -->
                         <div class="app-tab-content" id="three-1" style="display: none;">
                             <i>Full Name:</i>
                             <span>{{ $application->candidate->fullname_candidate }}</span>

                             <i>Email:</i>
                             <span><a href="">{{ $application->candidate->email }}</a></span>
                             <i>Phone:</i>
                             <span><a href="">{{ $application->candidate->phone_number_candidate }}</a></span>

                             <i>Message:</i>
                             <span>{{ $application->application_letter }}</span>
                         </div>
                     </div>
                     <!-- Footer -->
                     <div class="app-footer">
                         @if ($application->rating == 0)
                             <div class="rating no-stars">
                                 <div class="star-rating"></div>
                                 <div class="star-bg"></div>
                             </div>
                         @elseif($application->rating == 1)
                             <div class="rating one-stars">
                                 <div class="star-rating"></div>
                                 <div class="star-bg"></div>
                             </div>
                         @elseif($application->rating == 2)
                             <div class="rating two-stars">
                                 <div class="star-rating"></div>
                                 <div class="star-bg"></div>
                             </div>
                         @elseif($application->rating == 3)
                             <div class="rating three-stars">
                                 <div class="star-rating"></div>
                                 <div class="star-bg"></div>
                             </div>
                         @elseif($application->rating == 4)
                             <div class="rating four-stars">
                                 <div class="star-rating"></div>
                                 <div class="star-bg"></div>
                             </div>
                         @elseif($application->rating == 5)
                             <div class="rating five-stars">
                                 <div class="star-rating"></div>
                                 <div class="star-bg"></div>
                             </div>
                         @endif
                         <ul>
                             <li><i class="fa fa-file-text-o"></i>
                                 @if ($application->status == 1)
                                     Đã ứng tuyển
                                 @elseif ($application->status == 2)
                                     NTD đã xem hồ sơ
                                 @elseif ($application->status == 3)
                                     Hồ sơ phù hợp
                                 @else
                                     Hồ sơ chưa phù hợp
                                 @endif
                             </li>
                             <li><i class="fa fa-calendar"></i> {{ $application->created_at }}</li>
                         </ul>
                         <div class="clearfix"></div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 @endsection
