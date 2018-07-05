$(document).ready(function(){

    $('.news-ticker').easyTicker({
        direction: 'up',
        easing: 'easeInOutBack',
        speed: 'slow',
        interval: 2000,
        height: 'auto',
        visible: 1,
        mousePause: 1
    }).data('easyTicker');


    $('.game-button').hover(function(){
        $(this).find('.game-button-overlay').fadeIn('fast');
    }, function() {
        $(this).find('.game-button-overlay').fadeOut('fast');
    });

    $('.slot-game-button').click(function(){
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.top-item').hover(function(){
        $(this).closest('div').animate({height: $(this).get(0).scrollHeight}, 200);
    }, function() {
        $(this).closest('div').animate({height: 39}, 400);
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

    $(".box-balance").click(function() {
        $('.box-balance-container').slideToggle('slow', 'easeInOutBack');
    });

    //Language Option
    $(".lang-active").click(function(){
        $("#lang-list").slideToggle('slow', 'easeInOutBack');
    });

    //Tooltip
    $('.tooltip').hide();
    $('.icon-tip-currency').hover(function(){ $('.tooltipCurrency').show();}, function() {$('.tooltipCurrency').hide(); });
    $('.icon-tip-wallet').hover(function(){ $('.tooltipWallet').show();}, function() {$('.tooltipWallet').hide(); });
    $('.icon-tip-mainwallet').hover(function(){ $('.tooltipMainWallet').show();}, function() {$('.tooltipMainWallet').hide(); });

    $('.terms-container').hide();
    $('.link-terms').click(function() {
        $('.terms-container').fadeIn(20);
    });
    $('.terms-container h1 a').click(function() {
        $('.terms-container').fadeOut(20);
    });

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


    //Birth Date
    //var birthYear = document.getElementById("birthYear");
    //for (i=2000; i>=1915;i--){
    //    birthYear.add(new Option(i),null);
    //}
    //
    ////var birthDay = document.getElementById("birthDay");
    //for (i=1; i<=31;i++){
    //    birthDay.add(new Option(i),null);
    //}

    //Text Count
    var text_max = 99;
    $('#textarea_feedback').html(text_max);
    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining);
    });

    //Scrollbar Custom
    $(".notice-content, .terms-content").mCustomScrollbar({scrollInertia:200});
    $("#popup-wallet div.popup-content").mCustomScrollbar({scrollInertia:200});
    $("#popup-customer div.popup-content").mCustomScrollbar({scrollInertia:200});

    //Pagination
    $('#pagination-container, #pagination-container2, #pagination-container3, #pagination-container4, #pagination-container5').simplePagination({
        pagination_container: 'div.list-items',
        items_per_page: 12,
        number_of_visible_page_numbers: 10
    });

    //Popup
    $('.navPoker').click(function(){popupLogin()});
    $('.nav-customer').click(function(){popupCustomer()});
    $('.btn-mywallet, .nav-deposit, .nav-withdraw, .btn-account').click(function(){popupWallet()});
    $('.btn-forgotpass').click(function(){popupForgotPass()});
    $('.btn-signup').click(function(){popupSignup()});

    function popupLogin(){
        $('#popup-login').bPopup({easing: 'easeOutBack', speed: 400, positionStyle: 'fixed', modalClose: false});
        $('#popup-promos .popup-close').click();
        $('#popup-customer .popup-close').click();
    }
    function popupCustomer(){
        $('#popup-customer').bPopup({easing: 'easeOutBack', speed: 400, positionStyle: 'fixed', modalClose: false});
    }
    function popupWallet(){
        $('#popup-wallet').bPopup({easing: 'easeOutBack', speed: 400, positionStyle: 'fixed', modalClose: false});
    }
    function popupForgotPass(){
        $('#popup-forgotpass').bPopup({easing: 'easeOutBack', speed: 400, positionStyle: 'fixed', modalClose: false});
    }
    function popupSignup(){
        $('#popup-signup').bPopup({easing: 'easeOutBack', speed: 400, positionStyle: 'fixed', modalClose: false});
    }

});