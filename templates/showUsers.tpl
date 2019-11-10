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
                </li>
                {/foreach}
        </ul>
{include 'templates/footer.tpl'}