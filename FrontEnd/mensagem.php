<?php 
if (isset($_SESSION['mensagem'])):
?>
<div class="msg-alerta" role="alert">
    <?= $_SESSION['mensagem']; ?>
</div>  
<?php 
    unset($_SESSION['mensagem']);
    endif;
?>