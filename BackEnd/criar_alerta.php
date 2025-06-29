<?php
// Este arquivo DEVE conter APENAS a definição da função criar_alerta().
// NENHUMA outra lógica de execução de código deve estar aqui.

/**
 * Define uma mensagem de alerta na sessão para ser exibida posteriormente.
 * @param string $mensagem A mensagem a ser exibida.
 * @param string $tipo O tipo da mensagem (ex: 'sucesso', 'erro', 'atencao', 'info').
 */
function criar_alerta($mensagem, $tipo = 'info') {
    // Garante que a sessão está iniciada, se ainda não estiver
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['mensagem'] = $mensagem;
    $_SESSION['mensagem_tipo'] = $tipo; // Armazena o tipo para estilização
}

// FIM do arquivo. Não coloque mais nada executável aqui.
?>