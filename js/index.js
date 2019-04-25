/*--------------------ANGULAR SETTING--------------------*/

// Criar modulo angularApp
// create the module and name it scotchApp
var scotchApp = angular.module('scotchApp', ['ngRoute']);

// configure our routes
scotchApp.config(function($routeProvider) {
    $routeProvider

        // route for the home page
        .when('/', {
            templateUrl : 'login.html',
            controller  : 'mainController'
        })

        // route for the about page
        .when('/order', {
            templateUrl : 'order.html',
            controller  : 'orderController'
        })

        // route for the contact page
        .when('/pending', {
            templateUrl : 'pending.html',
            controller  : 'pendingController'
        });
});

// create the controller and inject Angular's $scope
scotchApp.controller('mainController', function($scope) {
    // create a message to display in our view
    $scope.message = 'Everyone come and see how good I look!';
});

scotchApp.controller('orderController', function($scope) {
    $scope.message = 'Look! I am an about page.';
});

/*--------------------FIM ANGULAR SETTING--------------------*/

// Função temporaria - atribuir o nome do utilizador
let form1 = document.getElementsByTagName('form')[0];

form1.addEventListener('submit', function(event){

    let nome = document.getElementById("userName");    
    nome.innerHTML = document.querySelector('form input[name=user]').value;

    event.preventDefault();
});
