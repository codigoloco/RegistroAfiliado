import { detectaridBtn } from '../componentes/detectarBotones'
import { buscarCliente } from '../componentes/BucarClientes'
import { mascaras } from '../componentes/Mascara'

detectaridBtn()
buscarCliente()

mascaras().Telefono()
mascaras().Cedula()
mascaras().RIF()

const parentesco = document.querySelector('#Parentesco');

parentesco.addEventListener('change', function () {

    const textoSeleccionado = this.options[this.selectedIndex].text;
    const cedula = document.querySelector('#CedulaTitular');
    const id_cliente = document.querySelector('.cedulaObtenida').id;
    var cedula_beneficiario = document.querySelector('#CedulaBeneficiario');
    var primer_nombre = document.querySelector('#primer_nombre');
    var segundo_nombre = document.querySelector('#segundo_nombre');
    var primer_apellido = document.querySelector('#primer_apellido');
    var segundo_apellido = document.querySelector('#segundo_apellido');
    var fecha_nacimiento = document.querySelector('#fecha_nacimiento');
    var telefono = document.querySelector('#Telefono');
    var nacionalidad = document.querySelector('#Nacionalidad');

    if (textoSeleccionado.toLowerCase() === 'titular') {
        (async () => {
            try {
                const response = await axios.get(`/clientes/get/${id_cliente}`);
                let clientes = response.data; // Aquí ya tienes los datos

                cedula_beneficiario.value = String(clientes.cedula);
                primer_nombre.value = String(clientes.primer_nombre);
                segundo_nombre.value = String(clientes.segundo_nombre);
                primer_apellido.value = String(clientes.primer_apellido);
                segundo_apellido.value = String(clientes.segundo_apellido);
                fecha_nacimiento.value = String(clientes.fecha_nacimiento);
                telefono.value = String(clientes.telefono);
                nacionalidad.value = String(clientes.nacionalidad);






            } catch (error) {
                console.error("Error al cargar clientes:", error);
            }
        })();

    }
    else {
        cedula_beneficiario.value = '';
        primer_nombre.value = '';

        primer_apellido.value = ''
        segundo_apellido.value = ''
        fecha_nacimiento.value = ''
        telefono.value = ''
        nacionalidad.value = ''
    }
});