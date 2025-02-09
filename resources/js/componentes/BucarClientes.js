import axios from "axios"

let clientes = []; // Variable para almacenar los clientes

// Función para cargar los clientes inicialmente
const cargarClientes = async () => {
    try {
        const response = await axios.get(`/clientes/get`);
        clientes = response.data;
    } catch (error) {
        console.error("Error al cargar clientes:", error);
    }
}

// Cargar clientes cuando se inicie el componente
cargarClientes();

document.addEventListener('keyup', function(e) {
    let identificacion = document.getElementById('searchInput');
    dataIdentificacion(identificacion.value)
});

const dataIdentificacion = async(identificacion) => {

    // clientes.forEach(element => {
    //     console.log(element.primer_nombre)
    // });
    var clientesFiltrados = clientes.filter(cliente => 
        cliente.primer_nombre.includes(identificacion)
    );
    
    console.log(clientesFiltrados[0].cedula);
}