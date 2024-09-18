<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="containe-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <a href="{{ route('categories.create') }}" class="button margin-top-30">Add Category</a>

                    <!-- Table -->
                    <table class="manage-table responsive-table" id="user-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Số lượng công việc</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->image)
                                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                                                style="width: 30px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $category->job_postings_count }}</td>
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
                                        {{-- <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form> --}}
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
