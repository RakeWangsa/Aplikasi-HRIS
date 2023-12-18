@include('layouts.head')

<main>
   <div class="row">
      <div class="col-5 logo-login">
         <img src="{{ asset('admintemplate/img/farmhill-group.png') }}" alt="Logo Farmhill Group">
      </div>

      <div class="col-7 body-login">
         <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
               @if (session()->has('success'))
               <div class="alert alert-success alert-dismissible fade show justify-content-center col-4 mb-4" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif

               @if (session()->has('loginError'))
               <div class="alert alert-danger alert-dismissible fade show justify-content-center col-4 mb-4" role="alert">
                  {{ session('loginError') }}
                  <button type="button" id="danger" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif

               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                           <div class="card-body login">
                              <div class="pt-4 pb-2">
                                 <h5 class="card-title text-center pb-0 fs-2">LOGIN</h5>
                              </div>
                              <form action="/login" method="post">
                                 @csrf
                                 <div class="form-floating">
                                    <input type="email" name="email" class="form-control
                                    @error('email') is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                    <div class="invalid-feedback">
                                       {{ $message }}
                                    </div>
                                    @enderror
                                    <i class='bx bxs-user'></i>
                                 </div>

                                 <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                    <i class='bx bxs-lock-alt'></i>
                                 </div>

                                 <div class=" remember-forgot">
                                    <label>
                                       <input type="checkbox">Remember me
                                    </label>
                                    <a href="#">Forgot password?</a>
                                 </div>

                                 <div class="col-12 mt-4 mb-2">
                                    <button class="btn btn-login w-100" type="submit">
                                       <span class="login-text">Login</span>
                                    </button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </section>
         </div>
      </div>
   </div>
</main>
