@extends('layouts.dashboard-layout')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <!-- <div class="main-title">
                    <h3 class="m-0">Data table</h3>
                    </div> -->
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">

                                <div class="white_box_tittle list_header">
                                    <h4>Users Detail</h4>

                                </div>
                                <a href="{{url('/dashboard/my-team')}}" class="btn btn-primary"><< Back to Team</a>

                                <div class="container my-2">
                                    <div class="row">
                                        <div class="offset-md-6 col-md-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="search" name="search" placeholder="Searching.....">
                                                <button id="searchbtn" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                    <div class="QA_table mb_30">

                                    <table class="table lms_table_active " id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Full name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Investments</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $user)
                                                <tr>

                                                    <td>{{ $user->user_name }}</td>
                                                    <td>{{ $user->user_phone }}</td>
                                                    <td>{{$user->amount}} PKR</td>
                                                    @if ($user->status == 1)
                                                        <td><a href="#" class="status_btn bg-success">Active</a>
                                                        </td>
                                                    @else
                                                        <td><a href="#" class="status_btn bg-danger">Inactive</a></td>
                                                    @endif
                                                    <td>{{ $user->date }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>



@endsection
