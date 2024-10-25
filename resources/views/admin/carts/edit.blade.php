@extends('layouts.app')

@section('title', 'Edit Cart')

@section('content')
    <h1>Edit Cart</h1>

    <form action="{{ route('carts.update', $cart->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $cart->title) }}" required>
        </div>
    

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
            <label for="type_cart_id">Type Cart:</label>
            <select id="type_cart_id" name="type_cart_id" required>
                @foreach ($typeCarts as $typeCart)
                    <option value="{{ $typeCart->id }}" {{ $typeCart->id == $cart->type_cart_id ? 'selected' : '' }}>
                        {{ $typeCart->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="value">Value:</label>
            <input type="number" id="value" name="value" step="0.01" value="{{ old('value', $cart->value) }}"
                required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea class="WYSIWYG" name="description" cols="80" rows="6" id="summary4" spellcheck="true">{!! $cart->description !!}</textarea>
        </div>

        <div>
            <label for="top_point">Top Point:</label>
            <input type="number" id="top_point" name="top_point" value="{{ old('top_point', $cart->top_point) }}">
        </div>

        <div>
            <label for="validity">Validity (days):</label>
            <input type="number" id="validity" name="validity" value="{{ old('validity', $cart->validity) }}" required>
        </div>

        <div>
            <label for="background_image">Background Image:</label>
            @if ($cart->background_image)
                <div>
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $cart->background_image) }}" alt="Background Image" width="200">
                </div>
            @endif
            <input type="file" id="background_image" name="background_image" accept="image/*">
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
                        {{ in_array($planFeature->id, old('plan_features', $cart->planFeatures->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $planFeature->feature }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
