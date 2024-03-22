function getAddress() {
    let cep = document.getElementById('zip_code').value;
    let addressField = document.getElementById('address');
    let cityField = document.getElementById('city');
    let stateField = document.getElementById('state');
    $.ajax({
        url: 'https://viacep.com.br/ws/' + cep + '/json/',
        dataType: 'json',
        success: function(response) {

            if (response.logradouro !== undefined && response.localidade !== undefined && response.uf !== undefined) {
                addressField.value = response.logradouro;
                cityField.value = response.localidade;
                stateField.value = response.uf;
            }
        },
        error: function() {
            if (addressField.value === undefined || cityField.value === undefined || stateField.value === undefined) {
                addressField.value = '';
                cityField.value = '';
                stateField.value = '';
            }
            var errorMessage = document.getElementById('error-message');
            errorMessage.innerHTML = '<x-dialog-modal>CEP não encontrado</x-dialog-modal>';
        }
    });
}
