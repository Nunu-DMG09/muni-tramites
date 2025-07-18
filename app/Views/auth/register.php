<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro | Trámites Municipales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #00C6FF, #007BFF);
            color: #fff;
        }
        .card {
            background: #ffffffdd;
            color: #000;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 450px;">
        <h3 class="text-center mb-3 text-primary">Crear Cuenta</h3>
        <?php if(isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('saveRegister') ?>" method="post" autocomplete="off">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre') ?>" required placeholder="Juan Pérez">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" required placeholder="usuario@correo.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required placeholder="********">
            </div>
            <div class="mb-3">
                <label for="confirmar" class="form-label">Confirmar contraseña</label>
                <input type="password" name="confirmar" class="form-control" required placeholder="********">
            </div>
            <button class="btn btn-primary w-100">Registrarse</button>
            <p class="text-center mt-3">¿Ya tienes cuenta? <a href="<?= base_url('/login') ?>" class="text-decoration-none text-primary">Inicia sesión</a></p>
        </form>
    </div>
</body>
</html>
