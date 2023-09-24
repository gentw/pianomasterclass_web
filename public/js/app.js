'use strict'

var app = angular.module('alrayan1', ['ngSanitize']);

app.config(['$httpProvider', '$interpolateProvider', function($httpProvider, $interpolateProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

}
]);

app.filter('removeHTMLTags', function() {

  return function(text) {

    return  text ? String(text).replace(/<[^>]+>/gm, '') : '';

  };

});



app.run(function($rootScope, $http, $timeout) {
 
      
  

      $rootScope.globalRequest = {
        "global":[     
            {
                "type":"header_info",
                "limit": 'all'
            },
            {
                "type":"about",
                "limit": 'all'
            },
            {
                "type":"artists",
                "limit": 'all'
            },
            {
                "type":"apply_now",
                "limit": 'all'
            },
            {
                "type":"informations",
                "limit": 'all'
            },
            {
                "type":"footer_info",
                "limit": 'all'
            },
            {
                "type": "event_info",
                "limit": "all"
            }
            // {
            //     "type":"contacts",
            //     "limit": 'all'
            // },
            // {
            //     "type":"s_contacts",
            //     "limit": 'all'
            // },
        ]
    };

    // var url = window.location.href;
    // var pageName = url.split("/")[3];

    // if(pageName == "blog") {
    //    var latestNewsObj = {
    //         "type": "blog_posts",
    //         "limit": "3",
    //         "for": "latest_news",
    //         "current_news_id": url.split("/")[4]
    //   }
    //   $rootScope.globalRequest["global"].push(latestNewsObj);   

    // }

    console.log($rootScope.globalRequest["global"]);

    $http({
        method: 'POST',
        url: '/websites/api/global',
        data: $rootScope.globalRequest,
    }).then(function (response) {

        $rootScope.includes = response.data;

        console.log($rootScope.includes);

    });
});




app.controller("HeaderCtrl", function ($scope, $http, $log, $window) {

    $scope.isSending = false;
    $scope.validateForm = false;
    $scope.sendingSuccesful = false;
    $scope.contact = {
        name: '',
        email: '',
        subject: '',
        phone: '',
        message: ''
    };

    $http({
        method:'GET',
        format: 'jsonp',
        url: "/websites/api/pages",
    }).then(function (response) {
        $scope.pages = response.data;
    });

    $scope.redirect = function ( slug) {
        var url = "http://" + $window.location.host + slug;
        $log.log(url);
        $window.location.href = url;
    };

    $scope.mailSubject = function (param) {
        $scope.contact.subject = param;
        console.log($scope.contact);
    };

    $scope.sendMail = function (contact) {

        if ($scope.hasNull($scope.contact)) {
            $scope.validateForm = true;
            $scope.isSending = false;
        } else {
            $scope.validateForm = false;
            $scope.isSending = true;
        }

        if ($scope.validateForm == false) {
            $http({
                method:'POST',
                format: 'jsonp',
                data: $scope.contact,
                url: "/send/mail",
            }).then(function (response) {
                $scope.isSending = false;
                $scope.sendingSuccesful = true;
            });
        }
    };

    $scope.hasNull = function (target) {
       for (var contact in target) {
            if (target[contact] == null || target[contact] == "")
                return true;
        }
        return false;
    };

    $scope.sendNewsletter = function (newsletter) {
        $http({
            method:'POST',
            format: 'jsonp',
            url: "/websites/api/pages",
        }).then(function (response) {
            $scope.pages = response.data;
        });
    };



});

// FILTERS

// app.filter('trustUrl' ,function ($sce) {
//     return function(url) {
//         return $sce.trustAsResourceUrl(url);
//     };
// });
//
app.filter('moment', function () {
    return function (input, momentFn /*, param1, param2, ...param n */) {
        var args = Array.prototype.slice.call(arguments, 2),
            momentObj = moment(input);
        return momentObj[momentFn].apply(momentObj, args);
    };
});