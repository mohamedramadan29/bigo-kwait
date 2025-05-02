@extends('front.user-layouts.app')

@section('title')
    خطط التجارة الالكترونية
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">خطط التجارة الالكترونية</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.account') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">الخطط
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="content-types">
                    <div class="row match-height">
                        @foreach ($plans as $plan)
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card" style="height: 511.977px;">
                                    <div class="card-content">
                                        <div class="card-body text-center">
                                            <h4 class="card-title">{{ $plan->name }}</h4>
                                            <p class="card-text">{{ $plan->description }}</p>

                                            <div class="my-3">
                                                <h2 style="color: {{ $setting->secondary_color }}; font-weight: bold;">
                                                    ${{ number_format($plan->price, 2) }}
                                                </h2>
                                                @if ($plan->duration_days)
                                                    <small class="text-muted">
                                                        <i class="la la-calendar"></i> لمدة {{ $plan->duration_days }} يوم
                                                    </small>
                                                @endif
                                            </div>

                                        </div>

                                        <ul class="list-group list-group-flush">
                                            @if ($plan->features)
                                                @php
                                                    $features = explode('#', $plan->features);
                                                @endphp
                                                @foreach ($features as $feature)
                                                    @if (!empty($feature))
                                                        <li class="list-group-item">
                                                            <i class="la la-check" style="color: var(--primary)"></i>
                                                            {{ $feature }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>

                                        <div class="card-body text-center">
                                            <form action="{{ route('user.ecommerce.subscribe.paypal.initiate') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="ecommerce_plan_id" value="{{ $plan->id }}">
                                                <button type="submit" class="btn btn-primary">اشترك الآن</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                </section>
            </div>
        </div>
    </div>
@endsection
