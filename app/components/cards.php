<div class="itemlist">
    <?php 
        $category = $_SESSION['itemview'];
        foreach ($superpowers[$category] as $item)
        {
            $image_name = str_replace(' ', '_', $item);
            echo "<div class='card'>
                    <a href=''>
                        <img src='./img/categories/$image_name.png' alt='$item' style='width:100%'>
                        <div class='card-title'>
                            <h4><b>$item Powers</b><h4>
                        </div>
                    </a>
                </div>";
        }
    ?>
</div>