var app = angular.module('casinoApp',
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngTouch',
    'pascalprecht.translate',
    'tmh.dynamicLocale'
    ['ngSweetAlert','ngCurrencySymbol','ngRoute'])

.constant('DEBUG_MODE', /*DEBUG_MODE*/true/*DEBUG_MODE*/)
    .constant('VERSION_TAG', /*VERSION_TAG_START*/new Date().getTime()/*VERSION_TAG_END*/)
    .constant('LOCALES', {
        'locales': {
            'ru_RU': 'Русский',
            'en_US': 'English'
        },
        'preferredLocale': 'en_US'
    })

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl : 'pages/main.php',
            controller  : 'MainController'
        })

        .when('/slot', {
            templateUrl : 'pages/slot.php',
            controller  : 'slotController'
        })

        .when('/sports', {
            templateUrl : 'pages/sports.php',
            controller  : 'sportsController'
        })

        .when('/promo', {
            templateUrl : 'pages/promo.php',
            controller  : 'promoController'
        })

        .otherwise({
            redirectTo : '/'
        });
}])

    // Angular debug info
    .config(function ($compileProvider, DEBUG_MODE) {
        if (!DEBUG_MODE) {
            $compileProvider.debugInfoEnabled(false);// disables AngularJS debug info
        }
    })
    // Angular Translate
    .config(function ($translateProvider, DEBUG_MODE, LOCALES) {
        if (DEBUG_MODE) {
            $translateProvider.useMissingTranslationHandlerLog();// warns about missing translates
        }

        $translateProvider.useStaticFilesLoader({
            prefix: 'angular_translation/resources/locale-',
            suffix: '.json'
        });

        $translateProvider.preferredLanguage(LOCALES.preferredLocale);
        $translateProvider.useLocalStorage();
        $translateProvider.useSanitizeValueStrategy('escaped');
    })
    // Angular Dynamic Locale
    .config(function (tmhDynamicLocaleProvider) {
        tmhDynamicLocaleProvider.localeLocationPattern('angular_translation/bower_components/angular-i18n/angular-locale_{{locale}}.js');
    });


app.controller("CommonController",function($scope,$http,$q,ccCurrencySymbol){
    $scope.cc_currency_symbol = ccCurrencySymbol;
    $scope.getQuestion={};
    $scope.getCurency={};
    $scope.getCountries={};
    $scope.getLanguages={};

    $scope.getBankList={};
    $scope.getAnouncementList={};
    $scope.topWithdrawalList={};
    $scope.currentDepositList={};
    $scope.currentWithdrawalList={};
    $scope.genderList=[
        {"genderNo" : "1","genderName" : "Male"},
        {"genderNo" : "2","genderName" : "Female"}];
    $scope.getAgentGspList={};
/*    $http.get("/api/operation/GetAnnouncements", {cache: true})     //commented by tony 07032015
     .success(function (data) {
         if (data.status == 200) {
             $scope.getAnouncementList = data.result.announcementList;
         }
     }).error(function (data, status) {
         console.error('Repos error', status, data);
     });*/

    $scope.displaySignUp = function() {
        $q.all([
            $http.get("/api/system/GetCurrencyList",{cache: true})
                .success(function(data) {
                    if(data.status==200) {
                        $scope.getCurency = data.result.currencyList;
                    }
                }).error(function(data, status) {
                    console.error('Repos error', status, data);
                }),
            $http.get("/api/system/GetAgentCountryList",{cache: true})
                .success(function(data) {
                    if(data.status==200) {
                        $scope.getCountries = data.result.countryList;
                    }
                }).error(function(data, status) {
                    console.error('Repos error', status, data);
                }),
            $http.get("/api/system/GetSecurityQuestionList",{cache: true})
                .success(function(data) {
                    if(data.status==200) {
                        $scope.getQuestion = data.result.securityQstList;
                    }
                }).error(function(data, status) {
                    console.error('Repos error', status, data);
                }),
            $http.get("/api/system/GetLanguageList",{cache: true})
                .success(function(data) {
                    if(data.status==200) {
                        $scope.getLanguages = data.result.languageList;
                    }
                }).error(function(data, status) {
                    console.error('Repos error', status, data);
                })
        ]);
    };



});

app.controller("MainController",function($scope,$http,$q,ccCurrencySymbol){
    $scope.cc_currency_symbol = ccCurrencySymbol;
    $scope.contactEmailList={};
    $scope.contactPhoneList={};
    $scope.contactSnsList={};

/*  //commented by tony 07032015
    $scope.init=function() {
        $q.all([
            $http.get("/api/agent/GetAgentContactInfo", {cache: true})
            .success(function (data) {
                if (data.status == 200) {
                    $scope.contactEmailList = data.result.contactEmailList;
                    $scope.contactPhoneList = data.result.contactPhoneList;
                    $scope.contactSnsList = data.result.contactSnsList;
                }
            }).error(function (data, status) {
                console.error('Repos error', status, data);
            }),
            $http.get("/api/finace/GetPaymentTransactionHistory?count=10", {cache: true})
            .success(function (data) {
                if (data.status == 200) {
                    $scope.topWithdrawalList = data.result.topWithdrawalList;
                    $scope.currentDepositList = data.result.currentDepositList;
                    $scope.currentWithdrawalList = data.result.currentWithdrawalList;
                }
            }).error(function (data, status) {
                console.error('Repos error', status, data);
            })
        ]);
    };*/


    //Scripts
    $('.top-item').hover(function(){
        $(this).closest('div').closest('div').animate({height: $(this).get(0).scrollHeight}, 400);
    }, function() {
        $(this).closest('div').animate({height: 39}, 400);
    });

    $('.game-button').hover(function(){
        $(this).find('.game-button-overlay').fadeIn('fast');
    }, function() {
        $(this).find('.game-button-overlay').fadeOut('fast');
    });

    $("#promo-slider").owlCarousel({
        autoPlay : true,
        pagination : true,
        navigation : false,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem: true
    });

    progressBar(20, $('#depositBar'));
    progressBar(50, $('#withdrawBar'));

    //Progressive Jackpot
    $('.pjackpot').jOdometer({
        increment: 0.01,
        counterStart:'8215730.24',
        counterEnd:'9211730.24',
        numbersImage: 'common/images/jodometer-numbers-gold.png',
        spaceNumbers: 0,
        formatNumber: true,
        widthNumber: 38,
        heightNumber: 60
    });

});

app.controller("LogoutController",function($scope,$http,$window,SweetAlert){
    $scope.logout =function(){
        $scope.isProcessing=true;
        $http.get("/api/player/Logout")
            .success(function(data) {
                if(data.status==200) {
                    if (bowser.msie && bowser.version <= 8) {
                        alert(data.message);
                    }else{
                        SweetAlert.swal(data.message, "", "success");
                    }
                    $window.location.reload();
                }else{
                    if(data.alert){
                        if (bowser.msie && bowser.version <= 8) {
                            alert(data.message);
                        }else{
                            SweetAlert.swal(data.message, "Please try again", "error");
                        }
                    }
                }
            }).error(function(data, status) {
                console.error('Repos error', status, data);
            })["finally"](function(){
                $scope.isProcessing=false;
            });
    }
});


app.controller("balanceController",function($scope,$http,$window,SweetAlert){
    $scope.singleBalance={};
    $scope.gspBalanceList={};
    $scope.init = function(){
        $http.get("/api/finance/GetBalance")
        .success(function(data) {
            if(data.status==200) {
                console.log(data);
                $scope.singleBalance=data.result.singleBalance;
                $scope.gspBalanceList=data.result.gspBalance;

            }else{
                if(data.alert){
                    if (bowser.msie && bowser.version <= 8) {
                        alert(data.message);
                    }else{
                        SweetAlert.swal(data.message, "Please try again", "error");
                    }
                }
            }
        }).error(function(data, status) {
            console.error('Repos error', status, data);
        })["finally"](function(){
            $scope.isProcessing=false;
        });
    }


});

app.controller("LoginController",function($scope,$http,$window,SweetAlert){
    $scope.loginForm = {};
    $scope.processForm = function() {
        if($scope.loginForm)
            $scope.isProcessing=true;
        var width = (screen.width) ? screen.width:'';
        var height = (screen.height) ? screen.height:'';
        // check for windows off standard dpi screen res
        if (typeof(screen.deviceXDPI) == 'number') {
            width *= screen.deviceXDPI/screen.logicalXDPI;
            height *= screen.deviceYDPI/screen.logicalYDPI;
        }
        var visitorTime = moment().format("YYYY-MM-DDTHH:mm:ss.SSSZZ");
        $scope.userInfo = {"clientLocalTime":visitorTime,"screenWidth":width,screenHeight:height};
        angular.extend($scope.loginForm,$scope.userInfo);

        var url = "/api/player/Login";
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.loginForm),  // pass in data as strings
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        }).success(function(data) {
            if(data.status==200) {
                $window.location.reload();
            }else{
                if(data.alert){
                    if (bowser.msie && bowser.version <= 8) {
                        alert(data.message);
                    }else{
                        SweetAlert.swal(data.message, "Please try again", "error");
                    }
                }
            }
        }).error(function(data, status) {
            console.error('Repos error', status, data);
        })["finally"](function(){
            $scope.isProcessing=false;
        });
    };
});

//for SignUp
app.controller("SignUpController",function($scope,$http,$window,SweetAlert){
    $scope.isProcessing = undefined;//Disabled button after call ajax function
    $scope.signForm = {};
    $scope.userInfo = {};


    $scope.processForm = function() {
        $scope.isProcessing=true;
        var width = (screen.width) ? screen.width:'';
        var height = (screen.height) ? screen.height:'';
        // check for windows off standard dpi screen res
        if (typeof(screen.deviceXDPI) == 'number') {
            width *= screen.deviceXDPI/screen.logicalXDPI;
            height *= screen.deviceYDPI/screen.logicalYDPI;
        }
        var visitorTime = moment().format("YYYY-MM-DDTHH:mm:ss.SSSZZ");
        $scope.userInfo = {"clientLocalTime":visitorTime,"screenWidth":width,screenHeight:height};
        angular.extend($scope.signForm,$scope.userInfo);

        var url = "/api/player/SignUp";
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.signForm),  // pass in data as strings
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        }).success(function(data) {
            if(data.status==200) {
                $window.location.reload();
            }else{
                if(data.alert){
                    if (bowser.msie && bowser.version <= 8) {
                        alert(data.message);
                    }else{
                        SweetAlert.swal(data.message, "Please try again", "error");
                    }
                }
            }
        }).error(function(data, status) {
            console.error('Repos error', status, data);
        })["finally"](function(){
            $scope.isProcessing=false;
        });
    };

    var numberOfYears = (new Date()).getYear() - 18;

    var years = $.map($(Array(numberOfYears)), function (val, i) { return i + 1900; }).reverse();
    var months = $.map($(Array(12)), function (val, i) { return i + 1; });
    var days = $.map($(Array(31)), function (val, i) { return i + 1; });

    var isLeapYear = function () {
        var year = $scope.signForm.birthYear || 0;
        return ((year % 400 === 0 || year % 100 !== 0) && (year % 4 === 0)) ? 1 : 0;
    };

    var getNumberOfDaysInMonth = function () {
        var selectMonths = $scope.signForm.birthMonth || 0;
        return 31 - ((selectMonths === 2) ? (3 - isLeapYear()) : ((selectMonths - 1) % 7 % 2));
    };

    $scope.UpdateNumberOfDays = function () {
        $scope.NumberOfDays = getNumberOfDaysInMonth();
    };

    $scope.Years = years;
    $scope.Months = months;
    $scope.Days = days;
    $scope.NumberOfDays = 31;
});



//Matched Password Filter
app.directive('validPasswordC', function () {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl) {
            var original;
            ctrl.$formatters.unshift(function (modelValue) {
                original = modelValue;
                return modelValue;
            });

            ctrl.$parsers.push(function(viewValue){
                var noMatch = viewValue != scope.signUpForm.password.$viewValue;
                //console.log(noMatch);
                ctrl.$setValidity('noMatch', !noMatch);
                return viewValue;
            });
        }
    }
});

//Duplicated Id Filter
app.directive('userNameDuplicated', function ($http) {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl) {
            var original;
            ctrl.$formatters.unshift(function (modelValue) {
                original = modelValue;
                return modelValue;
            });

            ctrl.$parsers.push(function(viewValue){
                if(viewValue != undefined) {
                    if (viewValue.length >= 4) {
                        var url = "/api/player/CheckDuplicateData";
                        $http({
                            method: 'POST',
                            url: url,
                            data: $.param({infoValue: viewValue, infoType: 1}),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        }).success(function (data) {
                            if (data.result.isDuplicate) {
                                ctrl.$setValidity('duplicated', false);
                            } else {
                                ctrl.$setValidity('duplicated', true);
                            }
                            ctrl.$setValidity('minlength', true);

                        });

                        return viewValue;
                    } else {
                        ctrl.$setValidity('minlength', false);
                        return viewValue;
                    }
                }else{
                    ctrl.$setValidity('minlength', false);
                    return viewValue;
                }
            })
        }
    };
});


app.directive('referrerCheck', function ($http) {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl) {
            var original;
            ctrl.$formatters.unshift(function (modelValue) {
                original = modelValue;
                return modelValue;
            });

            ctrl.$parsers.push(function(viewValue){

                if(viewValue!=""){
                    if (viewValue.length >= 4) {
                        var url = "/api/player/CheckDuplicateData";
                        $http({
                            method: 'POST',
                            url: url,
                            data: $.param({infoValue: viewValue, infoType: 1}),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        }).success(function (data) {
                            if (data.result.isDuplicate) {
                                ctrl.$setValidity('duplicated', true);
                            } else {
                                ctrl.$setValidity('duplicated', false);
                            }
                        });
                        return viewValue;
                    }else{
                        ctrl.$setValidity('duplicated', false);
                    }
                }else{
                    ctrl.$setPristine();
                    ctrl.$setValidity('duplicated', true);


                }
            })
        }
    };
});

app.filter('userDateTime', function($filter) {
    return function (input, format, offset) {
        if(input == null){ return ""; }
        var _date = $filter('date')(new Date(input),'yyyy-MM-dd HH:mm:ss');
        return _date.toUpperCase();

    }
});

app.filter('userDate', function($filter) {
    return function (input, format, offset) {
        if(input == null){ return ""; }
        var _date = $filter('date')(new Date(input),'yyyy-MM-dd');
        return _date.toUpperCase();

    }
});


app.filter('gspName', function($filter) {
    var gameName=[
    {101:"Ezugi"},
    {102:"GAMEPLAY"},
    {103:"Gold Deluxe"}
    ];

    return function (input, format, offset) {
        if(input == null){ return ""; }
        var _gspName = gameName.input;
        return _gspName.toUpperCase();

    }
});



app.controller('slotController', function($scope) {
    $('.slot-game-button').click(function(){
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
    });

    //=== Slot Items ===//
    var table_data3="";

    for(var i = 0 ;i<20;i++){
        table_data3 += "<div class=\"slot-box\">";
        table_data3 += "<div class=\"slot-item\" style=\"background:url('/common/images/slot/Avalon2.png') 0 0 no-repeat #fbfbfb;\">";
        table_data3 += "<div class=\"slot-new0\"></div>";
        table_data3 += "<div class=\"slot-top02\"></div>";
        table_data3 += "<p>Avalon II</p>";
        table_data3 += "</div>";
        table_data3 += "</div>";
    }

    $(".slot-items").html(table_data3);
});

app.controller('sportsController', function($scope) {

});

app.controller('promoController', function($scope) {

});

//Tabs
app.controller("TabController", function() {
    this.tab = 1;

    this.isSet = function(checkTab) {
        return this.tab === checkTab;
    };

    this.setTab = function(setTab) {
        this.tab = setTab;
    };
});

app.controller("PopController", function() {
    this.tab = 1;

    this.isSet = function(checkTab) {
        return this.tab === checkTab;
    };

    this.setTab = function(setTab) {
        this.tab = setTab;
    };
});

var reviews = [{
    body: "Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.",
    createdOn: 1397490980837
}];
app.controller('messageController', function () {
    this.message = {};
    this.reviews = reviews;

    this.addChatMsg = function (reviews) {
        this.message.createdOn = Date.now();
        this.reviews.push(this.message);
        this.message = {};
    };
});
