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
                                                <strong>OOPs!</strong> {{ session()->get('status1') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <a href="{{ url('/dashboard/add-plan-categories') }}" class="my-2 btn btn-primary">Add
                                Category</a>

                            <div class="QA_section">


                                <div class="white_box_tittle list_header">
                                    <h4>Plan category</h4>
                                    <div class="box_right d-flex lms_block">


                                    </div>
                                </div>
                                <div class="QA_table mb_30">
                                    <div class="table-responsive">
                                    <table class="table table-bordered  ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Categpory title</th>
                                                {{-- <th scope="col">Categpory img</th> --}}
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data as $item)
                                                <tr>
                                                    <td> <a href="#" class="question_content"> {{ $item->cat_id }}
                                                        </a></td>
                                                    <td>{{ $item->category_title }} </td>
                                                    {{-- <td><img src="{{ url('/public/planimg') }}/{{ $item->category_img }}"
                                                            width="60"> </td> --}}
                                                    @if ($item->status == 1)
                                                        <td><a class="status_btn bg-success">active</a></td>
                                                    @else
                                                        <td><a class="status_btn bg-danger">Inactive</a></td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ url('/dashboard/edit-plan-categories') }}/{{ $item->cat_id }}"
                                                            class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                                        &nbsp;&nbsp; <a style="cursor: pointer;"
                                                            onclick="myfun({{ $item->cat_id }})" class="fs-6 text-danger"><i
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
        function myfun(id) {

            var ans = confirm('Do you want to Delete ?');

            if (ans) {
                location.href = '{{ url('/') }}/dashboard/delete-plan-categories/' + id;
            }
        }
    </script>
@endsection
