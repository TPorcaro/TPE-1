<?php
/* Smarty version 3.1.33, created on 2019-09-17 22:04:08
  from 'C:\xampp\htdocs\Web-2\TPE-1\templates\showPeliculas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d813c382eb438_11565975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '379b73f042dd0b7cb21b84468d78591f1e5ec4a0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web-2\\TPE-1\\templates\\showPeliculas.tpl',
      1 => 1568750334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_5d813c382eb438_11565975 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>   
 <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peliculas']->value, 'pelicula');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pelicula']->value) {
?> 
                <li>
                Nombre: <a href="peliculas/<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->id_pelicula;?>
"><?php echo $_smarty_tpl->tpl_vars['pelicula']->value->nombre;?>
</a> 
                ID: <?php echo $_smarty_tpl->tpl_vars['pelicula']->value->id_pelicula;?>
 
                <small><a href="borrarpelicula/<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->id_pelicula;?>
">ELIMINAR</a></small>
                <small><a href="paraeditar/<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->id_pelicula;?>
">EDITAR</a></small>
                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
        <div>
        <form action="nuevapelicula" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre">
            <label>Duracion</label>
            <input type="text" name="duracion">
            <label>Director</label>
            <input type="text" name="director">
            <label>Estreno</label>
            <input type="text" name="estreno">
            <label>Imagen</label>
            <input type="text" name="imagen">
            <label>Descripcion</label>
            <input type="text" name="descripcion">
            <button type="submit">Guardar</button>
        </form>
    </div>
    <?php $_smarty_tpl->_subTemplateRender('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php }
}
