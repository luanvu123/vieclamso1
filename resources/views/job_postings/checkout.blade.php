@extends('dashboard-employer')

@section('content')
<div class="container">
    <h2>Thông tin Thanh Toán</h2>
<style>
    .area-section {
    margin-bottom: 20px;
}

.bank-item {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.bank-details img {
    margin-bottom: 10px;
}

</style>
    <!-- Lựa chọn Khu Vực -->
    <div class="mb-4">
        <label for="area" class="form-label">Chọn Khu Vực:</label>
        <select id="area" class="form-select" onchange="filterByArea()">
            <option value="">Tất cả khu vực</option>
            @foreach ($groupedBanks as $area => $banks)
                <option value="{{ $area }}">{{ $area }}</option>
            @endforeach
        </select>
    </div>

    <!-- Danh sách ngân hàng -->
    <div id="bank-list">
        @foreach ($groupedBanks as $area => $banks)
            <div class="area-section" data-area="{{ $area }}">
                <h3>{{ $area }}</h3>
                @foreach ($banks as $bank)
                    <div class="bank-item">
                        <h4>{{ $bank->name }}</h4>
                        <div class="bank-details">
                            <img src="{{ asset('storage/' . $bank->logo_bank) }}" alt="Logo {{ $bank->name }}" style="max-width: 150px;">
                            <p><strong>Tên tài khoản nhận:</strong> {{ $bank->branch }}</p>
                            <p><strong>Số tài khoản:</strong> {{ $bank->account_number }}
                                <button onclick="navigator.clipboard.writeText('{{ $bank->account_number }}')">Copy</button>
                            </p>
                            <p><strong>Chi nhánh:</strong> {{ $bank->branch }}</p>
                            <p><strong>Nội dung:</strong> {!! $bank->content !!}</p>
                        </div>
                        @if ($bank->image)
                            <img src="{{ asset('storage/' . $bank->image) }}" alt="QR Code" style="max-width: 200px;">
                        @endif
                    </div>
                @endforeach
                <hr>
            </div>
        @endforeach
    </div>
</div>
<script>
    function filterByArea() {
    const selectedArea = document.getElementById('area').value;
    const areaSections = document.querySelectorAll('.area-section');

    areaSections.forEach((section) => {
        const area = section.getAttribute('data-area');
        if (selectedArea === '' || area === selectedArea) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
}

</script>
@endsection
