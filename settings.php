<div class="wrap x5-settings">
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
















</div>
