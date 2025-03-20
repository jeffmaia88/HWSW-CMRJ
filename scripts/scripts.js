//função para impressão da tabela na página listar.php
function imprimir(id) {    
    print(document.getElementById(id));           
}

//função que é disparada ao escolher opção no select da pagina listar.php, ela recebe o valor do option do select, e envia para o controller com parametro "action=filter" e value
function ListEquip() {
    value = document.getElementById('equip').value;
    location.href = 'controller.php?action=filter&value='+value;
    
}

//função que dispara o alerta  de confirmação para exclusão do banco e preenche automaticamente os inputs na pagina saida.php
function alertConfirm(element) {

    row = element.closest('tr'); // pega o pai do elemento, com finalidade de excluir a linha inteira (função está sendo chamada em uma TD, por isso acessoa sua tr pai)
    //com a tr pai capturada, pega os dados das td filhas, a finalidade é copiar os dados e preenche-los automaticamente nos inputs da pagina saida.php 
    equipamento = row.cells[0].innerText; 
    modelo = row.cells[1].innerText;
    patrimonio = row.cells[2].innerText;
    
    if (confirm("Deseja Realmente excluir o Equipamento do Registro?")) {                    
            localStorage.setItem('equipamento', equipamento); //copia os dados das tds filhas da tr capturada e coloca na localstorage
            localStorage.setItem('modelo', modelo);
            localStorage.setItem('patrimonio', patrimonio);
    
            location.href = 'saida.php';
    }     
    
}

//função que recupera os dados obtidos atraves da função alertConfirm, e implementa na pagina saida.php, preenchendo automaticamente os inputs.
function recuperarDados() {
   
    document.querySelector('input[name="equipamento"]').value = localStorage.getItem('equipamento') || '';
    document.querySelector('input[name="modelo"]').value = localStorage.getItem('modelo') || '';
    document.querySelector('input[name="patrimonio"]').value = localStorage.getItem('patrimonio') || '';


    localStorage.removeItem('equipamento');
    localStorage.removeItem('modelo');
    localStorage.removeItem('patrimonio');
}








