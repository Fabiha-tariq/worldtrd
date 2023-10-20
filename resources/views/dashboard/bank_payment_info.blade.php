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
                            <div class="QA_section">

                                <div class="QA_table mb_30">
                                    <div class="table-responsive">

                                        <table class="table  ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Bank Logo</th>
                                                    <th scope="col">Bank Name</th>
                                                    <th scope="col">Account Number</th>
                                                    <th scope="col">Account Title</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    @if (session()->get('role') == 3)
                                                        <th scope="col">Action</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>

                                                        <td> <a href="#" class="question_content">
                                                                {{ $item->bank_id }}
                                                            </a></td>
                                                        <td>
                                                            <img src="{{url('/public/myimages')}}/{{$item->bank_img}}" width="60px" alt="">
                                                         </td>
                                                        <td> {{ $item->bank_name }} </td>
                                                        <td> {{ $item->account_number }} </td>
                                                        <td> {{ $item->account_title }} </td>
                                                        @if ($item->status == 1)
                                                            <td><a href="#" class="status_btn">Active</a></td>
                                                        @else
                                                            <td><a href="#" class="status_btn bg-danger">Inactive</a>
                                                            </td>
                                                        @endif
                                                        <td> {{ $item->date }} </td>
                                                        @if (session()->get('role') == 3)
                                                            <td>
                                                                <a href="{{ url('/dashboard/edit-bank-payment-info') }}/{{ $item->bank_id }}"
                                                                    class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                                        @if(session()->get('role') == 4)
                                                                <a onclick="myfun({{ $item->bank_id }})"
                                                                    style="cursor: pointer;"
                                                                    class="ms-2 fs-6 text-danger"><i
                                                                        class="ti-trash"></i></a>
                                                            @endif

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


    <script>
        function myfun(id) {

            var ans = confirm('Do you want to Delete ?');

            if (ans) {

                location.href = '{{ url('/') }}/dashboard/delete-bank-payment-info/' + id;
            }

        }
    </script>
@endsection
