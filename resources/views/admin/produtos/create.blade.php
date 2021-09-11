<h1>Formulário de criação de produto</h1>

@foreach ($categorias as $categoria)
    <p>{{$categoria->nm_categoria}}</p>
@endforeach