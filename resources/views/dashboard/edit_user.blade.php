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
                                    <h3 class="m-0">Edit user</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{url('/dashboard/update-invested-user')}}/{{$user->user_id}}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" >Full name</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter Full name" name="fullname" value="{{$user->user_name}}">
                                        </div>
                                        <div class=" col-md-6">
                                            <label class="form-label" >Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Phone" value="{{$user->user_phone}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class=" col-md-6">
                                            <label class="form-label" >Email or username</label>
                                            <input type="text" class="form-control" id="inputPassword4"
                                                placeholder="Enter Email" name="email" value="{{$user->user_email}}">
                                        </div>
                                        <div class=" col-md-6">
                                            <label class="form-label" >Password</label>
                                            <input type="text" class="form-control" id="inputPassword4"
                                                placeholder="Enter password" name="password" value="{{$user->user_password}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" >Status</label>
                                            <select name="status" class="form-select">
                                                @if ($user->status == 1)
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                                    @else
                                                    <option value="1" >Active</option>
                                                    <option value="0" selected >Inactive</option>
                                                @endif
                                            </select>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm">Update user</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
