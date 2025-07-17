<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Trámites | Trámites Municipales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Municipalidad</a>
        <div class="collapse navbar-collapse justify-content-end">
            <span class="navbar-text me-3">Hola, <?= $usuario['nombre'] ?> (<?= ucfirst($usuario['rol']) ?>)</span>
            <a href="/logout" class="btn btn-light btn-sm">Cerrar Sesión</a>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <h2 class="mb-4 text-primary">Listado de Trámites</h2>
    <?php if ($usuario['rol'] == 'ciudadano'): ?>
        <a href="/tramites/create" class="btn btn-primary mb-3">➕ Nuevo Trámite</a>
    <?php endif; ?>
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha</th>
                <?php if ($usuario['rol'] == 'funcionario'): ?>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tramites as $tramite): ?>
                <tr>
                    <td><?= $tramite['id'] ?></td>
                    <td><?= $tramite['titulo'] ?></td>
                    <td><?= $tramite['descripcion'] ?></td>
                    <td>
                        <?php if ($tramite['estado'] == 'pendiente'): ?>
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        <?php elseif ($tramite['estado'] == 'aprobado'): ?>
                            <span class="badge bg-success">Aprobado</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Rechazado</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $tramite['fecha_solicitud'] ?></td>
                    <?php if ($usuario['rol'] == 'funcionario'): ?>
                        <td>
                            <a href="/tramites/edit/<?= $tramite['id'] ?>" class="btn btn-sm btn-secondary">Editar</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
