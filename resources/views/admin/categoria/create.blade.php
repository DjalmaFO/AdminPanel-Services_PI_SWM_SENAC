   @extends('layouts.dash')
   @section('corpo-dash')
       <h1>Cadastrar Categoria</h1>
       <form method="POST" action="{{ route('categoria.store') }}" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <span class="form-label">Nome</span>
               <input type="text" name="nm_categoria" class="form-control">
           </div>
           <div class="mt-4 text-center">
               <button type="submit" class="btn btn-success btn-md">Salvar</button>
           </div>
       </form>
   @endsection
