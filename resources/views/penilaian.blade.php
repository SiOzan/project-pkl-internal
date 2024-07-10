@extends('layouts.frontend')
@section('content')
    <div class="class">
        @include('include.frontend.header')
    </div>

    <div class="container">
        <section class="newsletter_area">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12">
                        <div class="subscription_box text-center">
                            <div class="row col-5">
                                <h4 class="fw-bold text-center mt-3"></h4>
                                <form class="px-4" action="">
                                    @foreach($nilai as $data)
                                        <p class="fw-bold">{{$data->pertanyaanAtasan->pertanyaan}}</p>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="exampleForm"
                                                id="radioExample1" />
                                                <label class="form-check-label" for="radioExample1">
                                                    Option 1
                                                </label>
                                            </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="exampleForm"
                                                id="radioExample2" />
                                                <label class="form-check-label" for="radioExample2">
                                                Option 2
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="exampleForm"
                                                id="radioExample3" />
                                            <label class="form-check-label" for="radioExample3">
                                                Option 3
                                            </label>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
