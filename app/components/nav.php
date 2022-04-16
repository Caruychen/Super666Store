<div class="gray leftnav">
    <div><h2 class="large">Shop by Category</h2></div>
    <ul>
        <?php
            foreach($superpowers['categories'] as $category)
                echo "<li><a>$category</a></li>";
        ?>
    </ul>
</div>