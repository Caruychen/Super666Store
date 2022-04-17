<?php
    $orders = get_all_orders();
?>
<div class="item-container">
    <h2 class="xlarge">Manage orders</h2>
    <div>
        <table class="admin-table">
            <tr>
                <th>Timestamp</th>
                <th>User</th>
                <th>Superpower</th>
                <th>Quantity</th>
            </tr>
            <?php
                foreach ($orders as $array)
                {
                    echo "<tr>";
                    echo "<td>$array[date]</td>";
                    echo "<td>$array[user]</td>";
                    echo "<td>$array[product]</td>";
                    echo "<td>$array[quantity]</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>