function buscarPassagem() {
    const livro = document.getElementById('livro').value;
    const capitulo = document.getElementById('capitulo').value;
    const versiculo = document.getElementById('versiculo').value;

    const url = `https://bible-api.com/${livro}%20${capitulo}:${versiculo}?translation=almeida`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const passagem = data.text;
            const referencia = `${livro} ${capitulo}:${versiculo}`;
            document.getElementById('passagem').innerHTML = `
                <h3>${referencia}</h3>
                <p class="versiculo">${passagem}</p>
            `;
        })
        .catch(error => {
            console.error('Erro ao buscar a passagem:', error);
            document.getElementById('passagem').innerHTML = 'Não foi possível carregar a passagem.';
        });
}