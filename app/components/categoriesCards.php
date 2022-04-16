<?php
    $link = "http://$_SERVER[HTTP_HOST]/rush00/index.php";
?>

<div class="itemlist">
    <?php 
        $category = 'categories';
        foreach ($superpowers[$category] as $item)
        {
            $link_name = str_replace(' ', '_', $item);
            echo "<div class='card'>
                    <a href='$url$link_name'>
                        <img src='./img/categories/$link_name.png' alt='$item' style='width:100%'>
                        <div class='card-title'>
                            <h4><b>$item Powers</b><h4>
                        </div>
                    </a>
                </div>";
        }
    ?>
</div>