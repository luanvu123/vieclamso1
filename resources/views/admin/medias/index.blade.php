<!-- resources/views/admin/medias/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">

                    <h1>Báo chí nói về Vieclamso1</h1>
                    <a href="{{ route('medias.create') }}" class="btn btn-primary">Thêm Báo chí nói về Vieclamso1</a>
                    <table class="table mt-3" id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ảnh</th>
                                <th>Website</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medias as $media)
                                <tr>
                                    <td>{{ $media->id }}</td>
                                    <td>
                                        @if ($media->image)
                                            <img src="{{ asset('storage/' . $media->image) }}" alt="Image"
                                                style="width: 100px;">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>{{ $media->website }}</td>
                                    <td>
                                        <select id="{{ $media->id }}" class="media_choose">
                                            @if ($media->status == 0)
                                                <option value="1">Hiển thị</option>
                                                <option selected value="0">Ẩn</option>
                                            @else
                                                <option selected value="1">Hiển thị</option>
                                                <option value="0">Ẩn</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('medias.edit', $media) }}" class="btn btn-warning"><i
                                                class="fa fa-pencil"></i> Sửa</a>
                                        {{-- <form action="{{ route('medias.destroy', $media) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                                        <a href="{{ route('medias.show', $media) }}" class="btn btn-info"><i
                                                class="fa fa-eye"></i> Xem</a>
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
