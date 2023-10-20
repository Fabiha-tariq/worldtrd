@extends('layouts.dashboard-layout')
@section('content')

<style>

::-webkit-scrollbar {
  width: 3px;
}

::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px rgb(182, 175, 175);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb {
  background: #FF5A00;
  border-radius: 3px;
}

::-webkit-scrollbar-thumb:hover {
  background: #b30000;
}

</style>


    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">

                            @if (session()->has('status'))
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div class="box_header m-0">
                                <!-- <div class="main-title">
                    <h3 class="m-0">Data table</h3>
                    </div> -->
                            </div>
                        </div>
                        <div class="white_card_body">
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

                            @if (session()->has('status1'))
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session()->get('status1') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <a href="{{url('/dashboard/add-plan')}}" class="btn btn-primary">Add Plan</a>
                            <br><br>

                            <div class="white_box_tittle list_header">
                                <h4>All plans</h4>

                            </div>
                            <div class="QA_section" >
                                <div class="QA_table mb_30" >
                                    <div class="table-responsive">
                                        <table class="table table-bordered " >
                                            <thead>
                                                <tr>
                                                    <th scope="col">Plan id</th>
                                                    <th scope="col">Plan title</th>
                                                    <th scope="col">Minimum Plan amount</th>
                                                    <th scope="col">Maximum Plan amount</th>
                                                    <th scope="col">Duration</th>
                                                    <th scope="col">Daily Profit (%)</th>
                                                    <th scope="col">Capital Return </th>
                                                    <th scope="col">Profile will return daily?</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td> <a href="#" class="question_content">
                                                                {{ $item->plan_id }} </a></td>
                                                        <td> {{ $item->plan_title }} </td>
                                                        <td>{{ $item->minimum_amount }} PKR</td>
                                                        <td>{{ $item->maximum_amount }} PKR</td>
                                                        <td>{{ $item->duration_number }} @if ($item->duration_type == 0)
                                                                <span>Day</span>
                                                            @elseif ($item->duration_type == 1)
                                                                <span>Week</span>
                                                            @elseif ($item->duration_type == 2)
                                                                <span>Month</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->daily_profit_percentage }}%</td>
                                                        <td>@if ($item->return_amount == 1)
                                                                 Yes
                                                                @else
                                                                No
                                                        @endif</td>
                                                        <td>
                                                            @if ($item->profit_daily == 0)
                                                                <span>No</span>
                                                            @else
                                                                <span>Yes</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->category_title }}</td>
                                                        {{-- where invest routes set  --}}

                                                        @if ($item->pstatus == 1)
                                                            <td><span class="status_btn bg-success">Active</span>
                                                            </td>
                                                        @else
                                                            <td><span class="status_btn bg-danger">Unactive</span>
                                                            </td>
                                                        @endif

                                                        <td>
                                                            <a href="{{ url('/dashboard/edit-plan') }}/{{ $item->plan_id }}"
                                                                class="fs-6 text-success"><i class="ti-pencil"></i></a>

                                                                {{-- <a href="{{ url('/dashboard/delete-plan') }}/{{ $item->plan_id }}"
                                                                class="fs-6 text-danger"><i class="ti-trash"></i></a> --}}
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
@endsection
