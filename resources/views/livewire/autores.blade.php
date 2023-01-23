<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

       <!-- Page title -->
       <div class="page-header d-print-none mb-2">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Usuarios
                </h2>
                <div class="text-muted mt-1">qntd</div>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Pesquisar por email ou UserName..." wire:model='search'>
                    <a href="#" class="btn btn-primary" data-bs-target='#add_usuario' data-bs-toggle='modal'>
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Novo Usuario
                    </a>
                </div>
            </div>
        </div>
    </div>
   

    <div class="row row-cards">
        @forelse($autores as $autor)

        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body p-4 text-center">
                    <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{$autor->picture}})"></span>
                    <h3 class="m-0 mb-1"><a href="#">{{ $autor->name}}</a></h3>
                    <div class="text-muted">{{$autor->email}}</div>
                    <div class="mt-3">
                    <span class="badge bg-purple-lt">{{ $autor->autorType->name}}</span>
                    </div>
                </div>
                <div class="d-flex">
                    <a href="#" wire:click.prevent="editUser({{$autor}})" class="card-btn">Editar</a>
                    <a href="#" class="card-btn" wire:click.prevent = "deleteUser({{$autor}})">Eliminar</a>
                </div>
            </div>
        </div>
        @empty
        <span class="text-danger">Dados nao encontrados</span>
        @endforelse
    </div>
    <!-- Paginacao -->
    <div class="row mt-4">
        <!--{{$autores->links('livewire::simple-bootstrap') }} esta linha nao mostra em formato de numeros-->
        {{$autores->links('livewire::bootstrap')}}
    </div>
    
    
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

            <!-- Edit Modal -->
            
    <div wire:ignore.self class="modal modal-blur fade" id = 'edit_usuario' tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Actualizar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <form wire:submit.prevent = "updUser()" method="post">
            <input type="hidden" wire:model="user_id">
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
                <input type="text" class="form-control" wire:model = "username" placeholder="Digite o UserName...">
                <span class="text-danger">@error('username'){{$message}}@enderror</span>
            </div>

            <div class="form-group mb-3">
               <label class="form-label">Tipo</label>
               <div>
                    <select wire:model="tipo" class="form-select">
                
                    @foreach(\App\Models\Types::all() as $type)
                    <option value="{{ $type->id}}">{{$type->name}}</option>
                    @endforeach
                    </select> 
                    <span class="text-danger">@error('tipo'){{$message}}@enderror</span>
                </div>
            </div>
        <div class="mb-3">
            <div class="form-label">Bloquear</div>
            <label for="" class="form-check form-switch">
                <input class="form-check-input danger" type="checkbox"
                checked="" wire:model = "blocked">
                <span class="form-check-label"></span>
            </label>
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

       
</div>
