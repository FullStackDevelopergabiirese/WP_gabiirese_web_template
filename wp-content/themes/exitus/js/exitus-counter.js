document.addEventListener('DOMContentLoaded', function () {
  const boton = document.getElementById('botonClick');
  const totalEl = document.getElementById('totalClicks');
  const form = document.getElementById('formContacto');

  if (!boton || !totalEl || !form || typeof exitusCounter === 'undefined') return;

  // 1️⃣ Obtener el total actual al cargar la página
  fetch(exitusCounter.ajaxUrl + '?action=get_clicks&_t=' + Date.now(), {
    credentials: 'same-origin',
    cache: 'no-store'
  })
    .then(r => r.json())
    .then(json => {
      if (json && json.success) totalEl.textContent = json.data.total;
    })
    .catch(err => console.error('Error get_clicks:', err));

  // 2️⃣ Manejar click del botón azul
  boton.addEventListener('click', function (e) {
    e.preventDefault(); // evita envío automático

    // Sumar click en el servidor
    fetch(exitusCounter.ajaxUrl, {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: new URLSearchParams({
        action: 'sumar_click'
        // _ajax_nonce: exitusCounter.nonce // si usas nonce
      })
    })
      .then(r => r.json())
      .then(json => {
        if (json && json.success) totalEl.textContent = json.data.total;
        else console.error('Respuesta inesperada sumar_click:', json);

        // Enviar el formulario tras actualizar el contador
        form.submit();
      })
      .catch(err => {
        console.error('Error sumar_click:', err);
        // Aunque falle el contador, enviamos el formulario
        form.submit();
      });
  });
});
