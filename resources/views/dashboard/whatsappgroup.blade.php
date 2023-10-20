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


                                    <div class="container my-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Whats App Group</h4>


                                            </div>
                                        </div>
                                    </div>

                                    @if (session()->has('status'))
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert">
                                                         {{ session()->get('status') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="QA_table mb_30">

                                        <table class="table lms_table_active " id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Group Link</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->link }}</td>
                                                        @if ($item->status == 1)
                                                            <td> <a class="status_btn bg-success">Active</a> </td>
                                                        @else
                                                            <td> <a class="status_btn bg-danger"></a>Unactive </td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ url('/dashboard/edit-whatsapp-group') }}/{{ $item->id }}"
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
