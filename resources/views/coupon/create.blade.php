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
        margin-bottom: 8px;
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
        height: 10.1px;
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
        /* incresae the size  */
        padding: 1rem;
        /* incresae the size  */
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
        background: linear-gradient(#0052D4, #2d07b9, #0052D4);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    /* Error Message Styles */
    
    .status-container {
        display: flex;
        align-items: center;
        justify-content:space-between;
        gap: 15px;
        margin-top: 1.5rem;
        padding: 1rem;
        background-color: #f9fafb;
        border-radius: 12px;
    }

    .status-text {
        font-size: 1.1rem;
        color: #333;
        font-weight: 600;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 30px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }
    .text-danger {
        display: block;
        margin-top: 0.5rem;
        font-size: 0.9rem;
        color: #ff4757;
        font-weight: 900;
        padding-left: 1rem;
    }

    input:checked + .slider {
        background-color: #0052D4;
    }

    input:checked + .slider:before {
        transform: translateX(30px);
    }    /* Responsive Adjustments */
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
    }
</style>

<section class="section">
    <div class="container">
        <div class="card mx-auto shadow-lg border-0" style="max-width: 500px; background: #ffffff; border-radius: 10px;">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Add Coupon</h4>
            </div>
            <div class="card-body p-4">

                <form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 input-group">
                        <input type="text" name="c_code" id="c_code" class="input" placeholder=" "  value="{{ old('c_code') }}">
                        <label for="c_code" class="user-label">Coupon Code</label>
                        <span class="text-danger">
                            @error('c_code')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 input-group">
                        <input type="text" name="c_desc" id="c_desc" class="input" placeholder=" "  value="{{ old('c_desc') }}">
                        <label for="c_desc" class="user-label">Coupon Description</label>
                        <span class="text-danger">
                            @error('c_desc')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 input-group">
                        <input type="number" name="c_discount" id="c_discount" class="input" placeholder=" "  value="{{ old('c_discount') }}">
                        <label for="c_discount" class="user-label">Coupon Discount</label>
                        <span class="text-danger">
                            @error('c_discount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 input-group">
                        <input type="text" name="c_max_amt" id="c_max_amt" class="input" placeholder=" " value="{{ old('c_max_amt') }}">
                        <label for="c_max_amt" class="user-label">Coupon Maxmium-Amount</label>
                        <span class="text-danger">
                            @error('c_max_amt')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 input-group">
                        <input type="file" name="c_pic" id="c_pic" class="custom-file-input" accept="image/*">
                        <label for="c_pic" class="custom-label" id="file-label">📸 Choose Image</label>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <span class="text-danger">
                            @error('c_pic')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="status-container mt-3">
                        <span class="status-text">Status</span>
                        <label class="switch" >
                            <input type="checkbox" name="status" id="statusSwitch" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <span class="text-danger">
                        @error('status')
                            {{ $message }}
                        @enderror
                    </span>

                    <div class="d-grid">
                        <button type="submit" class="btn-primary mt-4">Add Coupon</button>
                    </div>
                </form>

            </div>
        </div>
</section>

<script>
    document.getElementById('c_pic').addEventListener('change', function() {
        const fileLabel = document.getElementById('file-label');
        const fileName = document.getElementById('file-name');

        if (this.files.length > 0) {
            fileLabel.textContent = "📸 Choose Image";
            fileName.textContent = this.files[0].name;
        } else {
            fileLabel.textContent = "📸 Choose Image";
            fileName.textContent = "No file chosen";
        }
    });
</script>



@include('footer')
