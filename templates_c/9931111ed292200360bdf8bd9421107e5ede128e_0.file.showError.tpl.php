<?php
/* Smarty version 3.1.33, created on 2019-09-17 22:34:08
  from 'C:\xampp\htdocs\Web-2\TPE-1\templates\showError.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d814340d33f85_24616560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9931111ed292200360bdf8bd9421107e5ede128e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web-2\\TPE-1\\templates\\showError.tpl',
      1 => 1568751918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_5d814340d33f85_24616560 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1>ERROR!</h1>"
    <h2><?php echo $_smarty_tpl->tpl_vars['msgError']->value;?>
</h2>
    <?php $_smarty_tpl->_subTemplateRender('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
