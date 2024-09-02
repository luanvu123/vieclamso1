@extends('layout')
@section('content')
    <div id="main">
        <div id="history-apply">
            <div class="container">
                <div id="chat-app" class="row">
                    <div class="col-md-8">
                        <div class="box-group">
                            <div class="box-group-header-applied box-group-header">
                                <div class="box-group-title">
                                    Tin nhắn đã gửi
                                </div>
                            </div>

                                 <div class="list-group">
                                     @foreach ($employers as $employer)
                                         <a href="{{ route('messages.show.candidate', $employer) }}"
                                             class="list-group-item list-group-item-action">
                                             <div class="media">
                                                 <img src="{{ $employer->company->logo ? asset('storage/' . $employer->company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                                     class="mr-3 rounded-circle" alt="Avatar"
                                                     style="width: 50px; height: 50px;">
                                                 <div class="media-body">
                                                     <h5 class="mt-0">{{ $employer->company->name }}</h5>
                                                     <p>Click to view messages</p>
                                                 </div>
                                             </div>
                                         </a>
                                     @endforeach
                                 </div>
                           </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
