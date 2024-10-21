@extends('layout')

@section('content')
<style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    color: #333;
}

.cv-container {
    max-width: 1000px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.cv-header {
    display: flex;
    align-items: center;
    border-bottom: 2px solid #ccc;
    padding-bottom: 20px;
}

.cv-profile {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.cv-avatar img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-right: 20px;
}

.cv-info {
    flex-grow: 1;
}

.cv-name {
    font-size: 24px;
    font-weight: bold;
}

.cv-status {
    font-size: 18px;
    color: #666;
}

.cv-section {
    margin: 20px 0;
}

.section-title {
    font-size: 20px;
    margin-bottom: 10px;
    color: #333;
}

ul {
    list-style-type: none;
    padding-left: 0;
}

ul li {
    margin: 5px 0;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

</style>
  <div class="cv-container" id="cv-container">
      
        <header class="cv-header">
            <div class="cv-profile">
                <div class="cv-avatar">
                    <img src="{{ $candidate->avatar_candidate ? asset('storage/' . $candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}" alt="Avatar" />
                </div>
                <div class="cv-info">
                    <h1 class="cv-name">{{ $candidate->fullname_candidate }}</h1>
                    <p class="cv-status">{{ $candidate->position }}</p>
                </div>
            </div>
        </header>

        <section class="cv-section about">
            <h2 class="section-title"><i class="fas fa-info-circle"></i> Thông Tin Cá Nhân</h2>
            <p>Email: {{ $candidate->email }}</p>
            <p>Điện Thoại: {{ $candidate->phone_number_candidate }}</p>
            <p>Địa Chỉ: {{ $candidate->address }}</p>
        </section>

        <section class="cv-section work-experience">
            <h2 class="section-title"><i class="fas fa-briefcase"></i> Kinh Nghiệm Làm Việc</h2>
            <ul>
                @foreach ($candidate->experiences as $experience)
                    <li>
                        <strong>{{ $experience->title }}</strong> tại {{ $experience->company }}<br>
                        <span class="experience-dates">({{ $experience->start_date }} - {{ $experience->end_date }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="cv-section education">
            <h2 class="section-title"><i class="fas fa-graduation-cap"></i> Học Vấn</h2>
            <ul>
                @foreach ($candidate->educations as $education)
                    <li>
                        <strong>{{ $education->school }}</strong> - {{ $education->degree }}<br>
                        <span class="education-dates">({{ $education->start_date }} - {{ $education->end_date }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="cv-section skills">
            <h2 class="section-title"><i class="fas fa-tools"></i> Kỹ Năng</h2>
            <ul>
                @foreach ($candidate->skills as $skill)
                    <li><i class="fa fa-check-circle" aria-hidden="true"></i> {{ $skill->name }}</li>
                @endforeach
            </ul>
        </section>

        <section class="cv-section hobbies">
            <h2 class="section-title"><i class="fas fa-smile"></i> Sở Thích</h2>
            <p>{{ $candidate->hobbies->pluck('name')->implode(', ') }}</p>
        </section>

        <section class="cv-section certificates">
            <h2 class="section-title"><i class="fas fa-certificate"></i> Chứng Chỉ</h2>
            <p>{{ $candidate->certificates->pluck('name')->implode(', ') }}</p>
        </section>

        <section class="cv-section activities">
            <h2 class="section-title"><i class="fas fa-flag"></i> Hoạt Động</h2>
            <ul>
                @foreach ($candidate->activities as $activity)
                    <li>
                        <strong>{{ $activity->title }}</strong><br>
                        <span class="experience-dates">({{ $activity->start_date }} - {{ $activity->end_date }})</span>
                        <p>{{ $activity->description }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="cv-section advisers">
            <h2 class="section-title"><i class="fas fa-user-tie"></i> Cố Vấn</h2>
            <ul>
                @foreach ($candidate->advisers as $adviser)
                    <li>
                        <strong>{{ $adviser->name }}</strong> - {{ $adviser->position }}<br>
                        <p>{{ $adviser->company }} - {{ $adviser->description }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="cv-section prizes">
            <h2 class="section-title"><i class="fas fa-trophy"></i> Giải Thưởng</h2>
            <ul>
                @foreach ($candidate->prizes as $prize)
                    <li>
                        <strong>{{ $prize->title }}</strong> - {{ $prize->organization }}<br>
                    </li>
                @endforeach
            </ul>
        </section>

        <form action="{{ route('cv.template.download') }}" method="POST" class="mt-3">
            @csrf
             <input type="hidden" name="bgcolor" id="hiddenBgColor">
            <button type="submit" class="btn btn-primary">Tải Xuống PDF</button>
        </form>
         <script>
            // Thay đổi màu nền khi chọn màu
            document.getElementById('colorPicker').addEventListener('input', function() {
                const selectedColor = this.value;
                document.getElementById('cv-container').style.backgroundColor = selectedColor;
                document.getElementById('hiddenBgColor').value = selectedColor;
            });
        </script>
    </div>
@endsection
