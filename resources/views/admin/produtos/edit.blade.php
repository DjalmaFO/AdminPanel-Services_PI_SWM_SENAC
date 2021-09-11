<h1>Formulário de update de produto</h1>

<h2>Edição do produto - {{$produto->nm_produto}}</h2>
@foreach ($categorias as $categoria)
    <p>{{$categoria->nm_categoria}}</p>
@endforeach