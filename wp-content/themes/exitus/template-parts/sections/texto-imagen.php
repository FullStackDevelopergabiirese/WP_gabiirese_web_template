<?php

/**
 * texto-imagen section
 *
 * @package      gabii WordPress Starter
 * @author       SQUAD WEB.
 * @since        1.0.0
 */

$count = get_query_var('prt_count');
$activatedcontent = get_sub_field('activatedcontent');
$heading = get_sub_field('heading');
$heading2 = get_sub_field('heading2'); // color
$heading3 = get_sub_field('heading3');
$button_title = get_sub_field('button_title');
$button_title_link = get_sub_field('button_title_link');
$button_design = get_sub_field('button_design');
$content_tituloespecial = get_sub_field('content_tituloespecial');
$content_especial = get_sub_field('content_especial');
$colordefondopuntos = get_sub_field('colordefondopuntos');
$ancho_total_texto = get_sub_field('ancho_total_texto');
$ancho_total_texto_gap = get_sub_field('ancho_total_texto_gap');
$texto_centrado = get_sub_field('texto_centrado'); // text-align: justify;
$column_row = get_sub_field('column_row');
$imagencontent = get_sub_field('imagencontent');
$ancla = get_sub_field('ancla');

$imagencontentwidth = get_sub_field('imagencontentwidth');
$max_width_inline = !empty($imagencontentwidth) ? $imagencontentwidth : '100%';

$imagen_align = get_sub_field('imagen_align');
$girado = get_sub_field('girado');
$cargar_scripts = get_sub_field('cargar_scripts');
$automattic_degradado = get_sub_field('automattic_degradado');

// Controla que el CSS animado solo se cargue una vez aunque varias secciones tengan activo el degradado
static $degradado_css_cargado = false;

if ($cargar_scripts == '1') { ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<?php
}

$button_classes = [
    'btn_amarillotexto-imagen', // 0
    'btn_negrotexto-imagen',    // 1
    'btn_gristexto-imagen',     // 2
    'btn_degstexto-imagen'      // 3
];
$classbuttondesign = $button_classes[$button_design] ?? 'btn_amarillotexto-imagen';

$background_color_key = get_sub_field('background_color');
$colortext_content_key = get_sub_field('colortext_content');
$theme_colors = get_theme_colors();

$background_color = isset($theme_colors[$background_color_key]) ? $theme_colors[$background_color_key] : '#fff';
$colortext_content = isset($theme_colors[$colortext_content_key]) ? $theme_colors[$colortext_content_key] : '#000';

$clase_texto_imagen = $automattic_degradado ? 'texto-imagen' : '';

$titulo_derecha = get_sub_field('titulo_derecha'); 
$style = $titulo_derecha ? 'text-align: right;' : '';
?>

<?php
// Solo cargar CSS del degradado una vez por página
if ($automattic_degradado && !$degradado_css_cargado) :
    $degradado_css_cargado = true; ?>
    <style>
        .texto-imagen {
            width: 100%;
            height: auto;
            animation: cambiarFondo 25s infinite;
            background-size: 400% 400%;
        }

        .hero-description.p-4 {
            animation: cambiarTexto 25s infinite;
            transition: color 5s ease-in-out;
        }

        @keyframes cambiarFondo {
            0% {
                background-color: #F0FBF3;
            }

            20% {
                background-color: #F0F6FA;
            }

            45% {
                background-color: #FBFBEF;
            }

            55% {
                background-color: #FBF4EE;
            }

            75% {
                background-color: #FBEFF1;
            }

            90% {
                background-color: #F9F8F9;
            }

            100% {
                background-color: #F0FBF3;
            }
        }

        @keyframes cambiarTexto {
            0% {
                color: #083714ff;
            }

            20% {
                color: #083d5fff;
            }

            45% {
                color: #68680eff;
            }

            55% {
                color: #904f17ff;
            }

            75% {
                color: #781526ff;
            }

            90% {
                color: #791c79ff;
            }

            100% {
                color: #083714ff;
            }
        }

        .no-color-change {
    animation: none !important;
    transition: none !important;
    color: #111827 !important; /* negro por defecto */
}

@media (prefers-color-scheme: dark) {
    .no-color-change {
        color: #ffffff !important; /* blanco en modo oscuro */
    }
}

    </style>
<?php endif; ?>

<div style="display:<?php echo ($activatedcontent == 0) ? 'none' : 'block'; ?>;">
<?php if ($ancla): ?><div id="<?php echo $ancla; ?>"></div><?php endif; ?>
    <section id="<?php echo esc_attr('section-' . $count); ?>" class="texto-imagen flex <?php echo esc_attr($clase_texto_imagen . ' flex ' . ($colordefondopuntos == '1' ? 'colordefondopuntos' : '') . ' section-' . $count); ?>" style="display: flex; justify-content: space-around; background-color: <?php echo esc_attr($background_color); ?>">

        <div class="especialmobileimagen 
        <?php echo $girado ? 'contenidoalreves' : 'contenidonormal'; ?> 
        <?php echo (isset($column_row) && $column_row == '0') ? 'initial' : 'contenidovertical'; ?>" style="display: flex; align-items: center; max-width: <?php echo esc_attr($ancho_total_texto); ?>px;gap: <?php echo esc_attr($ancho_total_texto_gap); ?>px">

            <div class="lineahoriizq" style="flex: 1;">
                <?php if ($heading) : ?>
                    <h2 class="h1normal 
                        <?php echo ($texto_centrado ?? false) ? 'after:left-1/2 after:translate-x-[-50%] no-before' : ''; ?> 
                        p-4 font-semibold relative 
                        <?php echo ($texto_centrado ?? false) ? "after:content[''] after:h-1 after:rounded-full after:bg-color-brand-primary-medium after:absolute after:w-full" : ''; ?>
                        text-2xl lg:text-3xl mb-8 after:-bottom-3 
                        <?php echo ($background_color === 'transparent') ? 'text-[#00e785] dark:text-[#00e785]' : 'text-[#00e785]'; ?> 
                        dark:after:bg-color-brand-primary-medium"
                        style="<?php echo ($texto_centrado ?? false) ? 'text-align: center;' : ''; ?> <?php echo ($titulo_derecha ?? false) ? 'text-align: right;' : ''; ?>">
                        <span class="clase-heading2"><?php echo !empty($heading2) ? wp_kses_post(gabiirese_trans($heading2, 'heading2')) : ''; ?></span>
                        <span class="clase-heading1"><?php echo wp_kses_post(gabiirese_trans($heading, 'heading')); ?></span>
                        <span class="clase-heading3"><?php echo !empty($heading3) ? wp_kses_post(gabiirese_trans($heading3, 'heading3')) : ''; ?></span>
                    </h2>
                <?php endif; ?>

                <?php if ($content_tituloespecial) : ?>
                    <div class="hero-description p-4 <?php echo ($background_color === 'transparent') ? 'text-[#0e0f11] dark:text-white' : 'text-white'; ?> <?php echo (get_sub_field('column_row') && get_sub_field('texto_centrado')) ? 'contenidovertical texto-justificado' : ''; ?>" style="max-width: <?php echo esc_attr($ancho_total_texto); ?>px;">
                        <?php echo gabiirese_trans($content_tituloespecial, 'content_tituloespecial'); ?>

                        <?php if ($button_title) : ?>
                            <a href="<?php echo esc_url($button_title_link); ?>" target="_blank">
                                <div class="btnbase_textoimagenen <?php echo esc_attr($classbuttondesign); ?>">
                                    <?php echo wp_kses_post($button_title); ?>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($content_especial) : ?>
                    <div class="solo-grande hero-description p-4 lg:w-[calc(80%-20px)] <?php echo ($background_color === 'transparent') ? 'text-[#0e0f11] dark:text-white' : 'text-white'; ?> <?php echo $texto_centrado ? 'texto-justificado' : ''; ?>">
                        <?php echo gabiirese_trans($content_especial); ?>
                         <?php echo wp_kses_post(gabiirese_trans($content, 'content')); ?>1111
                    </div>
                <?php endif; ?>
            </div>

            <!-- Columna 2: Imagen ;-->
            <div class="lineahorider" style="flex: 1; padding: 20px 0; display: flex; justify-content: center; align-items: center; <?php echo ($imagen_align == 0) ? 'justify-content: flex-start;' : 'justify-content: flex-end;'; ?>">

                 <?php if ($imagencontent) : ?>
                    <img src="<?php echo esc_url($imagencontent); ?>" alt="gabii rese FSD" class="img-custom-width" style="max-width: <?php echo esc_attr($max_width_inline); ?>; height: auto; padding: 15px;margin:0 auto">
                <?php endif; ?>

            </div>
    </section>
</div>