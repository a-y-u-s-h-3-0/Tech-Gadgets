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
        margin-bottom: 8px; /* Adjust as needed */

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
        background-color: #0052D4;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    /* Error Message Styles */
    .text-danger {
        display: block;
        margin-top: 0.5rem;
        font-size: 0.9rem;
        color: #ff4757;
        font-weight: 900;
        padding-left: 1rem;
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
    }
</style>


<
<section class="section">
    <div class="container">
        <div class="card mx-auto shadow-lg border-0" style="max-width: 500px; background: #ffffff; border-radius: 10px;">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Edit Products</h4>
            </div>
            <div class="card-body p-4">

                <form action="{{ route('product.update',$product->_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 input-group">
                        <input type="text" name="p_name" id="p_name" class="input" placeholder=" "
                            value="{{ $product->p_name }}">
                        <label for="p_name" class="user-label">Product Name</label>
                        <span class="text-danger">
                            @error('p_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 input-group">
                        <input type="number" name="p_price" id="p_price" class="input" placeholder=" "
                            value="{{ $product->p_price }}">
                        <label for="p_price" class="user-label">Product Price</label>
                        <span class="text-danger">
                            @error('p_price')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 input-group">
                        <input type="text" name="p_desc" id="p_desc" class="input"
                            placeholder=" "value="{{ $product->p_desc }}">
                        <label for="p_desc" class="user-label">Product Description</label>
                        <span class="text-danger">
                            @error('p_desc')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 input-group">
                        <input type="number" name="p_discount" id="p_discount" class="input"
                            placeholder=" "value="{{ $product->p_discount }}">
                        <label for="p_discount" class="user-label">Product Discount</label>
                        <span class="text-danger">
                            @error('p_discount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 input-group">
                        <input type="text" name="p_size" id="p_size" class="input"
                            placeholder=" "value="{{ $product->p_size }}">
                        <label for="p_size" class="user-label">Product Driver Size</label>
                        <span class="text-danger">
                            @error('p_size')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 input-group">
                        <input type="text" name="working_time" id="working_time" class="input"
                            placeholder=" "value="{{ $product->working_time }}">
                        <label for="working_time" class="user-label">Working Time</label>
                        <span class="text-danger">
                            @error('working_time')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 input-group">
                        <input type="text" name="p_country" id="p_country" class="input"
                            placeholder=" "value="{{ $product->p_country }}">
                        <label for="p_country" class="user-label">Country Of Origin</label>
                        <span class="text-danger">
                            @error('p_country')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mb-3 input-group">
                        <input type="text" name="p_warranty" id="p_warranty" class="input"
                            placeholder=" "value="{{ $product->p_warranty }}">
                        <label for="p_warranty" class="user-label">Warranty </label>
                        <span class="text-danger">
                            @error('p_warranty')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>






                    <!-- Custom File Input -->
                    <div class="mb-3 input-group">
                        <input type="file" name="p_pic1" id="p_pic1" class="custom-file-input" accept="image/*"
                            value="{{ $product->p_pic1 }}">
                        <label for="p_pic1" class="custom-label" id="file-label">📸 Upload Product Image 1</label>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <span class="text-danger">
                            @error('p_pic1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 input-group">
                        <input type="file" name="p_pic2" id="p_pic2" class="custom-file-input"
                            accept="image/*" value="{{ $product->p_pic2 }}">
                        <label for="p_pic2" class="custom-label" id="file-label">📸 Upload Product Image 2</label>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <span class="text-danger">
                            @error('p_pic2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 input-group">
                        <input type="file" name="p_pic3" id="p_pic3" class="custom-file-input"
                            accept="image/*" value="{{ $product->p_pic3 }}">
                        <label for="p_pic3" class="custom-label" id="file-label">📸 Upload Product Image 3</label>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <span class="text-danger">
                            @error('p_pic3')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <div class="mb-3 input-group">
                        <input type="file" name="p_pic4" id="p_pic4" class="custom-file-input"
                            accept="image/*" value="{{ $product->p_pic4 }}">
                        <label for="p_pic4" class="custom-label" id="file-label">📸 Upload Product Image 4</label>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <span class="text-danger">
                            @error('p_pic4')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>



                    <div class="mb-3 input-group">
                        <input type="file" name="p_video" id="p_video" class="custom-file-input"
                            accept="video/*" value="{{ $product->p_video }}">
                        <label for="p_video" class="custom-label" id="file-label">📸 Upload Product Video</label>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <span class="text-danger">
                            @error('p_video')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>


                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control"
                            value="{{ $product->category }}">
                            @foreach ($category as $item)
                                <option value="{{ $item->cat_name }}">{{ $item->cat_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('category')
                                {{ $message }}
                            @enderror
                        </span>


                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn-primary mt-4">Update Products</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.custom-file-input').forEach(input => {
        input.addEventListener('change', function() {
            let label = this.nextElementSibling;
            let fileNameSpan = label.nextElementSibling;
            if (this.files.length > 0) {
                fileNameSpan.textContent = this.files[0].name;
            } else {
                fileNameSpan.textContent = "No file chosen";
            }
        });
    });
</script>
@include('footer')
