<h1>Produtos</h1>
<ul>
    @foreach ($produtos as $produto)
    <li>{{$produto->nome}}</li>
    @endforeach
</ul>
