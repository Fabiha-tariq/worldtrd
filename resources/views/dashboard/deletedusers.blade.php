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
                                    <h4>All Deleted users</h4>

                                </div>
                                @if (session()->has('status'))
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong></strong> {{ session()->get('status') }} !
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Full name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Email or username</th>
                                                @if (session()->get('role') == 4)
                                                    <th scope="col">password</th>
                                                @endif
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <!-- <th scope="col">Parent_id</th>
                        <th scope="col">Role:</th> -->
                                                @if (session()->get('role') == 4)
                                                    <th scope="col">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td> <a href="#" class="question_content"> {{ $user->user_id }}
                                                        </a></td>
                                                    <td>{{ $user->user_name }}</td>
                                                    <td>{{ $user->user_phone }}</td>
                                                    <td>{{ $user->user_email }}</td>
                                                    @if (session()->get('role') == 4)
                                                        <td>{{ $user->user_password }}</td>
                                                    @endif
                                                    @if ($user->delstatus == 1)
                                                        <td><a href="#" class="status_btn bg-danger">Deleted</a>
                                                        </td>
                                                    @endif
                                                    <td>{{ $user->date }}</td>
                                                    @if (session()->get('role') == 4)
                                                        <td>
                                                            <a href="{{ url('/dashboard/edit-user') }}/{{ $user->user_id }}"
                                                                class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                                            <a href="{{ url('/dashboard/delete-user') }}/{{ $user->user_id }}"
                                                                class="btn border-0 text-danger"><i
                                                                    class="ti-trash"></i></a>
                                                        </td>
                                                    @endif
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
