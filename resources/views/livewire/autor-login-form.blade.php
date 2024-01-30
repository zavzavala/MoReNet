<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    
    @if(Session::get('success'))
        <div class="alert alert-success">
          {!! Session::get('success') !!}
        </div>
    @endif
    <form class="card card-md" wire:submit.prevent="LoginHandler()" method="post" autocomplete="off">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Use suas credenciais para aceder ao sistema</h2>
            <div class="mb-3">
              <label class="form-label">Email/UserName</label>
              <input type="text" class="form-control" placeholder="Email ou UserName" wire:model="login_id">
              @error('login_id')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">
                Palavra-passe
                <span class="form-label-description">
                  <a href="{{route('autor.forgot-password')}}">Esqueci minha palavra-passe</a>
                </span>
              </label>
              <div class="password-toggle"><!--<div class= "input-group input-group-flat" >-->

                <input type="password" class="form-control" id="password" placeholder="Palavra-passe" autocomplete="off" wire:model="password">
                <span class="toggle-btn" onclick="togglePassword()">

                  <i class="fas fa-eye"></i>

                </span>
                    
              </div>
              @error('password')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
         <!--    <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" class="form-check-input">
                <span class="form-check-label">Lemrar-me</span>
              </label>
            </div> -->
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Entrar</button>
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
  
</script>