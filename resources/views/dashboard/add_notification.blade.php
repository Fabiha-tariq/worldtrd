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
                                    <h3 class="m-0">Add notification</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ url('/') }}/dashboard/store-notifications" method="POST">

                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Notification Title</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter Notification Title" name="title">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class=" col-md-6">
                                            <label class="form-label" for="inputAddress">Date</label>
                                            <input type="date" class="form-control" name="date" id="inputDate">
                                            @error('date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                    <div class="row mb-3">

                                        <div class=" col-md-6">
                                            <label class="form-label">Notification Description</label>
                                            <textarea rows="4" class="form-control" placeholder="Enter Description" name="desc"></textarea>
                                            @error('desc')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">

                                            <label class="form-label" for="inputState">Status</label>
                                            <select name="status" id="inputState" class="form-select">
                                                <option selected="" disabled>Choose...</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('status')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Add Notification</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
