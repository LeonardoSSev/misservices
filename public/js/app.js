angular.module("cadastro", []);
angular.module("cadastro").controller("CadastroCtrl", function($scope, $http){
    // $http.defaults.headers.post["Content-type"] = "application/x-www-form-urlencoded";
    $scope.cadastro = {};
    
    //função de cadastramento
    $scope.cadastrar = function(cadastro){
        $http.post("http://localhost:8000/api/register", {data: cadastro}).then(function onSuccess(result){
            console.log(result);
            console.log("success: " + cadastro); //confirmação da passagem dos dados
        })
        .catch(function onError(er){
            console.log(er);
            console.log("error: " + cadastro); //verficação de dados no array
        })
    };

    $scope.checagem = false;
    $scope.isCheck = function(){
        $scope.checagem = !$scope.checagem;
        return $scope.checagem;
    };

    //array estados
    $scope.estados = [
        {sigla: "AC"},{sigla: "AL"},{ sigla: "AP"},{ sigla: "AM"},{ sigla: "BA"},{ sigla: "CE"},
        { sigla: "DF"},{ sigla: "ES"},{ sigla: "GO"},{ sigla: "MA"},{ sigla: "MT"},{ sigla: "MS"},
        { sigla: "MG"},{ sigla: "PA"},{ sigla: "PB"},{ sigla: "PR"},{ sigla: "PE"},{ sigla: "PI"},
        { sigla: "RJ"},{ sigla: "RN"},{ sigla: "RS"},{ sigla: "RO"},{ sigla: "RR"},{ sigla: "SC"},
        { sigla: "SP"},{ sigla: "SE"},{ sigla: "TO"}
    ];
});

angular.module("crudAdmin", ["ngRoute"]);
angular.module("crudAdmin").controller("CrudCtrl", function($scope, $http){

    $scope.users = [];

    var listarUsuarios = function(){
        $http.get("/api/admin").then(function(data){
            $scope.users = data.data;
            console.log(data);
        })
        .catch(function onError(err){
            console.log(err)
        });
    };
    
    listarUsuarios();
});

angular.module("crudAdmin").controller("EditUserCtrl", function($scope, $http){
    
});

angular.module("crudAdmin").config(function($routeProvider){
    $routeProvider.when("/create",{
        templateUrl: "../templates/admin/create.php",
        controller: "CrudCtrl"
    });
});