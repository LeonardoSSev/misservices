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
        $http.post("http://localhost/api/register", cadastro).then( function (result){
            console.log(result);
        });
    };

    $scope.checagem = false;
    $scope.isCheck = function(){
        $scope.checagem = !$scope.checagem;
        return $scope.checagem;
    };
});

angular.module("crudAdmin", []);
angular.module("crudAdmin").controller("CrudCtrl", function($scope, $http){

    $scope.users = [
        // {nome: "John", email: "jonatas_lopes@outlook.com", cpf: "44485312879"}
    ];

    var listarUsuarios = function(){
        $http.get("http://localhost:8000/api/admin").success(function(data){
            $scope.users = data;
        });
    };
});