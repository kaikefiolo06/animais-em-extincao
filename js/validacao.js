function validarEmail(email) {
    return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
}

function validarCPF(cpf) {
    return /^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(cpf);
}

function mostrarErro(campo, mensagem) {
    const erroAnterior = campo.parentNode.querySelector('.erro-validacao');
    if (erroAnterior) erroAnterior.remove();
    
    if (mensagem) {
        const erro = document.createElement('span');
        erro.className = 'erro-validacao';
        erro.style.color = 'red';
        erro.style.fontSize = '12px';
        erro.style.marginTop = '5px';
        erro.style.display = 'block';
        erro.textContent = mensagem;
        campo.parentNode.appendChild(erro);
    }
    
    campo.style.border = mensagem ? '2px solid red' : '2px solid green';
}

function formatarCPF(campo) {
    let valor = campo.value.replace(/\D/g, '');
    if (valor.length <= 11) {
        valor = valor.replace(/(\d{3})(\d)/, '$1.$2')
                      .replace(/(\d{3})(\d)/, '$1.$2')
                      .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    }
    campo.value = valor;
}

document.getElementById('email').addEventListener('blur', function() {
    const email = this.value.trim();
    if (email && !validarEmail(email)) {
        mostrarErro(this, 'Email de formato inválido');
    } else {
        mostrarErro(this, '');
    }
});

document.getElementById('cpf').addEventListener('blur', function() {
    const cpf = this.value.trim();
    if (cpf && !validarCPF(cpf)) {
        mostrarErro(this, 'CPF de formato inválido');
    } else {
        mostrarErro(this, '');
    }
});

document.getElementById('cpf').addEventListener('input', function() {
    formatarCPF(this);
});

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let formularioValido = true;
    
    const email = document.getElementById('email');
    if (!validarEmail(email.value.trim())) {
        mostrarErro(email, 'Email de formato inválido');
        email.value = '';
        formularioValido = false;
    }
    
    const cpf = document.getElementById('cpf');
    if (!validarCPF(cpf.value.trim())) {
        mostrarErro(cpf, 'CPF de formato inválido');
        cpf.value = '';
        formularioValido = false;
    }
    
    if (formularioValido) {
        alert('Formulário enviado com sucesso!');
        this.reset();
    }
});
