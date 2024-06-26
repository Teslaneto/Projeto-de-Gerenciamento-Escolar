<?php
include 'professores/conexao_professores.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Turmas</title>
    <link rel="stylesheet" type="text/css" href="css/principal.css">
    <link rel="stylesheet" type="text/css" href="css/form_turmas.css">
</head>
<body>
    <div>
        <ul class="nav">
            <img class="img1" src="img/Minha_Escola.png" alt="logo">
            <li><a href="principal.php">Home</a></li>
            <li><a href="turmas.php">Turmas</a></li>
            <li><a href="escolas.php">Escolas</a></li>
            <li><a href="professores.php">Professores</a></li>
            <li><a href="logoff.php">Sair</a></li>
        </ul>
     </div>
    <div class="space"></div>
    <!-- Formulário para adicionar ou editar turmas -->
    <form method="post" action="/projetoMinhaescola/turmas/banco_turmas.php">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        
        <label for="id_escola">ID da Escola:</label>
        <input type="number" name="id_escola" id="id_escola" value="<?php echo isset($_GET['id']) ? buscar_turma($_GET['id'], $mysqli)['id_escola'] : ''; ?>" required>
        
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="ativo" <?php echo isset($_GET['id']) && buscar_turma($_GET['id'], $mysqli)['status'] == 'ativo' ? 'selected' : ''; ?>>Ativo</option>
            <option value="inativo" <?php echo isset($_GET['id']) && buscar_turma($_GET['id'], $mysqli)['status'] == 'inativo' ? 'selected' : ''; ?>>Inativo</option>
        </select>
        
        <label for="turno">Turno:</label>
        <select name="turno" id="turno" required>
            <option value="manhã" <?php echo isset($_GET['id']) && buscar_turma($_GET['id'], $mysqli)['turno'] == 'manhã' ? 'selected' : ''; ?>>Manhã</option>
            <option value="tarde" <?php echo isset($_GET['id']) && buscar_turma($_GET['id'], $mysqli)['turno'] == 'tarde' ? 'selected' : ''; ?>>Tarde</option>
            <option value="noite" <?php echo isset($_GET['id']) && buscar_turma($_GET['id'], $mysqli)['turno'] == 'noite' ? 'selected' : ''; ?>>Noite</option>
        </select>
        
        <label  for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo isset($_GET['id']) ? buscar_turma($_GET['id'], $mysqli)['nome'] : ''; ?>" required>

        <input type="submit" name="salvar" value="Salvar">

    <!-- Link para visualizar turmas existentes -->
    <a href="/projetoMinhaescola/turmas/visualizar_turmas.php">Visualizar Turmas</a>
    </form>
</body>
</html>