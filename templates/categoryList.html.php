<ul>
    <?php foreach($categories as $category):?>
        <li><?=$category['id']?>.<?=$category['categoryName']?></li>
    <?php endforeach ?>
</ul>