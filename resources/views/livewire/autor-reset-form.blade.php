<div>
  {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
  @if(Session::get('fail'))
      <div class="alert alert-danger">
          {!! Session::get('fail') !!}
      </div>
  @endif

  @if(Session::get('success'))
      <div class="alert alert-success">
          {!! Session::get('success') !!}
      </div>
  @endif

  <form class="card card-md" method="post" wire:submit.prevent="ResetHandler()" autocomplete="off">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">Resetar Password</h2>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" placeholder="Inserir Email" wire:model="email" >
        @error('email')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-2">
        <label class="form-label">
          Nova Password              
        </label>
        <div class="password-toggle">
          <input type="password" class="form-control" id="password" name="new_password" placeholder="Nova Password" wire:model="new_password" autocomplete="off">
          <span class="toggle-btn" onclick="togglePassword()">

          <i class="fas fa-eye"></i>

          </span>
              
        </div>
          @error('new_password')
          <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      <div class="mb-2">
        <label class="form-label">
          Confirmar Password
          
        </label>
        <div class="password-toggle">
          <input type="password" class="form-control" id="password2" placeholder="Confirmar Password" wire:model="conf_password" autocomplete="off">
          <span class="toggle-btn" onclick="togglePassword2()">

          <i class="fas fa-eye"></i>

          </span>
              
        </div>
          @error('conf_password')
              <span class="text-danger">{{$message}}</span>
          @enderror
      </div>

      <div class="mb-2">
          <label class="form-check">
              <a href="{{ route('autor.login') }}">Voltar para pagina de Login</a>
          </label>
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Resetar</button>
      </div>
    </div>

  </form>

</div>

<script>

  function togglePassword() {

    var passwordInput = document.getElementById('password');
    
    var toggleBtn = document.querySelector('.toggle-btn');

    if (passwordInput.type === 'password') {

      passwordInput.type = 'text';

      toggleBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';

    }else {

      passwordInput.type = 'password';

      toggleBtn.innerHTML = '<i class="fas fa-eye"></i>';

    }

  }
  
  
  function togglePassword2() {

    var passwordInput = document.getElementById('password2');

    var toggleBtn = document.querySelector('.toggle-btn');

    if (passwordInput.type === 'password') {

      passwordInput.type = 'text';

      toggleBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';

    }else {

      passwordInput.type = 'password';

      toggleBtn.innerHTML = '<i class="fas fa-eye"></i>';

    }

  }

</script>