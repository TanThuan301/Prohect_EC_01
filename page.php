<?php
for ($num = 1; $num <= $totalPage; $num++) { ?>
    <?php if ($num != $current_page) {
    ?>
        <li class="pg-item  " data-page="<?php echo $num ?>">
            <a class="pg-link" href="?per_page=<?php echo $item_total_page ?>&page=<?php echo $num ?>">
                <?php echo $num ?>
            </a>
        </li>
    <?php
    }else{
        ?>
        <li class="pg-item active" data-page="<?php echo $num ?>">
            <a class="pg-link" href="?per_page=<?php echo $item_total_page ?>&page=<?php echo $num ?>">
                <?php echo $num ?>
            </a>
        </li>
   
        <?php
    } ?>

<?php
}

?>