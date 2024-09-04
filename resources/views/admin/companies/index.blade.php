@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách công ty</h1>
        <table  class="display" id="user-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Tên công ty</th>
                    <th>Người tạo</th>
                    <th>Địa chỉ</th>
                    <th>Website</th>
                    <th>Top công ty</th>
                    <th>Top trang chủ</th>
                    <th>Nổi bật</th>
                    <th>Status</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                          <td><img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}" width="50"></td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->employer->name }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <select id="{{ $company->id }}" class="top_choose">
                                @if ($company->top == 0)
                                    <option value="1">Yes</option>
                                    <option selected value="0">No</option>
                                @else
                                    <option selected value="1">Yes</option>
                                    <option value="0">No</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <select id="{{ $company->id }}" class="top_home_choose">
                                @if ($company->top_home == 0)
                                    <option value="1">Yes</option>
                                    <option selected value="0">No</option>
                                @else
                                    <option selected value="1">Yes</option>
                                    <option value="0">No</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <select id="{{ $company->id }}" class="featured_choose">
                                @if ($company->featured == 0)
                                    <option value="1">Yes</option>
                                    <option selected value="0">No</option>
                                @else
                                    <option selected value="1">Yes</option>
                                    <option value="0">No</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <select id="{{ $company->id }}" class="company_choose">
                                @if ($company->status == 0)
                                    <option value="1">Show</option>
                                    <option selected value="0">Hidden</option>
                                @else
                                    <option selected value="1">Show</option>
                                    <option value="0">Hidden</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <a href="{{ route('admin.companies.show', $company->id) }}"><i class="fa fa-eye"></i> Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
