<?php
    $link = "http://$_SERVER[HTTP_HOST]/rush00/index.php";
?>

<div class="itemlist">
    <?php 
        $category = 'categories';
        foreach ($superpowers[$category] as $item)
        {
            $category_link = str_replace(' ', '_', $item);
            echo "<div class='card'>
                    <a href='$url?category=$item'>
                        <img class='itemImage' src='./img/categories/$category_link.png' alt='$item' style='width:100%'>
                        <div class='cardtext'>
                            <h4><b>$item Powers</b><h4>
                        </div>
                    </a>
                </div>";
        }
    ?>
</div>
