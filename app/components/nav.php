<?php
    $link = "http://$_SERVER[HTTP_HOST]/rush00/index.php";
?>

<div class="gray leftnav">
    <div><h2 class="large">Shop by Category</h2></div>
    <ul>
        <?php
            foreach($superpowers['categories'] as $category)
                echo "<li><a href='$link?category=$category'>$category</a></li>";
        ?>
    </ul>
</div>