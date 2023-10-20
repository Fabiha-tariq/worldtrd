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
                                    <h3 class="m-0">Edit Dollar charges</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ url('/') }}/dashboard/update-dollar-charges/{{ $data->dollar_charge_id }}"
                                    method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class=" col-md-6">
                                            <label class="form-label">Dollar charges $</label>
                                            <input type="number" class="form-control" value="{{ $data->dollar_charge_amount }}"
                                                name="charges" step="0.1" placeholder="Enter with draw charges">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update charges</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
