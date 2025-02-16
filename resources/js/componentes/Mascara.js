import mask from 'make-mask';
var mask_telefono = mask;
export function mascaras() {

    //para Mascaras de telefono
    const Telefono = () => {
        const crazy_cep = document.querySelector('#Telefono');
        crazy_cep.addEventListener('input', function (e) {            
            const currentTarget = e.target;
            const val = currentTarget.value;
            const masks = ['0000000000', '(000)-000-00-00'];
            const mask = val.length > 7 ? masks[1] : masks[0];
            currentTarget.value = mask_telefono(val, mask);
        });
    }
    const Cedula = () => {
        const crazy_cep = document.querySelectorAll('.cedula');
        crazy_cep.forEach(element => {
            element.addEventListener('input', function (e) {
                const currentTarget = e.target;
                currentTarget.value = mask(currentTarget.value, '#.##0', {
                    reverse: true,
                });
            });
        });
    }
    const RIF = () => {
        const crazy_cep = document.querySelectorAll('.rif');
        crazy_cep.forEach(element => {
            element.addEventListener('input', function (e) {
                const currentTarget = e.target;
                const val = currentTarget.value;
                const masks = ['0000000000', '00000000-0'];
                const mask = val.length > 7 ? masks[1] : masks[0];
                currentTarget.value = mask_telefono(val, mask);
            });
        });
    }


    return {
        Telefono,
        Cedula,
        RIF,

    }
}