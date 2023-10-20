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

    @if (session()->has('status'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Thanks!</strong> {{session()->get('status')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    @endif

    @if (session()->has('status1'))
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Thanks!</strong> {{session()->get('status1')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    @endif

                            </div>
                        </div>
                        <div class="white_card_body">
                            <a href="{{url('/dashboard/add-notifications')}}" class="btn btn-primary">Add Notification</a>
                            <div class="QA_section">
                                <br>
                                <div class="white_box_tittle list_header">
                                    <h4>All Notifications</h4>
                                    {{-- <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here..."  >
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ms-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory"
                                                class="btn_1 btn-sm btn fs-7">Add Bank Payment Info</a>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="QA_table mb_30">
                                    <div class="table-responsive">

                                        <table class="table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col"> Title</th>
                                                <th scope="col"> Description</th>
                                                <th scope="col"> Status</th>
                                                <th scope="col"> Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data as $item)
                                                <tr>

                                                    <td> <a href="#" class="question_content"> {{$item->notification_id}}  </a></td>
                                                    <td> {{$item->notification_title}}</td>
                                                    <td style="width:30%;"> {{$item->notification_desc}}</td>
                                                    @if ($item->status == 1)
                                                    <td><a href="#" class="status_btn bg-success">Active</a></td>
                                                    @else
                                                    <td><a href="#" class="status_btn bg-danger">Unactive</a></td>
                                                    @endif
                                                    <td> {{$item->date}}</td>
                                                    <td>
                                                        <a href="{{ url('/dashboard/edit-notifications') }}/{{$item->notification_id}}"
                                                            class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                                        <a onclick="myfun({{$item->notification_id}})" class="btn border-0 text-danger"><i
                                                                class="ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
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

    <script>

        function myfun(id){

            var ans = confirm('Do you want to Delete ? ');

            if(ans){
                location.href = '{{url('/')}}/dashboard/delete-notifications/'+id;
            }
        }

    </script>


@endsection
