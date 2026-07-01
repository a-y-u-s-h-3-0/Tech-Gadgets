@include('header')

<div class="container main-container">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            background: #f9fafb;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .main-container {
            padding: 40px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Card Styling */
        .cards {
            background-color: white;
            padding: 20px;
            border-radius: 20px;
            box-shadow: var(--box-shadow);
            transition: all 0.3s ease-in-out;
            flex: 1 1 calc(25% - 20px);
            /* Makes it flexible and fits 4 per row */
            max-width: calc(25% - 20px);
            text-align: center;
            position: relative;
            color: black;
            min-width: 280px;
            /* Prevents cards from becoming too small */
        }

        .cards:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
            background-color: #007bff;
            color: white;

        }

        /* .card-header {
            background: linear-gradient(#0052D4, #2d07b9, #0052D4);
            padding: 1.5rem;
            text-align: center;
            color: white;
            width: 100%;
        } */

        .cards:hover h1,
        .cards:hover h3,
        .cards:hover small,
        .cards:hover .number {
            color: white;
        }

        /* Table Styling */
        .table {
            width: 100%;
            margin-bottom: 0;
            color: #333;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background: #f0f4f8;
            color: #2c4057;
            font-weight: 600;
            padding: 16px 15px;
            border: none;
            vertical-align: middle;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        .table tbody td {
            padding: 16px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(66, 153, 225, 0.05);
            transform: translateY(-1px);
        }

        /* Product Image */
        .product-img {
            height: 100px;
            width: auto;
            max-width: 130px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product-img:hover {
            transform: scale(1.1);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .btn {
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }

        .btn-primary {
            background-color: #4361ee;
            border-color: #4361ee;
            text-decoration: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #3a56d4;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }

        .btn-info {
            background-color: #3f80ea;
            border-color: #3f80ea;
            color: white;
            text-decoration: none;
        }

        .btn-info:hover {
            background-color: #2970e4;
            border-color: #2970e4;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(63, 128, 234, 0.3);
        }

        .btn-warning {
            background-color: #faad14;
            border-color: #faad14;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #e69c08;
            border-color: #e69c08;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(250, 173, 20, 0.3);
        }

        /* Header Actions */
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .left-actions,
        .right-actions {
            display: flex;
            gap: 12px;
        }

        /* DataTables Custom Styling */
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 20px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            width: 250px;
        }

        .dataTables_info {
            padding-top: 15px;
            font-size: 14px;
            color: #718096;
        }

        /* Pagination */
        .dataTables_paginate .paginate_button {
            border-radius: 6px !important;
            margin: 0 3px;
        }

        .dataTables_paginate .paginate_button.current {
            background: #4361ee !important;
            border-color: #4361ee !important;
            color: white !important;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .header-actions {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        @media (max-width: 768px) {
            .table thead {
                display: none;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 20px;
                border-bottom: 2px solid #e2e8f0;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
                border-radius: 8px;
                overflow: hidden;
            }

            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                border-bottom: 1px solid #edf2f7;
            }

            .table td:before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                font-weight: 600;
                text-align: left;
            }

            .product-img {
                margin-left: auto;
            }
        }
    </style>
    <div class="card">

        <div class="header-actions">
            <div class="left-actions">
                <div class="card-header">
                    <h3 style="text-align: center;">Product Management</h3>
                </div>
            </div>
            <div class="right-actions">
                <a class="btn btn-info" href="{{ route('product.create') }}">
                    <i class="fa-solid fa-plus"></i> Add Products
                </a>
                {{-- <a class="btn btn-warning">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a> --}}
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td data-label="No">{{ $loop->index + 1 }}</td>
                                <td data-label="Image"><img class="product-img" src="/images/{{ $item->p_pic1 }}"
                                        alt="{{ $item->p_name }}"></td>
                                <td data-label="Name">{{ $item->p_name }}</td>
                                <td data-label="Description">{{ Str::limit($item->p_desc, 100) }}</td>
                                <td data-label="Category">{{ $item->category }}</td>
                                <td data-label="Price">${{ number_format($item->p_price, 2) }}</td>
                                <td data-label="Discount">{{ $item->p_discount }}%</td>
                                <td data-label="Actions">
                                    <div class="action-buttons">
                                        <a href="{{ route('product.show', $item->id) }}" class="btn btn-primary">
                                            <i class="fa-solid fa-eye"></i> Details
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

@if (Session::get('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ Session::get('success') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif

<script>
    function confirmDelete(event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        if ($('#table1').length) {
            $('#table1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "language": {
                    "search": "<i class='fa fa-search'></i> _INPUT_",
                    "searchPlaceholder": "Search products..."
                }
            });
        }
    });
</script>

@include('footer')
