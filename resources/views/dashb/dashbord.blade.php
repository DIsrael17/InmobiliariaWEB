@foreach($propiedades as $propiedad)
<div class="propiedad">
  <h2>{{ $propiedad->titulo }}</h2>
  <p><strong>Categoría:</strong> {{ $propiedad->categoria->nombre }}</p>
  <div class="fotos">
    @foreach($propiedad->fotos as $foto)
      <img src="{{ asset('storage/' . $foto->foto) }}" alt="Foto {{ $loop->iteration }}">
    @endforeach
  </div>
  <div class="detalle">
    <p><strong>Descripción:</strong> {{ $propiedad->descripcion }}</p>
    <p><strong>Comentario oficial:</strong> {{ $propiedad->comentario }}</p>
    <p class="precio">Precio: ${{ number_format($propiedad->precio, 2) }} MXN</p>
  </div>
  <p class="contacto">Contacto: {{ $propiedad->contacto }}</p>
  <p><small>Fecha de publicación: {{ $propiedad->fecha_publicacion->format('Y-m-d') }}</small></p>
</div>
@endforeachs