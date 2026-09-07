<div class="container">
    <h1>Lista de Usuarios</h1>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
 <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
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
        /* ===== ANIMATED BACKGROUND ===== */
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
        /* Grid lines background */
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
        /* ===== CONTAINER ===== */
        .container {
            width: 100%;
            max-width: 950px;
            background: linear-gradient(135deg, rgba(10, 20, 40, 0.95), rgba(15, 30, 60, 0.9));
            border: 1px solid rgba(0, 120, 215, 0.3);
            border-radius: 16px;
            padding: 40px;
            box-shadow:
                0 0 40px rgba(0, 80, 160, 0.15),
                0 0 80px rgba(0, 60, 120, 0.1),
                inset 0 1px 0 rgba(0, 150, 255, 0.1);
            position: relative;
            animation: containerEntry 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
        }
        @keyframes containerEntry {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        /* Glowing top border */
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
        /* ===== TITLE ===== */
        h1 {
            font-family: 'Orbitron', sans-serif;
            text-align: center;
            font-size: 2rem;
            font-weight: 900;
            color: #e0f0ff;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(0, 150, 255, 0.4);
            position: relative;
        }
        h1::after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #0078d7, transparent);
            margin: 12px auto 0;
            border-radius: 3px;
        }
        /* ===== BUTTON BAR ===== */
        .btn-bar {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        /* ===== BUTTONS ===== */
        .btn-inicio,
        .btn-primary {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            padding: 10px 24px;
            border: 1px solid rgba(0, 120, 215, 0.5);
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
        .btn-inicio {
            background: linear-gradient(135deg, rgba(0, 60, 120, 0.6), rgba(0, 40, 80, 0.8));
            color: #a0d4ff;
        }
        .btn-inicio a {
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-inicio:hover {
            background: linear-gradient(135deg, rgba(0, 80, 160, 0.8), rgba(0, 60, 120, 0.9));
            border-color: #0078d7;
            box-shadow: 0 0 20px rgba(0, 120, 215, 0.3);
            transform: translateY(-2px);
            color: #ffffff;
        }
        .btn-inicio:hover a {
            color: #ffffff;
        }
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
        /* ===== ALERT ===== */
        .alert-success {
            background: linear-gradient(135deg, rgba(0, 80, 60, 0.4), rgba(0, 60, 40, 0.3));
            border: 1px solid rgba(0, 200, 150, 0.3);
            color: #80ffcc;
            padding: 14px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            letter-spacing: 0.5px;
            animation: alertSlide 0.5s ease-out;
        }
        @keyframes alertSlide {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* ===== TABLE ===== */
        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 10px;
            border: 1px solid rgba(0, 100, 180, 0.2);
        }
        .table thead {
            background: linear-gradient(135deg, rgba(0, 50, 100, 0.8), rgba(0, 70, 140, 0.6));
        }
        .table thead th {
            font-family: 'Orbitron', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            color: #80c8ff;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 16px 20px;
            text-align: left;
            border-bottom: 2px solid rgba(0, 120, 215, 0.3);
        }
        .table tbody tr {
            transition: all 0.3s ease;
            animation: rowEntry 0.5s ease-out both;
        }
        .table tbody tr:nth-child(even) {
            background: rgba(0, 40, 80, 0.2);
        }
        .table tbody tr:nth-child(odd) {
            background: rgba(0, 30, 60, 0.1);
        }
        .table tbody tr:hover {
            background: rgba(0, 80, 160, 0.25);
            box-shadow: inset 0 0 30px rgba(0, 100, 200, 0.1);
        }
        @keyframes rowEntry {
            from {
                opacity: 0;
                transform: translateX(-15px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .table tbody td {
            padding: 14px 20px;
            color: #c0d8f0;
            font-size: 1rem;
            font-weight: 400;
            border-bottom: 1px solid rgba(0, 80, 160, 0.1);
            vertical-align: middle;
        }
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        /* ===== ACTION BUTTONS ===== */
        .btn-warning,
        .btn-danger {
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 7px 16px;
            border-radius: 6px;
            border: 1px solid;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .btn-warning {
            background: linear-gradient(135deg, rgba(0, 80, 140, 0.5), rgba(0, 100, 180, 0.4));
            color: #80d0ff;
            border-color: rgba(0, 150, 255, 0.3);
        }
        .btn-warning:hover {
            background: linear-gradient(135deg, rgba(0, 100, 180, 0.7), rgba(0, 120, 200, 0.6));
            border-color: #0090ff;
            box-shadow: 0 0 15px rgba(0, 130, 220, 0.3);
            transform: translateY(-1px);
        }
        .btn-danger {
            background: linear-gradient(135deg, rgba(120, 20, 30, 0.5), rgba(160, 30, 40, 0.4));
            color: #ff8090;
            border-color: rgba(200, 50, 60, 0.3);
        }
        .btn-danger:hover {
            background: linear-gradient(135deg, rgba(160, 30, 40, 0.7), rgba(200, 40, 50, 0.6));
            border-color: rgba(255, 60, 70, 0.6);
            box-shadow: 0 0 15px rgba(200, 40, 50, 0.3);
            transform: translateY(-1px);
        }
        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .container {
                padding: 25px 20px;
            }
            h1 {
                font-size: 1.4rem;
                letter-spacing: 2px;
            }
            .table thead th {
                font-size: 0.7rem;
                padding: 12px 10px;
            }
            .table tbody td {
                padding: 10px;
                font-size: 0.9rem;
            }
            .btn-bar {
                flex-direction: column;
                align-items: center;
            }
            .btn-warning, .btn-danger {
                font-size: 0.75rem;
                padding: 6px 10px;
            }
        }  
        .photo-preview img {
    width: 100% !important;           /* Fuerza que ocupe solo el ancho del círculo */
    height: 100% !important;          /* Fuerza que ocupe solo el alto del círculo */
    max-width: 120px !important;      /* Nunca más grande que el contenedor */
    max-height: 120px !important;     /* Nunca más grande que el contenedor */
    object-fit: cover !important;     /* Recorta la imagen para llenar el círculo sin deformarse */
    display: none;                    /* Oculta por defecto */
    border-radius: 50%;               /* Mantiene la forma circular */
    position: absolute;               /* Se posiciona dentro del contenedor */
    top: 0;                           /* Desde arriba */
    left: 0;                          /* Desde la izquierda */
}
.photo-preview {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 2px solid rgba(0, 120, 215, 0.4);
    background: rgba(0, 20, 50, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;                  /* CLAVE: oculta lo que sobresalga del círculo */
    position: relative;                /* CLAVE: para que el img absolute funcione */
    transition: all 0.4s ease;
    flex-shrink: 0;                    /* Evita que el flexbox lo encoja */
}
    </style>
<button class="btn-inicio">
    <a href="{{ route('login') }}">
        <i class="fa-solid fa-house"></i>
        Inicio</a>
</button>

    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">➕ Nuevo Usuario</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead >
            <tr>
                <th>Num.</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
    <td>
        @if($usuario->foto)
            <img src="{{ asset('storage/' . $usuario->foto) }}"
                 alt="Foto de {{ $usuario->name }}"
                 width="60"
                 height="60"
                 style="object-fit: cover; border-radius: 50%;">
        @else
            Sin foto
        @endif
    </td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">✏️ Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>