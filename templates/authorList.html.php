<ul>
    <?php foreach($authors as $author):?>
        <li><?=$author['id']?>.<?=$author['authorName']?></li>
    <?php endforeach ?>
</ul>