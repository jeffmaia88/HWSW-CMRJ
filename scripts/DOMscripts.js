//Modelos exibidos como opção no Select da página entrada.php
const modelos = {
    'Computador': ['Auria 2', 'Auria 4', 'Daten', 'Dell', 'Lenovo', 'Montado', 'Positivo', 'Quiron'],
    'Monitor': ['AOC', 'Benq', 'Daten', 'Dell', 'LG', 'Philips', 'Samsung'],
    'Notebook': ['Acer','Daten', 'Itautec','Lenovo', 'Sony'],
    'Impressora': ['Brother', 'Epson', 'HP', 'Lexmark'],
    'Tablet': ['Motorola']
    
};

//função que cria dinamicamente o select modelos a partir da escolha no select equipamento
function initSelects() {
const equipSelect = document.getElementById('equip');
const modeloSelect = document.getElementById('Modelo');

equipSelect.addEventListener('change', function() {
    // Limpar opções anteriores
    modeloSelect.innerHTML = '<option selected disabled>Selecione o equipamento primeiro...</option>';

    const equipamentoSelecionado = this.value;

    if (equipamentoSelecionado) {
        // Adicionar novas opções com base na seleção
        modelos[equipamentoSelecionado].forEach(modelo => {
            const option = document.createElement('option');
            option.value = modelo;
            option.textContent = modelo;
            modeloSelect.appendChild(option);
        });
    }
});
}
//evento de inicialização da página entrada.php que starta a função de select dinamicos
document.addEventListener('DOMContentLoaded', initSelects);


 

