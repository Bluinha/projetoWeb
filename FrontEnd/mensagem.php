<?php 
if (isset($_SESSION['mensagem'])):
?>
<div class="msg-alerta" role="alert">
    <?= $_SESSION['mensagem']; ?>
    <button type="button" class="bnt-fechar" id="id-bnt-fechar" aria-label="close">x</button>
</div>  
<?php 
    unset($_SESSION['mensagem']);
    endif;
?>