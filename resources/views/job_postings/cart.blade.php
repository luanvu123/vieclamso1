@extends('dashboard-employer')

@section('content')
    <div class="container">

        <style>
            .plan-features form {
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .plan-features button {
                display: inline-block;
                text-align: center;
            }
        </style>
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Buy Services</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Buy Services</a></li>
                            <li>Buy Services</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($carts as $cart)
                <div class="plan color-{{ $loop->index + 1 }} one-third column" id="plan{{ $loop->index + 1 }}"
                    onclick="activatePlan('plan{{ $loop->index + 1 }}')">
                    <div class="plan-price">
                        <h3>{{ $cart->description }}</h3>
                        <span class="plan-currency">{{ $cart->planCurrency->currency }}</span>
                        <span class="value">{{ $cart->value }}</span>
                    </div>
                    <div class="plan-features">
                        <ul>
                            @foreach ($cart->planFeatures as $feature)
                                <li>{{ $feature->feature }}</li>
                            @endforeach
                        </ul>
                        <form action="{{ route('cartlist.add', $cart->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="price" value="{{ $cart->value }}">
                            <button type="submit" class="button"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <script>
            function activatePlan(planId) {
                var planElement = document.getElementById(planId);

                // Reset class for all plans
                var allPlans = document.querySelectorAll('.plan');
                allPlans.forEach(function(plan) {
                    plan.classList.remove('color-2');
                    plan.classList.add('color-1');
                });

                // Add active class to the selected plan
                planElement.classList.remove('color-1');
                planElement.classList.add('color-2');
            }
        </script>



    </div>
@endsection
