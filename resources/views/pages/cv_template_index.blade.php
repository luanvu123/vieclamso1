@extends('layout')

@section('content')
<style>
    .cv-template {
    text-align: center;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 8px;
    transition: box-shadow 0.3s ease-in-out;
}

.cv-template:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.cv-image {
    max-height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.cv-template h5 {
    font-size: 1.1rem;
    color: #333;
}

</style>
    <div class="container">
        <h1 class="text-center my-4">Mẫu CV</h1>
        <div class="row">
            @foreach($cvTemplates as $template)
                <div class="col-md-3 mb-4">
                    <div class="cv-template">
                        <a href="{{ $template->url }}" target="_blank">
                            <img src="{{ asset('storage/' . $template->image) }}" alt="{{ $template->name }}" class="img-fluid cv-image">
                        </a>
                        <h5 class="text-center mt-2">{{ $template->name }}</h5>
                    </div>
                </div>

                @if(($loop->index + 1) % 4 == 0)
                    <div class="w-100"></div> <!-- Ngắt dòng sau mỗi 4 mẫu -->
                @endif
            @endforeach
        </div>
    </div>
@endsection
