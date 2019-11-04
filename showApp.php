<?php
    $APPNAME=$_GET["APPNAME"];
?>

<HTML>
    <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
            echo("<TITLE>".$APPNAME."</TITLE>");
        ?>
        <script>
            function install(){
                console.log("SYSCALL:INSTALL:"+document.title);
                window.history.back();
            }
            function uninstall(){
                console.log("SYSCALL:UNINSTALL:"+document.title);
                window.history.back();
            }
        </script>
    </HEAD>
    <BODY>
        <button class="goBack" onClick="window.history.back();">GO BACK</button>
        <div class="appHead">
            <?php
                echo('<IMG class="appIcon" width="120" src="DIRECTORY/'.$APPNAME.'/favicon.png" />');
                echo('<div class="appTitle"><b>'.$APPNAME.'</b></div>');
                if(isset($_GET["isInstalled"])){
                    echo('<button onClick="uninstall()" class="butnR">Remove</button>');
                }else{
                    echo('<button onClick="install()" class="butn">Install</button>');
                }
            ?>
        </div>
        <div>
            <div class="appScreens">
                <center>
                    <?php
                        $files = scandir('DIRECTORY/'.$APPNAME.'/SCREENS');
                        foreach($files as $file) {
                            if($file!=="." and $file!=="..")
                                echo('<IMG class="appScreen" height="200" src="DIRECTORY/'.$APPNAME.'/SCREENS/'.$file.'" />');
                        }
                    ?>
                </center>
            </div>
            <div class="appDescription">
                <?php
                    $fh = fopen('DIRECTORY/'.$APPNAME.'/DESCRIPTION','r');
                    while ($line = fgets($fh)) {
                        echo($line."<br/>");
                    }
                    fclose($fh);
                ?>
            </div>
        </div>
    </BODY>
</HTML>

<link rel="stylesheet" type="text/css" href="css/style.css" />