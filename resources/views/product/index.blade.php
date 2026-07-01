@include('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
        /* Enhanced responsiveness */
    }

    .card-header {
        /* background: linear-gradient(135deg, #0052D4, #4364F7, #6FB1FC);  */
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
            /* Green color */
        padding: 10px 20px;
        border-radius: 8px;
        /* Rounded corners */
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        width: 120px;
        text-align: center;
        text-decoration: none;
        /* Remove default link underline */
        font-weight: 600;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
    }

    /* Icon Styling */
    .btn-add i {
        position: absolute;
        right: -30px;
        /* Start outside */
        opacity: 0;
        transition: all 0.3s ease-in-out;
        font-size: 15px;
    }

    /* Text Styling */
    .btn-add span {
        transition: all 0.3s ease-in-out;
    }

    /* Hover Effects */
    .btn-add:hover {
        color: white;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1);
        background-color: #0052D4;
        /* Darker green for better feedback */
    }

    .btn-add:hover span {
        transform: translateX(-10px);
        /* Shift left to make space for the icon */
    }

    .btn-add:hover i {
        right: 35px;
        /* Slide icon into view */
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
        /* Orange color */
        padding: 10px 20px;
        border-radius: 8px;
        /* Rounded corners */
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        width: 120px;
        text-align: center;
        text-decoration: none;
        /* Remove default link underline */
        font-weight: 600;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
    }

    /* Edit Button Icon */
    .btn-edit i {
        position: absolute;
        right: -30px;
        /* Start outside */
        opacity: 0;
        transition: all 0.3s ease-in-out;
        font-size: 15px;
    }

    /* Edit Button Text */
    .btn-edit span {
        transition: all 0.3s ease-in-out;
    }

    /* Edit Button Hover Effects */
    .btn-edit:hover {
        color: black;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1);
        background-color: #ffb74d;
        /* Darker shade for hover effect */
    }

    .btn-edit:hover span {
        transform: translateX(-10px);
        /* Shift left to make space for the icon */
    }

    .btn-edit:hover i {
        right: 35px;
        /* Slide icon into view */
        opacity: 1;
    }

    .btn-delete {
        display: inline-flex;
        /* Use inline-flex for proper alignment */
        align-items: center;
        /* Center items vertically */
        justify-content: center;
        /* Center items horizontally */
        position: relative;
        font-size: 15px;
        color: black;
        /* Change text color for better contrast */
        background-color: #e53935;
        /* Red color */
        padding: 10px 20px;
        border-radius: 8px;
        /* Rounded corners */
        overflow: hidden;
        transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        /* Smooth transition */
        width: 120px;
        /* Fixed width for uniformity */
        text-align: center;
        text-decoration: none;
        /* Remove default button outline */
        font-weight: 600;
        border: none;
        /* Remove default border */
        cursor: pointer;
        /* Pointer cursor on hover */
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
    }

    /* Delete Button Icon */
    .btn-delete i {
        position: absolute;
        right: -30px;
        /* Start outside */
        opacity: 0;
        transition: all 0.3s ease-in-out;
        font-size: 15px;
    }

    /* Delete Button Text */
    .btn-delete span {
        transition: all 0.3s ease-in-out;
    }

    /* Delete Button Hover Effects */
    .btn-delete:hover {
        color: black;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1);
        background-color: #c62828;
        /* Darker red for hover effect */
    }

    .btn-delete:hover span {
        transform: translateX(-10px);
        /* Shift left to make space for the icon */
    }

    .btn-delete:hover i {
        right: 30px;
        /* Slide icon into view */
        opacity: 1;
    }

    /* Show Button Styling */
    .btn-show {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        font-size: 15px;
        color: black;
        background-color: #4CAF50;
        /* Green color */
        padding: 10px 20px;
        border-radius: 8px;
        /* Rounded corners */
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        width: 120px;
        text-align: center;
        text-decoration: none;
        /* Remove default link underline */
        font-weight: 600;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
    }

    /* Show Button Icon */
    .btn-show i {
        position: absolute;
        right: -30px;
        /* Start outside */
        opacity: 0;
        transition: all 0.3s ease-in-out;
        font-size: 15px;
    }

    /* Show Button Text */
    .btn-show span {
        transition: all 0.3s ease-in-out;
    }

    /* Show Button Hover Effects */
    .btn-show:hover {
        color: black;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        transform: scale(1.1);
        background-color: #388E3C;
        /* Darker green for hover effect */
    }

    .btn-show:hover span {
        transform: translateX(-10px);
        /* Shift left to make space for the icon */
    }

    .btn-show:hover i {
        right: 30px;
        /* Slide icon into view */
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

    /* Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        border: 1px solid #ced4da;
        color: #495057;
        margin: 0 5px;
        border-radius: 5px;
    }

    .pagination .page-item.active .page-link {
        background-color: #673ab7;
        border-color: #673ab7;
        color: white;
    }

    .pagination .page-item .page-link:hover {
        background-color: #e9ecef;
    }

    /*
    @media (max-width: 768px) {
        .card {
            width: 100%;
        }

        .btn-custom {
            width: auto;
            padding: 0.5rem 1rem;
            font-size: 14px;
        }

        .table th,
        .table td {
            padding: 8px;
            font-size: 14px;
        }
    } */
</style>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Products Data</h3>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">

                <a href="{{ route('product.create') }}" class="btn-add">
                    <span>Add</span>
                    <i class="fa-solid fa-plus"></i>
                </a>

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Warranty</th>

                                <th>Product Pic1</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->p_name }}</td>
                                    <td>{{ $item->p_price }}</td>
                                    <td>{{ $item->p_warranty }}</td>


                                    <td>
                                        <img height="50" width="50"
                                            class="rounded-circle border border-white shadow-sm"
                                            src="/images/{{ $item->p_pic1 }}" alt="Produuct Image">
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-end">

                                            

                                            <a href="{{ route('product.edit', $item->_id) }}" class="btn-edit"
                                                style="margin-right: 10px;">
                                                <span>Edit</span>
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form onsubmit="confirmDelete(event)" class="d-inline"
                                                action="{{ route('product.destroy', $item->_id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-delete"><span>Delete</span>
                                                    <i class="fa-solid fa-trash"></i></button>
                                            </form>

                                            <a href="{{ route('product.show', $item->_id) }}" class="btn-show" style="margin-right: 10px;">
                                                <span>Show</span>
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $data->links() }}
                </div>

            </div>
        </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                event.target.submit(); // Submit the form after confirmation
            }
        });
    }
</script>



<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

@include('footer')
