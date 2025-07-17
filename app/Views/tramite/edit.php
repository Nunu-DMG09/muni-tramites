<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Trámite | Trámites Municipales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-primary mb-4">Editar Estado del Trámite</h2>
    <form action="/tramites/update/<?= $tramite['id'] ?>" method="post" autocomplete="off">
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="pendiente" <?= $tramite['estado'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                <option value="aprobado" <?= $tramite['estado'] == 'aprobado' ? 'selected' : '' ?>>Aprobado</option>
                <option value="rechazado" <?= $tramite['estado'] == 'rechazado' ? 'selected' : '' ?>>Rechazado</option>
            </select>
        </div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="/tramites" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
