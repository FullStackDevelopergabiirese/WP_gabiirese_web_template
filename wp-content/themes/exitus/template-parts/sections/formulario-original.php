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
$ancho_total_texto = get_sub_field('ancho_total_texto');
?>


<style>
  .formulario-contacto {
    max-width: 500px;
    margin: 2rem auto;
    padding: 1.5rem;
    /* background: #f9f9f9; */
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
  }

  .formulario-contacto h2 {
    text-align: center;
    margin-bottom: 1rem;
    color: #333;
  }

  .formulario-contacto label {
    font-weight: bold;
    margin-bottom: 2.3rem;
    display: block;
    color: #444;
  }

  .formulario-contacto input {
    width: 100%;
    padding: 0.6rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
  }

  .formulario-contacto button {
    width: 100%;
    padding: 0.7rem;
    background: #1321AC;
    color: white;
    font-size: 1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .formulario-contacto button:hover {
    background: #0e187a;
  }

  .mensaje {
    text-align: center;
    margin-top: 1rem;
    font-weight: bold;
  }

  .mensaje.ok {
    color: green;
  }

  .mensaje.error {
    color: red;
  }

  #tooltip {
    opacity: 0;
    transition: opacity 0.6s ease;
    position: absolute;
    top: 50%;
    left: -10px;
    transform: translate(-100%, -50%);
    background: #212830;
    color: #D1D7E0;
    padding: 10px 15px;
    border-radius: 8px;
    text-align: center;
    pointer-events: none;
    max-width: 250px;
    z-index: 10;
  }

  .formulario-contacto {
    position: relative;
  }

  #tooltip {
    background: #212830;
    color: #fff;
    padding: 20px;
    border-radius: 12px;
    max-width: 300px;
    font-family: Arial, sans-serif;
  }

  #tooltip .icono-principal {
    text-align: center;
    margin-bottom: 20px;
  }

  #tooltip .icono-principal em {
    font-size: 50px;
    color: rgb(246 228 163);
  }

  #tooltip .bloque {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 15px;
    text-align: left;
  }

  #tooltip .bloque em {
    font-size: 30px;
    color: #fff;
    flex-shrink: 0;
  }

  #tooltip .bloque span {
    line-height: 1.4;
  }

  .herolabelform {
    font-size: 30px;
    line-height: 33px;margin-bottom: 35px;
    font-family: 'Obviously', 'gabii', sans-serif;
  }

</style>

<section class="developer block <?php echo esc_attr($content_onlymobile == 1 ? 'md:hidden' : ''); ?> <?php echo esc_attr('section-' . $count); ?>" style="display: flex;flex-direction: column;flex-wrap: nowrap;align-content: space-between;justify-content: center;max-width: <?php echo esc_attr($ancho_total_texto); ?>px;margin:0 auto;">
      <div class="formulario-contacto bg-white text-gray-900 antialiased text-black dark:bg-gray-800 dark:text-white transition-all duration-300" id="bloque-contacto">

        <div id="tooltip">
          <div class="icono-principal">
            <em class="ni ni-mail-fill"></em>
          </div>

          <div class="bloque">
            <em class="ni ni-send"></em>
            <span>hola@exitus.es<br />
              <?php _e('Te responderemos en el plazo de un día hábil', 'exitus'); ?>.</span>
          </div>

          <div class="bloque">
            <em class="ni ni-happy-fill"></em>
            <span>
              687 483 746<br />
              <?php _e('Horario de atención', 'exitus'); ?>:<br />
              <?php _e('Lunes a viernes de 09:00 a 18:00 (UTC +1)', 'exitus'); ?>
            </span>
          </div>
        </div>

        <form method="POST" action="" id="formContacto">
          <p name="hero" class="herolabelform "><?php _e('Diferénciate y consigue el', 'exitus'); ?><span class="clase-heading2"> <?php _e('éxito que te mereces!', 'exitus'); ?></span></p>
          <input type="text" id="nombre" name="nombre" autocomplete="name" placeholder="Nombre" required>
          <input type="email" id="email" name="email" autocomplete="email" required placeholder="Email">
          <input type="text" id="department" name="department" placeholder="Mensaje">
          <button type="submit"><?php _e('Quiero hablar contigo', 'exitus'); ?></button>
        </form>

        <?php if (isset($_GET['mail']) && $_GET['mail'] === 'ok'): ?>
          <p class="mensaje ok" id="mensajeCorreo">✅ <?php _e('Correo enviado con éxito', 'exitus'); ?>.</p>
        <?php elseif (isset($_GET['mail']) && $_GET['mail'] === 'error'): ?>
          <p class="mensaje error">❌ <?php _e('Hubo un error al enviar el correo', 'exitus'); ?>.</p>
        <?php endif; ?>

      </div>

      <script>
        const form = document.getElementById('formContacto');
        const tooltip = document.getElementById('tooltip');

        form.addEventListener('click', () => {
          tooltip.style.opacity = '1';
        });
      </script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("formContacto");
    const mensaje = document.getElementById("mensajeCorreo");

    // Si ya está en localStorage, ocultamos el formulario
    if (localStorage.getItem("correoEnviado") === "true") {
      if (form) form.style.display = "none";
      if (mensaje) mensaje.style.display = "block";
      form.display= "none";
    }

    // Si venimos de ?mail=ok, guardamos en localStorage
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("mail") === "ok") {
      localStorage.setItem("correoEnviado", "true");
      if (form) form.style.display = "none";
      if (mensaje) mensaje.style.display = "block";
    }
  });
</script>

</section>
