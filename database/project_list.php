<?php
    include 'conn.php';

    $project_list_result = mysqli_query($conn, "SELECT * FROM project_list;");
    while($list_row = mysqli_fetch_array($project_list_result)) {
        $title = $list_row['title'];
        $description = $list_row['description'];
        $github_url = $list_row['github_url'];
        $language = $list_row['language'];
        $image_url = $list_row['image_url'];
    ?>
        
        <div class="<?= $language ?>_contents" id="contents" name="<?= $language ?>" onclick="window.open('<?= $github_url ?>', '_blank')" style="cursor: pointer; display: none; height: 300px; background-image: url('<?= $image_url ?>'); background-repeat: no-repeat; background-size: cover;">  
            <div id="<?= $language ?>" class="project_name" style="float: left; position: relative; top: 180px; left: 30px; color: #ffffff;">
                <h2><?= $title ?></h2>
                <h4><?= $description ?></h4>
            </div>        
        </div>
 <?php }; ?>