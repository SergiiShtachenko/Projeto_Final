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

        /*--------Paginas do cliente--------*/
        // route para encomendas
        .when('/order', {
            templateUrl : 'pages/order.html',
            controller  : 'orderController'
        })
        // route para pendentes
        .when('/pending', {
            templateUrl : 'pages/pending.html',
            controller  : 'pendingController'
        })

        /*--------Paginas do Administrador--------*/
        // route para encomendas
        .when('/clients', {
            templateUrl : 'pages/clients.html',
            controller  : 'clientsController'
        });
});

// Criar controller
angularApp.controller('mainController', function($scope) {
    esconder();
    // Criar a messagem
    //$scope.message = 'Estamos em main';
});

// Paginas do cliente
angularApp.controller('orderController', function($scope) {
    mostrarCL();
});
angularApp.controller('pendingController', function($scope) {
    mostrarCL();
});

// Paginas do Administrador
angularApp.controller('clientsController', function($scope) {
    mostrarAD();
});


/*--------------------FIM ANGULAR SETTING--------------------*/

let userAcces = "";
// Esconder navigação ao sair
function esconder(){
    document.getElementById('yellowLine').style.display = 'none';
    document.getElementById('twfLogoMini').style.display = 'none';
    document.getElementById('topNavCL').style.display = 'none';
    document.getElementById('topNavAD').style.display = 'none';
}

// Mostrar navigação
function mostrarCL(){
    document.getElementById('yellowLine').style.display = 'block';
    document.getElementById('twfLogoMini').style.display = 'block';
    document.getElementById('topNavCL').style.display = 'block';
}
function mostrarAD(){
    document.getElementById('yellowLine').style.display = 'block';
    document.getElementById('twfLogoMini').style.display = 'block';
    document.getElementById('topNavAD').style.display = 'block';
}