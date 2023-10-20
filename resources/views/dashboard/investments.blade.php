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
                                                <h4>All Investments</h4>

                                            </div>
                                            @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                <div class=" col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="search"
                                                            name="search" placeholder="Searching.....">
                                                        <button id="searchbtn" class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="QA_table mb_30">
                                        <div class="table-responsive">

                                            <table class="table table-bordered " id="myTable">
                                                <thead>
                                                    <tr>
                                                        {{-- @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                        <th scope="col">Invest id</th>
                                                    @endif --}}

                                                        @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                            {{-- <th scope="col">user Name</th> --}}
                                                            <th scope="col">user Email</th>
                                                        @endif
                                                        <th scope="col">Plan Name</th>
                                                        <th scope="col">Interest</th>
                                                        <th scope="col">Invest Amount</th>
                                                        <th scope="col">Investment Date</th>
                                                        <th scope="col">Expire Date & time</th>
                                                        <th scope="col">Status</th>
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
                const loadingElement = $("#loading");
                const searchInput = $('#search');
                const searchButton = $('#searchbtn');
                const tbody = $("#tbody");
                const userRole = {{ session()->get('role') }}; // Retrieve user role from the session
                const route = "{{ route('investments') }}"; // Set the AJAX route

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


                            data.data.forEach(user => {
                                let rowHtml = '<tr>';


                                // Add login and access buttons for specific roles
                                if (userRole == 3 || userRole == 4) {
                                    rowHtml += `
                                        <td>${user.user_email}</td>
                                    `;
                                }

                                // Populate other columns with user data
                                rowHtml += `
                                    <td>${user.plan_title}</td>
                                    <td>${user.daily_profit_percentage}%</td>
                                    <td>${user.amount} PKR</td>
                                    <td><a class="status_btn bg-success">${user.idate}</a></td>
                                    <td><a class="status_btn bg-danger">${user.end_date}</a></td>
                                `;

                                if (user.istatus == 1) {
                                    rowHtml +=
                                        '<td><a href="#" class="status_btn bg-success">Running</a></td>';
                                } else {
                                    rowHtml +=
                                        '<td><a href="#" class="status_btn bg-danger">Completed</a></td>';
                                }

                                tbody.append(rowHtml); // Append row to table
                            });

                            if (data.data.length === 0) {
                                let noDataHtml = `
                                <tr>
                                    <td colspan="7" class="text-center py-4">No data available!</td>
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
                        url: "{{ route('search-investments') }}",
                        data: {
                            search: searchValue // Pass the search input to the server
                        },
                        success: function(data) {
                            console.log(data);
                            loadingElement.hide();
                            tbody.empty();

                            data.forEach(user => {
                                let rowHtml = '<tr>';


                                // Add login and access buttons for specific roles
                                if (userRole == 3 || userRole == 4) {
                                    rowHtml += `
                                        <td>${user.user_email}</td>
                                    `;
                                }

                                // Populate other columns with user data
                                rowHtml += `
                                    <td>${user.plan_title}</td>
                                    <td>${user.daily_profit_percentage}%</td>
                                    <td>${user.amount} PKR</td>
                                    <td><a class="status_btn bg-success">${user.idate}</a></td>
                                    <td><a class="status_btn bg-danger">${user.end_date}</a></td>
                                `;

                                if (user.istatus == 1) {
                                    rowHtml +=
                                        '<td><a href="#" class="status_btn bg-success">Running</a></td>';
                                } else {
                                    rowHtml +=
                                        '<td><a href="#" class="status_btn bg-danger">Completed</a></td>';
                                }

                                tbody.append(rowHtml); // Append row to table
                            });

                            if (data.length === 0) {
                                let noDataHtml = `
                                <tr>
                                    <td colspan="7" class="text-center py-4">No data available!</td>
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

                // // Handle search input
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
