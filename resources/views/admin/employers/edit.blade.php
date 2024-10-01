@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Employer</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employers.update', $employer->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="isVerify">OTP SMS</label>
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
                                <label for="level">Level</label>
                                <select id="level" name="level" class="form-control">
                                    <option value="">Select Level</option>
                                    <option value="1" {{ $employer->level == 1 ? 'selected' : '' }}>Level 1</option>
                                    <option value="2" {{ $employer->level == 2 ? 'selected' : '' }}>Level 2</option>
                                    <option value="3" {{ $employer->level == 3 ? 'selected' : '' }}>Level 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="isInfomation">Infomation</label>
                                <input type="checkbox" id="isInfomation" name="isInfomation" value="1"
                                    {{ $employer->isInfomation ? 'checked' : '' }}>
                            </div>


                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
