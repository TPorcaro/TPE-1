<?php
/* Smarty version 3.1.33, created on 2019-09-17 22:04:13
  from 'C:\xampp\htdocs\Web-2\TPE-1\templates\showPelicula.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d813c3dd38979_90577037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c1c9aa77160eac7df08f6ca70062569c530cdc3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web-2\\TPE-1\\templates\\showPelicula.tpl',
      1 => 1568750522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_5d813c3dd38979_90577037 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>  
<ul>
    <li><?php echo $_smarty_tpl->tpl_vars['pelicula']->value->nombre;?>
 
     ID: <?php echo $_smarty_tpl->tpl_vars['pelicula']->value->id_pelicula;?>

     </li>
</ul>
<?php $_smarty_tpl->_subTemplateRender('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php }
}
