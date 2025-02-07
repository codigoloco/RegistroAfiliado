import axios from "axios"

document.addEventListener('keydown', () => {
    let identificacion = document.getElementById('cedulaTitularAfiliado').val()

})

const dataIdentificacion = async() => {
    axios.get('clientes')
        .then(response => {
            console.log(response)
        })
        .catch(error => {
            console.error('Hubo un error al encontrar el cliente:', error);
        });
}