// Paso a paso:
// 1. Definir la fecha objetivo del evento.
// 2. Calcular la diferencia entre la fecha actual y la fecha objetivo.
// 3. Extraer días, horas, minutos y segundos restantes.
// 4. Actualizar el DOM cada segundo.
// 5. Mostrar mensaje cuando el evento haya comenzado.

const eventDate = new Date('2026-12-31T00:00:00'); // Cambia la fecha y hora aquí

function updateCountdown() {
    const now = new Date();
    const diff = eventDate - now;

    const countdownMessage = document.getElementById('countdown-message');
    if (diff <= 0) {
        document.getElementById('days').textContent = '00';
        document.getElementById('hours').textContent = '00';
        document.getElementById('minutes').textContent = '00';
        document.getElementById('seconds').textContent = '00';
        countdownMessage.textContent = '¡El evento ha comenzado!';
        return;
    }

    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((diff / (1000 * 60)) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    document.getElementById('days').textContent = String(days).padStart(2, '0');
    document.getElementById('hours').textContent = String(hours).padStart(2, '0');
    document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
    document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
    countdownMessage.textContent = '';
}

updateCountdown();
setInterval(updateCountdown, 1000);
