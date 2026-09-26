<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    
</head>
<body>
    <div class="form">
        <div>
            <h1>Cadastro</h1>
        </div>
    
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="phoneNumber">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <div class="resultado">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = $_POST["nome"];
            $email = $_POST["email"];
            $phoneNumber = $_POST["phoneNumber"];

            $databaseUrl = getenv("DATABASE_URL");

            $connection = pg_connect($databaseUrl);

            $result = pg_query_params(
                $connection,
                "INSERT INTO users (name, email, phone_number) VALUES ($1, $2, $3)",
                [$name, $email, $phoneNumber]
            );

            if ($result) {
                echo "Cadastro realizado com sucesso!";
            }

            else {
                echo "Erro ao cadastrar...";
            }
        }

        ?>
    </div>
    
</body>
</html>