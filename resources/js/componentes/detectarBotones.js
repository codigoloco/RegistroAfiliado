import axios from "axios";
import Swal from 'sweetalert2'

export function detectaridBtn() {
    const botones = document.querySelectorAll(".btn")
    let idAccion;
    let inputsExistentes;
    let modulo;
    let moduloData;
    let opcion;
    let valor;
    let archivo;
    botones.forEach(botones => {
        botones.addEventListener("click", function (event) {
            //escucha todos los click en el documento
            idAccion = event.target.id;
            valor = event.target.value;
            // si el click realizado correspondea alguna de las acciones procede a ejecutar la accion        
            inputsExistentes = document.getElementsByClassName('beneficiario');
            opcion = new opciones();
            moduloData = event.target;
            modulo = moduloData.dataset.modulo            

            switch (idAccion) {
                case "eliminarBeneficiarios":
                    if (inputsExistentes.length != 1) {
                        opcion.delAfiliados();
                    }
                    break;
                case "AgregarBeneficiarios":
                    if (inputsExistentes.length < 6) {
                        opcion.AddAfiliados();
                    }
                    break;
                case "ActualizarAfiliados":
                    opcion.OBtenerAFiliados();
                    break;
                case "EditarServicio":
                    opcion.editar();
                    break;
                case "EliminarServicio":
                    opcion.eliminar(valor, modulo);
                    break;
                case "importarExcel":
                    archivo = document.getElementById('fileInput')
                    opcion.importar(archivo, modulo);
                    break;
                default:
                    // Código para manejar otras acciones o casos no contemplados
                    break;
            }
        });
    });
}

export class opciones {

    AddAfiliados = () => {
        let container = document.getElementById('beneficiarios-container');
        let beneficiario = container.querySelector('.beneficiario').cloneNode(true);
        let inputs = beneficiario.querySelectorAll('input');
        inputs.forEach(input => {
            input.value = '';
        });
        container.appendChild(beneficiario);
    }

    delAfiliados = () => {
        let container = document.getElementById('beneficiarios-container');
        let beneficiario = container.querySelector('.beneficiario');
        container.removeChild(beneficiario);
    }

    OBtenerAFiliados = () => {
        fetch('/afiliados/all') // Asegúrate de que la ruta coincida con la definida en Laravel
            .then(response => response.json())
            .then(data => {
                console.log(data); // Muestra los datos en la consola
                // Aquí puedes procesar los datos para mostrarlos en tu interfaz
            })
            .catch(error => console.error('Error:', error));
    }
    eliminar = (id, modulo) => {
        
        axios.delete(`${modulo}${id}`)
            .then(response => {
                Swal.fire({
                    title: 'eliminado exitosamente',
                    text: 'se elimino correctamente el registro',
                    icon: 'error'
                });
                location.reload();
            })
            .catch(error => {               
                if (error.status==500){
                    Swal.fire({
                        title: 'eliminacion fallida',
                        text: 'No se pudo eliminar',
                        icon: 'error'
                    });                    
                }                                                    
            });
    }
    editar = (id, modulo) => {
        console.log("editar", id, modulo);
    }
    importar = (archivo, modulo) => {

        const formData = new FormData();
        formData.append('file', archivo.files[0]);

        axios.post(modulo, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
            .then(response => {
                console.log('Archivo importado con éxito:', response.data);
                // Aquí puedes agregar lógica adicional después de una importación exitosa
            })
            .catch(error => {
                console.error('Hubo un error al importar:', error);
                alert('Error al importar el archivo');
            });
    }
}