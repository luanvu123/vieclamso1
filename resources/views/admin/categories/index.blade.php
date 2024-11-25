
@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <a href="{{ route('categories.create') }}" class="button margin-top-30">Thêm Thể loại</a>

            
                    <table class="manage-table responsive-table" id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên thể loại ngành nghề</th>
                                <th>Ảnh </th>
                                <th>Số lượng công việc</th>
                                <th>Người tạo</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                                style="width: 30px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $category->job_postings_count }}</td>
                                    <td>{{ $category->user->name ?? 'N/A' }}</td> <!-- Hiển thị tên người dùng -->
                                    <td>
                                        <div class="checkbox-wrapper-5">
                                            <div class="check">
                                                <input type="checkbox" id="cateCheckbox_{{ $category->id }}"
                                                    class="cate_checkbox" {{ $category->status == 1 ? 'checked' : '' }}>
                                                <label for="cateCheckbox_{{ $category->id }}"></label>
                                            </div>
                                        </div>
                                    </td>

                                    <script>
                                        $(document).ready(function() {
                                            $('.cate_checkbox').change(function() {
                                                var trangthai_val = $(this).is(':checked') ? '1' :
                                                    '0';
                                                var id = $(this).attr('id').replace('cateCheckbox_',
                                                    '');

                                                $.ajax({
                                                    url: "{{ route('cate-choose') }}",
                                                    method: "GET",
                                                    data: {
                                                        trangthai_val: trangthai_val,
                                                        id: id
                                                    },
                                                });
                                            });
                                        });
                                    </script>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}"><i
                                                class="fa fa-pencil"></i> Edit</a>
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
