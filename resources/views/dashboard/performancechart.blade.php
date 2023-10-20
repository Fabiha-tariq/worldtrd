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
                                    <h4 class="text-center">Performance Chart</h4>
                                    <div class="col-md-6 text-end">
                                        @if (session()->get('role') == 0)

                                        <p class=" text-dark">
                                           <span class="fw-bold text-capitalize"> {{session()->get('name')}}</span> Your Performance Chart
                                        </p>

                                        @else

                                        <form action="">
                                            <div class="input-group">

                                                <input type="text" class="form-control"
                                                name="search" value="{{$search}}" placeholder="Searching.....">
                                                <button type="submit"  class="btn btn-primary">Search</button>
                                            </div>
                                        </form>

                                        @endif

                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <div class="table-responsive">
                                    <table class="table table-bordered " id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Description</th>
                                                <th scope="col">Amount in PKR</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr >
                                                <td class="fw-bold">Total Deposit of Whole Downline</td>
                                                <td class="fw-bold">{{$dc ? : 0}} PKR</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Total Withdrawls of Whole Downline</td>
                                                <td class="fw-bold">{{$wc ? : 0}} PKR</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Total Members of Whole Downline</td>
                                                <td class="fw-bold">{{$uc ? : 0}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Total Invest Members of Whole Downline</td>
                                                <td class="fw-bold">{{$ic ? : 0}}</td>
                                            </tr>

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
        $(document).ready(function() {


            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

        });
    </script>

@endsection
