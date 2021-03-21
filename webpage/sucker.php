<?php
$file = "suckers.txt";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Php form</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>
<body>
<dl>
    <?php if($_SERVER["REQUEST_METHOD"]!="POST"){?>
    <h2>Cannot use get method</h2>
    <?php } else if($_REQUEST['name']=='' && !isset($_REQUEST["section"]) && $_REQUEST['cardnumber']=='' && !isset($_REQUEST['cardtype'])){ ?>
        <h1>Sorry!</h1>
        <dt>You did not fill out the form completely.</dt>
        <a href="buyagrade.html">Try again?</a>
    <?php }
    else {?>
        <h1>Thanks, sucker!</h1
        <dt>Your information has been recorded.</dt>
        <dt>Name:</dt>
        <?php if(isset($_REQUEST['name'])) { ?>
        <dd>
            <?= $_REQUEST["name"]?>
            <?php
            $current = file_get_contents($file);
            $current .= $_REQUEST["name"].";";
            file_put_contents($file, $current);
            ?>
        </dd>
            <?php } ?>
        <dt>Section:</dt>
         <?php if(isset($_REQUEST["section"])) {?>
        <dd>
            <?= $_REQUEST["section"]?>
            <?php
            if($_REQUEST["section"]!=""){
                $current = file_get_contents($file);
                $current .= $_REQUEST["section"].";";
                file_put_contents($file, $current);
            }
            ?>
        </dd>
             <?php } ?>
        <dt>Credit card:</dt>
         <?php if(isset($_REQUEST["cardnumber"])) {?>
        <dd>
            <?= $_REQUEST["cardnumber"]?>
            <?php
            $current = file_get_contents($file);
            $current .= $_REQUEST["cardnumber"].";";
            file_put_contents($file, $current);
            ?>
        </dd>
        <?php } ?>
        <dt>Card type:</dt>
         <?php if(isset($_REQUEST["cardtype"])) {?>
        <dd>
            <?= $_REQUEST["cardtype"]?>
            <?php
            $current = file_get_contents($file);
            $current .= $_REQUEST["cardtype"].";";
            file_put_contents($file, $current);
            ?>
        </dd>
        <?php } ?>
        <dd>
            <?php
            $current = file_get_contents($file);
            $current .="\n";
            file_put_contents($file, $current);
            ?>
        </dd>
        <p>Here are all the suckers who submitted here:</p>
        <pre> <?php include("suckers.txt")?> </pre>

    <?php }?>
</body>
</html>