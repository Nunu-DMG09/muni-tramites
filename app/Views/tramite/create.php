<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Trámite | Trámites Municipales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-primary mb-4">Registrar Nuevo Trámite</h2>
    <?php if(isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <form action="<?=base_url('/tramites/store')?>" method="post" autocomplete="off">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" placeholder="Licencia de funcionamiento" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" placeholder="Detalle del trámite" required></textarea>
        </div>
        <button class="btn btn-primary">Registrar</button>
        <a href="<?=base_url('/tramites')?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
