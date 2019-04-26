/*--------------------ANGULAR SETTING--------------------*/

// Criar modulo angularApp
var angularApp = angular.module('angularApp', ['ngRoute']);

// Configurar routes
angularApp.config(function($routeProvider) {
    $routeProvider

        /*--------Paginas do login--------*/
        // route para login
        .when('/', {
            templateUrl : 'pages/login.html',
            controller  : 'mainController'
        })
        // route para registo
        .when('/registo', {
            templateUrl : 'pages/registo.html',
            controller  : 'registoController'
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
        
        // route para Alterar dados
        .when('/editDates', {
            templateUrl : 'pages/editarDados.html',
            controller  : 'editDatesController'
        })

        /*--------Paginas do Administrador--------*/
        // route para clientes
        .when('/clients', {
            templateUrl : 'pages/clients.html',
            controller  : 'clientsController'
        });
});

// Criar controller
/*--------Paginas do login--------*/
angularApp.controller('mainController', function($scope) {
    esconder();
    // Criar a messagem
    //$scope.message = 'Uma mensagem';
    // Colocar na *page.html <p>{{ message }}</p>
});
angularApp.controller('registoController', function($scope) {
    // Se for preciso
});

/*--------Paginas do cliente--------*/
angularApp.controller('orderController', function($scope) {
    mostrarCL();
});
angularApp.controller('pendingController', function($scope) {
    mostrarCL();
});
angularApp.controller('editDatesController', function($scope) {
    validarNewPass();
});

/*--------Paginas do Administrador--------*/
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