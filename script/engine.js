// JavaScript para adicionar/remover inputs dinâmicos
document.addEventListener('DOMContentLoaded', function() {
    // Função para adicionar uma nova linha
    function addLinha() {
        const linhaContainer = document.getElementById('linha-container');

        // Verifica se o container existe
        if (!linhaContainer) {
            console.error('Container para as linhas não encontrado.');
            return;
        }

        // Clona a primeira linha como modelo (certifique-se de que exista)
        const modeloLinha = document.querySelector('.linha');
        if (!modeloLinha) {
            console.error('Modelo de linha não encontrado.');
            return;
        }
        const novaLinha = modeloLinha.cloneNode(true);

        // Limpa os campos da nova linha
        novaLinha.querySelectorAll('input').forEach(input => input.value = '');

        // Cria o botão de remover para as novas linhas
        const removeLinhaButton = document.createElement('button');
        removeLinhaButton.type = 'button';
        removeLinhaButton.className = 'btn btn-danger remove_linha';
        removeLinhaButton.textContent = 'Remover Linha';

        // Adiciona funcionalidade para remover a linha
        removeLinhaButton.addEventListener('click', function() {
            linhaContainer.removeChild(novaLinha);
        });

        novaLinha.appendChild(removeLinhaButton);

        // Adiciona a nova linha no container
        linhaContainer.appendChild(novaLinha);
    }

    // Botão para adicionar uma nova linha
    const addLinhaButton = document.getElementById('add_linha');
    if (addLinhaButton) {
        addLinhaButton.addEventListener('click', addLinha);
    } else {
        console.error('Botão para adicionar linha não encontrado.');
    }
});
