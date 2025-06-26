<?php
if (isset($_SESSION['mensagem'])):
?>
<p class="mensagem" role="alert">
    <?= $_SESSION['mensagem']; ?> 
</p>
<?php
    unset($_SESSION['mensagem']);
    endif;
?>