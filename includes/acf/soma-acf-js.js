jQuery(document).ready(function($) {
    var loaded = false;

    $(document).on('acf/setup_fields', function () {
        if (loaded === false) {
            loaded = true;

            $(document).off('acf/conditional_logic/show');
            $(document).off('acf/conditional_logic/hide');
            $(document).on('acf/conditional_logic/show', function( e, $target, item ){

        		// validate
        		if( $target.attr('data-field_type') != 'tab' )
        		{
        			return;
        		}


        		//console.log('conditional_logic/show tab %o', $target);


        		// vars
        		var $tab = $target.parent().siblings('.acf-tab-wrap').find('a[data-key="' + $target.attr('data-field_key') + '"]');


        		// if tab is already visible, then ignore the following functiolnality
        		if( $tab.is(':visible') )
        		{
        			return;
        		}


        		// visibility
        		$tab.parent().show();


        		// if this is the active tab
        		if( $tab.parent().hasClass('active') )
        		{
        			$tab.trigger('click');
        			return;
        		}


        		// if the sibling active tab is actually hidden by conditional logic, take ownership of tabs
        		if( $tab.parent().siblings('.active').is(':hidden') )
        		{
        			// show this tab group
        			$tab.trigger('click');
        			return;
        		}

        	});

            $(document).on('acf/conditional_logic/hide', function( e, $target, item ){

        		// validate
        		if( $target.attr('data-field_type') != 'tab' )
        		{
        			return;
        		}

        		//console.log('conditional_logic/hide tab %o', $target);


        		// vars
        		var $tab = $target.parent().siblings('.acf-tab-wrap').find('a[data-key="' + $target.attr('data-field_key') + '"]');


        		// if tab is already hidden, then ignore the following functiolnality
        		if( $tab.is(':hidden') )
        		{
        			return;
        		}


        		// visibility
        		$tab.parent().hide();


        		// if
        		if( $tab.parent().siblings(':visible').exists() )
        		{
        			// if the $target to be hidden is a tab button, lets toggle a sibling tab button
        			// $tab.parent().siblings(':visible').first().children('a').trigger('click');
        		}
        		else
        		{
        			// no onther tabs
        			acf.fields.tab.hide_tab_fields( $target );
        		}

        	});

            $(document).on('click', '.acf-tab-button', function(e) {
    			var _this = acf.fields.tab;

    			var $wrap = $(this).closest('.acf-tab-wrap').parent(),
    				key = $(this).attr('data-key');

    			$wrap.find('.field_type-tab').each(function(){
    				var $tab = $(this);

    				if ($tab.attr('data-field_key') == key) {
    					_this.show_tab_fields($(this));
    				} else {
    					_this.hide_tab_fields($(this));
    				}
    			});
        	});

            (function () {
                var $tabs = $('.acf-tab-wrap');

                $tabs.each(function () {
                    var $t = $(this);

                    var $nextElements = $t.nextAll().wrapAll('<div class="acf-group-wrap">');

                    $t.find('.acf-tab-button').each(function () {
						if ($(this).data('key') === 'field_5a95762746d78') {
                            $(this).prepend('<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>');
                        }
						
                        if ($(this).data('key') === 'field_5aa13aa0b5cda') {
                            $(this).prepend('<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>');
						}
						
						if ($(this).data('key') === 'field_5aa925cc3b3bf') {
                            $(this).prepend('<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>');
						}

						if ($(this).data('key') === 'field_5ac35d08a11e6') {
                            $(this).prepend('<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-center"><line x1="18" y1="10" x2="6" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="18" y1="18" x2="6" y2="18"></line></svg>');
						}

						if ($(this).data('key') === 'field_5ac0d5f2d03c9') {
                            $(this).prepend('<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>');
						}
                    });
                });
            })();
        }

        (function () {
            var $fields = $('.field');
            $fields.each(function () {
                if (!$(this).parents('.acf-flexible-content').length && !$(this).is('.field_type-repeater, .field_type-flexible_content')) {
                    var $label = $(this).find('.label');

                    if ($label.length && !$label.next('.tab_group-field').length) {
                        var $next = $label.nextAll();

                        $next.wrapAll('<div class="tab_group-field clearfix">');
                    }
                }
            });
        })();

        $('.acf_postbox').addClass('is-loaded');
    });


});
