@extends('admin.layouts.master')

@section('content')

<style>
/* --- General Body & Container (Dark/Sleek Theme) --- */
.auth-container {
    min-height: 100vh;
    background-color: #1a1a2e; /* Deep space blue background */
    display: flex;
    align-items: center;
    justify-content: center;

    /* ----------------------------------------------------- */
    /* --- HIGH DEFINITION BACKGROUND: SUBTLE GRID PATTERN --- */
    /* Uses multiple radial-gradients for a sharp, minimal 'digital' grid/dot effect */
    background-image:
        radial-gradient(circle at 1px 1px, #ffffff1a 1px, transparent 0), /* First layer of dots */
        radial-gradient(circle at 1px 1px, #ffffff1a 1px, transparent 0); /* Second layer of dots */
    background-size: 30px 30px; /* Controls the spacing/density of the pattern */
    background-position: 0 0, 15px 15px; /* Offsets the two layers to create a staggered grid */
    /* ----------------------------------------------------- */
}

.auth-container .row {
    width: 100%;
    margin: 0;
    padding: 0 15px;
}

/* --- Main Content Card (Floating Effect) --- */
.left-side {

    border-radius: 20px;
    padding: 3rem;
    position: relative;
    color: #f0f0f0;
    /* backdrop-filter: blur(10px); */

    animation: fadeIn 0.8s ease-out;

}

@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

/* --- Background Gradients/Glows (Animated) --- */
.left-side::before {
    content: '';
    position: absolute;
    width: 250px;
    height: 250px;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.3) 0%, rgba(26, 26, 46, 0) 70%); /* Violet glow */
    top: -50px;
    left: -50px;
    z-index: 0;
    transform: translate3d(0, 0, 0);
    animation: backgroundGlowBefore 15s infinite alternate ease-in-out;
}

.left-side::after {
    content: '';
    position: absolute;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, rgba(26, 26, 46, 0) 70%); /* Blue glow */
    bottom: -50px;
    right: -50px;
    z-index: 0;
    transform: translate3d(0, 0, 0);
    animation: backgroundGlowAfter 15s infinite alternate reverse ease-in-out;
}

/* Keyframes for the 'before' pseudo-element (Violet Glow) */
@keyframes backgroundGlowBefore {
    0% { transform: translate3d(0, 0, 0) scale(1); }
    50% { transform: translate3d(250px, 350px, 0) scale(1.05); opacity: 0.9; }
    100% { transform: translate3d(-15px, -20px, 0) scale(1); }
}

/* Keyframes for the 'after' pseudo-element (Blue Glow) */
@keyframes backgroundGlowAfter {
    0% { transform: translate3d(0, 0, 0) scale(1); }
    50% { transform: translate3d(-30px, -20px, 0) scale(1.1); opacity: 0.95; }
    100% { transform: translate3d(120px, 11px, 0) scale(1); }
}

/* --- Dashboard Mockup Section --- */
.dashboard-mockup-col {
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
}

.dashboard-mockup {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    transition: transform 0.5s ease;
    filter: brightness(0.95);
}

.dashboard-mockup:hover {
    transform: scale(1.03);
}

/* --- Form Box (Right Half) --- */
.form-box {
    padding: 3.5rem 3rem;
    background: rgba(46, 48, 83, 0.38); /* Slightly transparent background for contrast */
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    z-index: 1;
}

.form-box h2 {
    color: #f660ad;
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

.form-group {
    margin-bottom: 1.75rem;
}

.form-group label {
    color: #a0a0a0;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
    font-size: 0.95rem;
}

/* --- Input Fields (Sleek and Subdued) --- */
.form-control {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 1px solid #3d3f66;
    border-radius: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #1f2038;
    color: #f0f0f0;
}

.form-control:focus {
    outline: none;
    color:white;
    border-color: #6366f1;
    box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
    background-color: #26284a;
}

/* --- Forgot Password Link --- */
.forget-text {
    color: #a0a0a0;
    font-size: 0.85rem;
    text-decoration: none;
    transition: color 0.3s ease;
    font-weight: 500;
}

.forget-text:hover {
    color: #8183f9;
    text-decoration: underline;
}

/* --- Button (High Contrast Accent) --- */
.cmn-btn {
    background: linear-gradient(90deg, #6366f1 0%, #3b82f6 100%);
    color: white;
    padding: 1rem 2rem;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
}

.cmn-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 25px rgba(99, 102, 241, 0.4);
    background: linear-gradient(90deg, #3b82f6 0%, #6366f1 100%);
}

/* --- Responsive Adjustments --- */
@media (max-width: 991px) {
    .left-side {
        padding: 2rem;
        max-width: 95%;
    }

    .dashboard-mockup-col {
        display: none;
    }

    .form-box {
        padding: 2.5rem;
        background: #2e3053;
    }

    .row > .col-md-6:last-child {
        width: 100%;
        max-width: 450px;
        margin: 0 auto;
    }
}
</style>

<div class="container-fluid auth-container">
    <div class="row h-100">
        <div class="col-lg-10 col-xl-8 left-side mx-auto">
            <div class="row align-items-center">

                {{-- Dashboard Mockup Column (Left Side) --}}
                <div class="col-md-6 dashboard-mockup-col">
                    <img src="{{asset('assets/images/logo_icon/logo_light.png')}}" class="dashboard-mockup" alt="Dashboard Mockup">
                </div>

                {{-- Login Form Column (Right Side) --}}
                <div class="col-md-6">
                    <div class="form-box">
                        {{-- Customized Header Color --}}
                        <h2 class="mb-2" style="color:#f660ad;">Admin Login</h2>
                        <p class="mb-4" style="color: #a0a0a0;">Secure access to your management dashboard.</p>

                        <form class="cmn-form mt-30 verify-gcaptcha login-form" action="{{ route('admin.login') }}" method="POST">
                            @csrf

                            {{-- Username Field --}}
                            <div class="form-group">
                                <label>@lang('Username')</label>
                                <input class="form-control" name="username" type="text" value="{{ old('username') }}" placeholder="Enter admin username" required>
                            </div>

                            {{-- Password Field with Forgot Link --}}
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label>@lang('Password')</label>
                                    <a class="forget-text" href="{{ route('admin.password.reset') }}">@lang('Forgot Password?')</a>
                                </div>
                                <input class="form-control" name="password" type="password" placeholder="Enter secure password" required>
                            </div>

                            {{-- Captcha Placeholder (Laravel Blade Component) --}}
                            <x-captcha />

                            {{-- Submit Button --}}
                            <button type="submit" class="btn cmn-btn w-100 mt-4">@lang('LOGIN SECURELY')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection