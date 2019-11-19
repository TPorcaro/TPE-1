{include 'templates/header.tpl'}
<div class="container">
    <form action="{$ver_reg}" method="POST" class="col-md-4 offset-md-4 mt-4">
        <h1>{$titulo}</h1>

        <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="user" class="form-control" placeholder="Ingrese email">
        </div>
        {if $ver_reg=="verify_register"}
             <div class="form-group">
            <label>Mail</label>
            <input type="text" name="mail" class="form-control" placeholder="Ingrese email">
        </div>
        {/if}
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

         {if $error}
        <div class="alert alert-danger" role="alert">
            {$error}
        </div>
        {/if} 

        <button type="submit" class="btn btn-primary">{$signin_signup}</button>
        <a href="showRecovery">Olvido su contraseña? dou</a>
    </form>

</div>
{include 'templates/footer.tpl'}