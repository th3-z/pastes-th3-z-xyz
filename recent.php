<?php
require_once "config.php";
require_once "includes/utils.php";

$max_pastes = 16;

$filepath = $webroot.$paste_path;
$files = get_pastes($filepath, SORT_DATE_DESC);
?>

<h2>Recent pastes:</h2>
<ul>
<?php
foreach (array_slice($files, 0, $max_pastes) as $file) {
    ?>
    <li><a href="<?=$paste_path.$file?>"><?= $file ?></a>
    </li>
    <?php
}
?>
</ul>

<p>Currently serving <?=count($files)?> pastes</p>

