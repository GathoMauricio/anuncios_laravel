@php
    $categorias = App\Models\Categoria::all();
    $estados = App\Models\Estado::all();
@endphp
<div class="p-3" style="background-color: white" id="div_buscador">
    <h1 class="text-center"><strong>Anuncios de Venta y Renta de Inmuebles</strong></h1>
    <br>
    <h4 class="text-center"><strong>Portal 100% mexicano rápido y eficiente</strong></h4>
    <br>
    <form class="form" action="{{ route('buscar') }}" method="GET">
        @csrf
        <div class="container">
            <div class="row p-3" style="background-color: brown;border-radius:10px;">
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <select name="categoria_id"
                            class="form-select @if (request()->session()->get('cliente', 'default_value') != 'flutter') select2 @endif">
                            <option value>¿Qué buscas?</option>
                            @foreach ($categorias as $key => $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <select name="estado_id" class="form-select @if (request()->session()->get('cliente', 'default_value') != 'flutter') select2 @endif"
                            onchange="municipios(this.value)">
                            <option value>¿Estado?</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->idestado }}">{{ $estado->estado }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <select name="municipio_id" id="cbo_municipio"
                            class="form-select @if (request()->session()->get('cliente', 'default_value') != 'flutter') select2 @endif">
                            <option value>¿Municipio?</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                        <button class="btn btn-danger"
                            style="width:100%;color:white;background-color: brown;height:30px;">
                            <span style="font-size: 14px"><strong>Encontrar</strong></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br><br><br>
</div>
<script>
    function municipios(id) {
        if (id.length > 0) {
            axios.get('{{ route('municipios') }}/' + id).then(function(response) {
                var html = '<option value>¿Municipio?</option>';
                $.each(response.data, function(index, item) {
                    html += '<option value="' + item.idmunicipio + '">' + item.municipio + '</option>';
                });
                $("#cbo_municipio").html(html);
            });
        }
    }
</script>
<style>
    #div_buscador {
        background: url("https://images.adsttc.com/media/images/6545/3cca/08e4/447b/a397/b8f6/newsletter/curiosidades-y-mitos-de-los-edificios-mas-emblematicos-de-la-ciudad-de-mexico_13.jpg?1699036368") no-repeat;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
</style>
