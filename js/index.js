/*--------------------ANGULAR SETTING--------------------*/

// Criar modulo angularApp
var angularApp = angular.module('angularApp', ['ngRoute']);

// Configurar routes
angularApp.config(function($routeProvider) {
    $routeProvider

        // route para login
        .when('/', {
            templateUrl : 'pages/login.html',
            controller  : 'mainController'
        })

        // route para encomendas
        .when('/order', {
            templateUrl : 'pages/order.html',
            controller  : 'orderController'
        })

        // route para pendentes
        .when('/pending', {
            templateUrl : 'pages/pending.html',
            controller  : 'pendingController'
        });
});

// Criar controller
angularApp.controller('mainController', function($scope) {
    // Criar a messagem
    $scope.message = 'Estamos em main';
});

angularApp.controller('orderController', function($scope) {
    $scope.message = 'Estamos nas encomendas';
});

/*--------------------FIM ANGULAR SETTING--------------------*/

// Esconder navigação ao sair
function esconder(){
    document.getElementById('yellowLine').style.display = 'none';
    document.getElementById('twfLogoMini').style.display = 'none';
    document.getElementById('topNav').style.display = 'none';
}

// Mostrar navigação
function mostrar(){
    document.getElementById('yellowLine').style.display = 'block';
    document.getElementById('twfLogoMini').style.display = 'block';
    document.getElementById('topNav').style.display = 'block';
}