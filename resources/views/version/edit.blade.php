@include('header')
<style>
    /* General Styles */
.section {
    padding: 2rem 0;
    background: #f8f9fa;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

/* Card Styles */
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-clip: border-box;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important;
}

.card-header {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 10px 10px 0 0 !important;
}

.card-body {
    flex: 1 1 auto;
    padding: 1.5rem;
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}

.input-group input[type="number"] {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background-color: #f8f9fa;
}

.input-group input[type="number"]:focus {
    outline: none;
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    background-color: #fff;
}

.user-label {
    position: absolute;
    top: -10px;
    left: 10px;
    background: #ffffff;
    padding: 0 5px;
    font-size: 14px;
    color: #495057;
    transition: all 0.3s ease;
}

/* Button Styles */
.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-primary:hover {
    background-color: #0069d9;
    transform: translateY(-2px);
}

.btn-primary:active {
    transform: translateY(0);
}

.d-grid {
    display: grid;
}

/* Responsive Adjustments */
@media (max-width: 576px) {
    .card {
        margin: 0 10px;
    }
    
    .card-body {
        padding: 1rem;
    }
    
    .input-group input[type="number"] {
        padding: 10px 12px;
    }
    
    .btn-primary {
        padding: 10px 15px;
    }
}

/* Animation for form elements */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.card-body > * {
    animation: fadeIn 0.5s ease forwards;
}

.card-body > *:nth-child(1) { animation-delay: 0.1s; }
.card-body > *:nth-child(2) { animation-delay: 0.2s; }
.card-body > *:nth-child(3) { animation-delay: 0.3s; }
</style>


<section class="section">
    <div class="container">
        <div class="card mx-auto shadow-lg border-0" style="max-width: 500px; background: #ffffff; border-radius: 10px;">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Add Versions</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('version.update',$version->_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 input-group">
                        <input type="number" name="v_no" step="0.01" value="{{$version->v_no}}">
                        <label for="v_no" class="user-label">Version No</label>
                        
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn-primary mt-4">Updte Version</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>

@include('footer')