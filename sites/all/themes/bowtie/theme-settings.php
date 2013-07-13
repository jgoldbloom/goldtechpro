<?php

function bowtie_form_system_theme_settings_alter(&$form, $form_state) {

  $form['advansed_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Advansed Theme Settings'),
  );


  $form['advansed_theme_settings']['tm_sliders'] = array(
    '#type' => 'select',
    '#title' => t('Sliders'),
    '#default_value' => theme_get_setting('tm_sliders'),
    '#options' => array(
        '0' => t('Content Slider'),
        '1' => t('Nivo Slider'),
        '2' => t('Piecemaker Slider'),
    ),
  );
  
  $form['advansed_theme_settings']['tm_layouts'] = array(
    '#type' => 'select',
    '#title' => t('Layouts'),
    '#default_value' => theme_get_setting('tm_layouts'),
    '#options' => array(
        '0' => t('Blog & Twitter'),
        '1' => t('Blog & Testimonials'),
        '2' => t('Services & Testimonials'),
        '3' => t('Services & Twitter'),
    ),
  );

  $form['advansed_theme_settings']['tm_blog'] = array(
    '#type' => 'select',
    '#title' => t('Blog'),
    '#default_value' => theme_get_setting('tm_blog'),
    '#options' => array(
        '0' => t('Full Width'),
        '1' => t('Left Sidebar'),
        '2' => t('Right Sidebar'),
    ),
  );

  $form['advansed_theme_settings']['tm_archive'] = array(
    '#type' => 'select',
    '#title' => t('Archive'),
    '#default_value' => theme_get_setting('tm_archive'),
    '#options' => array(
        '0' => t('Full Width'),
        '1' => t('Left Sidebar'),
        '2' => t('Right Sidebar'),
    ),
  );

  $form['advansed_theme_settings']['tm_portfolio'] = array(
    '#type' => 'select',
    '#title' => t('Portfolio'),
    '#default_value' => theme_get_setting('tm_portfolio'),
    '#options' => array(
        '0' => t('One Column'),
        '1' => t('Two Columns'),
        '2' => t('Three Columns'),
    ),
  );

  $form['advansed_theme_settings']['socacc'] = array(
    '#type' => 'fieldset',
    '#title' => t('Accounts'),
  );

  $form['advansed_theme_settings']['socacc']['tm_ac_twitter'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter.com'),
    '#default_value' => theme_get_setting('tm_ac_twitter'),
  );
  $form['advansed_theme_settings']['socacc']['tm_ac_setting_0'] = array(
    '#type' => 'textfield',
    '#title' => t('FaceBook.com'),
    '#default_value' => theme_get_setting('tm_ac_setting_0'), '#description' => t('Enter the link to your account without http://facebook.com'),
  );
  $form['advansed_theme_settings']['socacc']['tm_ac_setting_1'] = array(
    '#type' => 'textfield',
    '#title' => t('Dribbble.com'),
    '#default_value' => theme_get_setting('tm_ac_setting_1'), '#description' => t('Enter the link to your account without http://dribbble.com'),
  );
  $form['advansed_theme_settings']['socacc']['tm_ac_setting_2'] = array(
    '#type' => 'textfield',
    '#title' => t('Forrst.com'),
    '#default_value' => theme_get_setting('tm_ac_setting_2'), '#description' => t('Enter the link to your account without http://forrst.com'),
  );

}

