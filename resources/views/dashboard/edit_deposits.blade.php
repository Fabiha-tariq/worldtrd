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
                                    <h3 class="m-0">Edit deposit</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ url('/') }}/dashboard/update-deposit/{{ $data->deposit_id }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" >Amount in <b> PKR </b></label>
                                            <input type="number" name="amount" readonly value="{{ $data->amount }}"
                                                class="form-control"  placeholder="Enter Amount in $">
                                            <br>
                                            <input type="hidden" name="userid" value="{{$data->user_id}}">
                                            <select name="status" class="form-select">
                                                @if ($data->tstatus == 0)
                                                    <option value="0" selected>Pending</option>
                                                    <option value="1">Accepted</option>
                                                    <option value="2">Rejected</option>
                                                @elseif ($data->tstatus == 1)
                                                    <option value="0">Pending</option>
                                                    <option value="1" selected>Accepted</option>
                                                    <option value="2">Rejected</option>
                                                @else
                                                    <option value="0">Pending</option>
                                                    <option value="1">Accepted</option>
                                                    <option value="2" selected>Rejected</option>
                                                @endif
                                            </select>
                                        <br>
                                        <label for="">Comment</label>
                                        <textarea name="comment" class="form-control" rows="5">{{$data->comment}}</textarea>

                                            <br>
                                            <button type="submit" class="btn btn-primary btn-sm">Update deposit</button>

                                        </div>
                                        <div class=" col-md-6">
                                            <label class="form-label">Transaction file</label>
                                            <br>
                                            <a href="{{ url('/public/transaction_images') }}/{{ $data->transaction_file }}"
                                                target="_blank">
                                                <img class="bg-light"
                                                    src="{{ url('/public/transaction_images') }}/{{ $data->transaction_file }}"
                                                    width="100%" height="300" alt="img">
                                            </a>
                                            <input type="hidden" value="{{ $data->transaction_file }}" name="old_img"
                                                class="form-control mb-3">

                                        </div>
                                    </div>

                                    <div class="row mb-3">


                                        <div class=" col-md-6 mt-4">


                                        </div>
                                        <div class="col-md-6 mt-2">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
