<div>
    {{-- Do your work, then step back. --}}
    <form method="post" wire:submit.prevent="passwordHandler">
            <div class="row">
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="">Password Actual</label>
                  <input type="password" class="form-control" placeholder="Password actual" wire:model="password">
                  <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="">Nova Password</label>
                  <input type="password" class="form-control" placeholder="Nova Password" wire:model="new_password">
                  <span class="text-danger">@error('new_password'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <label for="">Confirmar Password</label>
                  <input type="password" class="form-control" placeholder="Confirmar Password" wire:model="conf_password">
                  <span class="text-danger" >@error('conf_password'){{$message}}@enderror</span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" >Salvar pasword</button>
          </form>
</div>
