<?php
    $users = get_users();
?>
<div class="item-container">
    <h2 class="xlarge">Manage users</h2>
    <div>
        <table class="admin-table">
            <tr>
                <th>User</th>
                <th>Manage</th>
            </tr>
            <?php
                foreach ($users as $user)
                {
                    echo "<tr>";
                    echo "<td>$user[login]</td>";
                    if ($user['login'] !== 'admin')
                        echo "<td>
                        <form action='index.php?page=admin&admin=users' method='POST'>
                            <input type='hidden' name='logintoremove' value='$user[login]' />
                            <input type='submit' name='adminuser' value='Remove' />
                        </form>
                        </td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>