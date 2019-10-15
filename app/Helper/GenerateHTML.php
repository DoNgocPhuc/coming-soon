<?php
namespace Comingsoon\Helper;

/**
 * Class GenerateHTML
 */
class GenerateHTML
{
    /**
     * GenerateHTML constructor.
     * @param null $options
     */
    public function __construct($options = null)
    {
    }
    /**
     * image
     * @param $aArgs
     */
    public static function image($aArgs)
    {
        $aArgs = wp_parse_args(
            $aArgs, [
                      "rel" => "",
                      "type" => "",
                      "href" => ""
                  ]
        );
        ?>
        <link rel="<?php echo esc_attr($aArgs["rel"]); ?>" type="<?php echo esc_attr(
        $aArgs["type"]); ?>" href="<?php echo esc_url($aArgs["href"]);?>"><?php
    }
    /**
     * Textbox, hidden
     * @param $aArgs
     */
    public static function input($aArgs)
    {
        $aArgs = wp_parse_args(
            $aArgs, [
                      "type" => "",
                      "name" => "",
                      "value" => "",
                      "id" => "",
                      "placeholder" => "",
                      "label" => ""
                  ]
        );
        ?>
        <label for="<?php echo esc_attr($aArgs["id"]); ?>"><?php echo esc_html($aArgs["label"]); ?></label>
        <input id="<?php echo esc_attr($aArgs["id"]); ?>" type="<?php echo esc_attr($aArgs["type"]); ?>"
               name="<?php echo esc_attr($aArgs["name"]); ?>" value="<?php echo esc_attr($aArgs["value"]); ?>"
               placeholder="<?php echo esc_attr($aArgs["placeholder"]); ?>">
        <?php
    }
    /**
     * @param $aArgs
     */
    public static function checkbox($aArgs)
    {
        $aArgs = wp_parse_args(
            $aArgs, [
                      "type" => "",
                      "name" => "",
                      "value" => "",
                      "id" => "",
                      "checked" => "",
                      "label" => ""
                  ]
        );
        ?>
        <input id="<?php echo esc_attr($aArgs["id"]); ?>" type="<?php echo esc_attr($aArgs["type"]); ?>"
               name="<?php echo esc_attr($aArgs["name"]); ?>" value="<?php echo esc_attr($aArgs["value"]); ?>"
               <?php echo esc_attr($aArgs["checked"]); ?>>
        <label for="<?php echo esc_attr($aArgs["id"]);?>"><?php echo esc_html($aArgs["id"]);?></label>
        <?php
    }
    /**
     * @param $aArgs
     * @param $aOptional
     */
    public static function selectbox($aArgs, $aOptional)
    {
        $aArgs = wp_parse_args(
            $aArgs, [
                      "name" => "",
                      "id" => "",
                      "label" => ""
                  ]
        );
        ?>
        <label for="<?php echo esc_attr($aArgs["id"]); ?>"><?php echo esc_html($aArgs["label"]); ?></label>
        <select id="<?php echo esc_attr($aArgs["id"]); ?>" name="<?php echo esc_attr($aArgs["name"]); ?>">
            <?php
            for ($iIndex = 0; $iIndex < count($aOptional); $iIndex++) {
                ?>
                <option <?php echo " " . esc_attr($aOptional[$iIndex]["selected"]); ?>><?php echo esc_html(
                        $aOptional[$iIndex]["content"]
                    ); ?></option>
                <?php
            }
            ?>
        </select>
        <?php
    }
    /**
     * @param $aArgs
     */
    public static function textarea($aArgs)
    {
        $aArgs = wp_parse_args(
            $aArgs, [
                      "type" => "",
                      "name" => "",
                      "id" => "",
                      "placeholder" => "",
                      "content" => "",
                      "label" => ""
                  ]
        );
        ?>
        <label for="<?php echo esc_attr($aArgs["id"]); ?>"><?php echo esc_html($aArgs["label"]); ?></label>
        <textarea id="<?php echo esc_attr($aArgs["id"]); ?>" type="text" name="<?php echo esc_attr($aArgs["name"]); ?>"
                  value="<?php echo esc_attr($aArgs["value"]); ?>"
                  placeholder="<?php echo esc_attr($aArgs["placeholder"]); ?>"><?php echo esc_attr(
                $aArgs["content"]
            ); ?></textarea>
        <?php
    }
    /**
     * @param $aArgs
     */
    public static function fileupload($aArgs)
    {
        $aArgs = wp_parse_args(
            $aArgs, [
                      "type" => "file",
                      "name" => "",
                      "id" => "",
                      "label" => ""
                  ]
        );
        ?>
        <input id="<?php echo esc_attr($aArgs["id"]); ?>" type="<?php echo esc_attr($aArgs["type"]); ?>"
               name="<?php echo esc_attr($aArgs["name"]); ?>" value="<?php echo esc_attr($aArgs["value"]); ?>">
        <label for="<?php echo esc_attr($aArgs["id"]); ?>"><?php echo esc_html($aArgs["label"]); ?></label>
        <?php
    }
    /**
     * @param $aArgs
     */
    public static function button($aArgs)
    {
        $aArgs = wp_parse_args(
            $aArgs, [
                      "type" => "",
                      "id" => "",
                      "class" => "",
                      "title" => ""
                  ]
        );
        ?>
        <button id="<?php echo esc_attr($aArgs["id"]); ?>" class="<?php echo esc_attr($aArgs["class"]); ?>" type="<?php
        echo esc_attr($aArgs["type"]); ?>">
            <?php echo esc_html($aArgs["title"]); ?>
        </button>
        <?php
    }
}
