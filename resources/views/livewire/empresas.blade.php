


Tabelas

<!-- MODALS -->

<div wire:ignore.self class="modal modal-blur fade" id = 'add_usuario' tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adicionar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <form wire:submit.prevent = "addUser()" method="post">
            <div class="mb-3">
                <label for="">Nome</label>
                <input type="text" class="form-control" wire:model="nome" placeholder="Digite o Nome...">
                <span class="text-danger">@error('nome'){{$message}}@enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" wire:model="email" placeholder="Digite o email...">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">UserName</label>
                <input type="text" class="form-control" wire:model = "username" placeholder="Digite o UserNome...">
                <span class="text-danger">@error('username'){{$message}}@enderror</span>
            </div>

            <div class="form-group mb-3">
               <label class="form-label">Tipo</label>
               <div>
                    <select wire:model="tipo" class="form-select">
                    <option value="">---Selecione---</option>
                    @foreach(\App\Models\Types::all() as $type)
                    <option value="{{ $type->id}}">{{$type->name}}</option>
                    @endforeach
                    </select> 
                    <span class="text-danger">@error('tipo'){{$message}}@enderror</span>
                </div>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>

           </form>
         </div>
          
        </div>
      </div>
    </div>