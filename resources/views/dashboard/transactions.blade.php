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
                                    <h4>All your Transaction</h4>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 my-3">
                                            <label for="from-date">Date From</label>
                                            <input id="from-date" class="form-control" type="date" name="from-date">
                                        </div>
                                        <div class="col-md-4 my-3">
                                            <label for="to-date">To From</label>
                                            <input id="to-date" class="form-control" type="date" name="to-date">
                                        </div>

                                        <div class="col-md-4 my-3">
                                            <label for="statussearch">Status</label>
                                            <select name="statussearch" id="statussearch" class="form-select">
                                                <option value="all">All</option>
                                                <option value="3">Pending</option>
                                                <option value="1">Accepted</option>
                                                <option value="2">Rejected</option>
                                            </select>

                                        </div>


                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <button id="all-data" class="btn btn-primary">All Data</button>
                                            <button id="filter-btn" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row my-3">
                                        <div class="col-md-4 offset-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="search" name="search"
                                                    placeholder="Searching.....">
                                                <button id="searchbtn" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="QA_table mb_30">

                                <div class="table-responsive">


                                    <table class="table  table-bordered " id="myTable">
                                        <thead>
                                            <tr>
                                                @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                    <th scope="col">Id</th>
                                                    <th scope="col">User Name</th>
                                                @endif
                                                <th scope="col">Type</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status of Transaction</th>
                                                <th scope="col">Date & time</th>

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

    <script>
        // When the document is ready
        $(document).ready(function() {
            // Get references to elements
            const filterButton = $("#filter-btn");
            const statusSearch = $('#statussearch');
            const loadingElement = $("#loading");
            const searchInput = $('#search');
            const searchButton = $('#searchbtn');
            const tbody = $("#tbody");
            const userRole = {{ session()->get('role') }}; // Retrieve user role from the session
            const route = "{{ route('transactions') }}"; // Set the AJAX route

            $("#all-data").on('click', function() {
                loadData();
            });

            $("#filter-btn").on('click', function() {
                const valueOfStatus = $("#statussearch").val();
                loadFilterResults();
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

                        data.data.forEach(item => {
                            let rowHtml = '<tr>';

                            // Add login and access buttons for specific roles
                            if (userRole === 3 || userRole === 4) {
                                rowHtml += `
                                    <td><a href="#" class="question_content">${item.ntransaction_id}</a></td>
                                    <td><a href="#" class="question_content">${item.user_name}</a></td>
                                `;
                            }

                            // Populate other columns with item data
                            if (item.type === 0) {
                                rowHtml += '<td>Deposit</td>';
                            } else if (item.type === 1) {
                                rowHtml += '<td>Withdraw</td>';
                            } else if (item.type === 2) {
                                rowHtml += '<td>Invest</td>';
                            } else if (item.type === 3) {
                                rowHtml += '<td>Profit</td>';
                            } else if (item.type === 4) {
                                rowHtml += '<td>Commission</td>';
                            } else if (item.type === 6) {
                                rowHtml += '<td>Capital Return</td>';
                            }

                            rowHtml += `<td>${item.amount} PKR</td>`;

                            if (item.tstatus === 0) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-primary">Pending</a></td>';
                            } else if (item.tstatus === 1) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-success">Accepted</a></td>';
                            } else if (item.tstatus === 2) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-danger">Rejected</a></td>';
                            }

                            rowHtml += `
                                <td>${item.tdate}</td>
                            `;

                            if (userRole === 4) {
                                rowHtml += `
                                    <td>
                                        <a href="{{ url('/') }}/dashboard/edit-transactions/${item.transaction_id}" class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                        <a href="{{ url('/') }}/dashboard/delete-transactions/${item.transaction_id}" class="fs-6 text-danger"><i class="ti-trash"></i></a>
                                    </td>
                                `;
                            }

                            rowHtml += '</tr>';

                            tbody.append(rowHtml); // Append row to table
                        });

                        if (data.data.length === 0) {
                            let noDataHtml = `
                                <tr>
                                    <td colspan="6" class="text-center py-4">No data available!</td>
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
                const searchInput = $('#search');
                const searchValue = searchInput.val(); // Get the search input value
                const userRole = {{ session()->get('role') }}; // Retrieve user role from the session
                const route = "{{ route('get-users') }}"; // Set the AJAX route
                loadingElement.show();
                $.ajax({
                    type: "GET",
                    url: "{{ route('search-transactions') }}",
                    data: {
                        search: searchValue // Pass the search input to the server
                    },
                    success: function(data) {
                        console.log(data);
                        // loadingElement.hide();
                        tbody.empty();

                        data.forEach(item => {
                            let rowHtml = '<tr>';

                            // Add login and access buttons for specific roles
                            if (userRole === 3 || userRole === 4) {
                                rowHtml += `
                                    <td><a href="#" class="question_content">${item.ntransaction_id}</a></td>
                                    <td><a href="#" class="question_content">${item.user_name}</a></td>
                                `;
                            }

                            // Populate other columns with item data
                            if (item.type === 0) {
                                rowHtml += '<td>Deposit</td>';
                            } else if (item.type === 1) {
                                rowHtml += '<td>Withdraw</td>';
                            } else if (item.type === 2) {
                                rowHtml += '<td>Invest</td>';
                            } else if (item.type === 3) {
                                rowHtml += '<td>Profit</td>';
                            } else if (item.type === 4) {
                                rowHtml += '<td>Commission</td>';
                            } else if (item.type === 6) {
                                rowHtml += '<td>Capital Return</td>';
                            }

                            rowHtml += `<td>${item.amount} PKR</td>`;

                            if (item.tstatus === 0) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-primary">Pending</a></td>';
                            } else if (item.tstatus === 1) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-success">Accepted</a></td>';
                            } else if (item.tstatus === 2) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-danger">Rejected</a></td>';
                            }

                            rowHtml += `
                                <td>${item.tdate}</td>
                            `;

                            if (userRole === 4) {
                                rowHtml += `
                                    <td>
                                        <a href="{{ url('/') }}/dashboard/edit-transactions/${item.transaction_id}" class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                        <a href="{{ url('/') }}/dashboard/delete-transactions/${item.transaction_id}" class="fs-6 text-danger"><i class="ti-trash"></i></a>
                                    </td>
                                `;
                            }

                            rowHtml += '</tr>';

                            tbody.append(rowHtml); // Append row to table
                        });

                        if (data.length === 0) {
                            let noDataHtml = `
                                <tr>
                                    <td colspan="6" class="text-center py-4">No data available!</td>
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


            // Filter Result

            window.loadFilterResults = function loadFilterResults() {
                const loadingElement = $("#loading");
                const tbody = $("#tbody");
                const fromDate = $("#from-date").val();
                const toDate = $("#to-date").val();
                const selectedStatus = $("#statussearch").val();
                const statusValue = statusSearch.val();
                const filter_btn = $("#filter-btn");
                const userRole = {{ session()->get('role') }};
                loadingElement.show();
                filter_btn.attr('disabled', 'disabled');
                filter_btn.html('loading');
                $.ajax({
                    type: "GET",
                    url: "{{ route('filter-transaction') }}",
                    data: {
                        search: selectedStatus,
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

                            // Add login and access buttons for specific roles
                            if (userRole === 3 || userRole === 4) {
                                rowHtml += `
                                    <td><a href="#" class="question_content">${item.ntransaction_id}</a></td>
                                    <td><a href="#" class="question_content">${item.user_name}</a></td>
                                `;
                            }

                            // Populate other columns with item data
                            if (item.type === 0) {
                                rowHtml += '<td>Deposit</td>';
                            } else if (item.type === 1) {
                                rowHtml += '<td>Withdraw</td>';
                            } else if (item.type === 2) {
                                rowHtml += '<td>Invest</td>';
                            } else if (item.type === 3) {
                                rowHtml += '<td>Profit</td>';
                            } else if (item.type === 4) {
                                rowHtml += '<td>Commission</td>';
                            } else if (item.type === 6) {
                                rowHtml += '<td>Capital Return</td>';
                            }

                            rowHtml += `<td>${item.amount} PKR</td>`;

                            if (item.tstatus === 0) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-primary">Pending</a></td>';
                            } else if (item.tstatus === 1) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-success">Accepted</a></td>';
                            } else if (item.tstatus === 2) {
                                rowHtml +=
                                    '<td><a href="#" class="status_btn bg-danger">Rejected</a></td>';
                            }

                            rowHtml += `
                                <td>${item.tdate}</td>
                            `;

                            if (userRole === 4) {
                                rowHtml += `
                                    <td>
                                        <a href="{{ url('/') }}/dashboard/edit-transactions/${item.transaction_id}" class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                        <a href="{{ url('/') }}/dashboard/delete-transactions/${item.transaction_id}" class="fs-6 text-danger"><i class="ti-trash"></i></a>
                                    </td>
                                `;
                            }

                            rowHtml += '</tr>';

                            tbody.append(rowHtml); // Append row to table
                        });

                        if (data.length === 0) {
                            let noDataHtml = `
                                <tr>
                                    <td colspan="6" class="text-center py-4">No data available!</td>
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
            $('#myTable').on('click', '.btn', function() {
                loadData(); // Reload data when a button is clicked
            });

            // Handle search input
            $('#searchbtn').on('click', function() {
                const searchValue = searchInput.val();
                console.log("object");

                if (searchValue === '') {
                    loadData();
                } else {
                    searchButton.prop('disabled', true);
                    searchButton.html('Loading...');
                    loadSearchResults();
                    setTimeout(function() {
                        searchButton.prop('disabled', false);
                        searchButton.html('Search');
                    }, 1000); // You can adjust the timeout as needed
                }

            });

        });
    </script>
@endsection
