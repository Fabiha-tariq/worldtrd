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
                                    <h3 class="m-0">Edit transaction</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ url('/') }}/dashboard/update-transactions/{{ $data->transaction_id }}"
                                    method="POST">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="inputState">Status</label>
                                            <select id="inputState" name="status" class="form-select">
                                                @if ($data->status == 0)
                                                    <option selected value="0">Pending</option>
                                                    <option value="1">Accepted</option>
                                                    <option value="2">Rejected</option>
                                                @endif

                                                @if ($data->status == 1)
                                                    <option selected value="1">Accepted</option>
                                                    <option value="0">Pending</option>
                                                    <option value="2">Rejected</option>
                                                @endif

                                                @if ($data->status == 2)
                                                    <option selected value="2">Rejected</option>
                                                    <option value="0">Pending</option>
                                                    <option value="1">Accepted</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update transaction</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
