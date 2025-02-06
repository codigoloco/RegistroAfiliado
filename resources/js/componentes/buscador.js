export default function buscador(tabla) {
    
    const searchInput = document.getElementById('searchInput');
    const tbody = document.getElementById(`${tabla}`);
    const rows = tbody.getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function(e) {
        const searchText = e.target.value.toLowerCase();
        Array.from(rows).forEach(row => {
            let text = '';
            Array.from(row.getElementsByTagName('td')).forEach(cell => {
                text += cell.textContent.toLowerCase() + ' ';
            });

            if (text.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}
