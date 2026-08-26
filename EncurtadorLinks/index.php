<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Encurta</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container py-4">
        <div class="card shadow">
            <div class="card-header bg-dark text-white p-3">
                <h4 class="mb-0">Links Encurtados</h4>
            </div>
            <div class="card-body">
            <form id="form-encurt" class="row g-2 mb-0 p-3">
                    <div class="col-3">
                        <input type="text" id="novo-titulo" class="form-control" placeholder="Titulo" required>
                    </div>
                    <div class="col-4">
                        <input type="url" id="novo-link" class="form-control" placeholder="https://" required>
                    </div>
                    <div class="col-3">
                        <select id="novo-padrao" class="form-select">
                            <option value="Lazer">Lazer</option>
                            <option value="Trabalho">Trabalho</option>
                            <option value="Estudos">Estudos</option>
                            <option value="Geral">Geral</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-secondary w-100">Adicionar</button>
                    </div>
                </form>
                </div>
        </div>
        <ul class="list-group mt-4" id="lista-links">    
                </ul>
    </div>
    <script src="app.js"></script>
    </body>
</html>