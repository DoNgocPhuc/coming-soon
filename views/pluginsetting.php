<?php
use Comingsoon\Helper\GenerateHTML;
$url      = $aData[0];
$aOptions = $aData[1];
$sSettingResult  = $aData[2];
if ($sSettingResult == "Saved success") {
    $formClass = "ui form";
} else {
    $formClass = "ui form error";
}
?>
<div id="container">
    <form class="<?php echo esc_attr($formClass); ?> action="<?php echo esc_url($url); ?>" method="post" class="ui form"
    enctype="multipart/form-data">
    <h1 style="color:green;">COMINGSOON SETTING</h1>
    <!--Display Error-->
    <?php if ($sSettingResult == "Saved success") { ?>
        <div class="ui message">
        <p><?php echo esc_html($sSettingResult); ?></p>
        </div><?php
    } else { ?>
        <div class="ui error message">
            <p><?php echo esc_html($sSettingResult);; ?></p>
        </div>
    <?php } ?>
    <!--Title-->
    <h2>Title</h2>
    <div class="field">
        <?php
        $aArgs = [
            "type" => "text",
            "name" => "title",
            "value" => $aOptions["title"],
            "id" => "title",
            "placeholder" => "Title",
            "label" => "Title"
        ];
        GenerateHTML::input($aArgs);
        ?>
        <p>* Required and the maximum of character is 100</p>
    </div>
    <!--Description-->
    <h2>Description</h2>
    <div class="field">
        <?php
        $aArgs = [
            "type" => "text",
            "name" => "description",
            "value" => "",
            "id" => "description",
            "placeholder" => "Description",
            "content" => $aOptions["description"],
            "label" => "Description"
        ];
        GenerateHTML::textarea($aArgs);
        ?>
        <p>* Required</p>
    </div>
    <!--CountDown-->
    <h2>Count Down</h2>
    <!--Show CountDown-->
    <div class="ui form field">
        <?php
        $aArgs     = [
            "name" => "show",
            "id" => "show",
            "label" => "Show CountDown"
        ];
        $aOptional = [
            [
                "content" => "Yes",
                "selected" => ($aOptions["show"] == "Yes") ? "selected" : ""
            ],
            [
                "content" => "No",
                "selected" => ($aOptions["show"] == "No") ? "selected" : ""
            ]
        ];
        GenerateHTML::selectbox($aArgs, $aOptional);
        ?>

    </div>
    <!--Start Date-->
    <div class="field">
        <?php
        $aArgs = wp_parse_args(
            $aArgs = [
                "type" => "date",
                "name" => "startdate",
                "value" => $aOptions["startdate"],
                "id" => "startdate",
                "placeholder" => "",
                "label" => "Start Date"
            ]
        );
        GenerateHTML::input($aArgs);
        ?>
        <p>* Required</p>
    </div>
    <div class="field">
        <label for="day">Countdown(Remain time)</label>
        Days:<input id="day" name="day" type="text"
                    value="<?php echo esc_attr($aOptions["day"]);
                    ?>" placeholder="Days">
        <p>* The number is equal or greater than 0</p>
        Hours: <select id="hour" name="hour">
            <?php
            for ($index = 0; $index < 24; $index++) {
                $sSelect = (($aOptions["hour"]) == $index) ? "selected":"";
                echo "<option"." ".$sSelect.">". $index."</option>";
            }
            ?>
        </select>
        Minutes:<select id="min" name="min">
            <?php
            for ($index = 0; $index < 60; $index++) {
                $sSelect = (($aOptions["min"]) == $index) ? "selected":"";
                echo "<option"." ".$sSelect.">". $index."</option>";
            }
            ?>
        </select>
        Seconds:<select id="sec" name="sec">
            <?php
            for ($index = 0; $index < 60; $index++) {
                $sSelect = (($aOptions["sec"]) == $index) ? "selected":"";
                echo "<option"." ".$sSelect.">". $index."</option>";
            }
            ?>
        </select>
    </div>
    <!--Social Network-->
    <h2>Social Network</h2>
    <!--Facebook-->
    <div class="field">
        <?php
        $aArgs = wp_parse_args(
            $aArgs = [
                "type" => "text",
                "name" => "facebook",
                "value" => $aOptions["facebook"],
                "id" => "facebook",
                "placeholder" => "Facebook",
                "label" => "Facebook"
            ]
        );
        GenerateHTML::input($aArgs);
        ?>
        <p>* Required</p>
    </div>
    <!--Twitter-->
    <div class="field">
        <?php
        $aArgs = wp_parse_args(
            $aArgs = [
                "type" => "text",
                "name" => "twitter",
                "value" => $aOptions["twitter"],
                "id" => "twitter",
                "placeholder" => "Twitter",
                "label" => "Twitter"
            ]
        );
        GenerateHTML::input($aArgs);
        ?>
        <p>* Required </p>
    </div>
    <!--Google Plus-->
    <div class="field">
        <?php
        $aArgs = wp_parse_args(
            $aArgs = [
                "type" => "text",
                "name" => "googleplus",
                "value" => $aOptions["googleplus"],
                "id" => "googleplus",
                "placeholder" => "GooglePlus",
                "label" => "GooglePlus"
            ]
        );
        GenerateHTML::input($aArgs);
        ?>
        <p>* Required </p>
    </div>
    <!--Footer-->
    <h2>Footer</h2>
    <div class="field">
        <?php
        $aArgs = wp_parse_args(
            $aArgs= [
                      "type" => "text",
                      "name" => "footer",
                      "value" => $aOptions["footer"],
                      "id"=>"footer",
                      "placeholder" => "Footer",
                      "label" => "Footer"
                  ]
        );
        GenerateHTML::input($aArgs);
        ?>
        <p>* Required </p>
    </div>
    <!--Image Upload-->
    <h2>Image Upload</h2>
    <div class="ui action input">
        <?php
        $aArgs = wp_parse_args(
            $aArgs = [
                "type" => "file",
                "name" => "image-upload",
                "id" => "featured-image",
                "label" => "featured-image"
            ]
        );
        GenerateHTML::fileupload($aArgs);
        ?>
    </div>
    <p>* Required,format.jpeg,.jpg,.bmp,.gif,.png and max Size is 5000000</p>
    <img src="<?php echo esc_url($aOptions["url"]); ?>" width="200">
    <!--Site Enabled Plugin-->
    <h2>Site Enabled Plugin</h2>
    <div class="field">
        <?php
        $aArgs = wp_parse_args(
            $aArgs= [
                "type" => "text",
                "name" => "site",
                "value" => $aOptions["site"],
                "id"=>"site",
                "placeholder" => "Site",
                "label" => "Site Enabled Plugin"
            ]
        );
        GenerateHTML::input($aArgs);
        ?>
        <p>* Required</p>
    </div>
    <!--IP Access-->
    <h2>IP Access</h2>
    <div class="ip">
        <?php
        $aArgs = wp_parse_args(
            $aArgs= [
                "type" => "text",
                "name" => "ip",
                "value" => $aOptions["ip"],
                "id"=>"ip",
                "placeholder" => "IP Access",
                "label" => "IP Access"
            ]
        );
        GenerateHTML::input($aArgs);
        ?>
        <p>* Required</p>
    </div>
    <!--Submit-->
    <?php
    $aArgs = wp_parse_args(
        $aArgs, [
                  "type" => "submit",
                  "id" => "submit",
                  "class" => "button button-primary",
                  "title" => "Save Changes"
              ]
    );
    GenerateHTML::button($aArgs);
    ?>
    </form>
</div>
