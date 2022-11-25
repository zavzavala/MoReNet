<div>
    {{-- Success is as dangerous as failure. --}}
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <form class="card card-md" method="post" wire:submit.prevent="ForgotHandler()">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Esqueceu-se da Palavra-passe?</h2>
            <p class="text-muted mb-4">Digite seu Email e sera notificado para redefinir sua palavra-passe.</p>
            <div class="mb-3">
              <label class="form-label">Seu Email</label>
              <input type="email" class="form-control" placeholder="Digite seu email" wire:model="email">
              <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">
                <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><polyline points="3 7 12 13 21 7"></polyline></svg>
                Receber o link de redefinicao
                </button>
            </div>
          </div>
        </form>
</div>
