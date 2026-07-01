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
        background:linear-gradient(#0052D4,#2d07b9,#0052D4);
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
        margin-bottom: 2.5rem; /* Increased margin to prevent overlap */
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
        margin-bottom: 3rem; /* Extra margin for textarea */
    }

    .textarea-group .user-label {
        top: 1.5rem; /* Adjusted position for textarea label */
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
        background:linear-gradient(#0052D4,#2d07b9,#0052D4);
        color: white;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .custom-label:hover {
        background:linear-gradient(#0052D4,#2d07b9,#0052D4);
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
        background:linear-gradient(#0052D4,#2d07b9,#0052D4);
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1.5rem; /* Increased margin */
    }

    .btn-primary:hover {
        background:linear-gradient(#0052D4,#2d07b9,#0052D4);
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
@php
    $user = Session::get('user');
@endphp

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                    <form action="/update_profile" method="POST" enctype="multipart/form-data">

                    <div class="card-body">
                        <!-- Profile Picture Upload -->
                        {{-- <div class="text-center mb-4">
                            <img id="profile-picture-preview" src="{{ $user->pic }}" alt="Profile Picture" class="rounded-circle" width="120" height="120">
                            <div class="mt-3">
                                <label for="profile-picture" class="btn btn-primary btn-sm">
                                    <i class="bi bi-upload"></i> Upload Photo
                                </label>
                                <input type="file" name="pic" id="profile-picture" class="d-none" accept="image/*" onchange="previewImage(event)">
                            </div>
                        </div> --}}

                        <!-- Edit Profile Form -->
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" >Full Name</label>
                                <input type="text"class="input" id="name" name="username" value="{{ old('username', $user->username) }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" >Email Address</label>
                                <input type="email"class="input" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="tel"class="input" id="phone" name="mobileno" value="{{ old('mobile', $user->mobile) }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone" >Profile pic</label>
                                <input type="file"class="input" id="pic" name="pic" accept="image/*" onchange="previewImage(event)">
                            </div>

                            <!-- Bio -->
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="input" id="bio" name="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                            </div>

                            <!-- Save Changes Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="/home" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('profile-picture-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result; // Update the image source
            };

            reader.readAsDataURL(input.files[0]); // Read the selected file
        }
    }
</script> --}}

@include('footer')