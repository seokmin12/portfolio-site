<div class="popup_side">
    <ul>
<?php
    include 'conn.php';

    $result = mysqli_query($conn, "SELECT * FROM project_language_list;");
    while($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $color_id = $row['color_id'];
    ?>
        <li id="<?= $name ?>" class="popup_list" name="<?= $name ?>">
            <span id="<?= $name ?>_tag" style="background-color: <?= $color_id ?>;"></span>
            <p><?= $name ?></p>
        </li>

 <?php }; ?>
    </ul>
</div>