@php
    $categorias_links = App\Models\Categoria::all();
@endphp
<div class="container">
    <h4>Categorias</h4>
    <div class="row">
        @foreach ($categorias_links as $key => $cat)
            <div class="col-md-3 p-3">
                <a href="{{ route('buscar') }}?categoria_id={{ $cat->id }}" style="color:gray;text-decoration:none;">
                    <center>
                        <span class="{{ $cat->icono }}" style="font-size:48px;"></span>
                        <br>
                        <span>{{ $cat->nombre }}</span>
                    </center>
                </a>
            </div>
        @endforeach
    </div>
</div>
