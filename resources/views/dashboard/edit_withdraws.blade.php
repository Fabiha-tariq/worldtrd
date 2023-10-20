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
                                    <h3 class="m-0">Edit withdraw</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ url('/') }}/dashboard/update-withdraw/{{ $data->withdraw_id }}"
                                    method="POST">
                                    @csrf
                                    <div class="row mb-3">

                                        <div class=" col-md-6 mt-2">
                                            <label class="form-label" for="inputPassword4">Final amount in $</label>
                                            <input type="text" name="final_amount" readonly
                                                value="{{ $data->final_amount }}" class="form-control" id="inputPassword4"
                                                placeholder="Enter final amount">
                                        </div>
                                        <input type="hidden" name="userid" value="{{$data->user_id}}">
                                        @if (!$data->account_title == null)

                                        <div class="col-md-6 mt-2">
                                            <label class="form-label">Account title</label>
                                            <input type="text" name="account_title" value="{{ $data->account_title }}"
                                            class="form-control" placeholder="Account title">
                                        </div>

                                        @endif
                                        <div class=" col-md-6 mt-2">
                                            <label class="form-label" for="inputAddress">Account Number or Wallet Address</label>
                                            <input type="text" name="account_number" value="{{ $data->account_number }}"
                                                class="form-control" placeholder="Account Number" id="inputDate">
                                        </div>

                                        <div class=" col-md-6 mt-2">
                                            <label class="form-label" for="inputAddress">Status</label>
                                            <select name="status" class="form-select">
                                                @if ($data->tstatus == 0)
                                                    <option value="0" selected>Pending</option>
                                                    <option value="1">Accepted</option>
                                                    <option value="2">Rejected</option>

                                                @elseif($data->tstatus == 1)
                                                    <option value="0">Pending</option>
                                                    <option value="1" selected>Accepted</option>
                                                    <option value="2">Rejected</option>
                                                @else
                                                    <option value="0">Pending</option>
                                                    <option value="1">Accepted</option>
                                                    <option value="2" selected>Rejected</option>
                                                @endif

                                            </select>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="">Reason or Comment</label>
                                            <textarea name="comment" class="form-control" rows="5">{{$data->comment}}</textarea>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm">Update withdraw</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
