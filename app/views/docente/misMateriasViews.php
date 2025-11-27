<?php
if (!isset($_SESSION)) session_start();
$nombreUsuario = $_SESSION['usuario']['nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mis Materias | Docente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
:root {
    --color-principal: #06402B;
    --color-hover: #075238;
    --fondo: #f4f6f9;
}

body { background: var(--fondo); display:flex; }

/* SIDEBAR */
.sidebar {
    width: 250px; background: var(--color-principal); color:white;
    min-height:100vh; position:fixed;
}
.sidebar .brand { padding:20px; text-align:center; font-size:1.35rem; font-weight:bold; }
.sidebar a { color:white; padding:12px 20px; display:block; text-decoration:none; }
.sidebar a:hover { background:var(--color-hover); }
.menu-title { padding:10px 20px; opacity:.7; font-size:.8rem; }

/* CONTENT */
.content { margin-left:250px; width: calc(100% - 250px); }

.navbar { background:var(--color-principal); }

.btn-refresh {
    background:var(--color-principal); color:white;
}
.btn-refresh:hover { background:var(--color-hover); }
/* TARJETAS */
.card-mini {
    border-left: 4px solid var(--color-principal);
}
/* FORZAR FOOTER Y LOGOUT HASTA ABAJO DEL SIDEBAR */
.sidebar {
    display: flex;
    flex-direction: column;
}

.sidebar-footer {
    font-size: 0.85rem;
    color: #cfcfcf;
    padding: 12px;
    border-top: 1px solid rgba(255,255,255,0.2);
}
.nav-link.text-danger:hover {
    background: rgba(255, 0, 0, 0.15);
}
</style>
</head>

<body>

<div class="sidebar d-flex flex-column">

    <div class="brand">
        <i class="bi bi-mortarboard-fill me-2"></i> Docente
    </div>

    <p class="menu-title">Navegación</p>

    <a href="<?= BASE_URL ?>index.php?action=dashboard_docente">
        <i class="bi bi-house-door-fill me-2"></i> Inicio
    </a>

    <p class="menu-title">Mis actividades</p>

    <a href="<?= BASE_URL ?>index.php?action=misGrupos">
        <i class="bi bi-people-fill me-2"></i> Mis grupos
    </a>

    <a href="<?= BASE_URL ?>index.php?action=misMateriasDocente">
        <i class="bi bi-journal-bookmark-fill me-2"></i> Mis materias
    </a>

    <a href="<?= BASE_URL ?>index.php?action=capturaCalificaciones">
        <i class="bi bi-pencil-square me-2"></i> Capturar calificaciones
    </a>

    <a href="<?= BASE_URL ?>index.php?action=calificacionesGrupo">
        <i class="bi bi-file-earmark-bar-graph-fill me-2"></i> Reporte de calificaciones
    </a>

    <!-- CERRAR SESIÓN ABAJO -->
    <div class="mt-auto">
        <a href="<?= BASE_URL ?>index.php?action=logout" class="nav-link text-danger">
            <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
        </a>

        <!-- FOOTER DEL SIDEBAR -->
        <div class="sidebar-footer text-center mt-3">
            © 2025 Sistema de Gestión Escolar
        </div>
    </div>

</div>

<div class="content">

    <nav class="navbar navbar-dark px-4">
        <span class="navbar-brand">Sistema de Gestión Escolar</span>

        <div class="text-white fw-semibold">
            <i class="bi bi-person-circle me-1"></i> <?= $nombreUsuario ?>
            <span class="text-white-50">(Docente)</span>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold" style="color:var(--color-principal);">
                <i class="bi bi-journal-bookmark-fill me-2"></i> Mis materias
            </h3>
        </div>

        <div class="card shadow-sm">
            <div class="card-header text-white" style="background:var(--color-principal);">
                Materias asignadas
            </div>

            <div class="card-body p-0">
                <table class="table table-hover mb-0 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Materia</th>
                            <th>Grupo</th>
                            <th>Carrera</th>
                            <th>Periodo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($m = $materias->fetch_assoc()): ?>
                        <tr>
                            <td><?= $m['idMateria'] ?></td>
                            <td><?= $m['nombreMateria'] ?></td>
                            <td><?= $m['nombreGrupo'] ?></td>
                            <td><?= $m['nombreCarrera'] ?></td>
                            <td><?= $m['nombrePeriodo'] ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

</body>
</html>
