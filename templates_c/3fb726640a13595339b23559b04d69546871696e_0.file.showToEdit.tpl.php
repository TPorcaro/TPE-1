<?php
/* Smarty version 3.1.33, created on 2019-09-17 22:57:31
  from 'C:\xampp\htdocs\Web-2\TPE-1\templates\showToEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8148bb720372_58912513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fb726640a13595339b23559b04d69546871696e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web-2\\TPE-1\\templates\\showToEdit.tpl',
      1 => 1568751418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_5d8148bb720372_58912513 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php $_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<ul>
            <li>    <?php echo $_smarty_tpl->tpl_vars['pelicula']->value->nombre;?>
 
                    ID: <?php echo $_smarty_tpl->tpl_vars['pelicula']->value->id_pelicula;?>

            </li>
            </ul>
            <form action="../editarpelicula/<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->id_pelicula;?>
" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->nombre;?>
">
            <label>Duracion</label>
            <input type="text" name="duracion" value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->duracion;?>
">
            <label>Director</label>
            <input type="text" name="director" value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->director;?>
">
            <label>Estreno</label>
            <input type="text" name="estreno" value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->estreno;?>
">
            <label>Imagen</label>
            <input type="text" name="imagen" value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->imagen;?>
">
            <label>Descripcion</label>
            <input type="text" name="descripcion" value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->descripcion;?>
">
            <button type="submit" name="editar" value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->id_pelicula;?>
">EDITAR</button>
            </form>
 <?php $_smarty_tpl->_subTemplateRender('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
