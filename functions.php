<?php 



function jn_disable_dates_add_menu() {
add_menu_page('Disable Dates', 'Disable Dates', 'manage_options', 'disable_dates', 'disable_dates_callback', 'dashicons-calendar-alt', 3);
}
add_action('admin_menu', 'jn_disable_dates_add_menu');






function disable_dates_callback() {

echo '<div class="wrap">
    <h1>Dsiable Settings</h1>
    <form method="post" action="options.php">';

        settings_fields('dd_settings'); // settings group name
        do_settings_sections('dd-slug'); // just a page slug
        submit_button();

        echo '</form>
</div>';
}

function jn_register_setting() {

add_settings_section(
'dd_settings_id', // section ID
'', // title (if needed)
'', // callback function (if needed)
'dd-slug' // page slug
);

/**
* Settings 1
*/

register_setting(
'dd_settings', // settings group name
'jn_dd_1', // option name
'sanitize_text_field' // sanitization function
);

add_settings_field(
'jn_dd_1',
'Disable Dates 1',
'jn_dd_1', // function which prints the field
'dd-slug', // page slug
'dd_settings_id', // section ID
array(
'label_for' => 'jn_dd_1',
'class' => '', // for <tr> element
    )
    );

    /**
    * Settings 2
    */

    register_setting(
    'dd_settings', // settings group name
    'jn_dd_2', // option name
    'sanitize_text_field' // sanitization function
    );

    add_settings_field(
    'jn_dd_2',
    'Dsiable Dates 2',
    'jn_dd_2', // function which prints the field
    'dd-slug', // page slug
    'dd_settings_id', // section ID
    array(
    'label_for' => 'jn_dd_2',
    'class' => '', // for
<tr> element
    )
    );
    }

    add_action('admin_init', 'jn_register_setting');

    /**
    * Settings 1 input field
    */
    function jn_dd_1()
    {

    $text = get_option('jn_dd_1');

    printf(
    '<input type="text" id="jn_dd_1" name="jn_dd_1" value="%s" />',
    esc_attr($text)
    );
    }

    /**
    * Settings 2 input field
    */
    function jn_dd_2()
    {

    $text = get_option('jn_dd_2');

    printf(
    '<input type="text" id="jn_dd_2" name="jn_dd_2" value="%s" />',
    esc_attr($text)
    );
    }