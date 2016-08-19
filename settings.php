<div class="wrap x5-settings">
    <h2>Center 9 Theme Settings</h2>
    <hr>



    <?php
    if ( isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'update-theme-info' ) {

        delete_option('site_title');
        delete_option('site_description');
        delete_option('site_menu_type');

        add_option('site_title', $_REQUEST['site_title']);
        add_option('site_description', $_REQUEST['site_description']);
        add_option('site_menu_type', $_REQUEST['site_menu_type']);



    }
    $menu_type = get_option('site_menu_type');
    $menu_type_A_checked = $menu_type_B_checked = $menu_type_C_checked = null;
    if ( $menu_type ) {
        $menu = "menu_type_{$menu_type}_checked";
        $$menu = "checked=1";
    }

    ?>
    <form action="admin.php?page=x5_theme_settings" method="POST">
        <input type="hidden" name="mode" value="update-theme-info">
        <div><input name="site_title" value="<?php echo get_option('site_title')?>"></div>

        * Description of HEAD tag. Input keywords. Not description.<br>
        * HEAD 의 description 메타. 사이트의 설명보다는, 키워드 위주로 입력.
        <div><textarea name="site_description"><?php echo get_option('site_description')?></textarea></div>

        <div>
            Select Menu Type:
            <input type="radio" name="site_menu_type" value="A"<?php echo $menu_type_A_checked?>> Type A ( default )
            <input type="radio" name="site_menu_type" value="B"<?php echo $menu_type_B_checked?>> Type B ( without background )
            <input type="radio" name="site_menu_type" value="C"<?php echo $menu_type_C_checked?>> Type C ( with background )
        </div>

        <input type="submit">
    </form>











    <hr>
    <a href="./admin.php?page=x5_theme_settings&mode=export-text-translation">Export Text Translation</a>

    <?php
    if ( isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'export-text-translation' ) {
        echo "<h2>Export Text Translation</h2>";
        $prefix = get_text_translation_option_name_prefix();
        global $wpdb;
        $results = $wpdb->get_results( "SELECT * FROM $wpdb->options WHERE option_name LIKE '$prefix%'", OBJECT );

        echo "<textarea>".base64_encode(json_encode($results))."</textarea>";

    }
    ?>



    <h2>Import</h2>
    <form action="admin.php?page=x5_theme_settings" method="POST">
        <input type="hidden" name="mode" value="import">
        <textarea name="content"></textarea>
        <input type="submit">
    </form>


    <?php


    if ( isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'import' ) {
        echo "<h2>Import Text Translation</h2>";
        // import here.
        $_REQUEST['content'] = stripslashes($_REQUEST['content']);
        if ( ! empty($_REQUEST['content']) ) {
            $arr = json_decode(base64_decode($_REQUEST['content']), true);
            if ( $arr ) {
                $pre = get_text_translation_option_name_prefix();
                foreach ( $arr as $e ) {

                    list ( $a, $b, $c ) = explode('-', $e['option_name'], 3);
                    $name = "$pre$c";
                    delete_option( $name );

                    $value = $e['option_value'];

                    if ( empty($value) ) {

                    }
                    else {
                        $value = unserialize( $value ) ;
                        add_option( $name, $value);
                    }
                }
            }

        }
    }
    ?>






    <hr>
    <h2>Translation</h2>



    <?php
    if ( isset($_REQUEST['mode'] ) && $_REQUEST['mode'] == 'translate' ) {
        $_REQUEST['original_text'] = stripslashes($_REQUEST['original_text']);
        $_REQUEST['content'] = stripslashes($_REQUEST['content']);
        if ( empty( $_REQUEST['original_text'] ) ) $_REQUEST['original_text'] = '&nbsp;';
        $option_name = $_REQUEST['option_name'];


        delete_option( $option_name );
        add_option( $option_name, ['original_text' => $_REQUEST['original_text'], 'content' => $_REQUEST['content']] );

    }

    $files = getFiles( get_stylesheet_directory(), true, '/php/' );
    $files2 = getFiles( __LMS_PATH__, true, '/php/' );
    $files = array_merge( $files2, $files );


    foreach( $files as $file ) {

        $content = file_get_contents($file);

        $count = preg_match_all("/_text\(['\"](.*)['\"]\)/im", $content, $matches);

        if ( $count ) {
            $patterns = $matches[0];
            $codes = $matches[1];
            for( $i = 0; $i < count($patterns); $i ++ ) {
                $pattern = $patterns[$i];
                $code = $str = $codes[$i];
                $md5 = md5($str);
                $option_name = get_text_translation_option_name( $md5 );
di($option_name);
                $org = esc_html($str);
                $str = _getText($str);
?>
    <form action="admin.php?page=x5_theme_settings" method="POST">
        <input type="hidden" name="mode" value="translate">
        <input type="hidden" name="option_name" value="<?php echo $option_name?>">
        <input type="hidden" name="original_text" value="<?php echo $org?>">

        <?php echo $code?><br>

        <textarea name="content" style='width:80%;'><?php echo $str?></textarea>
        <input type="submit">
    </form>
    <?php
            }
            echo "<hr>";
        }



    }

    ?>










</div><!--/wrap-->

<?php

function getFiles($dir, $re=true, $pattern=null)
{
    $tmp = array();
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $file_path = $dir . DIRECTORY_SEPARATOR . $file;
                if ( is_dir($file_path) ) {
                    if ( $re ) {
                        $tmp2 = getFiles($file_path, $re, $pattern);
                        if ( $tmp2 ) $tmp = array_merge($tmp, $tmp2);
                    }
                }
                else {
                    if ( $pattern ) {
                        if ( preg_match($pattern, $file) ) {
                        }
                        else continue;
                    }
                    array_push($tmp, $dir . DIRECTORY_SEPARATOR . $file);
                }
            }
        }
        closedir($handle);
        return $tmp;
    }
}


?>
