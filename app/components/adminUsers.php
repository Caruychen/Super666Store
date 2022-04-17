<?php
    $users = get_users();
?>
<div class="item-container">
    <h2 class="xlarge">Manage users</h2>
    <div>
        <table class="admin-table">
            <tr>
                <th>User</th>
            </tr>
            <?php
                foreach ($users as $user)
                {
                    echo "<tr>";
                    echo "<td>$user[login]</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>