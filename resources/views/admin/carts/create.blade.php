@extends('layouts.app')

@section('title', 'Create Cart')

@section('content')
    <h1>Create Product Cart</h1>

    <form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="plan_currency_id">Plan Currency:</label>
            <select id="plan_currency_id" name="plan_currency_id" required>
                @foreach ($planCurrencies as $planCurrency)
                    <option value="{{ $planCurrency->id }}">{{ $planCurrency->currency }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="type_cart_id">Type Cart:</label>
            <select id="type_cart_id" name="type_cart_id" required>
                @foreach ($typeCarts as $typeCart)
                    <option value="{{ $typeCart->id }}">{{ $typeCart->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="value">Value:</label>
            <input type="number" id="value" name="value" step="0.01" value="{{ old('value') }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
        </div>

        <div>
            <label for="top_point">Top Point:</label>
            <input type="number" id="top_point" name="top_point" value="{{ old('top_point') }}">
        </div>

        <div>
            <label for="validity">Validity (days):</label>
            <input type="number" id="validity" name="validity" value="{{ old('validity') }}" required>
        </div>

        <div>
            <label for="background_image">Background Image:</label>
            <input type="file" id="background_image" name="background_image" accept="image/*">
        </div>

        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

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
