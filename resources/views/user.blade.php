@include('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<style>
    /* Main Section Styling */
    .section {
        padding: 2rem 1.5rem;
        background-color: #f8f9fa;
    }

    /* Card Styling */
    .card {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border-radius: 8px;
        border: none;
        margin-bottom: 2rem;
        background-color: #fff;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
    }

    .card-header {
        background-color: #0052D4;
        color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.5rem 1.5rem 1rem;
    }

    .card-header h4 {
        margin: 0;
        font-weight: 600;
        color: whitesmoke;
        font-size: 1.25rem;
        display: flex;
        align-items: center;
    }

    .card-header h4::before {
        content: "";
        display: inline-block;
        width: 4px;
        height: 20px;
        background: linear-gradient(45deg, #5e72e4, #825ee4);
        margin-right: 12px;
        border-radius: 4px;
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Table Styling */
    #table1 {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    #table1 thead th {
        background-color: #f8f9fa;
        color: black;
        font-weight: 600;
        border-top: none;
        padding: 1rem;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        border-bottom: 2px solid rgba(0, 0, 0, 0.05);
    }

    #table1 tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-top: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        color: #67748e;
        font-size: 0.875rem;
        text-align: center;
    }

    #table1 tbody tr:hover {
        background-color: rgba(94, 114, 228, 0.04);
    }

    /* Button Styling */
    .btn {
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.15s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        font-size: 0.875rem;
    }

    .btn-success {
        background-color: #2dce89;
        border-color: #2dce89;
        text-decoration: none;
        color: whitesmoke;

    }

    .btn-success:hover {
        background-color: #24b47e;
        border-color: #24b47e;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(45, 206, 137, 0.25);
        color: whitesmoke;
    }

    .btn-danger {
        background-color: #f5365c;
        border-color: #f5365c;
        text-decoration: none;
        color: whitesmoke;

    }

    .btn-danger:hover {
        background-color: #ea0d40;
        border-color: #ea0d40;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(245, 54, 92, 0.25);
        color: whitesmoke;

    }

    /* Pagination Styling */
    .pagination {
        margin-top: 1.5rem;
        justify-content: center;
    }

    .pagination .page-item .page-link {
        padding: 0.5rem 0.75rem;
        color: #5e72e4;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .pagination .page-item.active .page-link {
        background-color: #5e72e4;
        border-color: #5e72e4;
        color: #fff;
        box-shadow: 0 2px 5px rgba(94, 114, 228, 0.3);
    }

    .pagination .page-item .page-link:hover {
        background-color: #f8f9fa;
        border-color: #dee2e6;
        color: #5e72e4;
    }

    /* DataTables Styling */
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1rem;
        text-align: right;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #dee2e6;
        border-radius: 6px;
        padding: 0.5rem 1rem;
        margin-left: 0.5rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #5e72e4;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(94, 114, 228, 0.25);
    }

    .dataTables_wrapper .dataTables_info {
        padding-top: 1rem;
        color: #67748e;
        font-size: 0.875rem;
    }

    /* SweetAlert2 Customization */
    .swal2-popup {
        border-radius: 8px;
        padding: 1.5rem;
    }

    .swal2-title {
        font-size: 1.5rem;
        color: #344767;
    }

    .swal2-icon {
        margin: 1rem auto;
    }

    .swal2-styled.swal2-confirm {
        background-color: #5e72e4;
        border-radius: 6px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
    }

    .swal2-styled.swal2-cancel {
        background-color: #f5365c;
        border-radius: 6px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-body {
            padding: 1rem;
            overflow-x: auto;
        }

        #table1 thead th,
        #table1 tbody td {
            padding: 0.75rem;
        }

        .btn {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }
    }
</style>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Users Data</h4>
        </div>
        <div class="card-body">

            <table class="table table-striped" id="table1">

                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobileno</th>
                        <th scope="col">Status</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="">
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->mobileno }}</td>
                            <td>
                                @if ($item->status)
                                    <span class="span-block">
                                        <a href="/block/{{ $item->_id }}" class="btn btn-success">Block</a>
                                    </span>
                                @else
                                    <span class="span-unblock">
                                        <a href="/block/{{ $item->_id }}" class="btn btn-danger">Unblock</a>
                                    </span>
                                @endif
                            </td>


                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{ $data->links() }}
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('footer')
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
                event.target.submit(); // Submit the form after confirmation
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        if ($('#table1').length) {
            $('#table1').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "success": true,
                "autoWidth": false
            });
        }
    });
</script>
