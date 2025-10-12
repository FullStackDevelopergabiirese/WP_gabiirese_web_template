<?php

/**
 * section_imagen Content section
 *
 * @package      gabii WordPress Starter
 * @author       SQUAD WEB.
 * @since        1.0.0
 */

$count = get_query_var('prt_count');
$arriba_abajo = get_sub_field('arriba_abajo');
$content_onlymobile = get_sub_field('content_onlymobile');
$selectordecolor = get_sub_field('selectordecolor'); // Obtiene el color seleccionado
?>

<section name="section_imagen" class="section_imagen <?php echo esc_attr($content_onlymobile == 1 ? 'md:hidden' : ''); ?> <?php echo esc_attr('section-' . $count); ?>">
    
        <svg class="section_imagensvg" width="2047" height="209" viewBox="0 0 2047 209" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 0C682.667 200 1365 200 2047 0V209H0V0Z" fill="<?php echo esc_attr($selectordecolor); ?>" />
        </svg>

        <svg class="section_imagensvg" width="2047" height="209" viewBox="0 0 2047 209" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 0C682.667 200 1365 200 2047 0V209H0V0Z" fill="<?php echo esc_attr($selectordecolor); ?>" transform="rotate(180 1023.5 104.5)" />
        </svg>

</section>