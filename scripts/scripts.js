
function imprimir(id) {    
    print(document.getElementById(id));           
}

function ListEquip() {
    value = document.getElementById('equip').value;
    location.href = 'controller.php?action=filter&value='+value;
    
}


function alertConfirm(element) {

    row = element.closest('tr');

    equipamento = row.cells[0].innerText;
    modelo = row.cells[1].innerText;
    patrimonio = row.cells[2].innerText;
    
    if (confirm("Deseja Realmente excluir o Equipamento do Registro?")) {                    
            localStorage.setItem('equipamento', equipamento);
            localStorage.setItem('modelo', modelo);
            localStorage.setItem('patrimonio', patrimonio);
    
            location.href = 'saida.php';
    }     
    
}

function recuperarDados() {
   
    document.querySelector('input[name="equipamento"]').value = localStorage.getItem('equipamento') || '';
    document.querySelector('input[name="modelo"]').value = localStorage.getItem('modelo') || '';
    document.querySelector('input[name="patrimonio"]').value = localStorage.getItem('patrimonio') || '';


    localStorage.removeItem('equipamento');
    localStorage.removeItem('modelo');
    localStorage.removeItem('patrimonio');
}








