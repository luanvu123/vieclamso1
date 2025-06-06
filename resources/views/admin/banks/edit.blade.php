@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh sửa ngân hàng</h1>

    <form action="{{ route('banks.update', $bank->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')



        <div class="form-group">
            <label for="name">Tên ngân hàng:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $bank->name }}" required>
        </div>
<div class="form-group">
    <label for="account_name">Chủ tài khoản:</label>
    <input type="text" name="account_name" id="account_name" class="form-control" value="{{ old('account_name', $bank->account_name) }}" required>
</div>


        <div class="form-group">
            <label for="branch">Chi nhánh:</label>
            <input type="text" name="branch" id="branch" class="form-control" value="{{ $bank->branch }}" required>
        </div>

        <div class="form-group">
            <label for="account_number">Số tài khoản:</label>
            <input type="text" name="account_number" id="account_number" class="form-control" value="{{ $bank->account_number }}" required>
        </div>

        <div class="form-group">
            <label for="content">Nội dung:</label>

               <textarea class="WYSIWYG" name="content" cols="80" rows="6" id="summary6" spellcheck="true">{!! $bank->content !!}</textarea>
        </div>

        <div class="form-group">
            <label for="image">QR code:</label><br>
            @if ($bank->image)
                <img src="{{ asset('storage/' . $bank->image) }}" alt="Bank Image" width="100"><br>
            @endif
            <label for="image">Cập nhật ảnh:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>



        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ $bank->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $bank->status == 0 ? 'selected' : '' }}>Ngừng hoạt động</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
