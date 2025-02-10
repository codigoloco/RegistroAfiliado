import axios from "axios"

export function buscarCliente() {
    
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

    document.addEventListener('keyup', function (e) {
        let identificacion = document.getElementsByClassName('searchInput');
        dataIdentificacion(identificacion.value)
    });

    const dataIdentificacion = async (nroCedula) => {


        try{
            console.log(clientes.data.cedula)
            var clientesFiltrados = clientes.filter(cliente =>{
                cliente.cedula.includes(nroCedula)
                console.log(cliente.cedula)
            }                                
            );
            console.log(clientesFiltrados[0]);
        }catch{
            console.log("error")
        }
                       
    }
}   