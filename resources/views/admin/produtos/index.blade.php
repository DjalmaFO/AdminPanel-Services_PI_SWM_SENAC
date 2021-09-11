<h1>Produtos</h1>
<ul>
    @foreach ($produtos as $produto)
    <li>{{$produto->nm_produto}}</li>
    @endforeach
</ul>
