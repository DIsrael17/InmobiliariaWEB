<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ================================================================
           RESET UNIVERSAL
           Elimina estilos por defecto del navegador en todos los elementos
           ================================================================ */
        *, *::before, *::after {
            margin: 0;                              /* Quita márgenes por defecto de todos los elementos */
            padding: 0;                             /* Quita relleno por defecto de todos los elementos */
            box-sizing: border-box;                 /* El padding y borde se incluyen dentro del ancho/alto total */
        }

        /* ================================================================
           CUERPO DE LA PÁGINA
           Configura el fondo oscuro y centra todo el contenido
           ================================================================ */
        body {
            font-family: 'Rajdhani', sans-serif;    /* Fuente moderna/futurista como tipografía base */
            background: #0a0e1a;                    /* Fondo azul marino muy oscuro (casi negro) */
            min-height: 100vh;                      /* El body ocupa como mínimo toda la altura de la pantalla */
            display: flex;                          /* Activa flexbox para poder centrar el contenido */
            justify-content: center;                /* Centra el contenido horizontalmente */
            align-items: center;                    /* Centra el contenido verticalmente */
            padding: 40px 20px;                     /* Espacio interno: 40px arriba/abajo, 20px a los lados */
            overflow-x: hidden;                     /* Evita scroll horizontal no deseado */
        }

        /* ================================================================
           FONDO ANIMADO - GRADIENTES RADIALES
           Crea manchas de luz azul que pulsan suavemente
           ================================================================ */
        body::before {
            content: '';                            /* Genera el pseudo-elemento (vacío pero necesario) */
            position: fixed;                        /* Se fija a la ventana, no se mueve con el scroll */
            top: 0;                                 /* Empieza desde el borde superior de la ventana */
            left: 0;                                /* Empieza desde el borde izquierdo de la ventana */
            width: 100%;                            /* Ocupa el 100% del ancho de la ventana */
            height: 100%;                           /* Ocupa el 100% del alto de la ventana */
            background:                             /* Tres gradientes radiales superpuestos: */
                radial-gradient(                    /* Primer gradiente: */
                    ellipse at 20% 50%,             /*   Elipse centrada al 20% horizontal, 50% vertical */
                    rgba(0, 40, 80, 0.4) 0%,        /*   Azul oscuro semi-transparente en el centro */
                    transparent 60%                 /*   Se desvanece a transparente al 60% del radio */
                ),
                radial-gradient(                    /* Segundo gradiente: */
                    ellipse at 80% 20%,             /*   Elipse centrada arriba a la derecha */
                    rgba(0, 60, 120, 0.3) 0%,       /*   Azul medio semi-transparente en el centro */
                    transparent 50%                 /*   Se desvanece a transparente al 50% del radio */
                ),
                radial-gradient(                    /* Tercer gradiente: */
                    ellipse at 50% 80%,             /*   Elipse centrada abajo en el medio */
                    rgba(0, 30, 70, 0.3) 0%,        /*   Azul oscuro semi-transparente en el centro */
                    transparent 50%                 /*   Se desvanece a transparente al 50% del radio */
                );
            z-index: -2;                            /* Se coloca detrás de todo el contenido */
            animation: bgPulse 8s ease-in-out infinite alternate; /* Pulsa de ida y vuelta cada 8 segundos */
        }

        /* Animación: el fondo oscila entre opacidad 0.6 y 1 */
        @keyframes bgPulse {
            0% { opacity: 0.6; }                    /* Estado inicial: 60% de opacidad (más tenue) */
            100% { opacity: 1; }                    /* Estado final: 100% de opacidad (más brillante) */
        }

        /* ================================================================
           FONDO ANIMADO - CUADRÍCULA FUTURISTA
           Líneas tipo "grid" que se desplazan hacia abajo continuamente
           ================================================================ */
        body::after {
            content: '';                            /* Genera el pseudo-elemento */
            position: fixed;                        /* Se fija a la ventana */
            top: 0;                                 /* Desde el borde superior */
            left: 0;                                /* Desde el borde izquierdo */
            width: 100%;                            /* Ancho completo de la ventana */
            height: 100%;                           /* Alto completo de la ventana */
            background-image:                       /* Dos gradientes lineales que forman la cuadrícula: */
                linear-gradient(                    /* Líneas horizontales: */
                    rgba(0, 100, 180, 0.05) 1px,    /*   Línea azul de 1px muy sutil */
                    transparent 1px                 /*   El resto es transparente */
                ),
                linear-gradient(                    /* Líneas verticales: */
                    90deg,                          /*   Rotadas 90 grados */
                    rgba(0, 100, 180, 0.05) 1px,    /*   Línea azul de 1px muy sutil */
                    transparent 1px                 /*   El resto es transparente */
                );
            background-size: 60px 60px;             /* Cada celda de la cuadrícula mide 60x60 píxeles */
            z-index: -1;                            /* Delante del gradiente pero detrás del contenido */
            animation: gridScroll 20s linear infinite; /* Se desplaza continuamente durante 20 segundos */
        }

        /* Animación: desplaza la cuadrícula 60px hacia abajo (1 celda) y repite */
        @keyframes gridScroll {
            0% { transform: translateY(0); }        /* Posición original */
            100% { transform: translateY(60px); }   /* Se mueve 60px abajo, luego salta al inicio */
        }

        /* ================================================================
           CONTENEDOR PRINCIPAL
           El panel central que contiene el formulario
           ================================================================ */
        .container {
            width: 100%;                            /* Ocupa todo el ancho disponible del padre */
            max-width: 600px;                       /* Pero no más de 600px (tamaño ideal para formulario) */
            background: linear-gradient(            /* Fondo con degradado diagonal: */
                135deg,                             /*   Dirección: esquina superior-izq a inferior-der */
                rgba(10, 20, 40, 0.95),             /*   Azul muy oscuro casi opaco */
                rgba(15, 30, 60, 0.9)               /*   Azul oscuro un poco más claro */
            );
            border: 1px solid rgba(0, 120, 215, 0.3); /* Borde azul brillante semi-transparente */
            border-radius: 16px;                    /* Esquinas redondeadas de 16px */
            padding: 45px 40px;                     /* Espacio interno: 45px vertical, 40px horizontal */
            box-shadow:                             /* Triple sombra para efecto de profundidad y brillo: */
                0 0 40px rgba(0, 80, 160, 0.15),    /*   Sombra externa azul difusa */
                0 0 80px rgba(0, 60, 120, 0.1),     /*   Sombra externa más amplia y tenue */
                inset 0 1px 0 rgba(0, 150, 255, 0.1); /* Línea brillante interna en el borde superior */
            position: relative;                     /* Permite posicionar pseudo-elementos hijos con absolute */
            animation: containerEntry 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; /* Animación de entrada con rebote suave */
        }

        /* Animación: el contenedor sube desde abajo con fade-in */
        @keyframes containerEntry {
            from {
                opacity: 0;                         /* Comienza completamente invisible */
                transform: translateY(30px) scale(0.97); /* Comienza 30px más abajo y 3% más pequeño */
            }
            to {
                opacity: 1;                         /* Termina completamente visible */
                transform: translateY(0) scale(1);  /* Termina en posición normal y tamaño real */
            }
        }

        /* ================================================================
           LÍNEA NEÓN SUPERIOR
           Decoración brillante en la parte de arriba del contenedor
           ================================================================ */
        .container::before {
            content: '';                            /* Genera el pseudo-elemento */
            position: absolute;                     /* Posicionado respecto al contenedor padre */
            top: -1px;                              /* 1px por encima del borde superior del contenedor */
            left: 40px;                             /* Comienza a 40px del borde izquierdo */
            right: 40px;                            /* Termina a 40px del borde derecho */
            height: 2px;                            /* Grosor de la línea: 2 píxeles */
            background: linear-gradient(            /* Degradado horizontal: */
                90deg,                              /*   De izquierda a derecha */
                transparent,                        /*   Empieza transparente */
                #0078d7,                            /*   Pasa a azul */
                #00b4ff,                            /*   Llega a celeste brillante en el centro */
                #0078d7,                            /*   Regresa a azul */
                transparent                         /*   Termina transparente */
            );
            border-radius: 2px;                     /* Esquinas redondeadas de la línea */
            animation: glowLine 3s ease-in-out infinite; /* Pulsa de brillo cada 3 segundos */
        }

        /* Animación: la línea neón pulsa en intensidad */
        @keyframes glowLine {
            0%, 100% {
                opacity: 0.6;                       /* Comienza y termina con brillo reducido */
            }
            50% {
                opacity: 1;                         /* A la mitad del ciclo brilla al máximo */
                box-shadow: 0 0 15px rgba(0, 120, 215, 0.6); /* Agrega halo de luz azul alrededor */
            }
        }

        /* ================================================================
           TÍTULO PRINCIPAL (H1)
           Texto "Crear Usuario" con estilo futurista
           ================================================================ */
        h1 {
            font-family: 'Orbitron', sans-serif;    /* Fuente futurista/geométrica para el título */
            text-align: center;                     /* Centra el título horizontalmente */
            font-size: 1.8rem;                      /* Tamaño de fuente: 1.8 veces el tamaño raíz */
            font-weight: 900;                       /* Peso de fuente: la más gruesa disponible */
            color: #e0f0ff;                         /* Color de texto: blanco con tinte azul claro */
            text-transform: uppercase;              /* Convierte todas las letras a MAYÚSCULAS */
            letter-spacing: 3px;                    /* Agrega 3px de espacio entre cada letra */
            margin-bottom: 35px;                    /* 35px de separación debajo del título */
            text-shadow: 0 0 20px rgba(0, 150, 255, 0.4); /* Halo/brillo azul detrás del texto */
        }

        /* Línea decorativa debajo del título */
        h1::after {
            content: '';                            /* Genera el pseudo-elemento */
            display: block;                         /* Se muestra como elemento de bloque */
            width: 60px;                            /* Ancho de la línea: 60px */
            height: 3px;                            /* Alto de la línea: 3px */
            background: linear-gradient(            /* Degradado horizontal: */
                90deg,                              /*   De izquierda a derecha */
                transparent,                        /*   Empieza transparente */
                #0078d7,                            /*   Centro azul brillante */
                transparent                         /*   Termina transparente */
            );
            margin: 12px auto 0;                    /* 12px arriba, centrado horizontal, 0 abajo */
            border-radius: 3px;                     /* Esquinas redondeadas */
        }

        /* ================================================================
           GRUPO DE CAMPO (mb-3)
           Contenedor de cada par label + input
           ================================================================ */
        .mb-3 {
            margin-bottom: 22px;                    /* 22px de espacio debajo de cada grupo de campo */
        }

        /* ================================================================
           ETIQUETAS DE CAMPO (LABEL)
           Texto que identifica cada input: "Nombre", "Email", etc.
           ================================================================ */
        label {
            display: block;                         /* La etiqueta ocupa toda la línea (no inline) */
            font-family: 'Orbitron', sans-serif;    /* Fuente futurista para las etiquetas */
            font-size: 0.75rem;                     /* Tamaño reducido: 0.75rem */
            font-weight: 700;                       /* Negrita */
            color: #80c8ff;                         /* Color azul claro brillante */
            text-transform: uppercase;              /* Todo en MAYÚSCULAS */
            letter-spacing: 2px;                    /* 2px de espacio entre letras */
            margin-bottom: 8px;                     /* 8px de separación entre la etiqueta y el input */
        }

        /* ================================================================
           CAMPOS DE ENTRADA (INPUT)
           Los cuadros de texto donde el usuario escribe
           ================================================================ */
        .form-control {
            width: 100%;                            /* Ocupa el 100% del ancho del contenedor padre */
            padding: 14px 18px;                     /* Espacio interno: 14px arriba/abajo, 18px a los lados */
            font-family: 'Rajdhani', sans-serif;    /* Fuente moderna para el texto que escribe el usuario */
            font-size: 1rem;                        /* Tamaño de texto: 1rem (16px normalmente) */
            font-weight: 500;                       /* Peso de fuente: medio */
            color: #d0e8ff;                         /* Color del texto escrito: azul claro brillante */
            background: rgba(0, 20, 50, 0.6);      /* Fondo del campo: azul muy oscuro, 60% opaco */
            border: 1px solid rgba(0, 100, 180, 0.3); /* Borde azul sutil semi-transparente */
            border-radius: 8px;                     /* Esquinas redondeadas de 8px */
            outline: none;                          /* Elimina el borde amarillo/azul que pone el navegador al enfocar */
            transition: all 0.3s ease;              /* Todas las propiedades cambian suavemente en 0.3 segundos */
        }

        /* Estado HOVER: cuando el mouse pasa sobre el input */
        .form-control:hover {
            border-color: rgba(0, 120, 215, 0.5);  /* El borde se vuelve un poco más visible/brillante */
        }

        /* Estado FOCUS: cuando el usuario hace clic dentro del input */
        .form-control:focus {
            border-color: #0078d7;                  /* El borde cambia a azul brillante sólido */
            background: rgba(0, 30, 70, 0.7);      /* El fondo se aclara ligeramente (más azul) */
            box-shadow:                             /* Doble sombra de brillo al enfocar: */
                0 0 15px rgba(0, 120, 215, 0.2),    /*   Halo externo azul suave */
                inset 0 0 10px rgba(0, 80, 160, 0.1); /* Brillo interno azul muy sutil */
        }

        /* Texto placeholder (texto gris de ejemplo dentro del input) */
        .form-control::placeholder {
            color: rgba(128, 180, 230, 0.4);        /* Azul claro con solo 40% de opacidad */
        }

        /* ================================================================
           CONTENEDOR DE SUBIDA DE FOTO (WRAPPER)
           Envuelve la vista previa + dropzone + nombre de archivo
           Lo organiza verticalmente y lo centra
           ================================================================ */
        .photo-upload-wrapper {
            display: flex;                          /* Activa flexbox para organizar los hijos */
            flex-direction: column;                 /* Apila los elementos verticalmente (uno debajo del otro) */
            align-items: center;                    /* Centra todos los hijos horizontalmente */
            gap: 15px;                              /* 15px de espacio entre cada hijo (preview, dropzone, filename) */
        }

        /* ================================================================
           VISTA PREVIA CIRCULAR DE LA FOTO
           Círculo que muestra el ícono de usuario o la foto seleccionada
           ================================================================ */
        .photo-preview {
            width: 120px;                           /* Ancho fijo de 120px para el círculo */
            height: 120px;                          /* Alto fijo de 120px (igual que ancho = círculo perfecto) */
            border-radius: 50%;                     /* Convierte el cuadrado en un círculo perfecto */
            border: 2px solid rgba(0, 120, 215, 0.4); /* Borde azul brillante semi-transparente de 2px */
            background: rgba(0, 20, 50, 0.5);      /* Fondo azul oscuro semi-transparente */
            display: flex;                          /* Flexbox para centrar el ícono interior */
            align-items: center;                    /* Centra el ícono verticalmente dentro del círculo */
            justify-content: center;                /* Centra el ícono horizontalmente dentro del círculo */
            overflow: hidden;                       /* CLAVE: oculta cualquier parte de la imagen que sobresalga */
            transition: all 0.4s ease;              /* Transición suave de 0.4s para cambios de estado */
            position: relative;                     /* Permite posicionar la imagen con absolute dentro */
            flex-shrink: 0;                         /* Evita que flexbox comprima este elemento */
            box-shadow:                             /* Sombra para darle profundidad al círculo: */
                0 0 20px rgba(0, 100, 180, 0.15),   /*   Halo externo azul suave */
                inset 0 0 15px rgba(0, 60, 120, 0.15); /* Brillo interno azul sutil */
            animation: previewPulse 4s ease-in-out infinite alternate; /* Pulso de brillo continuo */
        }

        /* Animación: el borde del círculo de preview pulsa suavemente */
        @keyframes previewPulse {
            0% {
                border-color: rgba(0, 120, 215, 0.3);  /* Borde más tenue al inicio */
                box-shadow: 0 0 15px rgba(0, 100, 180, 0.1); /* Halo suave */
            }
            100% {
                border-color: rgba(0, 150, 255, 0.5);  /* Borde más brillante al final */
                box-shadow: 0 0 25px rgba(0, 120, 215, 0.25); /* Halo más intenso */
            }
        }

        /* Ícono de usuario dentro del círculo (se muestra cuando NO hay foto) */
        .photo-preview i {
            font-size: 2.5rem;                      /* Tamaño grande del ícono de usuario */
            color: rgba(0, 120, 215, 0.3);          /* Color azul tenue semi-transparente */
            transition: all 0.3s ease;              /* Transición suave para cambios */
        }

        /* La imagen dentro del círculo de preview */
        .photo-preview img {
            width: 100%;                            /* La imagen ocupa todo el ancho del círculo */
            height: 100%;                           /* La imagen ocupa todo el alto del círculo */
            object-fit: cover;                      /* Recorta la imagen para llenar el círculo sin deformarla */
            display: none;                          /* OCULTA por defecto (se muestra cuando hay foto con JS) */
            position: absolute;                     /* Posición absoluta dentro del círculo */
            top: 0;                                 /* Desde el borde superior del círculo */
            left: 0;                                /* Desde el borde izquierdo del círculo */
            border-radius: 50%;                     /* Mantiene la forma circular en la imagen */
        }

        /* Cuando el usuario selecciona una foto: se aplica la clase "has-image" */
        .photo-preview.has-image {
            border-color: #0078d7;                  /* El borde cambia a azul brillante sólido */
            box-shadow: 0 0 30px rgba(0, 120, 215, 0.35); /* Halo de brillo azul más intenso */
            animation: none;                        /* Detiene el pulso (ya tiene imagen, no necesita llamar atención) */
        }

        /* Cuando tiene imagen: muestra el <img> */
        .photo-preview.has-image img {
            display: block;                         /* Hace visible la imagen seleccionada */
        }

        /* Cuando tiene imagen: oculta el ícono de usuario */
        .photo-preview.has-image i {
            display: none;                          /* Esconde el ícono ya que la foto lo reemplaza */
        }

        /* ================================================================
           ZONA DE ARRASTRAR Y SOLTAR (DROPZONE)
           Área punteada donde el usuario arrastra su foto o hace clic
           ================================================================ */
        .photo-dropzone {
            width: 100%;                            /* Ocupa todo el ancho del contenedor padre */
            padding: 20px;                          /* 20px de espacio interno en todos los lados */
            border: 2px dashed rgba(0, 100, 180, 0.3); /* Borde PUNTEADO azul semi-transparente */
            border-radius: 10px;                    /* Esquinas redondeadas de 10px */
            background: rgba(0, 20, 50, 0.3);      /* Fondo azul oscuro muy sutil (30% opaco) */
            text-align: center;                     /* Centra todo el texto y contenido */
            cursor: pointer;                        /* Cursor de manito (indica que se puede hacer clic) */
            transition: all 0.3s ease;              /* Transición suave para hover y drag */
            position: relative;                     /* Necesario para posicionar el input file oculto */
        }

        /* HOVER: cuando el mouse pasa sobre la dropzone */
        .photo-dropzone:hover {
            border-color: rgba(0, 140, 220, 0.5);  /* El borde punteado se vuelve más brillante */
            background: rgba(0, 30, 60, 0.4);      /* El fondo se aclara ligeramente */
            box-shadow: 0 0 20px rgba(0, 100, 180, 0.1); /* Aparece un halo de brillo suave */
        }

        /* DRAG-OVER: cuando el usuario arrastra un archivo ENCIMA de la zona */
        .photo-dropzone.drag-over {
            border-color: #0078d7;                  /* El borde se vuelve azul brillante sólido */
            background: rgba(0, 40, 80, 0.5);      /* El fondo se ilumina más */
            box-shadow: 0 0 30px rgba(0, 120, 215, 0.2); /* Halo de brillo más intenso */
            transform: scale(1.02);                 /* Se agranda un 2% (efecto visual de "recibir") */
        }

        /* Ícono de nube con flecha hacia arriba */
        .photo-dropzone-icon {
            font-size: 1.8rem;                      /* Tamaño del ícono: 1.8rem */
            color: rgba(0, 150, 255, 0.4);          /* Color azul claro semi-transparente */
            margin-bottom: 8px;                     /* 8px de separación debajo del ícono */
            transition: all 0.3s ease;              /* Transición suave */
        }

        /* El ícono se ilumina y flota al hacer hover sobre la dropzone */
        .photo-dropzone:hover .photo-dropzone-icon {
            color: rgba(0, 150, 255, 0.7);          /* El ícono se vuelve más brillante */
            transform: translateY(-3px);            /* Sube 3px (efecto de flotación) */
        }

        /* Texto principal: "Arrastra tu foto aquí o selecciona un archivo" */
        .photo-dropzone-text {
            font-size: 0.95rem;                     /* Tamaño de texto: 0.95rem */
            color: rgba(160, 200, 240, 0.6);        /* Color azul pálido semi-transparente */
            font-weight: 500;                       /* Peso medio */
            line-height: 1.5;                       /* Altura de línea 1.5 para legibilidad */
        }

        /* Texto secundario: "Formatos: JPG, PNG..." */
        .photo-dropzone-hint {
            font-size: 0.8rem;                      /* Tamaño más pequeño que el texto principal */
            color: rgba(128, 180, 230, 0.35);       /* Azul muy tenue (casi invisible) */
            margin-top: 6px;                        /* 6px de separación arriba */
            font-style: italic;                     /* Texto en cursiva */
        }

        /* Enlace "selecciona un archivo" (texto clickeable) */
        .photo-dropzone-link {
            color: #0090ff;                         /* Color azul brillante para resaltar como enlace */
            text-decoration: underline;             /* Subrayado para indicar que es clickeable */
            font-weight: 600;                       /* Semi-negrita */
            transition: color 0.3s ease;            /* Transición suave del color */
        }

        /* Hover del enlace: se aclara */
        .photo-dropzone-link:hover {
            color: #40b0ff;                         /* Azul más claro al pasar el mouse */
        }

        /* ================================================================
           INPUT FILE OCULTO
           El input real de archivo, invisible pero cubre toda la dropzone
           para que cualquier clic en la zona abra el selector de archivos
           ================================================================ */
        .photo-input-hidden {
            position: absolute;                     /* Se posiciona encima de toda la dropzone */
            top: 0;                                 /* Desde la esquina superior */
            left: 0;                                /* Desde la esquina izquierda */
            width: 100%;                            /* Mismo ancho que la dropzone */
            height: 100%;                           /* Mismo alto que la dropzone */
            opacity: 0;                             /* Completamente invisible (pero sigue siendo clickeable) */
            cursor: pointer;                        /* Cursor de manito al pasar encima */
        }

        /* ================================================================
           NOMBRE DEL ARCHIVO SELECCIONADO
           Muestra el nombre del archivo elegido debajo de la dropzone
           ================================================================ */
        .photo-filename {
            font-size: 0.85rem;                     /* Tamaño pequeño de texto */
            color: #60b0e0;                         /* Color azul claro */
            font-weight: 500;                       /* Peso medio */
            display: none;                          /* OCULTO por defecto (se muestra con JavaScript) */
            align-items: center;                    /* Centra verticalmente ícono y texto */
            gap: 6px;                               /* 6px de espacio entre el ícono y el nombre */
        }

        /* Cuando tiene la clase "visible": se muestra */
        .photo-filename.visible {
            display: flex;                          /* Se hace visible como flexbox */
        }

        /* Ícono de imagen junto al nombre del archivo */
        .photo-filename i {
            color: #0078d7;                         /* Ícono en azul brillante */
        }

        /* ================================================================
           BARRA DE BOTONES
           Contenedor flex que agrupa los botones "Guardar" y "Volver"
           ================================================================ */
        .btn-bar {
            display: flex;                          /* Activa flexbox para alinear los botones */
            gap: 15px;                              /* 15px de espacio entre cada botón */
            justify-content: center;                /* Centra los botones horizontalmente */
            margin-top: 35px;                       /* 35px de margen superior (separa del último campo) */
            flex-wrap: wrap;                        /* Permite que los botones salten a nueva línea si no caben */
        }

        /* ================================================================
           ESTILOS COMPARTIDOS PARA AMBOS BOTONES
           Propiedades comunes de los botones Guardar y Volver
           ================================================================ */
        .btn-success,
        .btn-secondary {
            font-family: 'Rajdhani', sans-serif;    /* Fuente moderna para los botones */
            font-size: 1rem;                        /* Tamaño de texto: 1rem */
            font-weight: 600;                       /* Peso semi-negrita */
            padding: 12px 28px;                     /* Espacio interno: 12px vertical, 28px horizontal */
            border: 1px solid;                      /* Borde sólido de 1px (el color se define por botón) */
            border-radius: 8px;                     /* Esquinas redondeadas de 8px */
            cursor: pointer;                        /* El cursor cambia a manito al pasar encima */
            text-decoration: none;                  /* Elimina subrayado (importante para el <a> de Volver) */
            display: inline-flex;                   /* Flexbox inline: permite alinear emoji + texto */
            align-items: center;                    /* Centra verticalmente emoji y texto */
            gap: 8px;                               /* 8px de espacio entre emoji y texto */
            transition: all 0.3s ease;              /* Todos los cambios se animan suavemente en 0.3s */
            letter-spacing: 1px;                    /* 1px de espacio extra entre letras */
            text-transform: uppercase;              /* Todo el texto en MAYÚSCULAS */
            position: relative;                     /* Permite posicionar el pseudo-elemento del brillo */
            overflow: hidden;                       /* Oculta el efecto de brillo cuando sale del botón */
        }

        /* ================================================================
           EFECTO DE BRILLO DESLIZANTE (SHINE)
           Un destello que cruza el botón al pasar el mouse
           ================================================================ */
        .btn-success::after,
        .btn-secondary::after {
            content: '';                            /* Genera el pseudo-elemento */
            position: absolute;                     /* Posición absoluta dentro del botón */
            top: 0;                                 /* Desde arriba del botón */
            left: -100%;                            /* Empieza fuera del botón (a la izquierda) */
            width: 100%;                            /* Mismo ancho que el botón */
            height: 100%;                           /* Mismo alto que el botón */
            background: linear-gradient(            /* Gradiente del destello: */
                90deg,                              /*   De izquierda a derecha */
                transparent,                        /*   Empieza transparente */
                rgba(255, 255, 255, 0.08),          /*   Centro con blanco muy sutil */
                transparent                         /*   Termina transparente */
            );
            transition: left 0.5s ease;             /* La posición se anima en 0.5s al hacer hover */
        }

        /* Al pasar el mouse, el destello cruza el botón */
        .btn-success:hover::after,
        .btn-secondary:hover::after {
            left: 100%;                             /* Se mueve de izquierda a derecha cruzando el botón */
        }

        /* ================================================================
           BOTÓN GUARDAR (SUCCESS / PRIMARIO)
           Botón azul brillante para la acción principal
           ================================================================ */
        .btn-success {
            background: linear-gradient(            /* Degradado diagonal del fondo: */
                135deg,                             /*   Dirección diagonal */
                #004080,                            /*   Azul oscuro */
                #0070c0                             /*   Azul medio brillante */
            );
            color: #ffffff;                         /* Texto blanco puro */
            border-color: #0090ff;                  /* Borde azul brillante */
        }

        /* Hover del botón Guardar */
        .btn-success:hover {
            background: linear-gradient(            /* El degradado se aclara: */
                135deg,                             /*   Misma dirección diagonal */
                #0060b8,                            /*   Azul más claro */
                #0090ff                             /*   Azul brillante */
            );
            box-shadow:                             /* Doble sombra de brillo: */
                0 0 25px rgba(0, 120, 215, 0.5),    /*   Halo azul brillante */
                0 4px 15px rgba(0, 80, 160, 0.3);   /*   Sombra inferior con profundidad */
            transform: translateY(-2px);            /* Sube 2px (efecto de elevación flotante) */
        }

        /* ================================================================
           BOTÓN VOLVER (SECUNDARIO)
           Botón más discreto para la acción secundaria
           ================================================================ */
        .btn-secondary {
            background: linear-gradient(            /* Degradado diagonal más sutil: */
                135deg,                             /*   Dirección diagonal */
                rgba(0, 40, 70, 0.6),               /*   Azul oscuro al 60% de opacidad */
                rgba(0, 55, 95, 0.5)                /*   Azul medio al 50% de opacidad */
            );
            color: #a0d0ff;                         /* Texto azul claro */
            border-color: rgba(0, 100, 180, 0.4);  /* Borde azul semi-transparente */
        }

        /* Hover del botón Volver */
        .btn-secondary:hover {
            background: linear-gradient(            /* El degradado se ilumina: */
                135deg,                             /*   Misma dirección diagonal */
                rgba(0, 55, 100, 0.7),              /*   Azul medio al 70% (más visible) */
                rgba(0, 75, 130, 0.6)               /*   Azul más claro al 60% */
            );
            border-color: rgba(0, 140, 220, 0.6);  /* El borde se vuelve más brillante */
            box-shadow: 0 0 20px rgba(0, 100, 180, 0.3); /* Halo de brillo azul */
            transform: translateY(-2px);            /* Sube 2px */
            color: #ffffff;                         /* El texto cambia a blanco puro */
        }

        /* ================================================================
           EFECTO ACTIVE (AL HACER CLIC / PRESIONAR)
           ================================================================ */
        .btn-success:active,
        .btn-secondary:active {
            transform: translateY(0);               /* Regresa a la posición original (se "hunde") */
            box-shadow: 0 0 10px rgba(0, 80, 160, 0.3); /* Sombra más pequeña al presionar */
        }

        /* ================================================================
           RESPONSIVE: PANTALLAS MENORES A 768px
           ================================================================ */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;                 /* Reduce el espacio interno del contenedor */
            }

            h1 {
                font-size: 1.3rem;                  /* Reduce el tamaño del título */
                letter-spacing: 2px;                /* Reduce el espacio entre letras */
            }

            label {
                font-size: 0.7rem;                  /* Reduce el tamaño de las etiquetas */
            }

            .form-control {
                padding: 12px 14px;                 /* Reduce el espacio interno de los inputs */
                font-size: 0.95rem;                 /* Reduce ligeramente el tamaño de texto */
            }

            .photo-preview {
                width: 100px;                       /* Círculo de preview más pequeño en móvil */
                height: 100px;                      /* Mantiene la proporción circular */
            }

            .btn-bar {
                flex-direction: column;             /* Apila los botones verticalmente */
                align-items: stretch;               /* Los botones se estiran al ancho completo */
            }

            .btn-success,
            .btn-secondary {
                justify-content: center;            /* Centra el contenido dentro del botón */
                padding: 12px 20px;                 /* Ajusta el espacio interno */
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Crear Usuario</h1>

    <!-- enctype="multipart/form-data" es OBLIGATORIO para subir archivos -->
    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- ===== CAMPO DE FOTO ===== -->
        <div class="mb-3">
            <label>Foto de Perfil</label>
            <div class="photo-upload-wrapper">
                <!-- Vista previa circular -->
                <div class="photo-preview" id="photoPreview">
                    <i class="fa-solid fa-user"></i>
                    <img id="previewImg" src="" alt="Vista previa">
                </div>
                <!-- Zona de arrastrar y soltar -->
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
                <!-- Nombre del archivo seleccionado -->
                <div class="photo-filename" id="photoFilename">
                    <i class="fa-solid fa-image"></i>
                    <span id="filenameText"></span>
                </div>
            </div>
        </div> <!-- ← ESTE </div> FALTABA EN TU CÓDIGO ORIGINAL -->

        <!-- ===== CAMPOS DE TEXTO ===== -->
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="btn-bar">
            <button type="submit" class="btn-success">✅ Guardar</button>
            <a href="{{ route('usuarios.index') }}" class="btn-secondary">↩️ Volver</a>
        </div>
    </form>
</div>

<!-- ===== JAVASCRIPT: Vista previa y Drag & Drop ===== -->
<script>
    // Obtiene referencias a los elementos del DOM por su ID
    const photoInput = document.getElementById('photoInput');       // El input file oculto
    const photoPreview = document.getElementById('photoPreview');   // El círculo de vista previa
    const previewImg = document.getElementById('previewImg');       // La etiqueta <img> dentro del círculo
    const photoDropzone = document.getElementById('photoDropzone'); // La zona de drag & drop
    const photoFilename = document.getElementById('photoFilename'); // El contenedor del nombre de archivo
    const filenameText = document.getElementById('filenameText');   // El <span> con el texto del nombre

    // Cuando el usuario selecciona un archivo con el input file
    photoInput.addEventListener('change', function() {
        handleFile(this.files[0]);                  // Procesa el primer archivo seleccionado
    });

    // === EVENTOS DE DRAG & DROP ===

    // DRAGOVER: cuando un archivo se arrastra SOBRE la zona
    photoDropzone.addEventListener('dragover', function(e) {
        e.preventDefault();                         // Previene el comportamiento por defecto del navegador
        this.classList.add('drag-over');             // Agrega la clase CSS que ilumina la zona
    });

    // DRAGLEAVE: cuando el archivo SALE de la zona
    photoDropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();                         // Previene el comportamiento por defecto
        this.classList.remove('drag-over');          // Quita la clase visual de "arrastrando"
    });

    // DROP: cuando se SUELTA el archivo en la zona
    photoDropzone.addEventListener('drop', function(e) {
        e.preventDefault();                         // Previene que el navegador abra el archivo
        this.classList.remove('drag-over');          // Quita la clase visual
        const file = e.dataTransfer.files[0];       // Obtiene el archivo que se soltó
        if (file && file.type.startsWith('image/')) { // Verifica que sea una imagen
            const dataTransfer = new DataTransfer(); // Crea un nuevo DataTransfer
            dataTransfer.items.add(file);            // Agrega el archivo
            photoInput.files = dataTransfer.files;   // Asigna al input para que se envíe con el form
            handleFile(file);                        // Muestra la vista previa
        }
    });

    // FUNCIÓN: procesa el archivo y muestra la vista previa
    function handleFile(file) {
        if (!file) return;                          // Si no hay archivo, no hace nada

        filenameText.textContent = file.name;       // Muestra el nombre del archivo
        photoFilename.classList.add('visible');      // Hace visible el contenedor del nombre

        const reader = new FileReader();            // Crea un lector de archivos
        reader.onload = function(e) {               // Cuando termina de leer:
            previewImg.src = e.target.result;       //   Asigna la imagen al <img>
            photoPreview.classList.add('has-image'); //   Activa los estilos de "tiene imagen"
        };
        reader.readAsDataURL(file);                 // Lee el archivo como URL de datos (base64)
    }
</script>

</body>
</html>