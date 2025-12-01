function carregarAnimais() {
    
    fetch('./dados.json')
        .then(response => response.json())
        .then(dados => {
            const corpoTabela = document.getElementById('corpo-tabela');
            
            corpoTabela.innerHTML = '';
            
            dados.animais.forEach(animal => {
                const linha = document.createElement('tr');
                
                linha.innerHTML = `
                    <td><img src="${animal.imagem}" alt="${animal.nome}"></td>
                    <td>${animal.nome}</td>
                    <td><i>${animal.especie}</i></td>
                    <td>${animal.status}</td>
                `;
                
                corpoTabela.appendChild(linha);
            });
        })
}

document.addEventListener('DOMContentLoaded', carregarAnimais);
