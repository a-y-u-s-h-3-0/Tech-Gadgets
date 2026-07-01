@include('header')

<style>
    /* Base Styles */
    .section {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-color: #f8f9fa;
        padding: 2rem 1rem;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        padding: 0;
    }

    /* Card Styles */
    .card {
        width: 100%;
        max-width: 500px;
        margin: 0 auto 150px;
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background: #ffffff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .card-header {
        background-color: #0052D4;
        padding: 1.5rem;
        text-align: center;
        color: white;
    }

    .card-header h4 {
        margin: 0;
        font-weight: 600;
        font-size: 1.5rem;
    }

    .card-body {
        padding: 2rem;
    }

    /* Form Input Styles */
    .input-group {
        position: relative;
        margin-bottom: 1.75rem;
    }

    .input {
        width: 100%;
        padding: 1rem;
        font-size: 1rem;
        border: 1.5px solid #e0e0e0;
        border-radius: 10px;
        background-color: #fff;
        color: #333;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .input:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.15);
        outline: none;
    }

    .user-label {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 1.1rem;
        pointer-events: none;
        transition: all 0.2s ease-out;
        background-color: transparent;
        padding: 0.20rem 0.25rem;
    }

    .input:focus~.user-label,
    .input:not(:placeholder-shown)~.user-label {
        transform: translateY(-180%) scale(0.9);
        color: #007bff;
        font-weight: 600;
        background-color: #fff;
    }

    /* File Input Styles */
    .custom-file-input {
        position: absolute;
        opacity: 0;
        width: 0.1px;
        height: 0.1px;
        
    }

    .custom-label {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background-color: #0052D4;
        color: white;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        margin-bottom: 8px;
    }

    .text-danger {
        display: block;
        margin-top: 0.5rem;
        font-size: 0.9rem;
        color: #ff4757;
        font-weight: 900;
        padding-left: 1rem;
    }


    .custom-label:hover {
        background-color: #0052D4;
        transform: translateY(-2px);
    }

    .file-name {
        display: block;
        margin-top: 0.75rem;
        font-size: 0.875rem;
        color: #6c757d;
        text-align: center;
        word-break: break-word;
    }

    /* Button Styles */
    .btn-primary {
        width: 100%;
        padding: 1rem;
        font-size: 0.95rem;
        font-weight: 500;
        border: none;
        border-radius: 10px;
        background-color: #0052D4;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .btn-primary:hover {
        background-color: #0052D4;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }
</style>

<section class="section">
    <div class="container">
        <div class="card mx-auto shadow-lg border-0">
            <div class="card-header text-white text-center">
                <h4 class="mb-0">Edit Category</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('category.update', $category->_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 input-group">
                        <input type="text" name="cat_name" id="cat_name" class="input" placeholder=" " value="{{$category->cat_name}}">
                        <label for="cat_name" class="user-label">Category Name</label>
                        <span class="text-danger">@error('cat_name') {{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3 input-group">
                        <input type="file" name="cat_pic" id="cat_pic" class="custom-file-input" accept="image/*">
                        <label for="cat_pic" class="custom-label" id="file-label">📸 Choose Image</label>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <span class="text-danger">@error('cat_pic') {{ $message }} @enderror</span>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn-primary mt-4">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('cat_pic').addEventListener('change', function() {
        const fileName = document.getElementById('file-name');
        fileName.textContent = this.files.length > 0 ? this.files[0].name : "No file chosen";
    });
</script>

@include('footer')
