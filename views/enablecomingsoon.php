<?php
use Comingsoon\Helper\GenerateHTML;
$url      = $aData[0];
$aOptions = $aData[1];
?>
<div id="container">
    <form class="ui form" action="<?php echo esc_url($url); ?>" method="post" class="ui form"
          enctype="multipart/form-data">
        <h1 style="color:green;">ENABLE COMINGSOON</h1>
        <!--Status-->
        <h2>Status</h2>
        <div class="grouped fields">
            <div class="field">
                <div class="ui slider checkbox">
                <?php
                $aArgs = [
                    "type" => "radio",
                    "name" => "status",
                    "value"=>"ON",
                    "id" => "ON",
                    "checked" => ($aOptions["status"]=="ON")?"checked=checked":"",
                    "label"=>"ON"
                ];
                GenerateHTML::checkbox($aArgs);
                ?>
                </div>
            </div>
            <div class="field">
                <div class="ui slider checkbox">
                    <?php
                    $aArgs = [
                        "type" => "radio",
                        "name" => "status",
                        "value"=>"OFF",
                        "id" => "OFF",
                        "checked" => ($aOptions["status"]=="OFF")?"checked=\"checked\"":"",
                        "label"=>"OFF"
                    ];
                    GenerateHTML::checkbox($aArgs);
                    ?>
                </div>
            </div>
            <!--Submit-->
            <?php
            $aArgs = [
                "type" => "submit",
                "id" => "submit",
                "class" => "button button-primary ",
                "title" => "Save Changes"
            ];
            GenerateHTML::button($aArgs);
            ?>
        </div>
    </form>
</div>

