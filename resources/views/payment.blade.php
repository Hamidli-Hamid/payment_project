@extends('layouts.master')

@section('title'){{ $seo->{'title_' . app()->getLocale()} ??  env('APP_TITLE')}}@endsection
@section('description'){{ $seo->{'description_' . app()->getLocale()} ?? env('APP_DESC')}}@endsection

@section('content')
<div class="container">

    <form method="POST" action="{{ route('make.payment', $order->order_token) }}" class="form">
        @csrf
        <div class="row">

            <div class="col-12 mt-4">
                <div class="card p-3">
                    <p class="mb-0 fw-bold h4 text-center">Payment</p>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">

                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                <span class="fw-bold">{{ $order->full_name }}</span>

                            </a>
                        </p>
                        <div class="collapse show p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-lg-5 mb-lg-0 mb-3">
                                    <p class="h4 mb-0">Summary</p>
                                    <p class="mb-0"><span class="fw-bold">Service:</span><span class="c-green">: {{ $order->service }}</span>
                                    </p>
                                    <p class="mb-0">
                                        <span class="fw-bold">Price:</span>
                                        <span class="c-green">:{{ $order->amount }} Azn</span>
                                    </p>
                                    <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque
                                        nihil neque
                                        quisquam aut
                                        repellendus, dicta vero? Animi dicta cupiditate, facilis provident quibusdam ab
                                        quis,
                                        iste harum ipsum hic, nemo qui!</p>
                                </div>
                                <div class="col-lg-7">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form__div">
                                                <input type="text" name="card_number" value="{{ old('card_number') }}" id="cc" data-inputmask="'mask': '9999 9999 9999 9999'" class="form-control {{ $errors->has('card_number') ? 'is-invalid' : '' }}" placeholder=" " aria-describedby="validationServer03Feedback" required>
                                                <label for="" class="form__label">Card Number</label>
                                                @error('card_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form__div">
                                                <input type="text" name="date" value="{{ old('date') }}" data-inputmask="'mask': '99/99'" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" placeholder=" " required>
                                                <label for="" class="form__label">MM/YY</label>
                                                @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form__div">
                                                <input type="text" name="cvv" value="{{ old('cvv') }}"  data-inputmask="'mask': '999'" class="form-control {{ $errors->has('cvv') ? 'is-invalid' : '' }}" placeholder=" " required>
                                                <label for="" class="form__label">cvv code</label>
                                                @error('cvv')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form__div">
                                                <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" placeholder=" " required>
                                                <label for="" class="form__label">name on the card</label>
                                                @error('full_name')
                                                <div class="invalid-feedback">
                                                  <p>{{ $message }}</p>  
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary payment">
                    Make Payment
                </button>
            </div>
        </div>
    </form>
</div>
@endsection