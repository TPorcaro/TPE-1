{include 'templates/header.tpl'}
<div class="container">
    <form action="send_recovery" method="POST" class="col-md-4 offset-md-4 mt-4">
        <h1>{$titulo}</h1>
        <div class="form-group">
            <label>Ingrese su usuario</label>
            <input type="text" name="user" class="form-control" placeholder="Ingrese Usuario">
        </div>
        <div class="form-group">
            <label>Mail</label>
            <input type="text" name="mail" class="form-control" placeholder="Ingrese email">
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