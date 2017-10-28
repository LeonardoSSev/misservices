angular.module("cadastro", []);
angular.module("cadastro").controller("CadastroCtrl", function($scope){
    $scope.cadastro =[
        {nome: "Jonatas", email: "jonatas@gmail.com", cpf:"44485312879", cep: "11340020", uf:"SP", 
        cidade: "São Vicente", bairro: "Esplanada dos Barreiros", endereco: "Rua Caminho dos Barreiros", senha: "123"}
    ];

    //array estados
    $scope.estados = [
        {sigla: "AC"},{sigla: "AL"},{ sigla: "AP"},{ sigla: "AM"},{ sigla: "BA"},{ sigla: "CE"},
        { sigla: "DF"},{ sigla: "ES"},{ sigla: "GO"},{ sigla: "MA"},{ sigla: "MT"},{ sigla: "MS"},
        { sigla: "MG"},{ sigla: "PA"},{ sigla: "PB"},{ sigla: "PR"},{ sigla: "PE"},{ sigla: "PI"},
        { sigla: "RJ"},{ sigla: "RN"},{ sigla: "RS"},{ sigla: "RO"},{ sigla: "RR"},{ sigla: "SC"},
        { sigla: "SP"},{ sigla: "SE"},{ sigla: "TO"}
    ];
    
    $scope.cadastrar = function(cadastro){
        $scope.cadastro.push(angular.copy(cadastro));
        delete $scope.cadastro;
    }
});