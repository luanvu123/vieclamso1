@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách công ty</h1>
        <table class="display" id="user-table">
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
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="top_chooseCheckbox_{{ $company->id }}" class="top_choose_checkbox"
                                    value="{{ $company->top }}" {{ $company->top == 1 ? 'checked' : '' }}>
                                <label class="terms-label" for="top_chooseCheckbox_{{ $company->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 200 200"
                                        class="checkbox-svg">
                                        <mask fill="white" id="path-1-inside-{{ $company->id }}">
                                            <rect height="200" width="200"></rect>
                                        </mask>
                                        <rect mask="url(#path-1-inside-{{ $company->id }})" stroke-width="40"
                                            class="checkbox-box" height="200" width="200"></rect>
                                        <path stroke-width="15" d="M52 111.018L76.9867 136L149 64" class="checkbox-tick">
                                        </path>
                                    </svg>
                                </label>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('.top_choose_checkbox').change(function() {
                                        var top_choose_val = $(this).is(':checked') ? '1' :
                                            '0'; // Convert checkbox state to '1' or '0'
                                        var company_id = $(this).attr('id').replace('top_chooseCheckbox_',
                                            ''); // Extract product ID from checkbox ID

                                        $.ajax({
                                            url: "{{ route('top-choose') }}",
                                            method: "GET",
                                            data: {
                                                top_choose_val: top_choose_val,
                                                company_id: company_id
                                            },
                                        });
                                    });
                                });
                            </script>
                        </td>
                        <td>
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="top_homeCheckbox_{{ $company->id }}" class="top_home_checkbox"
                                    value="{{ $company->top_home }}" {{ $company->top_home == 1 ? 'checked' : '' }}>
                                <label class="terms-label" for="top_homeCheckbox_{{ $company->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 200 200"
                                        class="checkbox-svg">
                                        <mask fill="white" id="path-1-inside-{{ $company->id }}">
                                            <rect height="200" width="200"></rect>
                                        </mask>
                                        <rect mask="url(#path-1-inside-{{ $company->id }})" stroke-width="40"
                                            class="checkbox-box" height="200" width="200"></rect>
                                        <path stroke-width="15" d="M52 111.018L76.9867 136L149 64" class="checkbox-tick">
                                        </path>
                                    </svg>
                                </label>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('.top_home_checkbox').change(function() {
                                        var top_home_val = $(this).is(':checked') ? '1' :
                                            '0'; // Convert checkbox state to '1' or '0'
                                        var company_id = $(this).attr('id').replace('top_homeCheckbox_',
                                            ''); // Extract product ID from checkbox ID

                                        $.ajax({
                                            url: "{{ route('top-home-choose') }}",
                                            method: "GET",
                                            data: {
                                                top_home_val: top_home_val,
                                                company_id: company_id
                                            },
                                        });
                                    });
                                });
                            </script>
                        </td>
                        <td>
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="featuredCheckbox_{{ $company->id }}" class="featured_checkbox"
                                    value="{{ $company->featured }}" {{ $company->featured == 1 ? 'checked' : '' }}>
                                <label class="terms-label" for="featuredCheckbox_{{ $company->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 200 200"
                                        class="checkbox-svg">
                                        <mask fill="white" id="path-1-inside-{{ $company->id }}">
                                            <rect height="200" width="200"></rect>
                                        </mask>
                                        <rect mask="url(#path-1-inside-{{ $company->id }})" stroke-width="40"
                                            class="checkbox-box" height="200" width="200"></rect>
                                        <path stroke-width="15" d="M52 111.018L76.9867 136L149 64" class="checkbox-tick">
                                        </path>
                                    </svg>
                                </label>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('.featured_checkbox').change(function() {
                                        var featured_val = $(this).is(':checked') ? '1' :
                                            '0'; // Convert checkbox state to '1' or '0'
                                        var company_id = $(this).attr('id').replace('featuredCheckbox_',
                                            ''); // Extract product ID from checkbox ID

                                        $.ajax({
                                            url: "{{ route('featured-choose') }}",
                                            method: "GET",
                                            data: {
                                                featured_val: featured_val,
                                                company_id: company_id
                                            },
                                        });
                                    });
                                });
                            </script>
                        </td>
                        <td>
                            <label class="plane-switch">
                                <input type="checkbox" id="statusCheckbox_{{ $company->id }}" class="plane-switch"
                                    value="{{ $company->status ? '1' : '0' }}" {{ $company->status ? 'checked' : '' }}>
                                <div>
                                    <div>
                                        <svg viewBox="0 0 13 13">
                                            <path
                                                d="M1.55989957,5.41666667 L5.51582215,5.41666667 L4.47015462,0.108333333 L4.47015462,0.108333333 C4.47015462,0.0634601974 4.49708054,0.0249592654 4.5354546,0.00851337035 L4.57707145,0 L5.36229752,0 C5.43359776,0 5.50087375,0.028779451 5.55026392,0.0782711996 L5.59317877,0.134368264 L7.13659662,2.81558333 L8.29565964,2.81666667 C8.53185377,2.81666667 8.72332694,3.01067661 8.72332694,3.25 C8.72332694,3.48932339 8.53185377,3.68333333 8.29565964,3.68333333 L7.63589819,3.68225 L8.63450135,5.41666667 L11.9308317,5.41666667 C12.5213171,5.41666667 13,5.90169152 13,6.5 C13,7.09830848 12.5213171,7.58333333 11.9308317,7.58333333 L8.63450135,7.58333333 L7.63589819,9.31666667 L8.29565964,9.31666667 C8.53185377,9.31666667 8.72332694,9.51067661 8.72332694,9.75 C8.72332694,9.98932339 8.53185377,10.1833333 8.29565964,10.1833333 L7.13659662,10.1833333 L5.59317877,12.8656317 C5.55725264,12.9280353 5.49882018,12.9724157 5.43174295,12.9907056 L5.36229752,13 L4.57707145,13 L4.55610333,12.9978962 C4.51267695,12.9890959 4.48069792,12.9547924 4.47230803,12.9134397 L4.47223088,12.8704208 L5.51582215,7.58333333 L1.55989957,7.58333333 L0.891288881,8.55114605 C0.853775374,8.60544678 0.798421006,8.64327676 0.73629202,8.65879796 L0.672314689,8.66666667 L0.106844414,8.66666667 L0.0715243949,8.66058466 L0.0715243949,8.66058466 C0.0297243066,8.6457608 0.00275502199,8.60729104 0,8.5651586 L0.00593007386,8.52254537 L0.580855011,6.85813984 C0.64492547,6.67265611 0.6577034,6.47392717 0.619193545,6.28316421 L0.580694768,6.14191703 L0.00601851064,4.48064746 C0.00203480725,4.4691314 0,4.45701613 0,4.44481314 C0,4.39994001 0.0269259152,4.36143908 0.0652999725,4.34499318 L0.106916826,4.33647981 L0.672546853,4.33647981 C0.737865848,4.33647981 0.80011301,4.36066329 0.848265401,4.40322477 L0.89131128,4.45169723 L1.55989957,5.41666667 Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <span class="street-middle"></span>
                                    <span class="cloud"></span>
                                    <span class="cloud two"></span>

                                </div>
                            </label>
                            <script>
                                $(document).ready(function() {
                                    $('.plane-switch').change(function() {
                                        var trangthai_val = $(this).is(':checked') ? '1' :
                                            '0'; // Convert checkbox state to '1' or '0'
                                        var id = $(this).attr('id').replace('statusCheckbox_',
                                            ''); // Extract company ID from checkbox ID

                                        $.ajax({
                                            url: "{{ route('company-choose') }}",
                                            method: "GET",
                                            data: {
                                                trangthai_val: trangthai_val,
                                                id: id
                                            },
                                        });
                                    });
                                });
                            </script>
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
