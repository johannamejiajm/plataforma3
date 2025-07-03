
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
              <a href="{{ route('inicio.index') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="{{ asset('images/logo200px.png') }}" alt="logotipo" >
              </a>
              <p class="text-center">Inicio de Sesion para Panel Administrativo</p>
               <!-- ALERTA DE ÉXITO -->
               @if (session('status'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{ session('status') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
               </div>
               @endif
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
