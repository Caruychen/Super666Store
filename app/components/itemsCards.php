<div class="itemlist">
    <?php 
        $category = $_GET['category'];
        $img= str_replace(' ', '_', $_GET['category']);
        foreach ($superpowers[$category] as $item)
        {
            $power = $item['power'];
            $desc = $item['description'];
            $cost = $item['cost'];
            echo "<div class='card'>
                    <div>
                        <img src='./img/categories/$img.png' alt='$item' style='width:100%'>
                        <div class='cardtext'>
                            <h4><b>$power Powers</b><h4>
                            <p class='description'>$desc</p>
                            <p class='description'>Cost: $cost Souls</p>
                        </div>
                    </div>
                </div>";
        }
    ?>
</div>