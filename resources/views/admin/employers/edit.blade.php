@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Cập nhật NTD</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employers.update', $employer->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="isVerify">OTP SMS (Xác thực số điện thoại)</label>
                                <input type="checkbox" id="isVerify" name="isVerify" value="1"
                                    {{ $employer->isVerify ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="isVerify_license">Verify License</label>
                                <input type="checkbox" id="isVerify_license" name="isVerify_license" value="1"
                                    {{ $employer->isVerify_license ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="isVerifyCompany">Verify Company</label>
                                <input type="checkbox" id="isVerifyCompany" name="isVerifyCompany" value="1"
                                    {{ $employer->isVerifyCompany ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="level">Cấp độ</label>
                                <select id="level" name="level" class="form-control">
                                    <option value="">Select Level</option>
                                    <option value="1" {{ $employer->level == 1 ? 'selected' : '' }}>Level 1</option>
                                    <option value="2" {{ $employer->level == 2 ? 'selected' : '' }}>Level 2</option>
                                    <option value="3" {{ $employer->level == 3 ? 'selected' : '' }}>Level 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="isInfomation">Có thể xem thông tin ứng viên</label>
                                <input type="checkbox" id="isInfomation" name="isInfomation" value="1"
                                    {{ $employer->isInfomation ? 'checked' : '' }}>
                            </div>
                            <div class="form-group">
                                <label for="IsBasicnews">Tin cơ bản</label>
                                <input type="checkbox" id="IsBasicnews" name="IsBasicnews" value="1"
                                    {{ $employer->IsBasicnews ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="isUrgentrecruitment">Tuyển gấp</label>
                                <input type="checkbox" id="isUrgentrecruitment" name="isUrgentrecruitment" value="1"
                                    {{ $employer->isUrgentrecruitment ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="IsPrioritize">Ưu tiên trang ngành</label>
                                <input type="checkbox" id="IsPrioritize" name="IsPrioritize" value="1"
                                    {{ $employer->IsPrioritize ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="IsRefresheveryhour">Làm mới mỗi giờ </label>
                                <input type="checkbox" id="IsRefresheveryhour" name="IsRefresheveryhour" value="1"
                                    {{ $employer->IsRefresheveryhour ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="IsRefresheveryday">Làm mới mỗi ngày</label>
                                <input type="checkbox" id="IsRefresheveryday" name="IsRefresheveryday" value="1"
                                    {{ $employer->IsRefresheveryday ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="IsDarkredeffect">Hiệu ứng đỏ đậm</label>
                                <input type="checkbox" id="IsDarkredeffect" name="IsDarkredeffect" value="1"
                                    {{ $employer->IsDarkredeffect ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="IsFramingeffect">Hiệu ứng đóng khung</label>
                                <input type="checkbox" id="IsFramingeffect" name="IsFramingeffect" value="1"
                                    {{ $employer->IsFramingeffect ? 'checked' : '' }}>
                            </div>

                            <div class="form-group">
                                <label for="IsHoteffect">Hiệu ứng Hot</label>
                                <input type="checkbox" id="IsHoteffect" name="IsHoteffect" value="1"
                                    {{ $employer->IsHoteffect ? 'checked' : '' }}>
                            </div>

                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
