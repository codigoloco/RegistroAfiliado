import axios from "axios"
import Swal from 'sweetalert2'

// or via CommonJS


export function buscarCliente() {

    let clientes = []; // Variable para almacenar los clientes
    // Creamos un índice invertido para búsquedas rápidas
    const indiceClientes = {};
    const enviar = document.querySelector('.enviar');
    // Función para cargar los clientes inicialmente
    const cargarClientes = async () => {
        try {
            const response = await axios.get(`/clientes/get`);
            clientes = response.data;

            // Poblamos el índice (asumiendo que cada cliente tiene 'cedula')
            clientes.forEach(cliente => {
                const cedulaLimpia = cliente.cedula.replace(/[.\s]/g, '');
                indiceClientes[cedulaLimpia] = cliente;
            });
        } catch (error) {
            console.error("Error al cargar clientes:", error);
        }
    }

    // Cargar clientes cuando se inicie el componente

    const crazy_cep = document.querySelector('#BuscarCliente');
    crazy_cep.addEventListener('click', function () {
        const nroCedula = document.querySelector('.cedula').value;
        dataIdentificacion(nroCedula);

    });

    const dataIdentificacion = async (nroCedula) => {
        try {
            // Limpiamos puntos y espacios del input
            const cedulaLimpia = nroCedula.replace(/[.\s]/g, '');
            
            // Verificamos en el índice con la versión limpia
            const existe = indiceClientes.hasOwnProperty(cedulaLimpia);
            console.log(existe);
            if (!existe) {
                Swal.fire({
                    title: 'Titular no encontrado',
                    text: 'El cliente con cédula ' + nroCedula + 'no existe registre el cliente',
                    icon: 'error'
                })
                setTimeout(() => {
                    window.location.href = '/regClientes';
                }, 2500);
                enviar.disabled = true;
            } else {
                enviar.disabled = false;
                const clienteEncontrado = indiceClientes[cedulaLimpia];
                const dataUser = document.querySelector('.data-user');
                dataUser.innerHTML = `
                    <div style="
                        position: fixed;
                        display: flex;
                        gap: 10px;
                        z-index: 100;
                    ">
                        <p><strong>Nombre:</strong> ${clienteEncontrado.primer_nombre} ${clienteEncontrado.segundo_nombre}</p>
                        <p><strong>Apellido:</strong> ${clienteEncontrado.primer_apellido} ${clienteEncontrado.segundo_apellido}</p>
                        <p><strong>Cédula:</strong> ${clienteEncontrado.cedula}</p>
                    </div>
                `;
            }
        } catch {
            console.log("error");
        }
    }
    cargarClientes();

}

