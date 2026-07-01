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

    /* Form Input Styles - Updated to fix overlapping */
    .input-group {
        position: relative;
        margin-bottom: 2.5rem;
        /* Increased margin to prevent overlap */
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
        z-index: 1;
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
        font-size: 1rem;
        pointer-events: none;
        transition: all 0.2s ease-out;
        background-color: transparent;
        padding: 0 0.25rem;
        z-index: 2;
    }

    .input:focus~.user-label,
    .input:not(:placeholder-shown)~.user-label {
        transform: translateY(-190%) scale(0.85);
        color: #007bff;
        font-weight: 600;
        background-color: #fff;
        padding: 0 0.5rem;
    }

    /* Special styles for textarea to prevent overlap */
    .textarea-group {
        margin-bottom: 3rem;
        /* Extra margin for textarea */
    }

    .textarea-group .user-label {
        top: 1.5rem;
        /* Adjusted position for textarea label */
        transform: none;
    }

    .textarea-group .input:focus~.user-label,
    .textarea-group .input:not(:placeholder-shown)~.user-label {
        transform: translateY(-120%) scale(0.85);
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
        margin-top: 1.5rem;
        /* Increased margin */
    }

    .btn-primary:hover {
        background-color: #0052D4;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    /* Error Message Styles */
    .text-danger {
        display: block;
        position: absolute;
        bottom: -1.5rem;
        left: 0;
        font-size: 0.85rem;
        color: #ff4757;
        font-weight: 500;
        padding-left: 0.5rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 576px) {
        .card {
            border-radius: 10px;
        }

        .card-header {
            padding: 1.25rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .input-group {
            margin-bottom: 2.2rem;
        }

        .textarea-group {
            margin-bottom: 2.5rem;
        }
    }
</style>


<section class="section">
    <div class="container">
        <div class="card mx-auto shadow-lg border-0">
            <div class="card-header text-white text-center">
                <h4 class="mb-0">Edit Blog</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('blog.update', $blog->_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="input-group">
                        <input type="text" name="b_title" id="b_title" class="input" placeholder=""
                            value="{{ $blog->b_title }}">
                        <label for="b_title" class="user-label">Blog Title</label>
                        <span class="text-danger">
                            @error('b_title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input-group">
                        <input type="text" name="b_desc" id="b_desc" class="input" placeholder=""
                            value="{{ $blog->b_desc }}">
                        <label for="b_desc" class="user-label">Blog Description</label>
                        <span class="text-danger">
                            @error('b_desc')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="input-group">
                        <input type="date" name="b_date" id="b_date" class="input" placeholder=""
                            value="{{ $blog->b_date }}">
                        <label for="b_date" class="user-label">Blog Date</label>
                        <span class="text-danger">
                            @error('b_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="input-group">
                        <input type="time" name="b_time" id="b_time" class="input" placeholder=""
                            value="{{ $blog->b_time }}">
                        <label for="b_time" class="user-label">Blog Time</label>
                        <span class="text-danger">
                            @error('b_time')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="input-group">
                        <input type="file" name="b_pic" id="b_pic" class="custom-file-input" accept="image/*">
                        <label for="b_pic" class="custom-label" id="file-label">📸 Choose Image</label>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <span class="text-danger">
                            @error('b_pic')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn-primary mt-4">Update Blog</button>
                    </div>
                </form>

            </div>
        </div>
</section>


<script>
    document.getElementById('b_pic').addEventListener('change', function() {
        const fileName = document.getElementById('file-name');
        fileName.textContent = this.files.length > 0 ? this.files[0].name : "No file chosen";
    });
</script>


@include('footer')
