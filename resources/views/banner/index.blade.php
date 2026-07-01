@include('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<!-- Add DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">

<style>
    /* General Styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #f3e5f5, #e0f7fa);
        margin: 0;
        padding: 0;
        color: #333;
    }

    .section {
        padding: 20px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        margin-top: 50px;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        width: 95%;
        max-width: 1200px;
    }

    .card-header {
        background-color: #0052D4;
        color: white;
        text-align: center;
        padding: 15px;
        border-radius: 10px 10px 0 0;
        margin-bottom: 20px;
    }

    .card-header h3 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }

    .card-body {
        padding: 20px;
    }

    /* Add Button Styling */
    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        font-size: 15px;
        color: #fff;
        background-color: #0052D4;
        padding: 10px 20px;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        width: 120px;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    /* Button hover effects remain the same */
    .btn-add i {
        position: absolute;
        right: -30px;
        opacity: 0;
        transition: all 0.3s ease-in-out;
        font-size: 15px;
    }

    .btn-add span {
        transition: all 0.3s ease-in-out;
    }

    .btn-add:hover {
        color: white;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1);
        background-color: #0052D4;
    }

    .btn-add:hover span {
        transform: translateX(-10px);
    }

    .btn-add:hover i {
        right: 35px;
        opacity: 1;
    }

    /* Edit Button Styling */
    .btn-edit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        font-size: 15px;
        color: black;
        background-color: #ffb74d;
        padding: 10px 20px;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        width: 120px;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
    }

    /* Edit Button hover effects remain the same */
    .btn-edit i {
        position: absolute;
        right: -30px;
        opacity: 0;
        transition: all 0.3s ease-in-out;
        font-size: 15px;
    }

    .btn-edit span {
        transition: all 0.3s ease-in-out;
    }

    .btn-edit:hover {
        color: black;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1);
        background-color: #ffb74d;
    }

    .btn-edit:hover span {
        transform: translateX(-10px);
    }

    .btn-edit:hover i {
        right: 35px;
        opacity: 1;
    }

    /* Delete Button Styling */
    .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        font-size: 15px;
        color: black;
        background-color: #e53935;
        padding: 10px 20px;
        border-radius: 8px;
        overflow: hidden;
        transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        width: 120px;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        border: none;
        cursor: pointer;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
    }

    /* Delete Button hover effects remain the same */
    .btn-delete i {
        position: absolute;
        right: -30px;
        opacity: 0;
        transition: all 0.3s ease-in-out;
        font-size: 15px;
    }

    .btn-delete span {
        transition: all 0.3s ease-in-out;
    }

    .btn-delete:hover {
        color: black;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1);
        background-color: #c62828;
    }

    .btn-delete:hover span {
        transform: translateX(-10px);
    }

    .btn-delete:hover i {
        right: 30px;
        opacity: 1;
    }

    /* Aligning buttons inline */
    td .d-flex {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    /* Table Styles */
    .table-responsive {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        font-weight: bold;
        color: #555;
        background-color: #f8f9fa;
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .img-container {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;
        border: 2px solid #eee;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .img-container img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* DataTables custom styling */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.5em 1em;
        margin: 0 2px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: linear-gradient(#0052D4, #2d07b9, #0052D4);
        color: white !important;
        border: 1px solid #2d07b9;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #e9ecef;
        border: 1px solid #ddd;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px 10px;
    }
    
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
</style>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Banner Data</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('banner.create') }}" class="btn-add">
                    <span>Add</span>
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="bannersTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Banner Title</th>
                            <th>Banner Pic</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->banner_name }}</td>
                                <td>
                                    <img height="50" width="50" class="rounded-circle"
                                        src="/images/{{ $item->banner_pic }}" alt="">
                                </td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge bg-success">On Air</span>
                                    @else
                                        <span class="badge bg-danger">Off Air</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-end">
                                        <a href="{{ route('banner.edit', $item->_id) }}" class="btn-edit"
                                            style="margin-right:10px;"><span>Edit</span>
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form onsubmit="confirmDelete(event)" class="d-inline"
                                            action="{{ route('banner.destroy', $item->_id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-delete">
                                                <span>Delete</span>
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                
            </div>
            {{-- <div class="d-flex justify-content-center mt-3">
                {{ $data->links() }}
            </div>
             --}}
        </div>
        
    </div>
   
</section>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Add DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>


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

    // Initialize DataTable
    $(document).ready(function() {
        $('#bannersTable').DataTable({
            responsive: true,
            dom: '<"top"lf>rt<"bottom"ip>',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search banners...",
                lengthMenu: "Show _MENU_ entries per page",
                paginate: {
                    previous: '<i class="fa fa-angle-left"></i>',
                    next: '<i class="fa fa-angle-right"></i>'
                }
            },
            columnDefs: [
                { orderable: false, targets: [2, 4] } // Disable sorting on image and action columns
            ],
            order: [[0, 'asc']] // Default sorting by ID
        });
    });
</script>


@include('footer')