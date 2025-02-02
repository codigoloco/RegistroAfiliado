export function detectarChange() {
    const botonesStatus = document.querySelectorAll('.StatusBtn');

    botonesStatus.forEach(checkbox => {
        checkbox.addEventListener('change', function (event) {
            // Obtén el estado del checkbox (true o false)
            const estado = event.target.checked;
            const label = document.querySelector('label[for="flexSwitchCheckChecked"]');
            // Puedes realizar acciones adicionales aquí
            if (estado) {
                label.textContent = 'Servicio Activado';      
                
            } else {
                label.textContent = 'Servicio Desactivado';
                
            }
        })
        // Escucha el evento 'change'
    });
}
