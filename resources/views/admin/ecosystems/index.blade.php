@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h1>Danh sách HST footer</h1>


                    <a href="{{ route('ecosystems.create') }}" class="btn btn-primary mb-3">Tạo mới</a>



                    <table class="table" id="user-table">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Chi tiết</th>
                                <th>Website</th>
                                <th>Mã màu</th>
                                <th>Trạng thái</th>
                                <th>Ảnh</th>
                                <th>Ảnh dưới footer</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ecosystems as $ecosystem)
                                <tr>
                                    <td>{{ $ecosystem->name }}</td>
                                    <td>{{ $ecosystem->detail }}</td>
                                    <td>{{ $ecosystem->website }}</td>
                                    <td>{{ $ecosystem->name_link_website }}</td>
                                    <td>{{ $ecosystem->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        @if ($ecosystem->image)
                                            <img src="{{ asset('storage/' . $ecosystem->image) }}" alt="Image"
                                                style="width: 100px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($ecosystem->image_footer)
                                            <img src="{{ asset('storage/' . $ecosystem->image_footer) }}" alt="Footer Image"
                                                style="width: 100px;">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('ecosystems.show', $ecosystem) }}" class="btn btn-info">Xem</a>
                                        <a href="{{ route('ecosystems.edit', $ecosystem) }}"
                                            class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('ecosystems.destroy', $ecosystem) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
