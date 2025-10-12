<?php

/**
 * Simpletext Content section
 *
 * @package      gabii WordPress Starter
 * @author       SQUAD WEB.
 * @since        1.0.0
 */

$count = get_query_var('prt_count');
$activatedcontent = get_sub_field('activatedcontent');
$heading = get_sub_field('heading');
$heading2 = get_sub_field('heading2');
$heading_degradado = get_sub_field('heading_degradado');
$content = get_sub_field('content');
$ancho_total_texto = get_sub_field('ancho_total_texto');
$justificar_texto = get_sub_field('justificar_texto');
$titulo_centrado = get_sub_field('titulo_centrado');
$ancla = get_sub_field('ancla');

$background_color_key = get_sub_field('background_color');
$colortext_content_key = get_sub_field('colortext_content');
$theme_colors = get_theme_colors();
$background_color = isset($theme_colors[$background_color_key]) ? $theme_colors[$background_color_key] : '#fff';
$colortext_content = isset($theme_colors[$colortext_content_key]) ? $theme_colors[$colortext_content_key] : '#000';
?>

<div class="experiencia_religiosa">
    <div style="display:<?php echo ($activatedcontent == 0) ? 'none' : 'block'; ?>;">
        <section class="simpletext-content flex justify-center flex-col md:flex-row especialdesktop <?php echo esc_attr('section-' . $count); ?>" style="background-color: <?php echo esc_attr($background_color); ?>;">

            <?php if ($ancla): ?><div id="<?php echo $ancla; ?>"></div><?php endif; ?>

            <div class="container boxmobile" style="display: flex;flex-direction: column;flex-wrap: wrap;max-width: <?php echo esc_attr($ancho_total_texto); ?>px;<?php echo $titulo_centrado ? 'align-items: center;' : 'after:left-0'; ?>">

                <h2 class="h1normal 
                    <?php echo $heading_degradado ? 'tagline gradient-text' : 'text-slate-600 dark:text-white'; ?> 
                    dark:after:bg-color-brand-primary-medium"
                    style="<?php echo $titulo_centrado ? 'text-align: center;' : ''; ?>">

                    <?php echo gabiirese_trans($heading, 'heading'); ?>
                    <?php if ($heading_degradado === '1') echo gabiirese_trans($heading2, 'heading2'); ?>
                </h2>

                <?php if ($content): ?>
                    <div class="hero-description p-4 <?php echo esc_attr($justificar_texto) ? 'justificar_texto' : ''; ?>">
                        <span class="<?php echo ($colortext_content === 'transparent') ? 'text-slate-600 no-color-change' : 'dark:text-white '; ?>"
                            <?php echo ($colortext_content !== 'transparent') ? 'style="color:' . esc_attr($colortext_content) . '"' : ''; ?>>
                            <?php echo gabiirese_trans($content, 'content'); ?>
                        </span>
                    </div>
                <?php endif; ?>

                <p class="actions">
                <div class="flex flex-col md:flex-row items-center gap-4 md:gap-10">
                     <a href="https://en.wiktionary.org/wiki/webmaster" target="_blank" rel="nofollow"><div class="btnbase_textoimagenen88 btn_verdetexto"><span>Webmaster</span></div></a>
                    <a href="https://github.com/" target="_blank" rel="dofollow"><div class="btnbase_textoimagenen88 btn_amarillotexto-imagen88"><span>Repositorio de código Github</span></div></a>
                </div>
                </p>

            </div>
        </section>
    </div>
</div>