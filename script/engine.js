// JavaScript para adicionar/remover inputs dinâmicos
document.addEventListener('DOMContentLoaded', function() {
    function addLinha() {
        const linhaContainer = document.getElementById('linha-container');
        const novaLinha = document.querySelector('.linha').cloneNode(true);

        // Limpar os campos da nova linha
        novaLinha.querySelectorAll('input').forEach(input => input.value = '');

        // Criar o botão de remover para as novas linhas
        const removeLinhaButton = document.createElement('button');
        removeLinhaButton.type = 'button';
        removeLinhaButton.className = 'btn btn-danger remove_linha';
        removeLinhaButton.textContent = 'Remover Linha';

        // Adicionar funcionalidade para remover a linha
        removeLinhaButton.addEventListener('click', function() {
            linhaContainer.removeChild(novaLinha);
        });

        novaLinha.appendChild(removeLinhaButton);

        // Adicionar a nova linha no container
        linhaContainer.appendChild(novaLinha);
    }

    // Botão para adicionar uma nova linha
    const addLinhaButton = document.getElementById('add_linha');
    addLinhaButton.addEventListener('click', addLinha);

    
});
