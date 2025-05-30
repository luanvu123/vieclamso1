<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ứng viên đã ứng tuyển</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .candidate-info {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .candidate-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            float: left;
            margin-right: 20px;
        }
        .info-row {
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            display: inline-block;
            min-width: 150px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
        }
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Ứng viên đã ứng tuyển vào công việc của bạn</h1>
    </div>

    <p>Xin chào,</p>

    <p>Bạn có một ứng viên mới đã ứng tuyển vào vị trí <strong>{{ $jobTitle }}</strong>. Chi tiết ứng viên như sau:</p>

    <div class="candidate-info clearfix">
        @if(isset($candidateAvatar) && $candidateAvatar)
        <img src="{{ asset('storage/' . $candidateAvatar) }}" alt="Avatar" class="candidate-avatar">
        @endif

        <div class="info-row">
            <span class="info-label">Họ tên:</span> {{ $candidateName ?? 'Chưa cập nhật' }}
        </div>
        @if(isset($candidateGender))
        <div class="info-row">
            <span class="info-label">Giới tính:</span> {{ $candidateGender }}
        </div>
        @endif

        @if(isset($candidateDob))
        <div class="info-row">
            <span class="info-label">Ngày sinh:</span> {{ $candidateDob }}
        </div>
        @endif

        @if(isset($candidateAddress))
        <div class="info-row">
            <span class="info-label">Địa chỉ:</span> {{ $candidateAddress }}
        </div>
        @endif

        @if(isset($candidatePosition))
        <div class="info-row">
            <span class="info-label">Vị trí mong muốn:</span> {{ $candidatePosition }}
        </div>
        @endif

        @if(isset($candidateLevel))
        <div class="info-row">
            <span class="info-label">Cấp độ hiện tại:</span> {{ $candidateLevel }}
        </div>
        @endif

        @if(isset($candidateDesiredLevel))
        <div class="info-row">
            <span class="info-label">Cấp độ mong muốn:</span> {{ $candidateDesiredLevel }}
        </div>
        @endif

        @if(isset($candidateDesiredSalary))
        <div class="info-row">
            <span class="info-label">Mức lương mong muốn:</span> {{ number_format($candidateDesiredSalary) }} VNĐ
        </div>
        @endif

        @if(isset($candidateExperience))
        <div class="info-row">
            <span class="info-label">Kinh nghiệm làm việc:</span> {{ $candidateExperience }} năm
        </div>
        @endif

        @if(isset($candidateEducation))
        <div class="info-row">
            <span class="info-label">Trình độ học vấn:</span> {{ $candidateEducation }}
        </div>
        @endif

        @if(isset($candidateWorkingForm))
        <div class="info-row">
            <span class="info-label">Hình thức làm việc:</span> {{ $candidateWorkingForm }}
        </div>
        @endif

        @if(isset($candidateSkill))
        <div class="info-row">
            <span class="info-label">Kỹ năng:</span> {{ $candidateSkill }}
        </div>
        @endif

        @if(isset($candidateLinkedin))
        <div class="info-row">
            <span class="info-label">LinkedIn:</span>
            <a href="{{ $candidateLinkedin }}" target="_blank">{{ $candidateLinkedin }}</a>
        </div>
        @endif
    </div>

    @if(isset($applicationIntroduction) && $applicationIntroduction)
    <div class="candidate-info">
        <h3>Thư giới thiệu:</h3>
        <p>{{ $applicationIntroduction }}</p>
    </div>
    @endif



    <p><strong>Chuyên viên tư vấn đang chăm sóc tài khoản của quý khách:</strong></p>
    <ul>
        <li>Chuyên viên CSKH: Nguyễn thu Huyền</li>
        <li>Điện thoại liên hệ: 0346746485</li>
        <li>Email liên hệ: <a href="mailto:huyencskh@tuyendungso1.vn">huyencskh@tuyendungso1.vn</a></li>
    </ul>

    <p>Hoặc gọi số hotline: 0346746485 <strong>để được hỗ trợ</strong></p>

    <p>Trân trọng,</p>
    <p><strong>Hệ thống tuyển dụng Vieclamso1</strong></p>
</body>
</html>
