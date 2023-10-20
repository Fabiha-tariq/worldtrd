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
                            <div class="box_header m-0">
                                <!-- <div class="main-title">
                                                                                                                                                                <h3 class="m-0">Data table</h3>
                                                                                                                                                                </div> -->
                            </div>
                        </div>
                        <div class="container">

                            <div class="row">
                                @if (session()->has('status1'))
                                    <div class="col-md-6">
                                        <div class="alert alert-danger alert-dismissible show" role="alert">
                                            <strong>{{ session()->get('status1') }} </strong>
                                            <button type="button" class="btn-close ms-auto  " data-bs-dismiss="alert"
                                                aria-label="Close">X</button>
                                        </div>
                                    </div>
                                @endif

                                @if (session()->has('status'))
                                    <div class="col-md-6">
                                        <div class="alert alert-success alert-dismissible show" role="alert">
                                            <strong>{{ session()->get('status') }} </strong>
                                            <button type="button" class="btn-close ms-auto  " data-bs-dismiss="alert"
                                                aria-label="Close">X</button>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>


                        <div class="white_card_body">
                            <div class="QA_section">
                                {{-- <div class="main-title">
                                    <!--<h3 class="text-end mx-5" style="color:red;">Withdrawl Charges <b>-->
                                    <!--        {{ $charges[0]->charges }} % </b></h3>-->
                                </div> --}}
                                <div class="white_box_tittle list_header">
                                    <h4 class="text-center"> Your All With draws </h4>

                                </div>
                                {{-- <div class="container my-3">
                                    <div class="row">
                                        <div class="col-md-4 my-3">
                                            <label for="from-date">Date From</label>
                                            <input id="from-date" class="form-control" type="date" name="from-date">
                                        </div>
                                        <div class="col-md-4 my-3">
                                            <label for="to-date">Date To</label>
                                            <input id="to-date" class="form-control" type="date" name="to-date">
                                        </div>
--}}
                                        {{-- <div class="col-md-4 my-3">
                                            <label for="statussearch">Status</label>
                                            <select name="statussearch" id="statussearch" class="form-select">
                                                <option value="all">All</option>
                                                <option value="3">Pending</option>
                                                <option value="1">Accepted</option>
                                                <option value="2">Rejected</option>
                                            </select>

                                        </div> --}}
                                        {{--
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <button id="all-data" class="btn btn-primary">All Data</button>
                                            <button id="filter-btn" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="QA_table mb_30">
                                    <div class="table-responsive">

                                        <table class="table  table-bordered " id="myTable">
                                            <thead>
                                                <tr>
                                                    @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                        <th scope="col">User Name</th>
                                                        <th scope="col">User Email</th>
                                                    @endif
                                                    <th scope="col">Bank Name</th>
                                                    <th scope="col">Amount &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                    <!--<th scope="col" style="width: 50px;">Amount in $</th>-->
                                                    <th scope="col">Acount Number</th>
                                                    <th scope="col">Acount title</th>
                                                    @if (session()->get('role') == 3)
                                                        <th scope="col">Button</th>
                                                    @endif
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Comment </th>
                                                    <th scope="col">Request Date & time</th>
                                                    @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                        <th scope="col">Action</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                                <!-- Loading message or spinner -->
                                                <tr id="loading">
                                                    <td colspan="10" style="text-align: center;">
                                                        <img style="width: 60px;height: 60px;" class="img-fluid"
                                                            src="https://i.gifer.com/ZKZg.gif" alt="">
                                                    </td>
                                                </tr>
                                                <!-- Data rows will be added dynamically -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <!-- Pagination links will be dynamically inserted here by JavaScript -->
                                            </ul>
                                        </nav>
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

    @if (session()->get('role') == 3)
        <input type="text" name="" id="mygreatinput">
    @endif



    <script>
        // When the document is ready
        $(document).ready(function() {
            // Get references to elements
            const filterButton = $("#filter-btn");
            const statusSearch = $('#statussearch');
            const loadingElement = $("#loading");
            const tbody = $("#tbody");
            const userRole = {{ session()->get('role') }}; // Retrieve user role from the session
            const route = "{{ route('withdraws') }}"; // Set the AJAX route

            $("#all-data").on('click', function() {
                loadData();
            });

            $("#filter-btn").on('click', function() {
                loadSearchResults();
            });


            // Define the loadData function within the scope of the document ready callback
            window.loadData = function loadData(page = 1) {
                // Show loading indicator
                loadingElement.show();

                // Update the URL without reloading the page
                const newUrl = new URL(window.location.href);
                newUrl.searchParams.set('page', page);
                window.history.replaceState({}, '', newUrl);

                // Make an AJAX request to fetch data
                $.ajax({
                    type: "GET",
                    url: route + "?page=" + page,
                    success: function(data) {
                        loadingElement.hide(); // Hide loading indicator
                        tbody.empty(); // Clear existing table data

                        // Loop through retrieved users and create table rows
                        data.data.forEach(item => {
                            let rowHtml = '<tr>';

                            if (userRole === 3 || userRole === 4) {
                                rowHtml += `<td>${item.user_name}</td>`;
                                rowHtml += `<td>${item.user_email}</td>`;
                            }

                            rowHtml += `
                            <td>${item.bank_name ? item.bank_name : 'USDT'}</td>
                            <td>${item.final_amount} PKR</td>
                            <td>${item.account_number}</td>
                            <td>
                                <p>${item.account_title ? item.account_title : 'No Title'}</p>
                            </td>
                           `;

                            if (userRole === 3) {
                                rowHtml += `
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="mycopydetails('${item.account_title}','${item.account_number}','${item.bank_name}','${item.final_amount}')">Copy</button>
                                    </td>
                                `;
                            }

                            rowHtml += `
                                <td class="mystatus d-none">${item.tstatus === 0 ? '3' : item.tstatus}</td>
                                <td>
                                    <span class="bg-${item.tstatus === 0 ? 'warning' : item.tstatus === 1 ? 'success' : 'danger'} status_btn">
                                        ${item.tstatus === 0 ? 'Pending' : item.tstatus === 1 ? 'Accepted' : 'Rejected'}
                                    </span>
                                </td>
                                <td>${item.comment ? item.comment : ''}</td>
                                <td>${item.tdate}</td>
                            `;

                            if (userRole === 3) {
                                rowHtml += `
                                    <td>
                                        <a href="{{ url('/') }}/dashboard/edit-withdraws/${item.withdraw_id}" class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                    </td>
                                `;
                            }

                            if (userRole === 4) {
                                rowHtml += `
                                <td>
                                    <a href="{{ url('/') }}/dashboard/edit-withdraws/${item.withdraw_id}" class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                    <a href="{{ url('/') }}/dashboard/delete-withdraws/${item.withdraw_id}" class="fs-6 text-danger"><i class="ti-trash"></i></a>
                                    <button class="bnt btn-sm btn-primary" onclick="copy(${item.withdraw_id})">copy</button>
                                    <input id="data${item.withdraw_id}" type="hidden" value="${(item.final_amount * sessionDollarrate) + item.account_number + (item.account_title || '')}">
                                </td>
                            `;
                            }

                            rowHtml += '</tr>';

                            tbody.append(rowHtml); // Append row to table
                        });
                        if (data.data.length === 0) {
                            let noDataHtml = `
                                <tr>
                                    <td colspan="9" class="text-center py-4">No data available!</td>
                                </tr>`;
                            tbody.append(noDataHtml);
                        }


                        // Generate and update pagination buttons
                        let paginationHtml = '';
                        if (data.currentPage > 1) {
                            paginationHtml += `<li class="page-item">
                                <button class="page-link btn-link bg-dark" onclick="loadData(${data.currentPage - 1})" aria-label="Previous">
                                    <span aria-hidden="true">Previous</span>
                                </button>
                            </li>`;
                        } else {
                            paginationHtml += `<li class="page-item disabled">
                                <span class="page-link bg-dark">Previous</span>
                            </li>`;
                        }

                        for (let i = 1; i <= Math.ceil(data.totalUsers / data.perPage); i++) {
                            paginationHtml += `<li class="page-item ${i === data.currentPage ? 'active' : ''}">
                                <button class="page-link btn-link bg-dark" onclick="loadData(${i})">${i}</button>
                            </li>`;
                        }

                        if (data.currentPage < Math.ceil(data.totalUsers / data.perPage)) {
                            paginationHtml += `<li class="page-item">
                                <button class="page-link btn-link bg-dark" onclick="loadData(${data.currentPage + 1})" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                </button>
                            </li>`;
                        } else {
                            paginationHtml += `<li class="page-item disabled">
                                <span class="page-link bg-dark">Next</span>
                            </li>`;
                        }

                        $('.pagination').html(paginationHtml); // Update pagination container
                    },
                    error: function(err) {
                        loadingElement.hide(); // Hide loading indicator
                        console.log(err.responseText); // Log errors
                    }
                });
            }


            // SEARCH
            window.loadSearchResults = function loadSearchResults() {
                const loadingElement = $("#loading");
                const tbody = $("#tbody");
                const selectedStatus = $("#statussearch").val();
                const fromDate = $("#from-date").val();
                const toDate = $("#to-date").val();
                const statusValue = statusSearch.val();
                const filter_btn = $("#filter-btn");
                const userRole = {{ session()->get('role') }}; // Retrieve user role from the session

                loadingElement.show();
                filter_btn.attr('disabled', 'disabled');
                filter_btn.html('loading');

                $.ajax({
                    type: "GET",
                    url: "{{ route('search-withdraws') }}",
                    data: {
                        status: selectedStatus, // Pass the selected status value
                        fromDate: fromDate,
                        toDate: toDate,
                    },
                    success: function(data) {
                        console.log(data);
                        loadingElement.hide();
                        filter_btn.removeAttr('disabled');
                        filter_btn.html("Filter");

                        tbody.empty();

                        data.forEach(item => {
                            let rowHtml = '<tr>';

                            if (userRole === 3 || userRole === 4) {
                                rowHtml += `<td>${item.user_name}</td>`;
                            }

                            rowHtml += `
                            <td>${item.bank_name ? item.bank_name : 'USDT'}</td>
                            <td>${item.final_amount} PKR</td>
                            <td>${item.account_number}</td>
                            <td>
                                <p>${item.account_title ? item.account_title : 'No Title'}</p>
                            </td>
                           `;

                            if (userRole === 3) {
                                rowHtml += `
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="mycopydetails('${item.account_title}','${item.account_number}','${item.bank_name}','${item.final_amount}')">Copy</button>
                                    </td>
                                `;
                            }

                            rowHtml += `
                                <td class="mystatus d-none">${item.tstatus === 0 ? '3' : item.tstatus}</td>
                                <td>
                                    <span class="bg-${item.tstatus === 0 ? 'warning' : item.tstatus === 1 ? 'success' : 'danger'} status_btn">
                                        ${item.tstatus === 0 ? 'Pending' : item.tstatus === 1 ? 'Accepted' : 'Rejected'}
                                    </span>
                                </td>
                                <td>${item.tdate}</td>
                            `;

                            if (userRole === 3) {
                                rowHtml += `
                                    <td>
                                        <a href="{{ url('/') }}/dashboard/edit-withdraws/${item.withdraw_id}" class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                    </td>
                                `;
                            }

                            if (userRole === 4) {
                                rowHtml += `
                                <td>
                                    <a href="{{ url('/') }}/dashboard/edit-withdraws/${item.withdraw_id}" class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                    <a href="{{ url('/') }}/dashboard/delete-withdraws/${item.withdraw_id}" class="fs-6 text-danger"><i class="ti-trash"></i></a>
                                    <button class="bnt btn-sm btn-primary" onclick="copy(${item.withdraw_id})">copy</button>
                                    <input id="data${item.withdraw_id}" type="hidden" value="${(item.final_amount * sessionDollarrate) + item.account_number + (item.account_title || '')}">
                                </td>
                            `;
                            }

                            rowHtml += '</tr>';

                            tbody.append(rowHtml); // Append row to table
                        });
                        if (data.length === 0) {
                            let noDataHtml = `
                                <tr>
                                    <td colspan="9" class="text-center py-4">No data available!</td>
                                </tr>`;
                            tbody.append(noDataHtml);
                        }

                        loadingElement.hide();
                    },
                    error: function(err) {
                        console.log(err.responseText);
                        loadingElement.hide();
                    }
                });
            }

            // Initial load of data
            loadData();

            // Handle button clicks inside the table
            // $('#myTable').on('click', '.btn', function() {
            //     loadData(); // Reload data when a button is clicked
            // });
        });
    </script>

    <script>
        function mycopydetails(a, b, c, d) {

            document.getElementById("mygreatinput").value = `
        ${a}
        ${b}
        ${c}
        ${d}
        `;

            var copyText = document.getElementById("mygreatinput");

            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            navigator.clipboard.writeText(copyText.value);

            alert("Copied the text: " + copyText.value);

            event.preventDefault();

        }
    </script>
@endsection
