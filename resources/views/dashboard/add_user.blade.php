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
                                    <h3 class="m-0">Add user</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="inputEmail4">Full name</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="Enter Full name">
                                        </div>
                                        <div class=" col-md-6">
                                            <label class="form-label" for="inputPassword4">Phone</label>
                                            <input type="number" class="form-control" id="inputPassword4"
                                                placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class=" col-md-4">
                                            <label class="form-label" for="inputAddress">Email or username</label>
                                            <input type="text" class="form-control" id="inputPassword4"
                                                placeholder="Email or username">
                                        </div>
                                        <div class=" col-md-4">
                                            <label class="form-label" for="inputCity">Password</label>
                                            <input type="text" class="form-control" placeholder="Password">
                                        </div>
                                        <div class=" col-md-4">
                                            <label class="form-label" for="inputCity">Confirm password</label>
                                            <input type="text" class="form-control" placeholder="Confirm password">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="inputState">Status</label>
                                            <select id="inputState" class="form-control">
                                                <option selected="" disabled>Choose...</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                        <div class=" col-md-4">
                                            <label class="form-label" for="inputAddress">Date</label>
                                            <input type="date" class="form-control" name="inputDate" id="inputDate">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="inputCity">Parent ID</label>
                                            <input type="text" class="form-control" placeholder="Parent ID">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Role:</label>
                                            <input type="text" class="form-control" placeholder="Enter role:">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Add user</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
