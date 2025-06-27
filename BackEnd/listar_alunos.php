<?php
require("conexao.php");

// Busca apenas os usuários com tipo_usuario igual a 'aluno'
$stmt = $banco->query("SELECT * FROM usuarios WHERE tipo_usuario = 'aluno'");
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($alunos) > 0) {
    foreach ($alunos as $aluno) {
        echo "<tr data-id='{$aluno['id_usuario']}'>";
        echo "<td>{$aluno['id_usuario']}</td>";
        echo "<td>{$aluno['nome']}</td>";
        echo "<td>{$aluno['email']}</td>";
        echo "<td>
                <button class='btn-editar' onclick='editarAluno({$aluno['id_usuario']}, this)'>Editar</button>
                <button class='btn-excluir' onclick='excluirAluno({$aluno['id_usuario']}, this)'>Excluir</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'><strong>Nenhum aluno encontrado</strong></td></tr>";
}
?>
