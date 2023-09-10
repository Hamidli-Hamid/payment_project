@extends('layouts.master')

@section('title'){{ $seo->{'title_' . app()->getLocale()} ??  env('APP_TITLE')}}@endsection
@section('description'){{ $seo->{'description_' . app()->getLocale()} ?? env('APP_DESC')}}@endsection

@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif
    <form method="POST" action={{ route('submit.order') }}>
        @csrf
        <input type="hidden" name="full_name" value="{{ $full_name }}">
        <input type="hidden" name="service" value="{{ $service }}">
        <input type="hidden" name="amount" value="{{ $amount }}">
        <div class="row">

            <div class="col-12 mt-4">
                <div class="card p-3">
                    <p class="mb-0 fw-bold h4 text-center">Service Order</p>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-body border p-0">
                        <p class="text-center">
                            <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                <span class="fw-bold">{{ $full_name }}</span>
                                <span class="fab fa-cc-paypal">
                                </span>
                            </a>
                        </p>

                    </div>
                    <div class="card-body border p-0">

                        <div class="collapse show p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-lg-5 mb-lg-0 mb-3">
                                    <p class="h4 mb-0">Summary</p>
                                    <p class="mb-0"><span class="fw-bold">Service:</span><span class="c-green">: {{ $service }}</span>
                                    </p>
                                    <p class="mb-0">
                                        <span class="fw-bold">Price:</span>
                                        <span class="c-green">:{{ $amount }} Azn</span>
                                    </p>
                                    <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque
                                        nihil neque
                                        quisquam aut
                                        repellendus, dicta vero? Animi dicta cupiditate, facilis provident quibusdam ab
                                        quis,
                                        iste harum ipsum hic, nemo qui!</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">

                <button type="submit" class="btn btn-primary payment">
                    Submit
                </button>
            </div>
        </div>
    </form>

</div>
@endsection