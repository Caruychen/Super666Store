<div class="itemlist">
    <?php 
        $category = $_GET['category'];
        $img= str_replace(' ', '_', $_GET['category']);
        foreach ($superpowers[$category] as $item)
        {
            $power = $item['power'];
            $desc = $item['description'];
            $cost = $item['cost'];
            $item['category'] = $category;
            $item_serialized = htmlentities(serialize($item));
            echo "<div class='card'>
                    <div>
                        <img class='itemImage' src='./img/categories/$img.png' alt='$power' style='width:100%'>
                        <div class='cardtext'>
                            <h4><b>$power Powers</b></h4>
                            <p class='description'>$desc</p>
                            <p class='description'>Price: $cost Souls</p>
                            <form class='itemButton' action='index.php?category=$category' method='post'>
                                <input type='hidden' name='superpower_item' value='$item_serialized' />
                                <input type='submit' name='addtobasket' value='Add To Basket'/>
                            </form>
                        </div>
                    </div>
                </div>";
        }
    ?>
</div>

