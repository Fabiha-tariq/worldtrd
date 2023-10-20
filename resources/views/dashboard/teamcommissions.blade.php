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
                                    <h4>Team Commission</h4>
                                </div>
                                <div class="QA_table mb_30">
                                    <div class="table-responsive">
                                    <table class="table table-bordered  ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Level</th>
                                                <th scope="col">Commission Percentage</th>
                                                <th scope="col">Status</th>
                                                @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                <th scope="col">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>

                                                    <td> <a href="#" class="question_content">{{ $item->level }}</a>
                                                    </td>

                                                    <td>{{ $item->comission_per }} %</td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                           <span class="bg-success status_btn">Active</span>
                                                        @endif
                                                    </td>

                                                    @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                        <td>
                                                            <a href="{{ url('/dashboard/edit-teamcomission') }}/{{ $item->comissionid }}"
                                                                class="fs-6 text-success"><i class="ti-pencil"></i></a>
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
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
@endsection
