<ul class="nav nav-pills nav-stacked">

    <?php foreach ($links as $key=>$value): ?>

        <li  role="presentation"
            <?php
            $pos = stripos($_SERVER['REQUEST_URI'], $key);
            if($pos) echo " class=\"active\"";
            ?>
            > <a href="<?=$key?>"><?=$value?></a> </li>

    <?php endforeach ?>
</ul>