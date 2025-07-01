<?php
// Verifica se existe uma mensagem armazenada na sessão
if (isset($_SESSION['mensagem'])):
?>
<p class="mensagem" role="alert">
    <?= $_SESSION['mensagem']; ?> 
</p>
<?php
    // Após exibir, remove a mensagem da sessão para que não apareça novamente ao recarregar a página
    unset($_SESSION['mensagem']);
    endif;
?>