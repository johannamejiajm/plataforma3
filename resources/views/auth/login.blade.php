{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<x-guest-layout>


    <x-slot:titulo>
        Iniciar Sesion
    </x-slot>

      <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <div
    class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
          <div class="card mb-0">
            <div class="card-body">
              <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="" alt="">
              </a>
              <p class="text-center">Inicio de Sesion para Panel Administrativo</p>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                  <input type="email" name="email" class="form-control {{ $errors->get('email') ? 'is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="invalid-feedback">
                        @if($errors->get('email'))
                            @foreach ($errors->get('email') as  $error)
                                {{ $error }}
                            @endforeach
                        @endif
                  </div>
                </div>
                {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                  <input type="password" name="password" class="form-control {{ $errors->get('password') ? 'is-invalid' : '' }}" id="exampleInputPassword1" aria-describedby="passwordHelp">
                  <div id="passwordHelp" class="invalid-feedback">
                    @if($errors->get('password'))
                        @foreach ($errors->get('password') as  $error)
                            {{ $error }}
                        @endforeach
                    @endif
              </div>
                </div>
                {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <div class="form-check">
                    <input class="form-check-input primary" type="checkbox" name="remember"  id="flexCheckChecked">
                    <label class="form-check-label text-dark" for="flexCheckChecked">
                      Recuerdame
                    </label>
                  </div>
                  <a class="text-primary fw-bold" href="./index.html">Olvidaste tu Contraseña ?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Iniciar Sesion</a>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




    <x-slot:scripts>
        <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
         <!-- solar icons -->
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    </x-slot>

</x-guest-layout>
