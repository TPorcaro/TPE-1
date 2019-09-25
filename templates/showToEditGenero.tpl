    {include 'templates/header.tpl'}   
 <ul>
    <li>{$genero->nombre} 
     ID: {$genero->id_genero}
     </li>
</ul>
        <div>
        <form action="editargenero/{$genero->id_genero}" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{$genero->nombre}">
            <label>Imagen</label>
            <input type="text" name="imagen" value="{$genero->img}">
            <button type="submit">EDITAR</button>
        </form>
    </div>
    {include 'templates/footer.tpl'} 