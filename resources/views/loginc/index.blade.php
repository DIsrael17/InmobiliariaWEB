<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/index.css', 'resources/js/app.js'])
  <title>Mi Página Web</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
 
    nav ul {
      list-style: none;
      padding: 0;
      display: flex;
      justify-content: center;
      gap: 1em;
    }
    nav a {
      color: white;
      text-decoration: none;
    }
    main {
      padding: 2em;
    }
    section {
      margin-bottom: 2em;
    }
    form {
      display: flex;
      flex-direction: column;
      max-width: 300px;
    }
    form label {
      margin-top: 0.5em;
    }
    form input, form button {
      padding: 0.5em;
      margin-top: 0.3em;
    }
    /* Quitar márgenes por defecto */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Header fijo */
header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background-color: #222;
  color: white;
  z-index: 1000;
}

/* Título */
header h1 {
  margin-bottom: 2px;
}

/* Menú */
nav ul {
  display: flex;
  list-style: none;
  gap: 30px;
}

/* Enlaces */
nav a {
  color: white;
  text-decoration: none;
  font-size: 18px;
}

nav a:hover {
  color: #00bcd4;
}

/* Evita que el header tape el contenido */
body {
  padding-top: 130px;
}
  </style>
</head>
<body>
  <header>
    <h1>Bienvenido a Mi Página Web</h1>
     <nav>
      <ul>
        <li><a href="{{ route('login') }}">Iniciar sesion</a></li><!--  ruta para el login -->
        <li><a href="#acerca">Acerca de</a></li>
        <li><a href="#contacto">Contacto</a></li>
      </ul>
     </nav>
  </header>

<div class="propiedades-container">

    {{-- Recorremos todas las propiedades que nos envía el controlador --}}
    @foreach($propiedades as $propiedad)

        {{-- Tarjeta individual de una propiedad --}}
        <div class="propiedad-card">

            {{-- Contenedor de la imagen --}}
            <div class="imagen-container">

                {{-- Verificamos si la propiedad tiene fotografías --}}
                @if($propiedad->fotos->count() > 0)

                    {{-- Mostramos la primera fotografía de la propiedad --}}
                    <img
                        src="{{ asset('storage/' . $propiedad->fotos->first()->foto) }}"
                        alt="{{ $propiedad->titulo }}"
                        class="propiedad-imagen"
                    >

                {{-- Si la propiedad no tiene fotografías --}}
                @else

                    {{-- Mostramos una imagen alternativa --}}
                    <div class="sin-imagen">
                        Sin imagen
                    </div>

                @endif
            </div>
            {{-- Información que aparece debajo de la imagen --}}
            <div class="propiedad-info">
                <h2>
                    {{ $propiedad->titulo }}                 {{-- Título de la propiedad --}}
                </h2>
                                                              {{-- Categoría de la propiedad --}}
                <p class="categoria">
                    @if($propiedad->categoria)              {{-- Comprobamos que exista una categoría --}}
                        {{ $propiedad->categoria->nombre }} {{-- Mostramos el nombre de la categoría --}}

            
                    @else                                   {{-- Si no tiene categoría --}}
                        Sin categoría                       {{-- Texto que mostramos --}}
                    @endif
                </p>
                
                <p class="descripcion">                  {{-- Descripción de la propiedad --}}
                    {{ $propiedad->descripcion }}        {{-- Mostramos la descripción --}}

                </p>
                {{-- Precio de la propiedad --}}
                <p class="precio">
                    ${{ number_format($propiedad->precio, 2) }} MXN  {{-- Formateamos el precio con dos decimales --}}
                </p>
               
                <p class="comentario">                  {{-- Comentario oficial --}}

                    
                    {{ $propiedad->comentario }}         {{-- Mostramos el comentario --}}

                </p>
               
                <p class="contacto">               {{-- Información de contacto --}}
                    <strong>Contacto:</strong>            {{-- Texto "Contacto:" --}}
                    {{ $propiedad->contacto }}       {{-- Número o información de contacto --}}
                </p>
               
                <p class="fecha">                     {{-- Fecha de publicación --}}
                   
                    Publicado:                         {{-- Texto de la fecha --}}
                    {{-- Convertimos la fecha a formato año-mes-día --}}
                    {{ \Carbon\Carbon::parse($propiedad->fecha_publicacion)->format('Y-m-d') }}

                </p>

            </div>

        </div>

    @endforeach

</div>

  <footer>
    <p>&copy; 2026 Mi Página Web</p>
  </footer>
</body>
</html>