<div>
  {{-- Because she competes with no one, no one can compete with her. --}}

  @if(Session::get('success'))
    <div class="alert alert-suceess">
    {{Session::get('success') }} || <a href="{{ route('autor.home') }}">Menu principal</a>
    </div>
  
  @endif

  <form class="card card-md" wire:submit.prevent="RegisterHandler()" method="post" autocomplete="off">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">Registar Usuario</h2>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter email" wire:model="email">
        @error('email')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">UserName</label>
        <input type="text" class="form-control" placeholder="Enter UserName" wire:model="username">
        @error('username')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-2">
        <label for="password" class="form-label">Password</label>
        <div class="input-group input-group-flat">
        
        <input type="password" class="form-control" placeholder="Password" autocomplete="off" wire:model="password">
        <span class="input-group-text">
        <a href="#" class="link-secondary" title="" data-bs-toggle="tooltip" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
        </a>
        </span>
                
        </div>
        @error('password')
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-2">
        <label for="conf_password" class="form-label">Confirmar Password</label>
        <div class="input-group input-group-flat">
        
          <input type="password" class="form-control" placeholder="Confirmar Password" autocomplete="off" wire:model="conf_password">
          <span class="input-group-text">
          <a href="#" class="link-secondary" title="" data-bs-toggle="tooltip" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
          </a>
          </span>
                
        </div>
        @error('conf_password')
                <span class="text-danger">{{$message}}</span>
            @enderror
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Criar</button>
      </div>
    </div>
      
  </form>
</div>
