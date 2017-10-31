angular.module("cadastro", ['ngMask']);
angular.module("cadastro").controller("CadastroCtrl", function($scope, $http){
    
    $scope.cadastro =[];

    //array estados
    $scope.estados = [
        {sigla: "AC"},{sigla: "AL"},{ sigla: "AP"},{ sigla: "AM"},{ sigla: "BA"},{ sigla: "CE"},
        { sigla: "DF"},{ sigla: "ES"},{ sigla: "GO"},{ sigla: "MA"},{ sigla: "MT"},{ sigla: "MS"},
        { sigla: "MG"},{ sigla: "PA"},{ sigla: "PB"},{ sigla: "PR"},{ sigla: "PE"},{ sigla: "PI"},
        { sigla: "RJ"},{ sigla: "RN"},{ sigla: "RS"},{ sigla: "RO"},{ sigla: "RR"},{ sigla: "SC"},
        { sigla: "SP"},{ sigla: "SE"},{ sigla: "TO"}
    ];
    
    //função de cadastramento -- incompleta --
    $scope.cadastrar = function(cadastro){
        $http.post("http://localhost:8000/user", JSON.stringify(cadastro));
    };

    $scope.checagem = false;
    $scope.isCheck = function(){
        $scope.checagem = !$scope.checagem;
        return $scope.checagem;
    };
});