@extends('admin.plantilla.layout') {{-- Asegúrate que este layout sea correcto según tu proyecto --}}

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
      <!--  Row 1 -->



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4 text-center">Editar Perfil</h2>

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        {{-- Nombre --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Contraseña (opcional) --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva contraseña <small>(opcional)</small></label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Confirmar contraseña --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                    <div class="mb-3">
                        <form method="POST" action="{{ route('profile.destroy') }}" id="delete-account-form" class="mb-3 d-grid">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="password" id="delete-password">

                            <button type="button" class="btn btn-danger mt-3" id="confirm-delete-account">
                                Eliminar cuenta
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('status'))
    <script>
        let status = "{{ session('status') }}";

        if (status === "profile-updated") {
            Swal.fire({
                title: '¡Éxito!',
                text: 'Perfil actualizado correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        }

        // Puedes agregar más estados aquí si lo deseas:
        // if (status === "otro-mensaje") { ... }
    </script>
@endif

<script>
    document.getElementById('confirm-delete-account').addEventListener('click', function () {
        Swal.fire({
            title: '¿Estás seguro de eliminar tu cuenta?',
            input: 'password',
            inputLabel: 'Ingresa tu contraseña actual',
            inputPlaceholder: 'Contraseña',
            inputAttributes: {
                autocapitalize: 'off',
                autocomplete: 'current-password'
            },
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
            preConfirm: (password) => {
                if (!password) {
                    Swal.showValidationMessage('Debes ingresar tu contraseña');
                    return false;
                }

                // Coloca la contraseña en el input hidden del formulario
                document.getElementById('delete-password').value = password;
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-account-form').submit();
            }
        });
    });
</script>


@if ($errors->userDeletion->has('password'))
    
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ $errors->userDeletion->first('password') }}',
        });
    </script>
@endif
@endsection
