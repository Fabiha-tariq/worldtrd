@extends('layouts.dashboard-layout')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Edit plan category</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="card-body">
                                <form action="{{ url('/dashboard/update-plan-categories') }}/{{ $data->cat_id }}"
                                    method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Category title</label>
                                            <input type="text" class="form-control" placeholder="Enter Category title"
                                                name="title" value="{{ $data->category_title }}">
                                        </div>
                                        {{-- <div class=" col-md-6">
                                            <label class="form-label">Category image</label>
                                            <input type="file" class="form-control" placeholder="Category image"
                                                name="img">
                                            <br>
                                            <img src="{{ url('/') }}/public/planimg/{{ $data->category_img }}"
                                                width="70px" alt="">
                                            <input type="hidden" name="oldimg" value="{{ $data->category_img }}">
                                        </div> --}}
                                        <div class="col-md-6">
                                            <label class="form-label" for="inputState">Status</label>
                                            <select id="inputState" name="status" class="form-select">
                                                @if ($data->status == 1)
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Inactive</option>
                                                @else
                                                    <option value="1">Active</option>
                                                    <option value="0" selected>Inactive</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm">Update plan category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
