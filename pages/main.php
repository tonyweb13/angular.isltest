<div id="masthead-container" class="whole-container">
    <div class="container">
        <div class="masthead"></div>
    </div>
</div>

<div class="container" ng-controller="MainController" ng-init="init()">
    <div class="container-box box-main margin-bottom">
        <div class="top-transactions margin-bottom">
            <div id="lastdeposit" class="top-item container-box box-default">
                <label>Last Deposit</label>
                <div class="top-item-list">
                    <p ng-repeat="currencyDeposit in currentDepositList">
                        <span class="txtID" ng-bind="currencyDeposit.nickname"></span>
                        <span class="txtAmount" ng-bind="currencyDeposit.currencyAmount.amount | currency: cc_currency_symbol[currencyDeposit.currencyAmount.currencyIsoCd]:0"></span>
                        <span class="txtDate" ng-bind="currencyDeposit.transactionDate | userDate"></span>
                    </p>
                </div>
            </div>
            <div id="lastwithdraw" class="top-item container-box box-default">
                <label>Last Withdraw</label>
                <div class="top-item-list">
                    <p ng-repeat="currentWithdrawal in currentWithdrawalList">
                        <span class="txtID" ng-bind="currentWithdrawal.nickname"></span>
                        <span class="txtAmount" ng-bind="currentWithdrawal.currencyAmount.amount | currency: cc_currency_symbol[currencyDeposit.currencyAmount.currencyIsoCd]:0"></span>
                        <span class="txtDate" ng-bind="currentWithdrawal.transactionDate | userDate"></span>
                    </p>
                </div>
            </div>
            <div id="bestwithdraw" class="top-item container-box box-default">
                <label>Best Withdraw</label>
                <div class="top-item-list">
                    <p ng-repeat="topWithdrawal in topWithdrawalList">
                        <span class="txtID" ng-bind="topWithdrawal.nickname"></span>
                        <span class="txtAmount" ng-bind="topWithdrawal.currencyAmount.amount | currency: cc_currency_symbol[currencyDeposit.currencyAmount.currencyIsoCd]:0"></span>
                        <span class="txtDate" ng-bind="topWithdrawal.transactionDate | userDate"></span>
                    </p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="game-buttons box-default">
            <div class="game-button game-button1">
                <h3>Microgaming</h3>
                <button class="btn btn-play btn-play-mg hvr-push">Play Now</button>
                <button class="btn btn-play btn-list hvr-push"><i class="fa fa-th-list"></i></button>
                <div class="game-button-overlay"></div>
            </div>
            <div class="game-button game-button2">
                <h3>Gameplay</h3>
                <button class="btn btn-play hvr-push">Play Now</button>
                <div class="game-button-overlay"></div>
            </div>
            <div class="game-button game-button3">
                <h3>Gold Deluxe</h3>
                <button class="btn btn-play hvr-push">Play Now</button>
                <div class="game-button-overlay"></div>
            </div>
            <div class="game-button game-button4">
                <h3>Asia Gaming</h3>
                <button class="btn btn-play hvr-push">Play Now</button>
                <div class="game-button-overlay"></div>
            </div>
            <div class="game-button game-button5">
                <h3>XTD Gaming</h3>
                <button class="btn btn-play hvr-push">Play Now</button>
                <div class="game-button-overlay"></div>
            </div>
            <div class="game-button game-button6">
                <h3>XTD Elegant</h3>
                <button class="btn btn-play hvr-push">Play Now</button>
                <div class="game-button-overlay"></div>
            </div>
            <div class="game-button game-button7">
                <h3>Ezugi Gaming</h3>
                <button class="btn btn-play hvr-push">Play Now</button>
                <div class="game-button-overlay"></div>
            </div>
            <div class="game-button game-button8 no-border">
                <h3>Moon Game</h3>
                <button class="btn btn-play hvr-push">Play Now</button>
                <div class="game-button-overlay"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="container margin-bottom">
        <div class="jackpot">
            <h1>Slot Games Progressive Jackpot</h1>
            <strong>$</strong>
            <div class="pjackpot"></div>
        </div>
    </div>

    <div class="container-box box-default margin-bottom">
        <div class="col-3 box-default-right box-promos no-margin">
            <h3>Promotions <a href="#" class="btn-more" onclick="$('#customerNotice').click();">More</a></h3>
            <div id="promo-slider" class="owl-carousel owl-theme">
                <div class="item"><img src="common/images/promo1.png" width="315" height="286"/></div>
                <div class="item"><img src="common/images/promo1.png" width="315" height="286" /></div>
                <div class="item"><img src="common/images/promo1.png" width="315" height="286" /></div>
            </div>
        </div>
        <div class="col-3 box-default-right box-products">
            <h3>Product Advantages</h3>
            <div class="product-items">
                <h1>Sports</h1>
                <p>Well-known Asian & European view sports Betting available here</p>
            </div>
            <div class="product-items">
                <h1>Live Casino</h1>
                <p>Unforgettable experience with the best live casino games online</p>
            </div>
            <div class="product-items">
                <h1>Slots</h1>
                <p>Exciting animations and cool 3D Effects</p>
            </div>
            <div class="product-items">
                <h1>Keno & Lottery</h1>
                <p>Unforgettable experience with the best live casino games online</p>
            </div>
            <div class="product-items">
                <h1>Single Wallet</h1>
                <p>Exciting animations and cool 3D Effects</p>
            </div>
        </div>
        <div class="col-3 box-customer" ng-cloak>
            <h3>Customer Service</h3>
            <div class="customer-service margin-bottom">
                <div class="customer-service-button" ng-repeat="contractSns in contactSnsList" >
                    <div id="agentSns0">
                        <i class="icon-{{contractSns.snsName | lowercase}}"></i>
                        <strong ng-bind="contractSns.snsName"></strong>
                        <span ng-bind="contractSns.snsId"></span>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="customer-service-button no-border">
                    <i class="icon-livechat"></i>
                    <strong>Live Chat</strong>
                    <span>Click Here</span>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="customer-service-button2 border-round">
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="customer-service-title">Hotline</td>
                            <td id="hotLine" class="customer-service-number">
                                <span ng-repeat="contracttPhone in contactPhoneList" ng-bind="contracttPhone"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="customer-service-button2 border-round">
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="customer-service-title">Email</td>
                            <td id="agentEmail" class="customer-service-detail">
                                <a ng-repeat="contracttEmail in contactEmailList" ng-href="mailto:{{contracttEmail}}" ng-bind="contracttEmail"></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="clear"></div>
            </div>

            <h3>Service Advantages</h3>
            <div class="service-advantages">
                <div class="service-advantages-item">
                    <h1>Deposit</h1>
                    <div class="ave-time">
                        Average Time <strong>2</strong> min
                    </div>
                    <div id="depositBar" class="progressBars">
                        <div></div>
                    </div>
                </div>

                <div class="service-advantages-item">
                    <h1>Withdraw</h1>
                    <div class="ave-time">
                        Average Time <strong>15</strong> min
                    </div>
                    <div id="withdrawBar" class="progressBars">
                        <div></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>