<?php
require_once __DIR__ .'/../services/auth.php';

use Services\Auth;

$usuario = Auth::getUsuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - Locadora de Veículos</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Link ícones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

   <style>
    .action-wrapper{
    display: flex;
    align-items: center;
    gap: 0.5rem;
    justify-content: flex-start;
}

.btn-group-actions{
    flex-direction: row;
    display: flex;
    gap: 0.5rem;
    align-items: center;
}
.rent-group{
    display: flex;
    flex-direction: row;
    gap: 0.5rem;
}

.delete-btn{
    order: 1;
}

.rent-group{
    display: flex;
    align-items: center;
    gap: 0.5rem;
    order: 2;
}

.days-input{
    width: 60px !important;
    padding: 0.25rem 0.5rem;
    text-align: center;

}

@media (max-width: 768px){
    .action-wrapper{
        flex-direction: column;
        align-items: stretch;
    }
    .btn-group-actions{
        flex-direction: column;
    }

    .rent-group{
        order: 2;
        width: 100%;
    }

    .days-input{
        width: 100% !important;
    }
}

.badge .bg-success span{
    cursor: pointer;
}
   </style>   
</head>
<body class="container py-4">
    <div class="container py-4">
        <!-- Mensagem de "Bem-Vindo" -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center inicio">
                    <h1>Sistema de Locadora de Veículos</h1>
                    <div class="d-flex align-items-center gap-3 user-info mx-3">
                        <span class="user-icon">
                            <i class="bi bi-person-circle" style="font-size: 24px;"></i>
                        </span>
                        <!-- Bem vindo, [usuário] -->
                        <span class="welcome-text">
                            Bem-vindo, <strong><?= htmlspecialchars($usuario['username'])?></strong>!
                        </span>
                        <!-- Botão de LogOut -->
                        <a href="?logout=1" class="btn btn-outline-danger d-flex align-items-center gap-1">
                            <i class="bi bi-box-arrow-right"></i>
                            Sair
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($mensagem):?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($mensagem) ?>
            <button type="button" class="btn-close" data-bs-dissmiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <!-- Tabela para adicionar novo veículo -->
        <div class="row same-height-row">
            <?pho if (Auth::isAdmin())
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="mb-0">Adicionar novo veículo 🚗</h4>
                    </div>
                    <div class="card-body">
                        <form action="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">
                                    Modelo:
                                </label>
                                <input type="text" class="form-control" name="Modelo" placeholder="Digite aqui o modelo..." required="form-control">
                                <div class="invalid-feedback">
                                    Informe um modelo válido!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="placa" class="form-label">
                                    Placa:
                                </label>
                                <input type="text" class="form-control" name="placa" placeholder="Digite aqui sua placa..." required="form-control">
                                <div class="invalid-feedback">
                                    Informe uma placa válida!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">
                                    Tipo:
                                </label>
                                <select class="form-select" name="tipo" id="tipo" required>
                                    <option value="empty"></option>
                                    <option value="carro">Carro</option>
                                    <option value="moto">Moto</option>
                                </select>
                            </div>
                            <button class="btn btn-primary w-100" type="submit" name="adicionar">Adicionar veículo</button>
                        </form>
                    </div>
                </div>
            </div>

        
</body>