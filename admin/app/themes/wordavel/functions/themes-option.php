<?php
function customize_register( $wp_customize ) {

  //Adding a section
   $wp_customize->add_section(
       'google_tag_manager_setting',
       array(
           'title' => 'Google Tag Manager',
           'description' => 'Google Tag Manager configuration',
           'priority' => 9999,
       )
   );

   //Add a setting
   $wp_customize->add_setting(
       'show_google_tag'
   );


   //Add control
   $wp_customize->add_control(
       'show_google_tag',
       array(
           'type' => 'checkbox',
           'label' => 'Active Google Tag Manager',
           'section' => 'google_tag_manager_setting',
       )
   );

   //Add a setting
   $wp_customize->add_setting(
       'show_google_code',
       array(
           'default' => 'Add Code',
       )
   );

   //Add control
   $wp_customize->add_control(
       'show_google_code',
       array(
           'label' => 'Google Code',
           'section' => 'head_google_tag',
           'type' => 'text',
       )
   );


   //Add control
   $wp_customize->add_control(
       'show_google_code',
       array(
           'label' => 'Google Code Tag Manager',
           'section' => 'google_tag_manager_setting',
           'type' => 'text',
       )
   );

}
add_action( 'customize_register', 'customize_register' );

?>
