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
                                    <h3 class="m-0">Add invest</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="inputEmail4">Plan ID</label>
                                            <input type="number" class="form-control" placeholder="Plan ID">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="inputEmail4">User ID</label>
                                            <input type="number" class="form-control" placeholder="User ID">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class=" col-md-4">
                                            <label class="form-label" for="inputAddress">Date</label>
                                            <input type="date" class="form-control" name="inputDate" id="inputDate">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" placeholder="Enter amount">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="inputState">Status</label>
                                            <select id="inputState" class="form-control">
                                                <option selected="" disabled>Choose...</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Add Invest</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
