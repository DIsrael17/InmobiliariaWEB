<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ===== RESET UNIVERSAL ===== */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ===== CUERPO ===== */
        body {
            font-family: 'Rajdhani', sans-serif;
            background: #0a0e1a;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            overflow-x: hidden;
        }

        /* ===== FONDO - GRADIENTES ===== */
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background:
                radial-gradient(ellipse at 20% 50%, rgba(0, 40, 80, 0.4) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 20%, rgba(0, 60, 120, 0.3) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 80%, rgba(0, 30, 70, 0.3) 0%, transparent 50%);
            z-index: -2;
            animation: bgPulse 8s ease-in-out infinite alternate;
        }

        @keyframes bgPulse {
            0% { opacity: 0.6; }
            100% { opacity: 1; }
        }

        /* ===== FONDO - CUADRÍCULA ===== */
        body::after {
            content: '';
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-image:
                linear-gradient(rgba(0, 100, 180, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 100, 180, 0.05) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: -1;
            animation: gridScroll 20s linear infinite;
        }

        @keyframes gridScroll {
            0% { transform: translateY(0); }
            100% { transform: translateY(60px); }
        }

        /* ===== CONTENEDOR PRINCIPAL ===== */
        .container {
            width: 100%;
            max-width: 600px;
            background: linear-gradient(135deg, rgba(10, 20, 40, 0.95), rgba(15, 30, 60, 0.9));
            border: 1px solid rgba(0, 120, 215, 0.3);
            border-radius: 16px;
            padding: 45px 40px;
            box-shadow:
                0 0 40px rgba(0, 80, 160, 0.15),
                0 0 80px rgba(0, 60, 120, 0.1),
                inset 0 1px 0 rgba(0, 150, 255, 0.1);
            position: relative;
            animation: containerEntry 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes containerEntry {
            from { opacity: 0; transform: translateY(30px) scale(0.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* ===== LÍNEA NEÓN SUPERIOR ===== */
        .container::before {
            content: '';
            position: absolute;
            top: -1px; left: 40px; right: 40px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #0078d7, #00b4ff, #0078d7, transparent);
            border-radius: 2px;
            animation: glowLine 3s ease-in-out infinite;
        }

        @keyframes glowLine {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; box-shadow: 0 0 15px rgba(0, 120, 215, 0.6); }
        }

        /* ===== TÍTULO ===== */
        h1 {
            font-family: 'Orbitron', sans-serif;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 900;
            color: #e0f0ff;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 35px;
            text-shadow: 0 0 20px rgba(0, 150, 255, 0.4);
        }

        h1::after {
            content: '';
            display: block;
            width: 60px; height: 3px;
            background: linear-gradient(90deg, transparent, #0078d7, transparent);
            margin: 12px auto 0;
            border-radius: 3px;
        }

        /* ===== GRUPO DE CAMPO ===== */
        .mb-3 {
            margin-bottom: 22px;
        }

        /* ===== ETIQUETAS ===== */
        label {
            display: block;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            color: #80c8ff;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        /* ===== INPUTS ===== */
        .form-control {
            width: 100%;
            padding: 14px 18px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            color: #d0e8ff;
            background: rgba(0, 20, 50, 0.6);
            border: 1px solid rgba(0, 100, 180, 0.3);
            border-radius: 8px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control:hover {
            border-color: rgba(0, 120, 215, 0.5);  /* Borde más brillante al hover */
        }

        .form-control:focus {
            border-color: #0078d7;
            background: rgba(0, 30, 70, 0.7);
            box-shadow:
                0 0 15px rgba(0, 120, 215, 0.2),
                inset 0 0 10px rgba(0, 80, 160, 0.1);
        }

        .form-control::placeholder {
            color: rgba(128, 180, 230, 0.4);
        }

        /* ===== TEXTO PEQUEÑO ===== */
        small {
            display: block;
            margin-top: 8px;
            font-size: 0.85rem;
            color: rgba(160, 200, 240, 0.5);
            font-style: italic;
            letter-spacing: 0.3px;
        }

        /* ================================================================
           SECCIÓN DE FOTO ACTUAL
           Contenedor que muestra la foto actual del usuario con estilo
           ================================================================ */
        .photo-current-wrapper {
            display: flex;                          /* Flexbox para centrar el contenido */
            flex-direction: column;                 /* Apila la foto y el texto verticalmente */
            align-items: center;                    /* Centra horizontalmente */
            gap: 12px;                              /* 12px de espacio entre la foto y el texto */
            margin-bottom: 10px;                    /* Separación antes del input de nueva foto */
        }

        /* Texto "Foto actual:" con estilo futurista */
        .photo-current-label {
            font-family: 'Rajdhani', sans-serif;    /* Fuente moderna */
            font-size: 0.85rem;                     /* Tamaño pequeño */
            color: rgba(160, 200, 240, 0.5);        /* Azul pálido semi-transparente */
            text-transform: uppercase;              /* Mayúsculas */
            letter-spacing: 1.5px;                  /* Espacio entre letras */
            font-weight: 600;                       /* Semi-negrita */
        }

        /* Contenedor de la foto actual (círculo con borde brillante) */
        .photo-current-circle {
            width: 110px;                           /* Ancho del círculo */
            height: 110px;                          /* Alto del círculo (igual = círculo perfecto) */
            border-radius: 50%;                     /* Hace el elemento redondo */
            border: 2px solid rgba(0, 120, 215, 0.4); /* Borde azul semi-transparente */
            overflow: hidden;                       /* Oculta lo que sobresalga del círculo */
            box-shadow:                             /* Doble sombra de brillo: */
                0 0 20px rgba(0, 120, 215, 0.2),    /*   Halo externo azul */
                inset 0 0 15px rgba(0, 60, 120, 0.2); /* Brillo interno azul sutil */
            transition: all 0.3s ease;              /* Transición suave */
            position: relative;                     /* Para posicionar el brillo animado */
            animation: photoGlow 4s ease-in-out infinite alternate; /* Pulso de brillo */
        }

        /* Animación: el borde de la foto pulsa entre dos tonos de azul */
        @keyframes photoGlow {
            0% {
                border-color: rgba(0, 120, 215, 0.3);  /* Borde tenue */
                box-shadow: 0 0 15px rgba(0, 100, 180, 0.15); /* Halo suave */
            }
            100% {
                border-color: rgba(0, 150, 255, 0.6);  /* Borde más brillante */
                box-shadow: 0 0 30px rgba(0, 120, 215, 0.3); /* Halo más intenso */
            }
        }

        /* Hover en la foto: se ilumina más */
        .photo-current-circle:hover {
            border-color: #0090ff;                  /* Borde azul brillante */
            box-shadow: 0 0 35px rgba(0, 130, 220, 0.4); /* Halo más fuerte */
            transform: scale(1.05);                 /* Se agranda un 5% */
        }

        /* La imagen dentro del círculo */
        .photo-current-circle img {
            width: 100%;                            /* Ocupa todo el ancho del círculo */
            height: 100%;                           /* Ocupa todo el alto del círculo */
            object-fit: cover;                      /* Recorta sin deformar para llenar el círculo */
            display: block;                         /* Elimina espacio extra del inline */
        }

        /* ================================================================
           ZONA DE SUBIDA DE NUEVA FOTO
           Área con drag & drop para seleccionar nueva foto
           ================================================================ */
        .photo-upload-wrapper {
            display: flex;                          /* Flexbox para organizar contenido */
            flex-direction: column;                 /* Apila verticalmente */
            align-items: center;                    /* Centra horizontalmente */
            gap: 12px;                              /* Espacio entre elementos */
        }

        /* Zona de arrastrar y soltar */
        .photo-dropzone {
            width: 100%;                            /* Ancho completo */
            padding: 20px;                          /* Espacio interno */
            border: 2px dashed rgba(0, 100, 180, 0.3); /* Borde punteado azul */
            border-radius: 10px;                    /* Esquinas redondeadas */
            background: rgba(0, 20, 50, 0.3);      /* Fondo azul oscuro sutil */
            text-align: center;                     /* Texto centrado */
            cursor: pointer;                        /* Cursor de manito */
            transition: all 0.3s ease;              /* Transición suave */
            position: relative;                     /* Para posicionar el input oculto */
        }

        /* Hover de la dropzone */
        .photo-dropzone:hover {
            border-color: rgba(0, 140, 220, 0.5);  /* Borde más brillante */
            background: rgba(0, 30, 60, 0.4);      /* Fondo más claro */
            box-shadow: 0 0 20px rgba(0, 100, 180, 0.1); /* Halo suave */
        }

        /* Cuando se arrastra un archivo encima */
        .photo-dropzone.drag-over {
            border-color: #0078d7;                  /* Borde azul sólido */
            background: rgba(0, 40, 80, 0.5);      /* Fondo más visible */
            box-shadow: 0 0 30px rgba(0, 120, 215, 0.2); /* Halo intenso */
            transform: scale(1.01);                 /* Se agranda un 1% */
        }

        /* Ícono de nube dentro de la dropzone */
        .photo-dropzone-icon {
            font-size: 1.8rem;                      /* Tamaño del ícono */
            color: rgba(0, 150, 255, 0.4);          /* Azul tenue */
            margin-bottom: 8px;                     /* Separación debajo del ícono */
            transition: all 0.3s ease;              /* Transición suave */
        }

        /* El ícono flota hacia arriba al hover */
        .photo-dropzone:hover .photo-dropzone-icon {
            color: rgba(0, 150, 255, 0.7);          /* Se ilumina */
            transform: translateY(-3px);            /* Sube 3px */
        }

        /* Texto principal de la dropzone */
        .photo-dropzone-text {
            font-size: 0.95rem;                     /* Tamaño del texto */
            color: rgba(160, 200, 240, 0.6);        /* Azul pálido */
            font-weight: 500;                       /* Peso medio */
            line-height: 1.5;                       /* Altura de línea */
        }

        /* Texto de formatos aceptados */
        .photo-dropzone-hint {
            font-size: 0.8rem;                      /* Tamaño pequeño */
            color: rgba(128, 180, 230, 0.35);       /* Azul muy tenue */
            margin-top: 6px;                        /* Separación superior */
            font-style: italic;                     /* Cursiva */
        }

        /* Enlace "selecciona un archivo" */
        .photo-dropzone-link {
            color: #0090ff;                         /* Azul brillante */
            text-decoration: underline;             /* Subrayado */
            font-weight: 600;                       /* Semi-negrita */
            transition: color 0.3s ease;            /* Transición del color */
        }

        .photo-dropzone-link:hover {
            color: #40b0ff;                         /* Se aclara al hover */
        }

        /* Input file oculto (cubre toda la dropzone) */
        .photo-input-hidden {
            position: absolute;                     /* Cubre toda la dropzone */
            top: 0; left: 0;                        /* Desde esquina superior izquierda */
            width: 100%; height: 100%;              /* Tamaño completo */
            opacity: 0;                             /* Invisible */
            cursor: pointer;                        /* Cursor de manito */
        }

        /* Nombre del archivo seleccionado */
        .photo-filename {
            font-size: 0.85rem;                     /* Tamaño pequeño */
            color: #60b0e0;                         /* Azul claro */
            font-weight: 500;                       /* Peso medio */
            display: none;                          /* Oculto por defecto */
            align-items: center;                    /* Centra verticalmente */
            gap: 6px;                               /* Espacio entre ícono y texto */
        }

        .photo-filename.visible {
            display: flex;                          /* Se muestra cuando tiene clase "visible" */
        }

        .photo-filename i {
            color: #0078d7;                         /* Ícono azul */
        }

        /* Vista previa de la nueva foto seleccionada */
        .photo-new-preview {
            width: 90px;                            /* Ancho del círculo de vista previa */
            height: 90px;                           /* Alto del círculo */
            border-radius: 50%;                     /* Forma circular */
            border: 2px solid rgba(0, 200, 100, 0.4); /* Borde verde (indica "nueva") */
            overflow: hidden;                       /* Oculta lo que sobresalga */
            display: none;                          /* Oculto por defecto */
            box-shadow: 0 0 20px rgba(0, 200, 100, 0.15); /* Halo verde sutil */
            transition: all 0.3s ease;              /* Transición suave */
        }

        .photo-new-preview.visible {
            display: block;                         /* Se muestra cuando hay imagen */
        }

        .photo-new-preview img {
            width: 100%;                            /* Ocupa todo el ancho */
            height: 100%;                           /* Ocupa todo el alto */
            object-fit: cover;                      /* Recorta sin deformar */
            display: block;                         /* Elimina espacio inline */
        }

        /* Etiqueta "Nueva foto" debajo de la vista previa */
        .photo-new-label {
            font-size: 0.75rem;                     /* Tamaño pequeño */
            color: rgba(0, 200, 130, 0.6);          /* Verde suave */
            text-transform: uppercase;              /* Mayúsculas */
            letter-spacing: 1px;                    /* Espacio entre letras */
            font-weight: 600;                       /* Semi-negrita */
            display: none;                          /* Oculto por defecto */
            text-align: center;                     /* Centrado */
        }

        .photo-new-label.visible {
            display: block;                         /* Se muestra cuando hay imagen nueva */
        }

        /* ===== BARRA DE BOTONES ===== */
        .btn-bar {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 35px;
            flex-wrap: wrap;
        }

        /* ===== ESTILOS BASE BOTONES ===== */
        .btn-primary,
        .btn-secondary {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            padding: 12px 28px;
            border: 1px solid;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* ===== BOTÓN ACTUALIZAR ===== */
        .btn-primary {
            background: linear-gradient(135deg, #0050a0, #0078d7);
            color: #ffffff;
            border-color: #0090ff;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0060b8, #0090ff);
            box-shadow: 0 0 25px rgba(0, 120, 215, 0.5);
            transform: translateY(-2px);
        }

        /* ===== BOTÓN VOLVER ===== */
        .btn-secondary {
            background: linear-gradient(135deg, rgba(0, 40, 70, 0.6), rgba(0, 55, 95, 0.5));
            color: #a0d0ff;
            border-color: rgba(0, 100, 180, 0.4);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, rgba(0, 55, 100, 0.7), rgba(0, 75, 130, 0.6));
            border-color: rgba(0, 140, 220, 0.6);
            box-shadow: 0 0 20px rgba(0, 100, 180, 0.3);
            transform: translateY(-2px);
            color: #ffffff;
        }

        .btn-primary:active,
        .btn-secondary:active {
            transform: translateY(0);
            box-shadow: 0 0 10px rgba(0, 80, 160, 0.3);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 1.3rem;
                letter-spacing: 2px;
            }

            label {
                font-size: 0.7rem;
            }

            .form-control {
                padding: 12px 14px;
                font-size: 0.95rem;
            }

            .photo-current-circle {
                width: 90px;                        /* Más pequeño en móvil */
                height: 90px;
            }

            .photo-new-preview {
                width: 70px;                        /* Más pequeño en móvil */
                height: 70px;
            }

            .btn-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-primary,
            .btn-secondary {
                justify-content: center;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- ===== SECCIÓN DE FOTO ===== -->
        <div class="mb-3">
            <label>Foto de Perfil</label>

            <div class="photo-upload-wrapper">

                <!-- Foto actual (solo se muestra si el usuario tiene foto) -->
                @if($usuario->foto)
                    <div class="photo-current-wrapper">
                        <span class="photo-current-label">Foto actual</span>
                        <div class="photo-current-circle">
                            <img src="{{ asset('storage/' . $usuario->foto) }}"
                                 alt="Foto de {{ $usuario->name }}">
                        </div>
                    </div>
                @endif

                <!-- Vista previa de la nueva foto (oculta hasta que seleccionen) -->
                <div class="photo-new-preview" id="newPhotoPreview">
                    <img id="previewImg" src="" alt="Nueva foto">
                </div>
                <span class="photo-new-label" id="newPhotoLabel">✨ Nueva foto</span>

                <!-- Zona de drag & drop -->
                <div class="photo-dropzone" id="photoDropzone">
                    <input
                        type="file"
                        name="foto"
                        id="photoInput"
                        class="photo-input-hidden"
                        accept="image/jpeg,image/png,image/gif,image/webp"
                    >
                    <div class="photo-dropzone-icon">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <div class="photo-dropzone-text">
                        Arrastra tu foto aquí o
                        <span class="photo-dropzone-link">selecciona un archivo</span>
                    </div>
                    <div class="photo-dropzone-hint">
                        Formatos: JPG, PNG, GIF, WEBP · Máximo 2MB
                    </div>
                </div>

                <!-- Nombre del archivo -->
                <div class="photo-filename" id="photoFilename">
                    <i class="fa-solid fa-image"></i>
                    <span id="filenameText"></span>
                </div>

            </div>
        </div>

        <!-- ===== CAMPOS DE TEXTO ===== -->
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" value="{{ $usuario->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $usuario->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña (opcional)</label>
            <input type="password" name="password" class="form-control">
            <small>Si no deseas cambiar la contraseña, deja este campo vacío.</small>
        </div>

        <div class="btn-bar">
            <button type="submit" class="btn-primary">💾 Actualizar</button>
            <a href="{{ route('loginc.usuariosg') }}" class="btn-secondary">↩️ Volver</a>
        </div>
    </form>
</div>

<!-- ===== JAVASCRIPT: Vista previa y Drag & Drop ===== -->
<script>
    const photoInput = document.getElementById('photoInput');
    const photoDropzone = document.getElementById('photoDropzone');
    const newPhotoPreview = document.getElementById('newPhotoPreview');
    const previewImg = document.getElementById('previewImg');
    const photoFilename = document.getElementById('photoFilename');
    const filenameText = document.getElementById('filenameText');
    const newPhotoLabel = document.getElementById('newPhotoLabel');

    // Cuando seleccionan archivo con el input
    photoInput.addEventListener('change', function() {
        handleFile(this.files[0]);
    });

    // Drag over
    photoDropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('drag-over');
    });

    // Drag leave
    photoDropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('drag-over');
    });

    // Drop
    photoDropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('drag-over');
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            photoInput.files = dataTransfer.files;
            handleFile(file);
        }
    });

    // Procesa el archivo y muestra vista previa
    function handleFile(file) {
        if (!file) return;

        // Muestra nombre del archivo
        filenameText.textContent = file.name;
        photoFilename.classList.add('visible');

        // Muestra vista previa
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            newPhotoPreview.classList.add('visible');
            newPhotoLabel.classList.add('visible');
        };
        reader.readAsDataURL(file);
    }
</script>

</body>
</html>