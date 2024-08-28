@extends('layouts.app')

@section('title', 'Edit Cart')

@section('content')
    <h1>Edit Cart</h1>

    <form action="{{ route('carts.update', $cart->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="plan_currency_id">Plan Currency:</label>
            <select id="plan_currency_id" name="plan_currency_id" required>
                @foreach ($planCurrencies as $planCurrency)
                    <option value="{{ $planCurrency->id }}"
                        {{ $planCurrency->id == $cart->plan_currency_id ? 'selected' : '' }}>
                        {{ $planCurrency->currency }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="value">Value:</label>
            <input type="number" id="value" name="value" step="0.01" value="{{ $cart->value }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ $cart->description }}</textarea>
        </div>
         <div>
        <label for="top_point">Top Point:</label>
        <input type="number" id="top_point" name="top_point" value="{{ $cart->top_point }}" required>
    </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="1" {{ $cart->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$cart->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div>
            <label for="plan_features">Plan Features:</label>
            <select id="plan_features" name="plan_features[]" multiple>
                @foreach ($planFeatures as $planFeature)
                    <option value="{{ $planFeature->id }}"
                        {{ in_array($planFeature->id, old('plan_features', $cart->planFeatures->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                        {{ $planFeature->feature }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
