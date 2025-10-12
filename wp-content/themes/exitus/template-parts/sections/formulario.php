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

<?php
function getDay()
{
  setlocale(LC_TIME, 'es_ES.UTF-8');
  return strftime('%A %-d de %B %Y');
}
?>

<style>
  .formulario-contacto {
    max-width: 500px;
    margin: 2rem auto;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgb(0 0 0 / .1);
    font-family: Arial, sans-serif
  }

  .formulario-contacto h2 {
    text-align: center;
    margin-bottom: 1rem;
    color: #333
  }

  .formulario-contacto label {
    margin-bottom: 2.3rem;
    display: block;
    color: #6d6b6b
  }

  .formulario-contacto input {
    width: 100%;
    padding: .6rem;
    margin-bottom: 1.5rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem
  }

  .formulario-contacto button {
    width: 100%;
    padding: .7rem;
    background: #1321AC;
    color: #fff;
    font-size: 1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease
  }

  .formulario-contacto button:hover {
    background: #0e187a
  }

  .mensaje {
    text-align: center;
    margin-top: 1rem;
    font-weight: 700
  }

  .mensaje.ok {
    color: green
  }

  .mensaje.error {
    color: red
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
    z-index: 10
  }

  .formulario-contacto {
    position: relative
  }

  #tooltip {
    background: #212830;
    color: #fff;
    padding: 20px;
    border-radius: 12px;
    max-width: 300px;
    font-family: Arial, sans-serif
  }

  #tooltip .icono-principal {
    text-align: center;
    margin-bottom: 20px
  }

  #tooltip .icono-principal em {
    font-size: 50px;
    color: #f6e4a3
  }

  #tooltip .bloque {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 15px;
    text-align: left
  }

  #tooltip .bloque em {
    font-size: 30px;
    color: #fff;
    flex-shrink: 0
  }

  #tooltip .bloque span {
    line-height: 1.4
  }

  .herolabelform {
    font-size: 30px;
    line-height: 33px;
    margin-bottom: 35px;
    font-family: 'Obviously', 'gabii', sans-serif
  }

  .login-box {
    width: auto;
    padding: 40px;
    box-sizing: border-box;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    z-index: 2;
    transition: filter 0.5s
  }

  .login-box .user-box {
    position: relative
  }

  .login-box .user-box inpu2t {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #000;
    background: #fff0;
    border: none;
    border-bottom: 1px solid #fbd500;
    outline: none
  }

  .login-box .user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 10px;
    font-size: 15px;
    pointer-events: none;
    transition: .5s
  }

  .login-box .user-box input:focus~label,
  .login-box .user-box input:valid~label {
    top: -30px;
    left: 0;
    color: #881abd;
    font-size: 12px
  }

  .card {
    width: 450px;
    background-color: #fff;
    border-radius: 17px 17px 27px 27px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.5s, transform 0.5s;
    transform: translateX(40px);
    position: absolute;
    z-index: 1;
    top: 6rem;
    right: -470px;
    height: 300px
  }

  .card.active {
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0)
  }

  .title {
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
    padding-left: 20px;
    border-bottom: 1px solid #f1f1f1;
    font-weight: 700;
    font-size: 13px;
    color: #47484b;
    position: relative
  }

  .title::after {
    content: '';
    width: 8ch;
    height: 1px;
    position: absolute;
    bottom: -1px;
    left: 20px;
    background-color: #47484b
  }

  .comments {
    display: grid;
    grid-template-columns: 35px 1fr;
    gap: 20px;
    padding: 20px
  }

  .comment-react {
    width: 35px;
    background-color: #f1f1f1;
    border-radius: 5px;
    display: grid;
    grid-template-columns: auto;
    margin: 0
  }

  .comment-react button {
    width: 35px;
    height: 35px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff0;
    border: 0;
    outline: none;
    cursor: pointer
  }

  .comment-react button:after {
    content: '';
    width: 40px;
    height: 40px;
    position: absolute;
    left: -2.5px;
    top: -2.5px;
    background-color: #f5356e;
    border-radius: 50%;
    z-index: 0;
    transform: scale(0)
  }

  .comment-react button:hover:after {
    animation: ripple 0.6s ease-in-out forwards
  }

  .comment-react button svg {
    position: relative;
    z-index: 9
  }

  .comment-react button:hover svg,
  .comment-react button:hover svg path {
    fill: #f5356e;
    stroke: #f5356e
  }

  .comment-react hr {
    width: 80%;
    height: 1px;
    background-color: #dfe1e6;
    margin: auto;
    border: 0
  }

  .comment-react span {
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    font-size: 13px;
    font-weight: 600;
    color: #707277
  }

  .comment-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 0;
    margin: 0
  }

  .comment-container .user {
    display: grid;
    grid-template-columns: 40px 1fr;
    gap: 10px
  }

  .comment-container .user .user-pic {
    width: 40px;
    height: 40px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f1f1f1;
    border-radius: 50%
  }

  .comment-container .user .user-pic:after {
    content: '';
    width: 9px;
    height: 9px;
    position: absolute;
    right: 0;
    bottom: 0;
    border-radius: 50%;
    background-color: #0fc45a;
    border: 2px solid #fff
  }

  .comment-container .user .user-info {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 3px
  }

  .comment-container .user .user-info span {
    font-weight: 700;
    font-size: 12px;
    color: #47484b
  }

  .comment-container .user .user-info p {
    font-weight: 600;
    font-size: 10px;
    color: #acaeb4
  }

  .comment-container .comment-content {
    font-size: 12px;
    line-height: 16px;
    font-weight: 600;
    color: #5f6064
  }

  .text-box {
    width: 100%;
    background-color: #f1f1f1;
    padding: 8px
  }

  .text-box .box-container {
    background-color: #fff;
    border-radius: 8px 8px 21px 21px;
    padding: 8px
  }

  .text-box textarea {
    width: 100%;
    height: 40px;
    resize: none;
    border: 0;
    border-radius: 6px;
    padding: 12px 12px 10px 12px;
    font-size: 13px;
    outline: none;
    caret-color: #881abd;
    color: #000
  }

  .text-box .formatting {
    display: grid;
    grid-template-columns: auto auto auto auto auto 1fr
  }

  .text-box .formatting button {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff0;
    border-radius: 50%;
    border: 0;
    outline: none;
    cursor: pointer
  }

  .text-box .formatting button:hover {
    background-color: #f1f1f1
  }

  .text-box .formatting .send {
    width: 30px;
    height: 30px;
    background-color: #0a84ff;
    margin: 0 0 0 auto
  }

  .text-box .formatting .send:hover {
    background-color: #026eda
  }

  @keyframes ripple {
    0% {
      transform: scale(0);
      opacity: .6
    }

    100% {
      transform: scale(1);
      opacity: 0
    }
  }

  @media (max-width:950px) {
    #comments-card {
      display: none;
    }

    .login-comments-wrapper {
      flex-direction: column;
      min-width: 400px
    }

    .card {
      margin: 40px 0 0 0;
      width: 90vw
    }
  }

  .logo-flotante {
    text-align: center;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    top: 34px;
    position: relative
  }
</style>


<style>
  #botonClick{outline:none;height:40px;width:100%;border-radius:40px;background:#fff;border:2px solid #1ECD97;color:#1ECD97;font-size:12px;font-weight:700;cursor:pointer;transition:all 0.25s ease;display:flex;align-items:center;justify-content:center}#botonClick:hover{color:#fff;background:#1ECD97}#botonClick:active{letter-spacing:2px}#botonClick:after{content:"Enviar"}#botonClick.onclic{width:40px;border-color:#bbb;border-left-color:#1ECD97;font-size:0;animation:rotating 2s 0.25s linear infinite}#botonClick.validate{width:130px;font-size:12px;color:#fff;background:#1ECD97}#botonClick em{transition:all 0.25s ease;font-style:normal}@keyframes rotating{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}
  
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


    <div class="login-box">
      <form method="POST" action="" id="formContacto">

        <p name="hero" class="herolabelform">
          <?php _e('¡Diferénciate y alcanza el', 'exitus'); ?>
          <span class="clase-heading2">
            <?php _e('éxito con exitus.es!', 'exitus'); ?>
          </span>
        </p>

        <div class="user-box">
          <input type="text" id="nombre" name="nombre" autocomplete="name" required />
          <label for="nombre">Nombre</label>
        </div>

        <div class="user-box">
          <input type="email" id="email" name="email" autocomplete="email" required />
          <label for="email" class="text-gray-900 dark:text-[#fbd500]">Email</label>
        </div>

        <button type="button" class="send" title="Send" id="botonClick">
          <em class="ni ni-chevrons-up"></em>
        </button>


        <div class="card" id="comments-card">
          <div class="title"><?php _e('Mensaje para Exitus', 'exitus'); ?></div>
          <div class="comments">
            <div class="comment-react">
              <button type="button"><svg width="20" height="20" fill="#b1b2b8" viewBox="0 0 20 20">
                  <path d="M10 18l-1.45-1.32C4.4 12.36 2 10.28 2 7.5A4.5 4.5 0 0 1 6.5 3c1.54 0 3.04.99 3.57 2.36h.87C10.46 3.99 11.96 3 13.5 3 17.09 3 18 6.19 18 7.5c0 2.78-2.4 4.86-6.55 9.18L10 18z" stroke="#b1b2b8" stroke-width="1.25" fill="none" />
                </svg></button>
              <hr>
              <div id="contador" style="text-align:center">
                <span id="totalClicks"></span>
              </div>

            </div>
            <div class="comment-container">
              <div class="user">
                <div class="user-pic"></div>
                <div class="user-info">
                  <span>UsuarioDemo</span>
                  <p><?php echo getDay(); ?></p>
                </div>
              </div>
              <div class="comment-content">
                <?php _e('Gracias por contactar conmigo', 'exitus'); ?>

              </div>
            </div>
          </div>
          <div class="text-box">
            <div class="box-container">
              <textarea id="department" name="department" placeholder="Escribe un comentario..." required></textarea>

            </div>
          </div>
        </div>
      </form>
    </div>

  </div>


  <?php if (isset($_GET['mail']) && $_GET['mail'] === 'ok'): ?>
    <p class="mensaje ok" id="mensajeCorreo"> <?php _e('Correo enviado con éxito', 'exitus'); ?>.</p>
  <?php elseif (isset($_GET['mail']) && $_GET['mail'] === 'error'): ?>
    <p class="mensaje error">❌ <?php _e('Hubo un error al enviar el correo', 'exitus'); ?>.</p>
  <?php endif; ?>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('formContacto');
      const tooltip = document.getElementById('tooltip');
      const nombreInput = document.getElementById('nombre');
      const emailInput = document.getElementById('email');
      const card = document.getElementById('comments-card');
      const submitButton = document.getElementById('botonClick');
      let shown = false;


      submitButton.disabled = true;
      submitButton.style.opacity = '0.5';
      submitButton.style.cursor = 'not-allowed';


      function toggleSubmitButton() {
        if (nombreInput.value.trim() && emailInput.value.trim()) {
          submitButton.disabled = false;
          submitButton.style.opacity = '1';
          submitButton.style.cursor = 'pointer';
        } else {
          submitButton.disabled = true;
          submitButton.style.opacity = '0.5';
          submitButton.style.cursor = 'not-allowed';
        }
      }


      [nombreInput, emailInput].forEach(input => {
        input.addEventListener('focus', () => {
          tooltip.style.opacity = '1';
          tooltip.style.pointerEvents = 'auto';
        });


        input.addEventListener('input', toggleSubmitButton);
      });


      nombreInput.addEventListener('click', function() {
        if (!shown) {
          card.classList.add('active');
          shown = true;
        }
      });


      form.addEventListener('submit', function(e) {
        const fields = [nombreInput, emailInput, form.querySelector('[name="department"]')];
        let valid = true;
        fields.forEach(f => {
          if (!f.value.trim()) valid = false;
        });

        if (!valid) {
          e.preventDefault();
          alert('Rellena todos los campos antes de enviar.');
        }
      });
    });
  </script>


  <script>
    $(function() {
      $("#botonClick").click(function() {
        var boton = $(this);

        boton.addClass("onclic");
        boton.find("em").removeClass().text("");

        setTimeout(function() {
          boton.removeClass("onclic").addClass("validate");
          boton.find("em").removeClass().addClass("fa fa-check");
        }, 2500);

     
      });
    });
  </script>


  <div class="logo-flotante">
    <img src="/wp-content/uploads/2025/10/logo5_.png" width="60" height="60" alt="gabiirese - Full Stack Developer" loading="lazy">
  </div>


</section>