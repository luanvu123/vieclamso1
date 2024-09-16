<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ứng tuyển thành công</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #f4f4f4; padding: 20px;">
        <h2 style="text-align: center; color: #4CAF50;">Ứng tuyển thành công</h2>
        <p>Xin chào {{ $application->candidate->name }},</p>
        <p>Hồ sơ của bạn đã được gửi đến công ty {{ $application->jobPosting->company->name }}.</p>

        <div style="border: 1px solid #ccc; padding: 10px; margin-top: 20px;">
            <strong>Vị trí: </strong> {{ $application->jobPosting->title }} <br>
            <strong>Mức lương: </strong> {{ $application->jobPosting->salary }} <br>
            <strong>Địa điểm: </strong> {{ $application->jobPosting->location }} <br>
            <strong>Thời gian ứng tuyển: </strong> {{ $application->created_at->format('d/m/Y H:i') }}
        </div>

        <p style="text-align: center; margin-top: 20px;">
            <a href="{{ route('applications.showAppliedJobs') }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none;">Xem việc làm đã ứng tuyển</a>
        </p>

        <p style="text-align: center; color: #888; margin-top: 30px;">{{$info->copyright}}</p>
    </div>
</body>
</html>
