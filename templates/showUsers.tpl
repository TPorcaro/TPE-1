{include 'templates/header.tpl'}
<ul>
                {foreach $users as $user} 
                <li>
                Nombre: {$user->username}
                Es admin?: {if $user->admin==0}
                            No
                {else}
                    Si
                {/if}
                <small><a href="borraruser/{$user->id_user}">BORRAR</a></small>
                <small><a href="darpermiso/{$user->id_user}">Dar Permiso</a></small>
                </li>
                {/foreach}
        </ul>
{include 'templates/footer.tpl'}