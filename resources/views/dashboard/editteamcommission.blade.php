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
                                    <h4>Edit Team Commission</h4>
                                </div>
                                <div class="QA_table mb_30">

                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                
                                                <form action="{{url('/dashboard/update-teamcomission')}}/{{$data->comissionid}}" method="POST">
                                                    @csrf
                                                    <label for="">Commision Percentage (%)</label>
                                                    <input type="text" name="percentage" value="{{$data->comission_per}}" placeholder="Enter Commistion" required class="form-control">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>

                                            </div>
                                        </div>
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
