<?php
$form=new MVC\Form('ident');
$form->addAttribute('style','display:none');
$form->c='utilisateur';
$form->a='tableauDeBord';
echo $form->table();
?>
<script type="text/javascript">
    document.ident.submit();
</script>
    