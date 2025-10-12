<?php

/**
 * developer Content section
 *
 * @package      gabii WordPress Starter
 * @author       SQUAD WEB.
 * @since        1.0.0
 */

$count = get_query_var('prt_count');

$activatedcontent = get_sub_field('activatedcontent');
$heading = get_sub_field('heading');
$heading2 = get_sub_field('heading2');
$heading3 = get_sub_field('heading3');
$content = get_sub_field('content');
$ancho_total_texto = get_sub_field('ancho_total_texto');
$imagencontent = get_sub_field('imagencontent');
$content_onlymobile = get_sub_field('content_onlymobile');
$justificar_texto = get_sub_field('justificar_texto');
$texto_gsap = get_sub_field('texto_gsap');
$ancla = get_sub_field('ancla');

$background_color_key = get_sub_field('background_color');
$color_key = get_sub_field('background_color');
$theme_colors = get_theme_colors();
$background_color = isset($theme_colors[$color_key]) ? $theme_colors[$color_key] : '#f7f7fd';
?>
<div style="display:<?php echo ($activatedcontent == 0) ? 'none' : 'block'; ?>;">
    <section class="hero_content <?php echo esc_attr('section-' . $count); ?>" style="background-color: <?php echo esc_attr($background_color); ?>;">



        <?php if ($ancla): ?><div id="<?php echo $ancla; ?>"></div><?php endif; ?>
        <div class="container" style="max-width: <?php echo esc_attr($ancho_total_texto); ?>px;">
            <div class="hero-content">

                <?php if ($texto_gsap == 1): ?>
                    <main>
                        <?php if ($heading): ?>
                            <section id="inicio">
                                <h1 class="hero-title <?php echo esc_html($justificar_texto); ?>">

                                    <?php echo gabiirese_trans($heading, 'heading');; ?>

                                    <?php if (!empty($heading2)): ?>
                                        <span class="clase-heading2"><?php echo gabiirese_trans($heading2, 'heading2');; ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($heading3)): ?>
                                        <?php echo gabiirese_trans($heading3, 'heading3');; ?>
                                    <?php endif; ?>
                                </h1>
                            </section>
                        <?php endif; ?>
                    </main>
                <?php else: ?>
                    <?php if ($heading): ?>
                        <h1 class="h1hero">
                            <?php echo gabiirese_trans($heading, 'heading');; ?>
                            <?php if (!empty($heading2)): ?>
                                <span class="clase-heading2"><?php echo gabiirese_trans($heading2, 'heading2');; ?></span>
                                <?php echo gabiirese_trans($heading3, 'heading3');; ?>
                            <?php endif; ?>
                        </h1>
                    <?php endif; ?>
                <?php endif; ?>


                <?php if ($content): ?>
                    <div class="hero-description">
                        <?php echo gabiirese_trans($content, 'content'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($imagencontent): ?>
                <div class="hero-image">
                    <img src="<?php echo esc_url($imagencontent['url']); ?>" alt="<?php echo esc_attr($imagencontent['alt']); ?>" width="600" height="400" loading="eager" fetchpriority="high" />
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<!-- <php if ($texto_gsap == 1): ?> -->
<?php if ($texto_gsap == 1 && !wp_is_mobile()): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
<?php endif; ?>