@extends('layouts.app')

@section('title', 'Create Cart')

@section('content')
    <h1>Create Cart</h1>

    <form action="{{ route('carts.store') }}" method="POST">
        @csrf
        <div>
            <label for="plan_currency_id">Plan Currency:</label>
            <select id="plan_currency_id" name="plan_currency_id" required>
                @foreach ($planCurrencies as $planCurrency)
                    <option value="{{ $planCurrency->id }}">{{ $planCurrency->currency }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="value">Value:</label>
            <input type="number" id="value" name="value" step="0.01" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
       <div>
  <div>
    <label for="plan_features">Plan Features:</label>
    <select id="plan_features" name="plan_features[]" multiple>
        @foreach ($planFeatures as $planFeature)
            <option value="{{ $planFeature->id }}"
                {{ in_array($planFeature->id, old('plan_features', [])) ? 'selected' : '' }}>
                {{ $planFeature->feature }}
            </option>
        @endforeach
    </select>
</div>



        <button type="submit">Create</button>
    </form>
@endsection
