document.addEventListener("DOMContentLoaded", function() {

    const pageDivElement = document.getElementById("data-page"); // Capturando o div com data-page
    const pageType = pageDivElement.getAttribute("data-page"); // Capturando o valor do atributo data-page

    // Verifique se está na página correta
    if (pageType === "processosDemonstrativoList") { 

    const dataInicialElement = document.getElementById("data_inicial");
    const indiceInicialElement = document.getElementById("indice_inicial");
    const tipoIndiceElement = document.getElementById("tipo_indice"); // Capturando o elemento do select

    console.log("data_inicial element:", dataInicialElement);
    console.log("indice_inicial element:", indiceInicialElement);
    console.log("tipo_indice element:", tipoIndiceElement);

    dataInicialElement.addEventListener("blur", async function() {
        const dataInicial = this.value;
        const tipoIndice = tipoIndiceElement.value; // Obtendo o valor do select

        if (dataInicial) {
            try {
                // Formata a data de acordo com o tipo de índice
                if (tipoIndice === '13') {
                    formattedDate = dataInicial.slice(0, 4); // Obtém o ano se o tipo for 13º
                } else {
                    formattedDate = dataInicial.slice(0, 7); // Obtém o ano e mês se o tipo for normal
                }                
                // Construindo a URL com base no tipo de índice
                const apiUrl = tipoIndice === '13' 
                    ?`https://local.elido.com.br/projetos/iprevsantos/api/indice/${formattedDate}-13`                        
                    : `https://local.elido.com.br/projetos/iprevsantos/api/indice/${formattedDate}`;

                console.log(apiUrl);    

                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error("Erro ao buscar o índice");
                }

                const data = await response.json();

                if (indiceInicialElement) {
                    indiceInicialElement.value = data.indice;
                    console.log(data.indice);
                } else {
                    console.error("Elemento indice_inicial não encontrado.");
                }

            } catch (error) {
                console.error(error);
                alert("Não foi possível obter o valor do índice.");
            }
        }
        
    });
} 
});


document.addEventListener("DOMContentLoaded", function() {
    const pageDivElement = document.getElementById("data-page"); // Capturando o div com data-page
    const pageType = pageDivElement.getAttribute("data-page"); // Capturando o valor do atributo data-page

    console.log("pageType:", pageType);

    // Verifique se está na página correta
    if (pageType === "processosEdit" || "processosAdd") { // Substitua por sua página específica
        const dataAtualizacaoElement = document.getElementById("DATA_ATUALIZACAO");
        const indice_finalElement = document.getElementById("indice_final"); // Corrigi para o ID correto

        console.log("tipo_indice element:", dataAtualizacaoElement);

        dataAtualizacaoElement.addEventListener("blur", async function() {
            const dataAtualizacao = this.value;
            try {
                // Formata a data de acordo com o tipo de índice
                const formattedDate = dataAtualizacao.slice(0, 7); // Obtém o ano e mês se o tipo for normal
                
                // Construindo a URL com base no tipo de índice
                const apiUrl = `https://local.elido.com.br/projetos/iprevsantos/api/indice_full/${formattedDate}/`;

                console.log(apiUrl);    

                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error("Erro ao buscar o índice");
                }

                const data = await response.json();

                if (indice_finalElement) {
                    indice_finalElement.value = data.indice; // Verifique se 'data.indice' é o que você realmente precisa
                    console.log(data.indice);
                } else {
                    console.error("Elemento indice_final não encontrado.");
                }

            } catch (error) {
                console.error(error);
                alert("Não foi possível obter o valor do índice.");
            }    
        });
    } 
});


document.addEventListener("DOMContentLoaded", function() {
    const pageDivElement = document.getElementById("data-page"); // Capturando o div com data-page
    const pageType = pageDivElement.getAttribute("data-page"); // Capturando o valor do atributo data-page

    console.log("pageType:", pageType);

    // Verifique se está na página correta
    if (pageType === "processosEdit" || "processosAdd") { // Substitua por sua página específica
        const selic_mes_finalElement = document.getElementById("selic_mes_final");
        const indice_selic_finalElement = document.getElementById("indice_selic_final"); // Corrigi para o ID correto       

        selic_mes_finalElement.addEventListener("blur", async function() {
            const selic_mes_final = this.value;
            try {
                // Formata a data de acordo com o tipo de índice
                const formattedDate = selic_mes_final.slice(0, 7); // Obtém o ano e mês se o tipo for normal
                
                // Construindo a URL com base no tipo de índice
                const apiUrl = `https://local.elido.com.br/projetos/iprevsantos/api/indice/${formattedDate}`;

                console.log(apiUrl);    

                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error("Erro ao buscar o índice");
                }

                const data = await response.json();

                if (indice_selic_finalElement) {
                    indice_selic_finalElement.value = data.indice; // Verifique se 'data.indice' é o que você realmente precisa
                    console.log(data.indice);
                } else {
                    console.error("Elemento indice_final não encontrado.");
                }

            } catch (error) {
                console.error(error);
                alert("Não foi possível obter o valor do índice.");
            }    
        });
    } 
});

