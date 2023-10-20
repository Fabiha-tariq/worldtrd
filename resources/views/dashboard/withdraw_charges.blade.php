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
                        @if (session()->has('status'))
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Thanks!</strong> {{ session()->get('status') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="white_card_body">
                            @if (!$data)
                                <a href="{{ url('/') }}/dashboard/add-withdraw-charges" class="btn btn-primary">Add
                                    Withdraw Charges</a>
                            @endif

                            <div class="QA_section">

                                <br>
                                <div class="white_box_tittle list_header">

                                    <h4>With draw charges</h4>

                                </div>
                                <div class="QA_table mb_30">
                                    <div class="table-responsive">
                                    <table class="table table-bordered  ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Charges Amount (in %)</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data as $item)
                                                <tr>
                                                    <td> <a href="#" class="question_content"> {{ $item->charges_id }}
                                                        </a></td>
                                                    <td> {{ $item->charges }} %</td>
                                                    <td>
                                                        <a href="{{ url('/dashboard/edit-withdraw-charges') }}/{{ $item->charges_id }}"
                                                            class="fs-6 text-success"><i class="ti-pencil"></i></a>
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


    <script></script>
@endsection
