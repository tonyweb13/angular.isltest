<?//include_once $_SERVER["DOCUMENT_ROOT"] . "/lib/client.php";?>
<!DOCTYPE html>
<html xmlns:ng="http://angularjs.org" class="ng-app:casinoApp" id="ng-app" ng-app="casinoApp">
<head>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <script type="text/javascript" src="common/js/json2.js"></script>
    <script type="text/javascript" src="common/js/es5-shim.js"></script>
    <html class="no-js lt-ie9">
    <![endif]-->

    <!--[if lte IE 8]>
    <script>
        document.createElement('ng-include');
        document.createElement('ng-pluralize');
        document.createElement('ng-view');

        // Optionally these for CSS
        document.createElement('ng:include');
        document.createElement('ng:pluralize');
        document.createElement('ng:view');
    </script>
    <![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Play Casino</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="common/css/ticker-style.css">
    <link rel="stylesheet" href="common/css/owl.carousel.css">
    <link rel="stylesheet" href="common/css/owl.theme.css">
    <link rel="stylesheet" href="common/css/jquery.mCustomScrollbar.css" type="text/css" />
    <link rel="stylesheet" href="common/css/sweetalert.css">
    <link rel="stylesheet" href="common/css/style.css">
</head>
<body ng-controller="CommonController" ng-init="init();">
<div id="wrap">
    <div id="top-container" class="whole-container">
        <div class="container">
            <div class="top-announcements">
                <label>Announcements</label>
                <div class="news-ticker">
                    <ul>
                        <li ng-repeat="announcement in getAnouncementList"><i class="icon-new">N</i> <span ng-bind="announcement.title"></span> <em ng-bind="announcement.updateDate | userDateTime"></em></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="top-links">
                <ul>
                    <li><i class="icon-livechat-top"></i> Live Chat</li>
                    <li>Mobile</li>
                    <li>Affiliates</li>
                    <li class="lang-option">
                        Language
                        <div class="lang-active">
                            <i class="icon-lang icon-eng"></i>
                            <span class="rotate-triangle2"></span>
                        </div>
                    </li>
                </ul>
                <div id="lang-list">
                    <ul>
                        <li><i class="icon-lang icon-eng"></i> English</li>
                        <li><i class="icon-lang icon-thai"></i> ไทย</li>
                        <li><i class="icon-lang icon-chi"></i> 中國語</li>
                        <li><i class="icon-lang icon-kor"></i> 한국어</li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="header-container" class="whole-container">
        <div class="container">
            <div class="logo"><a href="#/"><img src="common/images/logo.png" /></a></div>

            <div class="login-container" ng-controller="LoginController">
                <?if(!isset($_SESSION['accessToken'])){?>
                    <div id="guest" >
                        <form ng-submit="processForm()">
                            <label>ID</label>
                            <input type="text" name="nickname" ng-model="loginForm.nickname" placeholder="User ID" class="id" />
                            <label>Password</label>
                            <input type="password" name="password" ng-model="loginForm.password" placeholder="Password" class="pw" />
                            <button type="submit" class="btn-login btn-gray hvr-sweep-to-right" ng-disabled="isProcessing">Login</button>
                        </form>
                        <button class="btn-signup hvr-sweep-to-right" ng-click="displaySignUp()">Sign Up</button>
                        <button class="btn-forgotpass btn-gray hvr-sweep-to-right"><i class="icon-forgotpass"></i></button>
                    </div>
                <?}else{?>
                    <div id="user" >
                        <label>Welcome, <strong><?=$_SESSION['nickname']?></strong></label>
                        <div class="box-balance" ng-controller="balanceController" ng-init="init()">
                            Balance


                            <div class="box-balance-container">
                                <h1>Live Casino | Slot Games | Poker</h1>
                                <div class="box-balance-item no-border">
                                    <i class="icon-info icon-tip-wallet"></i>
                                    <div class="tooltip tooltipWallet border-round">
                                        <b>MainWallet</b> is be available <b>Live casinos, Slots, Poker, K Sports</b>.
                                    </div>
                                    Main Wallet <strong ng-bind="singleBalance.amount | currency:cc_currency_symbol[singleBalance.currencyIsoCd] :0" ></strong>
                                </div>
                                <h2>TransferWallet</h2>
                                <div class="box-balance-item" ng-repeat="gspBalance in gspBalanceList">
                                    <span ng-bind="gspBalance.Key"></span>
                                    <strong ng-bind="gspBalance.Value.amount | currency:cc_currency_symbol[gspBalance.Value.currencyIsoCd] :0">245,000 USD</strong>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <button class="btn-mywallet hvr-sweep-to-right">My Wallet</button>
                        <button onclick="$('#walletAccount').click();" class="btn-account btn-gray hvr-sweep-to-right">Account</button>
                        <button ng-controller="LogoutController"  class="btn-logout btn-gray hvr-sweep-to-right" ng-click="logout()" ng-disabled="isProcessing"><i class="icon-logout"></i></button>
                    </div>
                <?}?>
                <div class="clear"></div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
    <div id="nav-container" class="whole-container nav-blue">
        <div class="container">
            <ul>
                <li><a href="#sports">Sports</a></li>
                <li><a href="#" onclick="alert('Coming Soon');">Live Casino</a></li>
                <li><a href="#slot">Slot Games</a></li>
                <li><a href="#" onclick="alert('Coming Soon');">Keno</a></li>
                <li><a href="#" onclick="alert('Coming Soon');">Mini Game</a></li>
                <li><a href="#" onclick="alert('Coming Soon');" class="navPoker">Poker</a></li>
                <li><a href="#promo" class="nav-promos nav-default">Promotions</a></li>
                <li onclick="$('#walletDeposit').click();" class="nav-deposit nav-default">Deposit</li>
                <li onclick="$('#walletWithdraw').click();" class="nav-withdraw nav-default">Withdraw</li>
                <li onclick="$('#customer1on1').click();" class="nav-customer nav-default">Customer</li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div ng-view></div>
    </div>
</div>

<div id="popup-signup">
    <div class="popup-close"><i class="icon-close-signup"></i></div>

    <div class="signup-form" ng-controller="SignUpController">
        <h1>Welcome to <strong>TestCasino</strong>!</h1>
        <h4>Register Now and Enjoy our Exciting Games!</h4>

        <form name="signUpForm" novalidate ng-submit="processForm()">
            <div ng-class="{'has-error' : signUpForm.nickname.$invalid && !signUpForm.nickname.$pristine, 'no-error' : signUpForm.nickname.$valid}">
                <label><em>*</em> User ID</label>
                <input type="text" class="form-control"
                       name="nickname"
                       ng-model="signForm.nickname"
                       ng-pattern="/^[A-z][A-z]*$/"
                       maxlength="16"
                       ng-maxlength="10"
                       user-name-duplicated
                       required />
                <label class="msg">4-16 (a-z, 0-9) chars.</label>
                <span ng-show="signUpForm.nickname.$pristine && signUpForm.nickname.$dirty" class="error">User ID is required.</span>
                <span ng-show="signUpForm.nickname.$error.duplicated"  class="error">This ID is already in use.</span>
                <span ng-show="signUpForm.nickname.$error.maxlength" class="error">User ID is too long.</span>
                <span ng-show="signUpForm.nickname.$error.minlength" class="error">User ID is too short.</span>
            </div>

            <div ng-class="{'has-error' : signUpForm.password.$invalid && !signUpForm.password.$pristine, 'no-error' : signUpForm.password.$valid}">
                <label><em>*</em> Password</label>
                <input type="password" class="form-control"
                       name="password"
                       ng-model="signForm.password"
                       maxlength="16"
                       ng-minlength="6"
                       ng-maxlength="16"
                       required />
                <label class="msg">6-16 chars. only</label>
                <span ng-show="signUpForm.password.$invalid && signUpForm.password.$pristine && signUpForm.password.$dirty" class="error">Password is required.</span>
                <span ng-show="signUpForm.password.$error.minlength" class="error">Password too short</span>
                <span ng-show="signUpForm.password.$error.maxlength" class="error">6-16 chars. only</span>
            </div>

            <div ng-class="{'has-error' : signUpForm.validPwd.$invalid && !signUpForm.validPwd.$pristine, 'no-error' : signUpForm.validPwd.$valid}">
                <label><em>*</em> Confirm Password</label>
                <input type="password"
                       name="validPwd"
                       class="form-control" maxlength="16" ng-model="signForm.validPwd" ng-minlength="6" ng-maxlength="16" valid-password-c required />
                <label class="msg"></label>
                <span ng-show="signUpForm.validPwd.$valid" class="valid">Passwords Matched!</span>
                <span ng-show="signUpForm.validPwd.$invalid && signUpForm.validPwd.$pristine && signUpForm.validPwd.$dirty" class="error">Confirm your password.</span>
                <span ng-show="signUpForm.validPwd.$error.noMatch && signUpForm.validPwd.$dirty" class="error">Passwords do not match!</span>
            </div>

            <div ng-class="{'has-error' : signUpForm.playerName.$invalid && !signUpForm.playerName.$pristine, 'no-error' : signUpForm.playerName.$valid}">
                <label><em>*</em> Player Name</label>
                <input type="text" class="form-control"
                       name="playerName"
                       ng-model="signForm.playerName"
                       maxlength="20"
                       ng-minlength="4"
                       ng-maxlength="20"
                       ng-pattern="/^[A-z ][A-z ]*$/"
                       required />
                <label class="msg">Match with Bank Account</label>
                <span ng-show="signUpForm.playerName.$invalid && signUpForm.playerName.$pristine && signUpForm.playerName.$dirty" class="error">Username is required.</span>
                <span ng-show="signUpForm.playerName.$error.minlength" class="error">Username is too short.</span>
                <span ng-show="signUpForm.playerName.$error.maxlength" class="error">Username is too long.</span>
            </div>

            <div ng-class="{'has-error' : signUpForm.birthYear.$error.required && signUpForm.birthYear.$dirty || signUpForm.birthMonth.$error.required && signUpForm.birthMonth.$dirty || signUpForm.birthDay.$error.required && signUpForm.birthDay.$dirty, 'no-error' : signUpForm.birthYear.$valid && signUpForm.birthMonth.$valid && signUpForm.birthDay.$valid}">
                <label><em>*</em> Date of Birth</label>
                <p>
                    <select id="birthYear" class="select_dateYear form-control"
                            name="birthYear"
                            ng-model="signForm.birthYear"
                            required ng-options="year for year in Years" ng-change="UpdateNumberOfDays()">
                        <option value="" selected="selected">Year</option>
                    </select>
                    <select id="birthMonth" class="select_dateMonth form-control"
                            name="birthMonth"
                            ng-model="signForm.birthMonth"
                            required ng-options="month for month in Months" ng-change="UpdateNumberOfDays()">
                        <option value="" selected="selected">Month</option>
                    </select>
                    <select id="birthDay" class="select_dateDay form-control"
                            name="birthDay"
                            ng-model="signForm.birthDay"
                            required
                            ng-options="day for day in Days | limitTo:NumberOfDays">
                        <option value="" selected="selected">Day</option>
                    </select>
                </p>
                <label class="msg">At least 18 yrs old</label>
                <span ng-show="signUpForm.birthYear.$error.required && signUpForm.birthYear.$dirty" class="error">Please Select Date of Birth</span>
                <span ng-show="signUpForm.birthMonth.$error.required && signUpForm.birthMonth.$dirty" class="error">Please Select Date of Birth</span>
                <span ng-show="signUpForm.birthDay.$error.required && signUpForm.birthDay.$dirty" class="error">Please Select Date of Birth</span>
            </div>

            <div ng-class="{'has-error' : signUpForm.gender.$error.required && !signUpForm.gender.$pristine, 'no-error' : signUpForm.gender.$valid}">
                <label><em>*</em> Gender</label>
                <p class="select_gender" ng-repeat="gender in genderList">
                    <input type="radio" ng-model="signForm.gender" name="gender" value="{{gender.genderNo}}" required  /><span ng-bind="gender.genderName"></span>
                </p>
                <span ng-show="signUpForm.gender.$error.required && signUpForm.gender.$dirty" class="error">Gender is required.</span>

            </div>

            <div ng-class="{'has-error' : signUpForm.areaNo.$error.required && signUpForm.areaNo.$dirty || signUpForm.phone.$invalid && !signUpForm.phone.$pristine, 'no-error' : signUpForm.areaNo.$valid && signUpForm.phone.$valid}">
                <label><em>*</em> Phone Number</label>
                <p>
                    <select class="select_phoneNo form-control"
                            name="areaNo"
                            ng-model="signForm.areaNo"
                            required ng-options="c.countryCallingCd as c.countryIso3166_1_A2 for c in getCountries">
                        <option value="" selected="selected">Code</option>
                    </select>
                    <input type="text" class="form-control txt_phoneNo"
                           name="phone"
                           placeholder="000-000-000"
                           maxlength="13"
                           ng-model="signForm.phone"
                           ng-minlength="8"
                           ng-maxlength="13"
                           ng-pattern='/^\d{4}-\d{4}|[0-9]$/'
                           required />
                </p>
                <label class="msg">9-10 chars. only</label>
                <span ng-show="signUpForm.phone.$error.required && signUpForm.phone.pristine " class="error">Invalid Phone Number!</span>
                <span ng-show="signUpForm.phone.$error.pattern && signUpForm.phone.$invalid" class="error">Invalid Phone Number!</span>
                <span ng-show="signUpForm.phone.$error.minlength" class="error">Phone Number too short</span>
                <span ng-show="signUpForm.phone.$error.maxlength" class="error">6-16 chars. only</span>
            </div>

            <div ng-class="{'has-error' : signUpForm.email.$invalid && !signUpForm.email.$pristine, 'no-error' : signUpForm.email.$valid}">
                <label><em>*</em> Email</label>
                <p>
                    <input type="email" name="email" class="form-control" ng-model="signForm.email" required />
                </p>
                <label class="msg">Please Enter Email.</label>
                <span ng-show="signUpForm.email.$invalid && !signUpForm.email.$pristine" class="error">Enter a valid email.</span>
                <span ng-show="signUpForm.email.$error.email" class="error">Invalid Email!</span>
            </div>
            <div ng-class="{'has-error' : signUpForm.currencyNo.$error.required && signUpForm.currencyNo.$dirty, 'no-error' : signUpForm.currencyNo.$valid}">
                <label><em>*</em> Currency</label>
                <p>
                    <select class="form-control" name="currencyNo" ng-model="signForm.currencyNo" required
                            ng-options="c.currencyNo as c.currencyIsoCd for c in getCurency">
                        <option value="" selected="selected">Please Select Currency</option>
                    </select>
                </p>
                <label class="msg"></label>
                <span ng-show="(signUpForm.currencyNo.$error.required && signUpForm.currencyNo.$dirty) || signUpForm.currencyNo.$pristine" class="error">
                    <i class="icon-info icon-tip-currency"></i>
                    <div class="tooltip tooltipCurrency border-round">
                        Please select your preferred currency.<br />
                        Currency chosen is not changeable.
                    </div>
                </span>
            </div>
            <div ng-class="{'has-error' : signUpForm.countryNo.$error.required && signUpForm.countryNo.$dirty, 'no-error' : signUpForm.countryNo.$valid}">
                <label><em>*</em> Country</label>
                <p>
                    <select class="form-control" name="countryNo" ng-model="signForm.countryNo" required
                            ng-options="c.countryNo as c.countryName for c in getCountries">
                        <option value="" selected="selected">Please Select Country</option>
                    </select>
                </p>
                <label class="msg">Please Select Country</label>
                <span ng-show="signUpForm.countryNo.$error.required && signUpForm.countryNo.$dirty" class="error">Please Select Country</span>
            </div>
            <div ng-class="{'has-error' : signForm.languageNo.$error.required && signUpForm.languageNo.$dirty, 'no-error' : signUpForm.languageNo.$valid}">
                <label><em>*</em> Language</label>
                <p>
                    <select class="form-control" name="languageNo" ng-model="signForm.languageNo" required
                            ng-options="c.languageNo as c.languageName for c in getLanguages">
                        <option value="" selected="selected">Please Select Language</option>
                    </select>
                </p>
                <label class="msg">Please Select Language</label>
                <span ng-show="signUpForm.languageNo.$error.required && signUpForm.languageNo.$dirty" class="error">Please Select Language</span>
            </div>
            <div ng-class="{'has-error' : signUpForm.securityQuestionNo.$error.required && signUpForm.securityQuestionNo.$dirty, 'no-error' : signUpForm.securityQuestionNo.$valid}">
                <label><em>*</em> Security Question</label>
                <p>
                    <select class="form-control" name="securityQuestionNo" ng-model="signForm.securityQuestionNo" required
                            ng-options="c.questionNo as c.questionDescription for c in getQuestion">
                        <option value="" selected="selected">Please Select Question</option>
                    </select>
                </p>
                <label class="msg">Please Select Question.</label>
                <span ng-show="signUpForm.securityQuestionNo.$error.required && signUpForm.securityQuestionNo.$dirty" class="error">Question is required.</span>
            </div>
            <div ng-class="{'has-error' : signUpForm.securityAnswer.$invalid && !signUpForm.securityAnswer.$pristine, 'no-error' : signUpForm.securityAnswer.$valid}">
                <label><em>*</em> Security Answer</label>
                <input type="text" class="form-control" name="securityAnswer" ng-model="signForm.securityAnswer" required />
                <label class="msg">Enter Security Answer.</label>
                <span ng-show="signUpForm.securityAnswer.$invalid && signUpForm.securityAnswer.$pristine && signUpForm.securityAnswer.dirty" class="error">Answer is required.</span>
            </div>

            <div ng-class="{'has-error' : signUpForm.referrerNickName.$error.duplicated && signUpForm.referrerNickName.$dirty,
                            'not-used' : signUpForm.referrerNickName.$pristine,
                            'no-error' : signUpForm.referrerNickName.$valid}">
                <label>Referrer ID</label>
                <input type="text" class="form-control" name="referrerNickName" ng-model="signForm.referrerNickName"
                       referrer-check/>
                <label class="msg">4-16 (a-z, 0-9) chars.</label>
                <span ng-show="signUpForm.referrerNickName.$error.duplicated" class="error">We can't find ID.</span>
            </div>
            <button id="sing-up" type="submit" class="btn btn-dark btn-register" ng-disabled="signUpForm.$invalid || isProcessing">Register</button>
        </form>

        <div class="terms-container border-round">
            <h1>Terms & Conditions <a href="#"><i class="icon-close-terms"></i></a></h1>
            <div class="terms-content border-round">
                <strong>Term Details 1</strong>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                    magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                    nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                    praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend
                    option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam;
                    est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                    legunt saepius.</p>
                <strong>Term Details 2</strong>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                    magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                    nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                    praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend
                    option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam;
                    est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                    legunt saepius.</p>
                <strong>Term Details 3</strong>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                    magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                    nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                    praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend
                    option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam;
                    est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii
                    legunt saepius.</p>
            </div>
        </div>

        <div class="signup-terms">
            By clicking the REGISTER button, I hereby acknowledge that <br />
            I am above 18 years old and have read and accepted your<br />
            terms & conditions. See the <a href="#" class="link-terms">Terms & Conditions here</a>.
        </div>
    </div>

    <div class="signup-promos">
        <div><img src="common/images/signup-promos.png" width="180" height="180"/></div>
        <div><img src="common/images/signup-promos.png" width="180" height="180" /></div>
        <div><img src="common/images/signup-promos.png" width="180" height="180" /></div>
    </div>
</div>

<div id="popup-login">
    <div class="popup-close"><i class="icon-close-signup"></i></div>
    <div class="login-form">
        <div class="login-logo"></div>
        <h4>Please login to access your account.</h4>

        <form id="popup-login-form" class="ng-pristine ng-valid">
            <div>
                <input type="text" name="MemberID" class="login-input-user" placeholder="User ID">
            </div>
            <div>
                <input type="password" name="MemberPwd" class="login-input-pass" placeholder="Password">
            </div>
            <button class="btn btn-dark btn-submit">Login</button>
        </form>
        <p>
            <a href="#" class="link-signup">Not yet a member? Sign Up Here!</a>
            <a href="#" class="link-forgotpassword">Forgot Password?</a>
        </p>
        <div class="clear"></div>
    </div>
</div>

<div id="popup-forgotpass">
    <div class="popup-close"><i class="icon-close-popup"></i></div>

    <div class="popup-tabs" ng-controller="TabController as tab">
        <ul>
            <li ng-class="{ active:tab.isSet(1) }" ng-click="tab.setTab(1)"><i class="icon-popup-forgotpass"></i>&nbsp; Forgot Password</li>
            <li ng-class="{ active:tab.isSet(2) }" ng-click="tab.setTab(2)"><i class="icon-popup-forgotid"></i>&nbsp; Forgot ID</li>
        </ul>
        <div class="clear"></div>

        <div ng-show="tab.isSet(1)">
            <div class="forgotpass-form">
                <h1>Forgot Password?</h1>
                <h4>Enter your username and email address below and we'll send you instructions on how to reset your password.</h4>
                <form ng-submit="" novalidate>
                    <div>
                        <label>User ID</label>
                        <p>
                            <input type="text" />
                        </p>
                        <div class="clear"></div>
                    </div>

                    <div>
                        <label>Email</label>
                        <p>
                            <input type="text" />
                        </p>
                    </div>
                    <button class="btn btn-dark btn-submit">Submit</button>
                </form>
            </div>
        </div>
        <div ng-show="tab.isSet(2)">
            <div class="forgotpass-form">
                <h1>Forgot User ID?</h1>
                <h4>Enter your email address below and we'll send you instructions on how to reset your password.</h4>
                <form  ng-submit="" novalidate>
                    <div>
                        <label>Email</label>
                        <p>
                            <input type="text" />
                        </p>
                    </div>
                    <button class="btn btn-dark btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="popup-wallet">
    <div class="popup-close"><i class="icon-close-popup"></i></div>

    <div class="popup-tabs" ng-controller="PopController as tab">
        <ul>
            <li id="walletMyWallet" ng-class="{ active:tab.isSet(1) }" ng-click="tab.setTab(1)">My Wallet</li>
            <li id="walletDeposit" ng-class="{ active:tab.isSet(2) }" ng-click="tab.setTab(2)">Deposit</li>
            <li id="walletWithdraw" ng-class="{ active:tab.isSet(3) }" ng-click="tab.setTab(3)">Withdraw</li>
            <li id="walletBonus" ng-class="{ active:tab.isSet(4) }" ng-click="tab.setTab(4)">Bonus History</li>
            <li id="walletFriends" ng-class="{ active:tab.isSet(5) }" ng-click="tab.setTab(5)">Friends List</li>
            <li id="walletCoupon" ng-class="{ active:tab.isSet(6) }" ng-click="tab.setTab(6)">Coupon <span>0</span></li>
            <li id="walletCash" ng-class="{ active:tab.isSet(7) }" ng-click="tab.setTab(7)">Cash History</li>
            <li id="walletAccount" ng-class="{ active:tab.isSet(8) }" ng-click="tab.setTab(8)">Account</li>
        </ul>
        <div class="clear"></div>

        <div ng-show="tab.isSet(1)" class="popup-content">
            <h1>My Wallet <a href="#" class="btn-more"><i class="icon-refresh"></i> Refresh</a></h1>

            <div class="wallet-items margin-top margin-bottom">
                <div class="wallet-item-box wallet-item-bg1 border-round">
                    <i class="icon-info icon-tip-mainwallet"></i>
                    <div class="tooltip tooltipMainWallet border-round">
                        <b>MainWallet</b> is be available <b>Live casinos, Slots, Poker, K Sports</b>.
                    </div>
                    <strong>Main Wallet</strong>
                    <h2>1,468,628</h2>
                    <span>USD</span>
                </div>
                <div class="box-separator"></div>
                <div class="wallet-item-box wallet-item-bg2 border-round">
                    <strong>S Sports</strong>
                    <h2>1,468,628</h2>
                    <span>USD</span>
                </div>
                <div class="box-separator"></div>
                <div class="wallet-item-box wallet-item-bg3 border-round">
                    <strong>W Sports</strong>
                    <h2>1,468,628</h2>
                    <span>USD</span>
                </div>
                <div class="box-separator"></div>
                <div class="wallet-item-box wallet-item-bg4 border-round">
                    <strong>A Sports</strong>
                    <h2>1,468,628</h2>
                    <span>USD</span>
                </div>
                <div class="box-separator"></div>
                <div class="wallet-item-box wallet-item-bg5 border-round">
                    <strong>M Sports</strong>
                    <h2>1,468,628</h2>
                    <span>USD</span>
                </div>
                <div class="clear"></div>
                <div class="wallet-item-box2 wallet-item-bg6 border-round">
                    <strong>Bonus Comp</strong>
                    <h2>1,468,628</h2>
                    <span>USD</span>
                    <a href="#" class="btn-more">History</a>
                </div>
                <div class="box-separator"></div>
                <div class="wallet-item-box2 wallet-item-bg7 border-round">
                    <strong>My Total Balance</strong>
                    <h2>1,468,628</h2>
                    <span>USD</span>
                </div>
                <div class="clear"></div>
            </div>

            <h1>Money Transfer</h1>
            <div class="moneyTransferBox box-gray border-round margin-top margin-bottom">
                <div class="col-4">
                    <label>From</label>
                    <select class="inputField">
                        <option>Single Wallet</option>
                        <option>Single Wallet</option>
                        <option>Single Wallet</option>
                    </select>
                </div>

                <div class="col-4">
                    <label>To</label>
                    <select class="inputField">
                        <option>ASC Sports</option>
                        <option>ASC Sports</option>
                        <option>ASC Sports</option>
                    </select>
                </div>

                <div class="col-4">
                    <label>Amount</label>
                    <input type="text" class="txtAmount inputField" />
                </div>
                <div class="col-4 text-center">
                    <label>&nbsp;</label>
                    <button class="btn btn-transfer">Transfer</button>
                </div>

                <div class="clear"></div>
                <p>The transfer amount is from Single Wallet is <strong>1000 USD</strong>.</p>
            </div>

            <h1 class="margin-top">Promotions <a href="#" class="btn-more">More</a></h1>
            <div class="container-box box-gray border-round margin-top text-center">
                <img src="common/images/promo-banner.png" height="110" width="427"/>
            </div>
        </div>
        <div ng-show="tab.isSet(2)" class="popup-content">
            <div class="row-box">
                <label>Game Selection</label>
                <p>
                    <select class="inputField">
                        <option value="" default>Please Select A Game</option>
                        <option value="">AFB Sports</option>
                        <option value="">WFT Sports</option>
                        <option value="">Bet Radar</option>
                        <option value="">Microgaming</option>
                        <option value="">Gameplay</option>
                        <option value="">Asia Gaming</option>
                        <option value="">Gold Deluxe</option>
                        <option value="">Ezugi</option>
                        <option value="">Playtech</option>
                        <option value="">Betsoft</option>
                    </select>
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Phone Number</label>
                <p>
                    <input type="text" class="inputField" placeholder="000-000-000" />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Deposit Amount</label>
                <p>
                    <input type="text" placeholder="0" class="inputField text-left"  />&nbsp;USD
                    <em>
                        <button class="btn btn-drkgray btn-option">100 USD</button>
                        <button class="btn btn-drkgray btn-option">500 USD</button>
                        <button class="btn btn-drkgray btn-option">1,000 USD</button>
                        <button class="btn btn-drkgray btn-option">5,000 USD</button>
                        <button class="btn btn-drkgray btn-option">10,000 USD</button>
                        <button class="btn btn-drkgray btn-option">ALL</button>
                    </em>
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Depositor</label>
                <p>
                    <input type="text" placeholder="2 - 10 Characters" class="inputField" />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Date & Time</label>
                <p>
                    <input type="text" name="DepositDate" id="datetimepicker" class="inputField inputDate" required />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Type of Deposit</label>
                <p>
                    <select class="inputField">
                        <option value="" default>Select Deposit Type</option>
                        <option value="">ATM</option>
                        <option value="">Counter</option>
                    </select>
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Comment</label>
                <p>
                    <textarea rows="4" cols="20" class="inputTextarea" placeholder="Text is limited to 300 characters"></textarea>
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box-last text-center">
                <button class="btn btn-submit">Deposit</button>
            </div>
        </div>
        <div ng-show="tab.isSet(3)" class="popup-content">
            <div class="row-box">
                <label>Game Selection</label>
                <p>
                    <select class="inputField">
                        <option value="" default>Please Select A Game</option>
                        <option value="">AFB Sports</option>
                        <option value="">WFT Sports</option>
                        <option value="">Bet Radar</option>
                        <option value="">Microgaming</option>
                        <option value="">Gameplay</option>
                        <option value="">Asia Gaming</option>
                        <option value="">Gold Deluxe</option>
                        <option value="">Ezugi</option>
                        <option value="">Playtech</option>
                        <option value="">Betsoft</option>
                    </select>
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Withdrawal Amount</label>
                <p>
                    <input type="text" placeholder="0" class="inputField text-left" />&nbsp; USD
                    <em>
                        <button class="btn btn-drkgray btn-option">à¸¿ 100</button>
                        <button class="btn btn-drkgray btn-option">à¸¿ 500</button>
                        <button class="btn btn-drkgray btn-option">à¸¿ 1,000</button>
                        <button class="btn btn-drkgray btn-option">à¸¿ 5,000</button>
                        <button class="btn btn-drkgray btn-option">à¸¿ 10,000</button>
                        <button class="btn btn-drkgray btn-option">ALL</button>
                    </em>
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Bank</label>
                <p>
                    <select class="inputField" style="margin-right: 4px;">
                        <option value="" default>Please Select A Game</option>
                        <option value="">AFB Sports</option>
                        <option value="">WFT Sports</option>
                        <option value="">Bet Radar</option>
                        <option value="">Microgaming</option>
                        <option value="">Gameplay</option>
                        <option value="">Asia Gaming</option>
                        <option value="">Gold Deluxe</option>
                        <option value="">Ezugi</option>
                        <option value="">Playtech</option>
                        <option value="">Betsoft</option>
                    </select>
                    <input type="text" placeholder="Account Number" class="inputField" />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Account Holder</label>
                <p>
                    <input type="text" placeholder="2 - 10 characters" class="inputField" />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Contact Number</label>
                <p>
                    <input type="text" placeholder="000-000-000" class="inputField" />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label>Comment</label>
                <p>
                    <textarea rows="6" cols="20" class="inputTextarea" placeholder="Text is limited to 300 characters"></textarea>
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box-desc">
                <p>
                    In case of multiple name usage between transactions, further verification will be required for security purposes.
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box-last text-center">
                <button class="btn btn-submit">Deposit</button>
            </div>
        </div>
        <div ng-show="tab.isSet(4)" class="popup-content margin-bottom">
            <div class="header-row-box">
                <div class="header-title width18 text-center">Category</div>
                <div class="header-title width25 text-center">Game</div>
                <div class="header-title width25 text-center">Type</div>
                <div class="header-title width16 text-center">Balance</div>
                <div class="header-title width16 text-center">Date</div>
                <div class="clear"></div>
            </div>
            <div id="pagination-container">
                <div class="list-items"></div>

                <div class="clear"></div>
                <div class="pagination">
                    <div class="simple-pagination-previous"></div>
                    <div class="simple-pagination-page-numbers"></div>
                    <div class="simple-pagination-next"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div ng-show="tab.isSet(5)" class="popup-content margin-bottom">
            <div class="header-row-box">
                <div class="header-title width18 text-center">Category</div>
                <div class="header-title width25 text-center">Game</div>
                <div class="header-title width25 text-center">Type</div>
                <div class="header-title width16 text-center">Balance</div>
                <div class="header-title width16 text-center">Date</div>
                <div class="clear"></div>
            </div>
            <div id="pagination-container2">
                <div class="list-items"></div>

                <div class="clear"></div>
                <div class="pagination">
                    <div class="simple-pagination-previous"></div>
                    <div class="simple-pagination-page-numbers"></div>
                    <div class="simple-pagination-next"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div ng-show="tab.isSet(6)" class="popup-content margin-bottom">
            <div class="header-row-box">
                <div class="header-title width18 text-center">Category</div>
                <div class="header-title width25 text-center">Game</div>
                <div class="header-title width25 text-center">Type</div>
                <div class="header-title width16 text-center">Balance</div>
                <div class="header-title width16 text-center">Date</div>
                <div class="clear"></div>
            </div>
            <div id="pagination-container3">
                <div class="list-items"></div>

                <div class="clear"></div>
                <div class="pagination">
                    <div class="simple-pagination-previous"></div>
                    <div class="simple-pagination-page-numbers"></div>
                    <div class="simple-pagination-next"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div ng-show="tab.isSet(7)" class="popup-content margin-bottom">
            <div class="header-row-box">
                <div class="header-title width18 text-center">Category</div>
                <div class="header-title width25 text-center">Game</div>
                <div class="header-title width25 text-center">Type</div>
                <div class="header-title width16 text-center">Balance</div>
                <div class="header-title width16 text-center">Date</div>
                <div class="clear"></div>
            </div>
            <div id="pagination-container4">
                <div class="list-items"></div>

                <div class="clear"></div>
                <div class="pagination">
                    <div class="simple-pagination-previous"></div>
                    <div class="simple-pagination-page-numbers"></div>
                    <div class="simple-pagination-next"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div ng-show="tab.isSet(8)" class="popup-content margin-bottom">
            <div class="row-box">
                <label style="margin-left:167px;">Current Password</label>
                <p>
                    <input type="password" placeholder="" class="inputField" />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label style="margin-left:167px;">New Password</label>
                <p>
                    <input type="password" placeholder="" class="inputField" />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box">
                <label style="margin-left:167px;">Confirm New Password</label>
                <p>
                    <input type="password" placeholder="" class="inputField" />
                </p>
                <div class="clear"></div>
            </div>
            <div class="row-box-last text-center">
                <button class="btn btn-submit">Change Password</button>
            </div>
        </div>
    </div>

</div>

<div id="popup-customer">
    <div class="popup-close"><i class="icon-close-popup"></i></div>

    <div class="popup-tabs" ng-controller="PopController as tab">
        <ul>
            <li id="customerNotice" ng-class="{ active:tab.isSet(1) }" ng-click="tab.setTab(1)">Notice</li>
            <li id="customerEvent" ng-class="{ active:tab.isSet(2) }" ng-click="tab.setTab(2)">Event</li>
            <li id="customerFAQ" ng-class="{ active:tab.isSet(3) }" ng-click="tab.setTab(3)">FAQ</li>
            <li id="customer1on1" ng-class="{ active:tab.isSet(4) }" ng-click="tab.setTab(4)">1:1 Customer Service</li>
            <li id="customerPartnership" ng-class="{ active:tab.isSet(5) }" ng-click="tab.setTab(5)">Partnership</li>
        </ul>
        <div class="clear"></div>

        <div ng-show="tab.isSet(1)" class="popup-content">
            <div class="header-row-box">
                <div class="header-title width10 text-center">Number</div>
                <div class="header-title width64 text-center">Subject</div>
                <div class="header-title width15 text-center">Date Created</div>
                <div class="header-title width10 text-center">Views</div>
                <div class="clear"></div>
            </div>
            <div id="notice-container">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody class="board-list">
                    <tr>
                        <td class="row-col width10 text-center">10</td>
                        <td class="row-col width64 text-left" onclick="read_board('1','37','');">Sample notice texts are placed here.</td>
                        <td class="row-col width15 text-center">2014-09-13</td>
                        <td class="row-col width10 text-center">30</td>
                    </tr>
                    <tr>
                        <td class="row-col width10 text-center">10</td>
                        <td class="row-col width64 text-left" onclick="read_board('1','37','');">Sample notice texts are placed here.</td>
                        <td class="row-col width15 text-center">2014-09-13</td>
                        <td class="row-col width10 text-center">30</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="clear"></div>
        </div>
        <div ng-show="tab.isSet(2)" class="popup-content">
            <div class="header-row-box">
                <div class="header-title width10 text-center">Number</div>
                <div class="header-title width64 text-center">Subject</div>
                <div class="header-title width15 text-center">Date Created</div>
                <div class="header-title width10 text-center">Views</div>
                <div class="clear"></div>
            </div>
            <div id="notice-container">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody class="board-list">
                    <tr>
                        <td class="row-col width10 text-center">10</td>
                        <td class="row-col width64 text-left" onclick="read_board('1','37','');">Sample notice texts are placed here.</td>
                        <td class="row-col width15 text-center">2014-09-13</td>
                        <td class="row-col width10 text-center">30</td>
                    </tr>
                    <tr>
                        <td class="row-col width10 text-center">10</td>
                        <td class="row-col width64 text-left" onclick="read_board('1','37','');">Sample notice texts are placed here.</td>
                        <td class="row-col width15 text-center">2014-09-13</td>
                        <td class="row-col width10 text-center">30</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="clear"></div>
        </div>
        <div ng-show="tab.isSet(3)" class="popup-content">
            <div class="header-row-box">
                <div class="header-title width10 text-center">Number</div>
                <div class="header-title width64 text-center">Subject</div>
                <div class="header-title width15 text-center">Date Created</div>
                <div class="header-title width10 text-center">Views</div>
                <div class="clear"></div>
            </div>
            <div id="notice-container">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody class="board-list">
                    <tr>
                        <td class="row-col width10 text-center">10</td>
                        <td class="row-col width64 text-left" onclick="read_board('1','37','');">Sample notice texts are placed here.</td>
                        <td class="row-col width15 text-center">2014-09-13</td>
                        <td class="row-col width10 text-center">30</td>
                    </tr>
                    <tr>
                        <td class="row-col width10 text-center">10</td>
                        <td class="row-col width64 text-left" onclick="read_board('1','37','');">Sample notice texts are placed here.</td>
                        <td class="row-col width15 text-center">2014-09-13</td>
                        <td class="row-col width10 text-center">30</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="clear"></div>
        </div>
        <div ng-show="tab.isSet(4)" class="popup-content">
            <div class="header-row-box">
                <div class="header-title width60"><span><p class="text-left">Welcome to UEFA168 !!</p></span></div>
                <div class="header-title width20 text-right">Writer : <strong>UEFA168</strong></div>
                <div class="header-title width20 text-right">Time : <strong>2014-05-09</strong></div>
                <div class="clear"></div>
            </div>

            <div class="preview-box">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.
            </div>

            <div ng-controller="messageController as msgCtrl">
                <div class="message-box">
                    <div class="admin-message">
                        <div class="message-name text-left"><strong>Admin - UEFA168</strong></div>
                        <div class="message-time text-right"><em>09:59 &nbsp; 2014-05-09</em></div>
                        <div class="clear"></div>

                        <div class="admin-message-box">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="user-message" ng-repeat="message in msgCtrl.reviews">
                        <div class="message-name text-left"><strong>Name</strong></div>
                        <div class="message-time text-right"><em>{{message.createdOn | date:'HH:mm MM-dd-yyyy'}}</em></div>
                        <div class="clear"></div>

                        <div class="user-message-box">
                            <p>{{message.body}}</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="header-title-box">
                    <form name="messageForm" ng-submit="messageForm.$valid && msgCtrl.addChatMsg(message)" novalidate>
                            <textarea rows="8" class="width99" id="textarea"
                                      ng-model="msgCtrl.message.body" placeholder="Type your message here"></textarea>
                        <div class="text-count"><span id="textarea_feedback" class="input-textcount"></span>Remaining Characters</div>
                        <div class="btn-send"><button class="btn btn-send">SEND</button></div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>

            <div class="header-row-box">
                <div class="header-title width10 text-center">Number</div>
                <div class="header-title width70 text-center">Subject</div>
                <div class="header-title width10 text-center">Date Created</div>
                <div class="header-title width10 text-center">Views</div>
                <div class="clear"></div>
            </div>

            <div id="notice-container">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <div class="row-col width10 text-center">12</div>
                            <div class="row-col width70 text-left">Content 1</div>
                            <div class="row-col width10 text-center">2014.05.02</div>
                            <div class="row-col width10 text-center">325</div>
                            <div class="clear"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row-col width10 text-center">11</div>
                            <div class="row-col width70 text-left">CJ E&M made the Top 10 in Pocket Gamerâ€™s Top 50 Developers!.</div>
                            <div class="row-col width10 text-center">2014.05.02</div>
                            <div class="row-col width10 text-center">325</div>
                            <div class="clear"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="pagination-container">
                    <div class="pagination pagination-board">
                        <div class="my-navigation">
                            <span class="simple-pagination-previous"></span>
                            <span class="simple-pagination-page-numbers"></span>
                            <span class="simple-pagination-next"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div ng-show="tab.isSet(5)" class="popup-content">
            <div class="row-box highlight">
                <p>Sample Texts Here...</p>
                <div class="clear"></div>
            </div>
            <form id="partner-write-form">
                <div class="row-box">
                    <label>Subject</label>
                    <p><input name="Subject" type="text" value="" class="inputField text-left"></p>
                    <div class="clear"></div>
                </div>
                <div class="row-box highlight">
                    <label>Message</label>
                    <p><textarea name="Contents" rows="4" cols="20" class="inputTextarea" placeholder="Up to 1000 characters only."></textarea></p>
                    <div class="clear"></div>
                </div>
            </form>
            <div class="row-box-last text-center">
                <button class="btn btn-submit">Submit</button>
            </div>
        </div>
    </div>

</div>

<!--SCRIPTS-->
<script src="common/js/jquery-1.11.3.min.js"></script>
<![if !IE 8]>
<script type="text/javascript" src="common/js/sweetalert.min.js"></script>
<![endif]>
<script type="text/javascript" src="common/js/moment.js"></script>

<script type="text/javascript" src="common/js/angular.min.js"></script>
<script type="text/javascript" src="common/js/angular-route.js"></script>
<script type="text/javascript" src="common/js/angular-currency-code.min.js"></script>
<script type="text/javascript" src="common/js/custom-angular.js"></script>
<script type="text/javascript" src="common/js/ng-sweetalert.min.js"></script>

<script type="text/javascript" src="common/js/jquery.easy-ticker.js"></script>
<script type="text/javascript" src="common/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="common/js/easing.js"></script>
<script type="text/javascript" src="common/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="common/js/progressbar.js"></script>
<script type="text/javascript" src="common/js/jquery.jodometer.js"></script>
<script type="text/javascript" src="common/js/jquery.bpopup.js"></script>
<script type="text/javascript" src="common/js/jquery-pagination.js"></script>
<script type="text/javascript" src="common/js/jquery.mCustomScrollbar.js"></script>

<script type="text/javascript" src="common/js/bowser.min.js"></script>
<script type="text/javascript" src="common/js/custom.js"></script>
<script type="text/javascript" src="common/js/custom-module.js"></script>

<!-- angularjs language translation -->
<!-- bower:js -->
<script type="text/javascript" src="common/js/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular/angular.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-animate/angular-animate.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-cookies/angular-cookies.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-resource/angular-resource.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-route/angular-route.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-sanitize/angular-sanitize.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-touch/angular-touch.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-translate/angular-translate.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-translate-loader-static-files/angular-translate-loader-static-files.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-translate-storage-cookie/angular-translate-storage-cookie.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-translate-storage-local/angular-translate-storage-local.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-translate-handler-log/angular-translate-handler-log.js"></script>
<script type="text/javascript" src="common/js/bower_components/angular-dynamic-locale/src/tmhDynamicLocale.js"></script>
<!-- endbower -->

<script type="text/javascript" src="common/js/scripts/controllers/appCtrl.js"></script>
<script type="text/javascript" src="common/js/scripts/services/LocaleService.js"></script>
<script type="text/javascript" src="common/js/scripts/directives/LanguageSelectDirective.js"></script>
<!-- endbuild -->
<!-- end angularjs language translation -->



</body>
</html>