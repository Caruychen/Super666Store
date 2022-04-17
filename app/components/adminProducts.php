<div class="item-container">
    <h2 class="xlarge">Manage products</h2>
    <div>
        <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Superpower</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            <?php
                $id = 1;
                foreach ($superpowers as $category => $array)
                {
                    if ($category == "categories")
                        continue;
                    foreach ($array as $item)
                    {
                        echo "<tr>";
                        echo "<td id='productid'>$id</td>";
                        echo "<td>$item[power]</td>";
                        echo "<td>$category</td>";
                        echo "<td>$item[cost]</td>";
                        echo "<td>$item[description]</td>";
                        echo "</tr>";
                        $id++;
                    }
                }
            ?>
        </table>
    </div>
</div>