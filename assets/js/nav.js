const history = [];
const $ = jQuery;
const isMobile = (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4)));

'use strict';

module.exports = {

    _bindings: function() {
        const _this = this;
        $('.menu-holder .menu-item-has-children > span > a').on('click', function(e) {
            e.preventDefault();

            _this._handleMenuItemClick(this);
        });

        $('.back-link > span > a').on('click', function(e) {
            e.preventDefault();

            _this._handleBackClick(this);
        });

        $('#header-overlay, #close-menu').on('click', function(e) {
            _this._handleMenuClose();
        });

        $('.menu-text').on('click', function(e) {
            e.preventDefault();

            _this._handleMenuOpen();
        });

        $('.language li a').on('click', function(e) {
            e.preventDefault();
        });

        $('.search-icon_text').on('click', function(e) {
            e.preventDefault();
            
            _this._handleSearchOpen();
        });

        $('#close-menu').on('click', function(e) {
            e.preventDefault();
        });

        $(window).on('resize', function() {
            _this._calculateSocialMediaHeight();
        });
    },

    _handleMenuItemClick: function(element) {
        const $submenu = $(element).closest('.menu-item-has-children');
        const $parentItem = $submenu.closest('ul');
        
        const menuItem = {
            submenu: $submenu,
            parentItem: $parentItem
        };

        history.push(menuItem);

        this._openMenuItem(menuItem);
    },


    _handleBackClick: function(element) {
        const menuItem = history.pop();

        if(menuItem) {
            this._closeMenuItem(menuItem);
        }
    },

    _handleMenuClose: function() {
        if(history.length > 0) {
            const animationInterval = (history.length * 200);

            history.reverse().forEach(function(menuItem, key) {
                
                var interval = ((key + 1) * 200);
    
                setTimeout(function() {
                    this._closeMenuItem(menuItem);    

                    history.pop(); // just remove the items
                }.bind(this), interval);
    
            }.bind(this));
    
    
            setTimeout(function() {
                this._animateMenuHide();
            }.bind(this), animationInterval);
        } else {
            this._animateMenuHide();
        }
    },

    _animateMenuHide: function() {
        setTimeout(function() {
            $('#header-overlay').removeClass('is-open');
        }, 500);
        setTimeout(function() {
            $('.lateral').removeClass('is-open');
        }, 450);
        setTimeout(function() {
            $('.language-search').removeClass('item-delay_on');
        }, 350);
        setTimeout(function() {
            $('.menu-holder').removeClass('item-delay_on');
        }, 200);
        if($('.lateral').hasClass('has-socials')){
            $('.lateral .social-media').removeClass('is-open');
            $('.lateral .social-media').removeClass('item-delay_on');
        }
        $('.search').removeClass('is-open');
        $('#close-search').removeClass('is-active');
    },

    _handleMenuOpen: function() {
        $('#header-overlay').addClass('is-open');
        setTimeout(function() {
            $('.lateral').addClass('is-open');
        }, 100);
        setTimeout(function() {
            $('.language-search').addClass('item-delay_on');
        }, 400);
        setTimeout(function() {
            $('.menu-holder').addClass('item-delay_on');
        }, 500);
        if($('.lateral').hasClass('has-socials')){
            setTimeout(function() {
                $('.lateral .social-media').addClass('is-open');
            }, 600);
            setTimeout(function() {
                $('.lateral .social-media').addClass('item-delay_on');
            }, 700);
        }
    },

    _handleSearchOpen: function() {
        $('.search').addClass('is-open');
       
        setTimeout(function() {
            $('#search-input').focus();
            if(isMobile) {
                $('#close-search').addClass('is-active');
            }
        }, 400);

        $(document).bind('keydown', function(e) { 
            if (e.which == 27) {
                $('.search').removeClass('is-open');
                if(isMobile) {
                    $('#close-search').removeClass('is-active');
                }
            }
        });
    },

    _openMenuItem: function(menuItem) {
        menuItem.parentItem.addClass('menu-hidden_left');
        menuItem.submenu.addClass('menu-active');
    },

    _closeMenuItem: function(menuItem) {
        menuItem.parentItem.removeClass('menu-hidden_left');
        menuItem.submenu.removeClass('menu-active');
    },

    _calculateSocialMediaHeight: function() {
        if($('.lateral').hasClass('has-socials')) {
            var socialMediaHeight = $('.lateral .social-media').outerHeight();
            $('.menu-holder').css('padding-bottom', socialMediaHeight);
        }
    },

    _initBackButton: function() {
        $('.menu-holder .menu-item-has-children .sub-menu').prepend('<li class="back-link"><span><a href="#">Back</a></span></li>');
    },
    
    _mobileBindings: function() {
        if(isMobile) {
            $('.lateral').addClass('is-mobile');
            $('#close-menu').addClass('is-active');
            $('#close-search').on('click', function(){
                $(this).removeClass('is-active');
                $('.search').removeClass('is-open');
                $('#search-input').focusout();
            });
        }
    },

    init: function() {
        this._initBackButton();
        this._calculateSocialMediaHeight();
        this._mobileBindings();
        this._bindings();
    }
}