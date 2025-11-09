function mudarTema() {
    const body = document.body;
    
    if (body.classList.contains('tema-escuro')) {
        body.classList.remove('tema-escuro');
        localStorage.setItem('tema', 'claro');

    } else {
        body.classList.add('tema-escuro');
        localStorage.setItem('tema', 'escuro');
    }
}

function aplicarTemaSalvo() {
    const temaSalvo = localStorage.getItem('tema');
    
    if (temaSalvo === 'escuro') {
        document.body.classList.add('tema-escuro');
    }
}

document.addEventListener('DOMContentLoaded', aplicarTemaSalvo);