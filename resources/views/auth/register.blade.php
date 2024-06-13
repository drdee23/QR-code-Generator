<x-guest-layout>
    <main>
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <p class="text-center"><a href="../dashboard/dashboard.html"
                        class="d-flex align-items-center justify-content-center"><svg class="icon icon-xs me-2"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                clip-rule="evenodd"></path>
                        </svg> Back to homepage</a></p>
                <div class="row justify-content-center form-bg-image"
                    data-background-lg="../../assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Create Account</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}" class="mt-4">
                                @csrf

                                <div class="form-group mb-4"><label for="First name">Your First name</label>
                                    <div class="input-group"><span class="input-group-text" id="basic-addon1"><svg
                                                class="icon icon-xs text-gray-600" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                                                </path>

                                            </svg> </span><input name="first_name" type="last name" class="form-control"
                                            placeholder="Chimwemwe" id="last name" autofocus required></div>
                                </div>
                                <div class="form-group mb-4"><label for="last name">Your last name</label>
                                    <div class="input-group"><span class="input-group-text" id="basic-addon1"><svg
                                                class="icon icon-xs text-gray-600" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                                                </path>

                                            </svg> </span><input name="last_name" type="last name" class="form-control"
                                            placeholder="Makwakwa" id="last name" autofocus required></div>
                                </div>
                                <div class="form-group mb-4"><label for="email">Your Email</label>
                                    <div class="input-group"><span class="input-group-text" id="basic-addon1"><svg
                                                class="icon icon-xs text-gray-600" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                </path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                                </path>
                                            </svg> </span><input name="email" type="email" class="form-control"
                                            placeholder="example@company.com" id="email" autofocus required></div>
                                </div>

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                <div class="form-group">
                                    <div class="form-group mb-4"><label for="password">Your Password</label>
                                        <div class="input-group"><span class="input-group-text" id="basic-addon2"><svg
                                                    class="icon icon-xs text-gray-600" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg> </span><input name="password" type="password"
                                                placeholder="Password" class="form-control" id="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4"><label for="confirm_password">Confirm Password</label>
                                        <div class="input-group"><span class="input-group-text" id="basic-addon2"><svg
                                                    class="icon icon-xs text-gray-600" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg> </span><input name="password_confirmation" type="password"
                                                placeholder="Confirm Password" class="form-control"
                                                id="confirm_password" required></div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" value
                                                id="remember"> <label class="form-check-label fw-normal mb-0"
                                                for="remember">I agree to the <a href="#" class="fw-bold">terms
                                                    and conditions</a></label></div>
                                    </div>
                                </div>
                                <div class="d-grid"><button type="submit" class="btn btn-gray-800">Sign up</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-center align-items-center mt-4"><span
                                    class="fw-normal">Already have an
                                    account? <a href="sign-in.html" class="fw-bold">Login here</a></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-guest-layout>
