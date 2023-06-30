<?php get_header(); ?>

<?php $current_fp = get_query_var('fpage'); ?>

<?php if (!$current_fp) {
        get_template_part( 'single', 'placowki-index' );
    } else if ($current_fp == 'kadra') {
        get_template_part( 'single', 'placowki-kadra' );
    } else if ($current_fp == 'o-nas') {
        get_template_part( 'single', 'placowki-o-nas' );
    } else if ($current_fp == 'zajecia') {
        get_template_part( 'single', 'placowki-zajęcia' );
    } else if ($current_fp == 'aktualnosci') {
        get_template_part( 'single', 'placowki-aktualnosci' );
    }
?>

<?php get_footer(); ?>