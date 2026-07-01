@include('header')
<style>
    /* General Styles */
    body {
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        background-color: #f8fafc;
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }

    /* Card Styling */
    .card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
        padding: 0;
        margin: 2rem auto;
        max-width: 900px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }

    .card-header {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 1.25rem;
        text-align: center;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Button Styling */
    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background-color: #2563eb;
        margin-bottom: 20px;
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s ease;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn-add:hover {
        background-color: #0069d9;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Table Styling */
    .table-responsive {
        overflow-x: auto;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
        font-size: 0.9375rem;
    }

    .table th,
    .table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    .table th {
        background-color:  #2563eb;
        color: white;
        font-weight: 500;
        position: sticky;
        top: 0;
    }

    .table tbody tr {
        transition: background-color 0.15s ease;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8fafc;
    }

    .table tbody tr:hover {
        background-color: #f1f5f9;
    }

    /* Pagination */
    .d-flex.justify-content-center {
        margin-top: 1.5rem;
    }

    .pagination {
        display: flex;
        gap: 0.5rem;
        list-style: none;
        padding: 0;
    }

    .pagination li a {
        padding: 0.5rem 0.875rem;
        background: #3b82f6;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .pagination li a:hover {
        background: #2563eb;
        transform: translateY(-1px);
    }

    .pagination li.active a {
        background: #1d4ed8;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
    }

    /* Edit Button */
    .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(to right, #f59e0b, #e67e22);
        color: #1e293b;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s ease;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn-edit:hover {
        background: linear-gradient(to right, #e67e22, #d35400);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Section Styling */
    .section {
        padding: 1.5rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card {
            margin: 1rem;
            border-radius: 8px;
        }
        
        .table th, 
        .table td {
            padding: 0.75rem 0.5rem;
        }
    }
</style>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Version Data</h3>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('version.create') }}" class="btn-add">
                    <span>Add</span>
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Version No</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->_id }}</td>
                                <td>{{ $item->v_no }}</td>
                                
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('version.edit', $item->_id) }}" class="btn-edit">
                                            <span>Edit</span>
                                            <i class="fas fa-edit"></i>
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

    @include('footer')