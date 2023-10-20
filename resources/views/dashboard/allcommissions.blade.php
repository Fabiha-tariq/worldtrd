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
                                    <h4 class="text-white">All Commissions</h4>
                                </div>
                                <div class="QA_table mb_30">
                                    <div class="table-responsive">

                                        <table class="table table-bordered  ">
                                            <thead>
                                                <tr>
                                                    @if (session()->get('role') == 3 || session()->get('role') == 4)
                                                        <th scope="col">Id</th>
                                                    @endif
                                                    <th scope="col">From User</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
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
            const loadingElement = $("#loading");
            const tbody = $("#tbody");
            const userRole = {{ session()->get('role') }}; // Retrieve user role from the session
            const route = "{{ route('comission') }}"; // Set the AJAX route

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

                            // Populate table columns based on user role
                            if (userRole == 3 || userRole == 4) {
                                rowHtml +=
                                    `<td><a href="#" class="question_content text-white">${item.comissionid}</a></td>`;
                            }

                            // Add login and access buttons for specific roles
                                rowHtml += `
                                <td><a href="#" class="question_content text-white">${item.user_name}</a></td>
                                <td><a href="#" class="question_content text-white">${item.user_phone}</a></td>
                            `;

                            // Populate other columns with item data
                            rowHtml += `
                                <td>${item.amount} PKR</td>
                                <td>${item.status}</td>
                                <td>${item.date}</td>
                            `;

                            if (userRole === 4) {
                                rowHtml += `
                                <td>
                                    <a href="/dashboard/edit-transactions/${item.transaction_id}" class="fs-6 text-success"><i class="ti-pencil"></i></a>
                                    <a href="/dashboard/delete-transactions/${item.transaction_id}" class="fs-6 text-danger"><i class="ti-trash"></i></a>
                                </td>
                            `;
                            }

                            rowHtml += '</tr>';

                            tbody.append(rowHtml); // Append row to table
                        });


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

            // Initial load of data
            loadData();

            // Search functionality
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Handle button clicks inside the table
            $('#myTable').on('click', '.btn', function() {
                loadData(); // Reload data when a button is clicked
            });
        });
    </script>
@endsection
