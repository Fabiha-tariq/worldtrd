@extends('layouts.dashboard-layout')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Add transaction</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ url('/') }}/dashboard/store-transaction" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="inputState">Type</label>
                                            <select id="inputState" name="type" class="form-control">
                                                <option selected disabled>Choose...</option>
                                                <option value="0">Deposit</option>
                                                <option value="1">Withdraw</option>
                                                <option value="2">Invest</option>
                                            </select>
                                        </div>
                                        <div class=" col-md-6">
                                            <label class="form-label" for="inputPassword4">Amount</label>
                                            <input type="number" name="amount" class="form-control" id="inputPassword4"
                                                placeholder="Amount">
                                            @error('amount')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        {{-- <div class="col-md-6">
            <label class="form-label" for="inputState">Status</label>
            <select id="inputState" name="status" class="form-control">
            <option selected disabled>Choose...</option>
            <option value="0">Pending</option>
            <option value="1">Accepted</option>
            <option value="2">Rejected</option>
            </select>
            </div> --}}
                                        <div class=" col-md-6">
                                            <label class="form-label" for="inputAddress">Date</label>
                                            <input type="date" name="date" class="form-control" id="inputDate">
                                        </div>
                                        @error('date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Add transaction</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
