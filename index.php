<?php
require_once "config.php";

$page_name = "Pastes";
$request = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

$access = "[ACCESS]"
          . "\n\tAddress: {$_SERVER['REMOTE_ADDR']}"
          . "\n\tRequest: {$request}";
if (!empty($_SERVER['HTTP_USER_AGENT']))
    $access .= "\n\tAgent: {$_SERVER['HTTP_USER_AGENT']}";
if (!empty($_SERVER['HTTP_REFERER']))
    $access .= "\n\tReferer: {$_SERVER['HTTP_REFERER']}";

error_log($access);
?>
<!DOCTYPE html>
<html>
    <?php
        include "includes/head.php";
    ?>
	
    <body>
        <?php include "header.html"; ?>
        <div style="font-family: monospace;">
        <h1>pastes.th3-z.xyz</h1>
        <p>Pastes will be deleted after 24 hours!</p>

        <form action="new_paste.php" method="post">
            <textarea name="paste" rows="16" cols="72"></textarea>
            <br/>
            <input type="submit" value="New Paste">
        </form>
       
        <?php
        include "recent.php";
        ?>

        </div>

        <?php include "footer.html"; ?>
	</body>

</html>

