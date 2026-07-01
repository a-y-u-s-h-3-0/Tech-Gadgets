@include('header')

<section class="section" style="background: linear-gradient(to right, #ece9e6, #ffffff); min-height: 100vh; padding: 20px;">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-link text-black text-center">
            <h4 class="mb-0">Order Data</h4>
        </div>
        <div class="card-body">

            {{-- <a href="{{route('category.create')}}" class="btn btn-primary mb-3">+ Add Category</a> --}}
            <div class="table-responsive table-secondary">
                <table class="table table-hover table-striped text-center" id="table1">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Order No</th>
                            <th scope="col">USER_ID</th>
                            <th scope="col">PRODUCT_ID</th>
                            <th scope="col">AMOUNT</th>
                            <th scope="col">QTY</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">COUPON</th>
                            <th scope="col">DATE</th>
                            <th scope="col">TIME</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">PINCODE</th>
                            <th scope="col">ACTION</th>



                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                               
                                <td>
                                    <a href="" class="btn btn-warning btn-md">Edit</a>
                                    <form onsubmit="confirmDelete(event)" class="d-inline"action=""  method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{$data->links()}}
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (Session::get('success'))
<script>
Swal.fire({
    icon: "success",
    title: "{{Session::get('success')}}",
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
