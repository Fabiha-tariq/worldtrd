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
                                    <h4 class="text-center">Team Details</h4>
                                </div>

                                <div class="container my-2">
                                    <div class="row">
                                        <div class="col-md-5 mt-3">

                                            @php

                                                $l1 = 0;
                                                $l2 = 0;
                                                $l3 = 0;
                                                $l4 = 0;

                                            @endphp

                                            {{-- {{print_r($count)}} --}}

                                            @if ($count)
                                                @foreach ($count as $user)
                                                    @if ($user->level == 1)
                                                        @php
                                                            $l1 = $l1 + 1;
                                                        @endphp
                                                    @elseif ($user->level == 2)
                                                        @php
                                                            $l2 = $l2 + 1;
                                                        @endphp
                                                    @elseif ($user->level == 3)
                                                        @php
                                                            $l3 = $l3 + 1;
                                                        @endphp
                                                    @elseif ($user->level == 4)
                                                        @php
                                                            $l4 = $l4 + 1;
                                                        @endphp
                                                    @endif

                                                    {{-- {{$user->level}} --}}
                                                @endforeach
                                            @endif



                                            {{-- {{print_r($count);}} --}}


                                            <table class="table table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th>Levels</th>
                                                        <th>T_Members</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> Level 1 </td>
                                                        <td>
                                                            {{ $l1 }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Level 2 </td>
                                                        <td>
                                                            {{ $l2 }}

                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> Level 3 </td>
                                                        <td>
                                                            {{ $l3 }}

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td> Level 4 </td>
                                                        <td>
                                                            {{ $l4 }}

                                                        </td>


                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>Total Team Members : </td>
                                                        <td> <b> @php

                                                            // $total = (($count[0]->ccc) ? $count[0]->ccc : 0 )  + (($count[1]->ccc)  ? $count[1]->ccc : 0 ) + (($count[2]->ccc) ? $count[2]->ccc : 0 ) + (($count[3]->ccc) ? $count[3]->ccc : 0);
                                                            $total = $l1 + $l2 + $l3 + $l4;

                                                        @endphp

                                                                {{ $total }}
                                                            </b> </td>
                                                    </tr>
                                                </tfoot>
                                            </table>


                                        </div>


                                        <div class="offset-md-1 col-md-6 mt-3">
                                            <div class="table-responsive">


                                                <table class="table table-bordered ">
                                                    <thead>
                                                        <tr>
                                                            <th>Level Commission</th>
                                                            <th>Commission Percentage</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($team as $item)
                                                            <tr>
                                                                <td>Level {{ $i }} </td>
                                                                <td class="text-center">{{ $item->comission_per }}%</td>
                                                            </tr>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach
                                                    </tbody>
                                            </div>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="container my-2 mt-5">
                                <div class="row">
                                    <div class="offset-md-4 col-md-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search" name="search"
                                                placeholder="Searching.....">
                                            <select name="investuser" id="investuser" class="form-select" id="">
                                                <option value="0">All</option>
                                                <option value="1">Invested </option>
                                                <option value="2">Not Invested </option>
                                            </select>
                                            <select name="level" id="level" class="form-select">
                                                <option value="0">All </option>
                                                <option value="1">Level 1</option>
                                                <option value="2">Level 2</option>
                                                <option value="3">Level 3</option>
                                                <option value="4">Level 4</option>
                                            </select>
                                        </div>
                                        {{-- <button id="searchbtn" class="btn btn-primary">Search</button> --}}
                                    </div>
                                </div>

                            </div>

                            <div class="QA_table mb_30">
                                <br /><br />

                                <div class="table-responsive">

                                    @php
                                        $ii = 1;
                                    @endphp

                                    <table class="table  table-bordered " id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Full name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Whats App</th>
                                                <th scope="col">Email or username</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Level</th>
                                                <th scope="col">Details </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($data)
                                                @foreach ($data as $user)

                                                @if ($user->user_id == 1 || $user->user_id == 2)

                                                @else
                                                    <tr>

                                                        <td>{{$ii++}}</td>
                                                        <td><a href="#" class="question_content">
                                                                {{ $user->user_name }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $user->user_phone }}</td>
                                                        <td>
                                                            @php
                                                                $phone = substr_replace($user->user_phone,"+92",0,1);
                                                            @endphp
                                                            <a style="background-color:#075e54 !important;padding:10px;color:white;border-radius:10px;" href="https://wa.me/{{$phone}}" target="_blank"><i class="fa-brands fa-whatsapp fa-3x" style="font-size: 16px;" ></i></a>

                                                        </td>
                                                        <td>{{ $user->user_email }}</td>

                                                        {{-- <td>${{ $user->iamount }}</td> --}}
                                                        <td class="investstatus" style="display:none;">{{ $user->deposit_user }}</td>
                                                        <td>
                                                            @if ($user->deposit_user == 1)
                                                                <a href="#" class="status_btn bg-success">Invested</a>
                                                            @else
                                                                <a href="#" class="status_btn bg-danger">Not
                                                                    Invested</a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $user->date }}</td>
                                                        <td class="mylevel">{{ $user->level }}</td>
                                                        <td>
                                                            <a class="btn btn-primary"
                                                                href="{{ url('/dashboard/team-member-detail') }}/{{ $user->user_id }}"
                                                                class="text-decoration-none text-dark"> <i
                                                                    class="fa-solid fa-circle-info"></i> </a>
                                                        </td>

                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif

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


            $("#level").on("change", function() {

                var value = $('#investuser').val().toLowerCase();

                $('#myTable tbody tr').hide();

                if (value == "0") {

                    $('#myTable tbody tr').show();

                } else {

                    $('#myTable tbody tr .investstatus:contains("' + value + '")').parent().show();
                }

                var value = $(this).val().toLowerCase();

                $('#myTable tbody tr').hide();

                if (value == "0") {

                    $('#myTable tbody tr').show();

                } else {

                    $('#myTable tbody tr .mylevel:contains("' + value + '")').parent().show();
                }
            });

            $("#investuser").on("change", function() {


                var value = $(this).val().toLowerCase();

                $('#myTable tbody tr').hide();

                if (value == "0") {

                    $('#myTable tbody tr').show();

                } else {

                    $('#myTable tbody tr .investstatus:contains("' + value + '")').parent().show();
                }


            });
        });
    </script>
@endsection
