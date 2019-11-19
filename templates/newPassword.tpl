{include 'templates/header.tpl'}
<div class="container">
    <form action="reset_password" method="POST" class="col-md-4 offset-md-4 mt-4">
        <h1>{$titulo}</h1>
        <div class="form-group">
            <label>Ingrese su nueva contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="contraseña">
            <input type="password" hidden name="token" value="{$token}">
        </div>
        {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
        {/if} 
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
{include 'templates/footer.tpl'}