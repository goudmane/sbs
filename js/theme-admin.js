/* global jQuery:false */
/* global LINGVICO_STORAGE:false */

jQuery( document ).ready(
	function() {
		"use strict";

		// Hide empty meta-boxes
		jQuery( '.postbox > .inside' ).each(
			function() {
				if (jQuery( this ).html().length < 5) {
					jQuery( this ).parent().hide();
				}
			}
		);

		// Hide admin notice
		jQuery( '.lingvico_admin_notice .lingvico_hide_notice' ).on(
			'click', function(e) {
				jQuery( this ).parents( '.lingvico_admin_notice' ).slideUp();
				jQuery.post(
					LINGVICO_STORAGE['ajax_url'], {
						'action': 'lingvico_hide_' + (jQuery( this ).parents( '.lingvico_welcome_notice' ).length > 0 ? 'admin' : 'rate') + '_notice',
						'nonce': LINGVICO_STORAGE['ajax_nonce']
					},
					function(response){}
				);
				e.preventDefault();
				return false;
			}
		);

		// TGMPA Source selector is changed
		jQuery( '.tgmpa_source_file' ).on(
			'change', function(e) {
				var chk = jQuery( this ).parents( 'tr' ).find( '>th>input[type="checkbox"]' );
				if (chk.length == 1) {
					if (jQuery( this ).val() !== '') {
						chk.attr( 'checked', 'checked' );
					} else {
						chk.removeAttr( 'checked' );
					}
				}
			}
		);

		// jQuery Tabs
		//---------------------------------
		if (jQuery.ui && jQuery.ui.tabs) {
			jQuery( '.lingvico_tabs:not(.inited)' ).addClass( 'inited' ).tabs();
		}

		// jQuery Accordion
		//----------------------------------
		if (jQuery.ui && jQuery.ui.accordion) {
			jQuery( '.lingvico_accordion:not(.inited)' ).addClass( 'inited' ).accordion(
				{
					'header': '.lingvico_accordion_title',
					'heightStyle': 'content'
				}
			);
		}

		// Icons selector
		//----------------------------------

		// Add icon selector after the menu item classes field
		jQuery( '.edit-menu-item-classes' )
		.on(
			'change', function() {
				lingvico_menu_item_class_changed( jQuery( this ) );
			}
		)
		.each(
			function() {
				jQuery( this ).after( '<span class="lingvico_list_icons_selector" title="' + LINGVICO_STORAGE['msg_icon_selector'] + '"></span>' );
				lingvico_menu_item_class_changed( jQuery( this ) );
			}
		);

		function lingvico_menu_item_class_changed(fld) {
			var icon     = lingvico_get_icon_class( fld.val() );
			var selector = fld.next( '.lingvico_list_icons_selector' );
			selector.attr( 'class', lingvico_chg_icon_class( selector.attr( 'class' ), icon ) );
			if ( ! icon) {
				selector.css( 'background-image', '' );
			} else if (icon.indexOf( 'image-' ) >= 0) {
				var list = jQuery( '.lingvico_list_icons' );
				if (list.length > 0) {
					var bg = list.find( '.' + icon.replace( 'image-', '' ) ).css( 'background-image' );
					if (bg && bg != 'none') {
						selector.css( 'background-image', bg );
					}
				}
			}
		}

		jQuery( '.lingvico_list_icons_selector' ).on(
			'click', function(e) {
				var selector = jQuery( this );
				var input_id = selector.prev().attr( 'id' );
				if (input_id === undefined) {
					input_id = ('lingvico_icon_field_' + Math.random()).replace( /\./g, '' );
					selector.prev().attr( 'id', input_id )
				}
				var in_menu = selector.parents( '.menu-item-settings' ).length > 0;
				var list    = in_menu ? jQuery( '.lingvico_list_icons' ) : selector.next( '.lingvico_list_icons' );
				if (list.length > 0) {
					if (list.css( 'display' ) == 'none') {
						list.find( 'span.lingvico_list_active' ).removeClass( 'lingvico_list_active' );
						var icon = lingvico_get_icon_class( selector.attr( 'class' ) );
						if (icon !== '') {
							list.find( 'span[class*="' + icon.replace( 'image-', '' ) + '"]' ).addClass( 'lingvico_list_active' );
						}
						var pos = in_menu ? selector.offset() : selector.position();
						list.find( '.lingvico_list_icons_search' ).val( '' );
						list.find( 'span' ).removeClass( 'lingvico_list_hidden' );
						list.data( 'input_id', input_id )
						.css(
							{
								'left': pos.left - (in_menu ? 0 : list.outerWidth() - selector.width() - 1),
								'top': pos.top + (in_menu ? 0 : selector.height() + 4)
							}
						)
							.fadeIn(
								function() {
									list.find( '.lingvico_list_icons_search' ).focus();
								}
							);

					} else {
						list.fadeOut();
					}
				}
				e.preventDefault();
				return false;
			}
		);

		jQuery( '.lingvico_list_icons_search' ).on(
			'keyup', function(e) {
				var list = jQuery( this ).parent(),
				val      = jQuery( this ).val();
				list.find( 'span' ).removeClass( 'lingvico_list_hidden' );
				if (val !== '') {
					list.find( 'span:not([data-icon*="' + val + '"])' ).addClass( 'lingvico_list_hidden' );
				}
			}
		);

		jQuery( '.lingvico_list_icons span' ).on(
			'click', function(e) {
				var list     = jQuery( this ).parent().fadeOut();
				var input    = jQuery( '#' + list.data( 'input_id' ) );
				var selector = input.next();
				var icon     = lingvico_alltrim( jQuery( this ).attr( 'class' ).replace( /lingvico_list_active/, '' ) );
				var bg       = jQuery( this ).css( 'background-image' );
				if (bg && bg != 'none') {
					icon = 'image-' + icon;
				}
				input.val( lingvico_chg_icon_class( input.val(), icon ) ).trigger( 'change' );
				selector.attr( 'class', lingvico_chg_icon_class( selector.attr( 'class' ), icon ) );
				if (bg && bg != 'none') {
					selector.css( 'background-image', bg );
				}
				e.preventDefault();
				return false;
			}
		);

		function lingvico_chg_icon_class(classes, icon) {
			var chg = false;
			classes = lingvico_alltrim( classes ).split( ' ' );
			icon    = icon.split( '-' );
			for (var i = 0; i < classes.length; i++) {
				if (classes[i].indexOf( icon[0] + '-' ) >= 0) {
					classes[i] = icon.join( '-' );
					chg        = true;
					break;
				}
			}
			if ( ! chg) {
				if (classes.length == 1 && classes[0] == '') {
					classes[0] = icon.join( '-' );
				} else {
					classes.push( icon.join( '-' ) );
				}
			}
			return classes.join( ' ' );
		}

		function lingvico_get_icon_class(classes) {
			var classes = lingvico_alltrim( classes ).split( ' ' );
			var icon    = '';
			for (var i = 0; i < classes.length; i++) {
				if (classes[i].indexOf( 'icon-' ) >= 0) {
					icon = classes[i];
					break;
				} else if (classes[i].indexOf( 'image-' ) >= 0) {
					icon = classes[i];
					break;
				}
			}
			return icon;
		}

		// Checklist
		//------------------------------------------------------
		jQuery( '.lingvico_checklist:not(.inited)' ).addClass( 'inited' )
		.on(
			'change', 'input[type="checkbox"]', function() {
				var choices = '';
				var cont    = jQuery( this ).parents( '.lingvico_checklist' );
				cont.find( 'input[type="checkbox"]' ).each(
					function() {
						choices += (choices ? '|' : '') + jQuery( this ).data( 'name' ) + '=' + (jQuery( this ).get( 0 ).checked ? jQuery( this ).val() : '0');
					}
				);
				cont.siblings( 'input[type="hidden"]' ).eq( 0 ).val( choices ).trigger( 'change' );
			}
		)
		.each(
			function() {
				if (jQuery.ui.sortable && jQuery( this ).hasClass( 'lingvico_sortable' )) {
					var id = jQuery( this ).attr( 'id' );
					if (id === undefined) {
						jQuery( this ).attr( 'id', 'lingvico_sortable_' + ('' + Math.random()).replace( '.', '' ) );
					}
					jQuery( this ).sortable(
						{
							items: ".lingvico_sortable_item",
							placeholder: ' lingvico_checklist_item_label lingvico_sortable_item lingvico_sortable_placeholder',
							update: function(event, ui) {
								var choices = '';
								ui.item.parent().find( 'input[type="checkbox"]' ).each(
									function() {
										choices += (choices ? '|' : '')
										+ jQuery( this ).data( 'name' ) + '=' + (jQuery( this ).get( 0 ).checked ? jQuery( this ).val() : '0');
									}
								);
								ui.item.parent().siblings( 'input[type="hidden"]' ).eq( 0 ).val( choices ).trigger( 'change' );
							}
						}
					)
					.disableSelection();
				}
			}
		);

		// Range Slider
		//------------------------------------
		if (jQuery.ui && jQuery.ui.slider) {
			jQuery( '.lingvico_range_slider:not(.inited)' ).addClass( 'inited' )
			.each(
				function () {
					// Get parameters
					var range_slider = jQuery( this );
					var linked_field = range_slider.data( 'linked_field' );
					if (linked_field === undefined) {
						linked_field = range_slider.siblings( 'input[type="hidden"],input[type="text"]' );
					} else {
						linked_field = jQuery( '#' + linked_field );
					}
					if (linked_field.length == 0) {
						return;
					}
					linked_field.on(
						'change', function() {
							var minimum = range_slider.data( 'min' );
							if (minimum === undefined) {
								minimum = 0;
							}
							var maximum = range_slider.data( 'max' );
							if (maximum === undefined) {
								maximum = 0;
							}
							var values = jQuery( this ).val().split( ',' );
							for (var i = 0; i < values.length; i++) {
								if (isNaN( values[i] )) {
									value[i] = minimum;
								}
								values[i] = Math.max( minimum, Math.min( maximum, Number( values[i] ) ) );
								if (values.length == 1) {
									range_slider.slider( 'value', values );
								} else {
									range_slider.slider( 'values', i, values[i] );
								}
							}
							update_cur_values( values );
							jQuery( this ).val( values.join( ',' ) );
						}
					);
					var range_slider_cur  = range_slider.find( '> .lingvico_range_slider_label_cur' );
					var range_slider_type = range_slider.data( 'range' );
					if (range_slider_type === undefined) {
						range_slider_type = 'min';
					}
					var values  = linked_field.val().split( ',' );
					var minimum = range_slider.data( 'min' );
					if (minimum === undefined) {
						minimum = 0;
					}
					var maximum = range_slider.data( 'max' );
					if (maximum === undefined) {
						maximum = 0;
					}
					var step = range_slider.data( 'step' );
					if (step === undefined) {
						step = 1;
					}
					// Init range slider
					var init_obj = {
						range: range_slider_type,
						min: minimum,
						max: maximum,
						step: step,
						slide: function(event, ui) {
							var cur_values = range_slider_type === 'min' ? [ui.value] : ui.values;
							linked_field.val( cur_values.join( ',' ) ).trigger( 'change' );
							update_cur_values( cur_values );
						},
						create: function(event, ui) {
							update_cur_values( values );
						}
					};
					function update_cur_values(cur_values) {
						for (var i = 0; i < cur_values.length; i++) {
							range_slider_cur.eq( i )
								.html( cur_values[i] )
								.css( 'left', Math.max( 0, Math.min( 100, (cur_values[i] - minimum) * 100 / (maximum - minimum) ) ) + '%' );
						}
					}
					if (range_slider_type === true) {
						init_obj.values = values;
					} else {
						init_obj.value = values[0];
					}
					range_slider.addClass( 'inited' ).slider( init_obj );
				}
			);
		}

		// Text Editor
		//------------------------------------------------------------------

		// Save editors content to the hidden field
		jQuery( document ).on(
			'tinymce-editor-init', function() {
				jQuery( '.lingvico_text_editor .wp-editor-area' ).each(
					function(){
						var tArea = jQuery( this ),
						id        = tArea.attr( 'id' ),
						input     = tArea.parents( '.lingvico_text_editor' ).prev(),
						editor    = tinyMCE.get( id ),
						content;
						// Duplicate content from TinyMCE editor
						if (editor) {
							editor.on(
								'change', function () {
									this.save();
									content = editor.getContent();
									input.val( content ).trigger( 'change' );
								}
							);
						}
						// Duplicate content from HTML editor
						tArea.css(
							{
								visibility: 'visible'
							}
						).on(
							'keyup', function(){
								content = tArea.val();
								input.val( content ).trigger( 'change' );
							}
						);
					}
				);
			}
		);

		// Link 'Edit layout'
		//------------------------------------------------------------------

		// Refresh link on the post editor when select with layout is changed in VC editor
		jQuery( '.lingvico_post_editor' ).each(
			function() {
				var link = jQuery( this );
				link.parent().parent().find( 'select' ).on(
					'change', function() {
						lingvico_change_post_edit_link( link );
					}
				).trigger('change');
			}
		);

		function lingvico_change_post_edit_link(a) {
			if (a.length > 0) {
				var sel = a.parent().parent().find( 'select' ),
					val = sel.val();
				if (sel.length == 0 || val == null) {
					a.addClass( 'lingvico_hidden' );
				} else {
					if (val == 'inherit') {
						if (sel.parent().hasClass( 'lingvico_options_item_field' )) {		// Theme Options
							var param_name = sel.parent().data( 'param' ).substr( 0, 12 );
							val            = sel.parents( '#lingvico_options_tabs' ).find( 'div[data-param="' + param_name + '"] > select' ).val();
						} else if (sel.data( 'customize-setting-link' ) !== undefined) {	// Customize
							var param_name = sel.data( 'customize-setting-link' ).substr( 0, 12 );
							val            = sel.parents( '#customize-theme-controls' ).find( 'select[data-customize-setting-link="' + param_name + '"]' ).val();
						}
					}
					var id = val !== '' && val !== 'inherit'
								? ('' + val).split( '-' ).pop()
								: 0;
					a.attr( 'href', a.attr( 'href' ).replace( /post=[0-9]{1,5}/, "post=" + id ) );
					if (id == 0 || id == 'none') {
						a.addClass( 'lingvico_hidden' );
					} else {
						a.removeClass( 'lingvico_hidden' );
					}
				}
			}
		}

		// Scheme Editor (need for Theme Options and for Customizer)
		//------------------------------------------------------------------

		// Backup scheme
		if (typeof lingvico_color_schemes !== 'undefined') {
			var lingvico_color_schemes_backup = lingvico_clone_object( lingvico_color_schemes );
		}

		// Detect WordPress Customizer
		var in_wp_customize = typeof wp.customize != 'undefined';

		// Update schemes in the 'scheme_storage' field
		function lingvico_update_scheme_storage(form) {
			if (in_wp_customize) {
				wp.customize( 'scheme_storage' ).set( lingvico_serialize( lingvico_color_schemes ) );
			} else {
				form.find( '[data-param="scheme_storage"] > input[type="hidden"]' ).val( lingvico_serialize( lingvico_color_schemes ) );
			}
		}

		// Show/Hide colors on change scheme editor type
		jQuery( '.lingvico_scheme_editor_type input' ).on(
			'change', function() {
				var type = jQuery( this ).val();
				jQuery( this ).parents( '.lingvico_scheme_editor' ).find( '.lingvico_scheme_editor_colors .lingvico_scheme_editor_row' ).each(
					function() {
						var visible = type != 'simple';
						jQuery( this ).find( 'input' ).each(
							function() {
								var color_name = jQuery( this ).attr( 'name' ),
								fld_visible    = type != 'simple';
								if ( ! fld_visible) {
									for (var i in lingvico_simple_schemes) {
										if (i == color_name || typeof lingvico_simple_schemes[i][color_name] != 'undefined') {
											fld_visible = true;
											break;
										}
									}
								}
								if ( ! fld_visible) {
									jQuery( this ).fadeOut();
								} else {
									jQuery( this ).fadeIn();
								}
								visible = visible || fld_visible;
							}
						);
						if ( ! visible) {
							jQuery( this ).slideUp();
						} else {
							jQuery( this ).slideDown();
						}
					}
				);
			}
		);
		jQuery( '.lingvico_scheme_editor_type input:checked' ).trigger( 'change' );

		// Change colors on change color scheme
		jQuery( '.lingvico_scheme_editor_selector' ).on(
			'change', function(e) {
				var scheme = jQuery( this ).val();
				for (var opt in lingvico_color_schemes[scheme].colors) {
					var fld = jQuery( this ).parents( '.lingvico_scheme_editor' ).find( '.lingvico_scheme_editor_colors' ).find( 'input[name="' + opt + '"]' );
					if (fld.length == 0) {
						continue;
					}
					fld.val( lingvico_color_schemes[scheme].colors[opt] );
					lingvico_scheme_editor_change_field_colors( fld );
				}
			}
		);

		// Reset colors of the current scheme
		jQuery( '.lingvico_scheme_editor_control_reset' ).on(
			'click', function() {
				if (confirm( LINGVICO_STORAGE['msg_scheme_reset'] )) {
					var selector                         = jQuery( this ).parents( '.lingvico_scheme_editor' ).find( '.lingvico_scheme_editor_selector' ),
					scheme                               = selector.val();
					lingvico_color_schemes[scheme].colors = lingvico_clone_object( lingvico_color_schemes_backup[scheme].colors );
					lingvico_update_scheme_storage( jQuery( this ).parents( 'form' ) );
					selector.trigger( 'change' );
				}
			}
		);

		// Copy (duplicate) current scheme
		jQuery( '.lingvico_scheme_editor_control_copy' ).on(
			'click', function() {
				var title = prompt( LINGVICO_STORAGE['msg_scheme_copy'] );
				if (title) {
					var selector                             = jQuery( this ).parents( '.lingvico_scheme_editor' ).find( '.lingvico_scheme_editor_selector' ),
					scheme_new                               = title.toLowerCase().replace( /\s/g, '_' ).replace( /\W/g, '' ),
					scheme                                   = selector.val();
					lingvico_color_schemes_backup[scheme_new] = {
						'title': title,
						'colors': lingvico_clone_object( lingvico_color_schemes[scheme].colors )
					};
					lingvico_color_schemes[scheme_new]        = {
						'title': title,
						'colors': lingvico_clone_object( lingvico_color_schemes[scheme].colors )
					};
					// Refresh templates list in Customizer
					if (in_wp_customize) {
						wp.customize.trigger( 'refresh_schemes' );
					}
					// Update 'storage' with schemes
					lingvico_update_scheme_storage( jQuery( this ).parents( 'form' ) );
					// Add new scheme to the selector
					selector
					.append( '<option value="' + scheme_new + '">' + title + '</option>' )
					.val( scheme_new )
					.trigger( 'change' );
					// Lock css update
					if (in_wp_customize) {
						wp.customize.trigger( 'lock_css', true );
					}
					// Add new scheme to the options 'xxx_scheme' (e.g. 'color_scheme', 'sidebar_scheme' ...)
					selector
					.parents(
						in_wp_customize
							? '#customize-theme-controls'
							: '#lingvico_options_form'
					)
						.find(
							in_wp_customize
							? '.customize-control[id$="_scheme"]'
							: '.lingvico_options_item_field[data-param$="_scheme"]'
						)
						.each(
							function() {
								var fld = jQuery( this ),
								input   = fld.find( 'select,input' );
								// Add control with scheme
								if (input.prop( 'tagName' ) == 'SELECT') {
									input.find( 'option[value="' + scheme + '"]' ).eq( 0 ).clone( true ).val( scheme_new ).appendTo( input );
								} else {
									fld.find( '[value="' + scheme + '"]' ).each(
										function() {
											var obj = jQuery( this );
											// Add new DOM object
											clone_control( obj, scheme_new, title );
											// Add new control to the internal element content in Customizer
											if (in_wp_customize) {
												try {
													var param = obj.data( 'customize-setting-link' ),
													content   = jQuery( wp.customize.settings.controls[param].content );
													content.find( '[value="' + scheme + '"]' ).each(
														function() {
															var obj = jQuery( this );
															clone_control( obj, scheme_new, title );
														}
													);
													wp.customize.settings.controls[param].content = content.html();
													if (typeof wp.customize.settings.controls[param].linkElements !== 'undefined') {
														wp.customize.settings.controls[param].linkElements();
													}
												} catch (e) {
												}
											}
										}
									);
								}
							}
						);
					// Unlock css update
					if (in_wp_customize) {
						wp.customize.trigger( 'lock_css', false );
					}
				}

				function clone_control(obj, value, title) {
					if (obj.parent().prop( "tagName" ) == 'LABEL') {
						var lbl_new = obj.parent().clone( true ).text( title );
						lbl_new.appendTo( obj.parent().parent() );
						var obj_new              = obj.clone( true ).val( value );
						obj_new.get( 0 ).checked = false;
						obj_new.prependTo( lbl_new );
					} else {
						var obj_new              = obj.clone( true ).val( value );
						obj_new.get( 0 ).checked = false;
						obj_new.appendTo( obj.parent() );
						obj.parent().append( title );
					}
				}
			}
		);

		// Delete current scheme
		jQuery( '.lingvico_scheme_editor_control_delete' ).on(
			'click', function() {
				var i    = 0,
				selector = jQuery( this ).parents( '.lingvico_scheme_editor' ).find( '.lingvico_scheme_editor_selector' ),
				scheme   = selector.val();

				for (var j in lingvico_color_schemes) {
					i++;
				}

				if (i < 2) {
					alert( LINGVICO_STORAGE['msg_scheme_delete_last'] );

				} else if (typeof lingvico_color_schemes[scheme].internal !== 'undefined' && lingvico_color_schemes[scheme].internal) {
					alert( LINGVICO_STORAGE['msg_scheme_delete_internal'] );

				} else if (confirm( LINGVICO_STORAGE['msg_scheme_delete'] )) {
					// Remove option from the selector
					selector.find( 'option[value="' + scheme + '"]' ).remove();
					var scheme_new = selector.find( 'option' ).eq( 0 ).val();
					selector.val( scheme_new ).trigger( 'change' );
					// Lock css update
					if (in_wp_customize) {
						wp.customize.trigger( 'lock_css', true );
					}
					// Delete scheme from the options 'xxx_scheme' (e.g. 'color_scheme', 'sidebar_scheme' ...)
					selector
					.parents(
						in_wp_customize
							? '#customize-theme-controls'
							: '#lingvico_options_form'
					)
					.find(
						in_wp_customize
							? '.customize-control[id$="_scheme"]'
						: '.lingvico_options_item_field[data-param$="_scheme"]'
					)
					.each(
						function() {
							var fld = jQuery( this ),
							input   = fld.find( 'select,input:checked' );
							// Select new scheme instead deleted scheme
							if (input.val() == scheme) {
								if (in_wp_customize) {
									wp.customize( input.data( 'customize-setting-link' ) ).set( scheme_new );
								} else {
									if (input.prop( 'tagName' ) == 'SELECT') {
										input.val( scheme_new );
									} else {
										fld.find( 'input' ).each(
											function(){
												if (jQuery( this ).val() == scheme_new) {
													jQuery( this ).get( 0 ).checked = true;
												}
											}
										);
									}
								}
							}
							// Delete control with scheme
							fld.find( '[value="' + scheme + '"]' ).each(
								function() {
									var obj = jQuery( this );
									if (obj.parent().prop( "tagName" ) == 'LABEL') {
										obj.parent().remove();
									} else {
										obj.remove();
									}
								}
							);
						}
					);
					// Delete scheme from the list
					delete lingvico_color_schemes[scheme];
					delete lingvico_color_schemes_backup[scheme];
					// Refresh templates list in Customizer
					if (in_wp_customize) {
						wp.customize.trigger( 'refresh_schemes' );
					}
					// Unlock css update
					if (in_wp_customize) {
						wp.customize.trigger( 'lock_css', false );
					}
					// Update 'storage' with schemes
					lingvico_update_scheme_storage( jQuery( this ).parents( 'form' ) );
				}
			}
		);

		// Internal ColorPicker
		if (jQuery( '.lingvico_scheme_editor_colors .iColorPicker' ).length > 0) {
			lingvico_color_picker();
			jQuery( '.lingvico_scheme_editor_colors .iColorPicker' ).each(
				function() {
					lingvico_scheme_editor_change_field_colors( jQuery( this ) );
				}
			).on(
				'focus', function (e) {
						lingvico_color_picker_show(
							null, jQuery( this ), function(fld, clr) {
								fld.val( clr ).trigger( 'change' );
								lingvico_scheme_editor_change_field_colors( fld );
							}
						);
				}
			).on(
				'change', function(e) {
						lingvico_scheme_editor_change_field_value( jQuery( this ) );
				}
			);

			// Tiny ColorPicker
		} else if (jQuery( '.lingvico_scheme_editor_colors .tinyColorPicker' ).length > 0) {
			jQuery( '.lingvico_scheme_editor_colors .tinyColorPicker' ).each(
				function() {
					jQuery( this ).colorPicker(
						{
							animationSpeed: 0,
							opacity: false,
							margin: '1px 0 0 0',
							renderCallback: function($elm, toggled) {
								var colors = this.color.colors,
								rgb        = colors.RND.rgb,
								clr        = (colors.alpha == 1
								? '#' + colors.HEX
								: 'rgba(' + rgb.r + ', ' + rgb.g + ', ' + rgb.b + ', ' + (Math.round( colors.alpha * 100 ) / 100) + ')'
								).toLowerCase();
								$elm.val( clr ).data( 'last-color', clr );
								if (toggled === undefined) {
									$elm.trigger( 'change' );
								}
							}
						}
					)
					.on(
						'change', function(e) {
							lingvico_scheme_editor_change_field_value( jQuery( this ) );
						}
					);
				}
			);
		}

		// Change colors of the field
		function lingvico_scheme_editor_change_field_colors(fld) {
			var clr = fld.val(),
			hsb     = lingvico_hex2hsb( clr );
			fld.css(
				{
					'backgroundColor': clr,
					'color': hsb['b'] < 70 ? '#fff' : '#000'
				}
			);
		}

		// Change value of the field
		function lingvico_scheme_editor_change_field_value(fld) {
			var color_name = fld.attr( 'name' ),
			color_value    = fld.val();
			// Change dependent colors
			if (fld.parents( '.lingvico_scheme_editor' ).find( '.lingvico_scheme_editor_type input:checked' ).val() == 'simple') {
				if (typeof lingvico_simple_schemes[color_name] != 'undefined') {
					if (in_wp_customize) {
						wp.customize.trigger( 'lock_css', true );
					}
					var scheme_name = jQuery( '.lingvico_scheme_editor_selector' ).val();
					for (var i in lingvico_simple_schemes[color_name]) {
						var chg_fld = fld.parents( '.lingvico_scheme_editor_colors' ).find( 'input[name="' + i + '"]' ),
						chg_value   = color_value;
						if (chg_fld.length > 0) {
							var level = lingvico_simple_schemes[color_name][i];
							// Make color_value darkness
							if (level != 1) {
								var hsb   = lingvico_hex2hsb( chg_value );
								hsb['b']  = Math.min( 100, Math.max( 0, hsb['b'] * (hsb['b'] < 70 ? 2 - level : level) ) );
								chg_value = lingvico_hsb2hex( hsb ).toLowerCase();
							}
							chg_fld.val( chg_value );
							lingvico_scheme_editor_change_field_value( chg_fld );
						}
					}
					if (in_wp_customize) {
						wp.customize.trigger( 'lock_css', false );
					}
				}
			}
			// Change value in the color scheme storage
			lingvico_color_schemes[fld.parents( '.lingvico_scheme_editor' ).find( '.lingvico_scheme_editor_selector' ).val()].colors[color_name] = color_value;
			lingvico_update_scheme_storage( fld.parents( 'form' ) );
			// Change field colors
			lingvico_scheme_editor_change_field_colors( fld );
		}

		// Standard WP Color Picker
		//-------------------------------------------------
		if (jQuery( '.lingvico_color_selector' ).length > 0) {
			jQuery( '.lingvico_color_selector' ).wpColorPicker(
				{
					// you can declare a default color here,
					// or in the data-default-color attribute on the input
					//defaultColor: false,

					// a callback to fire whenever the color changes to a valid color
					change: function(e, ui){
						jQuery( e.target ).val( ui.color ).trigger( 'change' );
					},

					// a callback to fire when the input is emptied or an invalid color
					clear: function(e) {
						jQuery( e.target ).prev().trigger( 'change' )
					},

					// hide the color picker controls on load
					//hide: true,

					// show a group of common colors beneath the square
					// or, supply an array of colors to customize further
					//palettes: true
				}
			);
		}

		// Media selector
		//--------------------------------------------
		LINGVICO_STORAGE['media_id']    = '';
		LINGVICO_STORAGE['media_frame'] = [];
		LINGVICO_STORAGE['media_link']  = [];
		jQuery( '.lingvico_media_selector' ).on(
			'click', function(e) {
				lingvico_show_media_manager( this );
				e.preventDefault();
				return false;
			}
		);
		jQuery( '.lingvico_options_field_preview' ).on(
			'click', '> span', function(e) {
				var image  = jQuery( this );
				var button = image.parent().prev( '.lingvico_media_selector' );
				var field  = jQuery( '#' + button.data( 'linked-field' ) );
				if (field.length == 0) {
					return;
				}
				if (button.data( 'multiple' ) == 1) {
					var val = field.val().split( '|' );
					val.splice( image.index(), 1 );
					field.val( val.join( '|' ) );
					image.remove();
				} else {
					field.val( '' );
					image.remove();
				}
				e.preventDefault();
				return false;
			}
		);

		function lingvico_show_media_manager(el) {
			LINGVICO_STORAGE['media_id']                                = jQuery( el ).attr( 'id' );
			LINGVICO_STORAGE['media_link'][LINGVICO_STORAGE['media_id']] = jQuery( el );
			// If the media frame already exists, reopen it.
			if ( LINGVICO_STORAGE['media_frame'][LINGVICO_STORAGE['media_id']] ) {
				LINGVICO_STORAGE['media_frame'][LINGVICO_STORAGE['media_id']].open();
				return false;
			}
			var type = LINGVICO_STORAGE['media_link'][LINGVICO_STORAGE['media_id']].data( 'type' )
						? LINGVICO_STORAGE['media_link'][LINGVICO_STORAGE['media_id']].data( 'type' )
						: 'image';
			var args = {
				// Set the title of the modal.
				title: LINGVICO_STORAGE['media_link'][LINGVICO_STORAGE['media_id']].data( 'choose' ),
				// Multiple choise
				multiple: LINGVICO_STORAGE['media_link'][LINGVICO_STORAGE['media_id']].data( 'multiple' ) == 1
						? 'add'
						: false,
				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: LINGVICO_STORAGE['media_link'][LINGVICO_STORAGE['media_id']].data( 'update' ),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: true
				}
			};
			// Allow sizes and filters for the images
			if (type == 'image') {
				args['frame'] = 'post';
			}
			// Tell the modal to show only selected post types
			if (type == 'image' || type == 'audio' || type == 'video') {
				args['library'] = {
					type: type
				};
			}
			LINGVICO_STORAGE['media_frame'][LINGVICO_STORAGE['media_id']] = wp.media( args );

			// When an image is selected, run a callback.
			LINGVICO_STORAGE['media_frame'][LINGVICO_STORAGE['media_id']].on(
				'insert select', function(selection) {
					// Grab the selected attachment.
					var field      = jQuery( "#" + LINGVICO_STORAGE['media_link'][LINGVICO_STORAGE['media_id']].data( 'linked-field' ) ).eq( 0 );
					var attachment = null, attachment_url = '';
					if (LINGVICO_STORAGE['media_link'][LINGVICO_STORAGE['media_id']].data( 'multiple' ) === 1) {
						LINGVICO_STORAGE['media_frame'][LINGVICO_STORAGE['media_id']].state().get( 'selection' ).map(
							function( att ) {
								attachment_url += (attachment_url ? "|" : "") + att.toJSON().url;
							}
						);
						var val        = field.val();
						attachment_url = val + (val ? "|" : '') + attachment_url;
					} else {
						attachment         = LINGVICO_STORAGE['media_frame'][LINGVICO_STORAGE['media_id']].state().get( 'selection' ).first().toJSON();
						attachment_url     = attachment.url;
						var sizes_selector = jQuery( '.media-modal-content .attachment-display-settings select.size' );
						if (sizes_selector.length > 0) {
							var size = lingvico_get_listbox_selected_value( sizes_selector.get( 0 ) );
							if (size !== '') {
								attachment_url = attachment.sizes[size].url;
							}
						}
					}
					// Display images in the preview area
					var preview = field.siblings( '.lingvico_options_field_preview' );
					if (preview.length == 0) {
						jQuery( '<span class="lingvico_options_field_preview"></span>' ).insertAfter( field );
						preview = field.siblings( '.lingvico_options_field_preview' );
					}
					if (preview.length != 0) {
						preview.empty();
					}
					var images = attachment_url.split( "|" );
					for (var i = 0; i < images.length; i++) {
						if (preview.length != 0) {
							var ext = lingvico_get_file_ext( images[i] );
							preview.append(
								'<span>'
									+ (ext == 'gif' || ext == 'jpg' || ext == 'jpeg' || ext == 'png'
											? '<img src="' + images[i] + '">'
											: '<a href="' + images[i] + '">' + lingvico_get_file_name( images[i] ) + '</a>'
										)
								+ '</span>'
							);
						}
					}
					// Update field
					field.val( attachment_url ).trigger( 'change' );
				}
			);

			// Finally, open the modal.
			LINGVICO_STORAGE['media_frame'][LINGVICO_STORAGE['media_id']].open();
			return false;
		}

		// Get PRO Version
		//--------------------------------------------
		jQuery( '.lingvico_pro_link' ).on(
			'click', function(e) {
				jQuery( '.lingvico_pro_form_wrap' )
				.fadeIn()
				.delay( 200 )
				.find( '.lingvico_pro_form' )
				.animate(
					{
						'opacity': 1,
						'marginTop': 0
					}
				);
				e.preventDefault();
				return false;
			}
		);
		jQuery( '.lingvico_pro_close' ).on(
			'click', function(e) {
				jQuery( '.lingvico_pro_form' )
				.animate(
					{
						'opacity': 0,
						'marginTop': '50px'
					}
				)
				.delay( 200 )
				.parent()
				.fadeOut();
				e.preventDefault();
				return false;
			}
		);
		jQuery( '.lingvico_pro_key,.lingvico_pro_token' ).on(
			'keyup', function(e) {
				var key = jQuery( '.lingvico_pro_key' ).val(),
					token = jQuery( '.lingvico_pro_token' ).val();
				if (key !== '' && key.length > 10 && token !== '' && token.length > 20 ) {
					jQuery( '.lingvico_pro_upgrade' ).removeAttr( 'disabled' );
				} else {
					jQuery( '.lingvico_pro_upgrade' ).attr( 'disabled', 'disabled' );
				}
			}
		);
		jQuery( '.lingvico_pro_upgrade' ).on(
			'click', function(e) {
				var key = jQuery( '.lingvico_pro_key' ).val(),
					token = jQuery( '.lingvico_pro_token' ).val();
				if (key !== '' && token !== '') {
					lingvico_theme_get_pro_version( key, token );
				}
				e.preventDefault();
				return false;
			}
		);

		// Main upgrade procedure
		window.lingvico_theme_get_pro_version = function(key, token) {
			// Add progress spin and disable 'Upgrade' button
			jQuery( '.lingvico_pro_upgrade' )
			.attr( 'disabled', 'disabled' )
			.append( '<span class="lingvico_pro_upgrade_process trx_addons_icon-spin3 animate-spin"></span>' );
			// Post license key to the server
			jQuery.post(
				LINGVICO_STORAGE['ajax_url'], {
					action: 'lingvico_get_pro_version',
					nonce: LINGVICO_STORAGE['ajax_nonce'],
					license_key: key,
					access_token: token
				}
			).done(
				function(response) {
					var rez = {};
					if (response == '' || response == 0) {
						rez = { error: LINGVICO_STORAGE['msg_ajax_error'] };
					} else {
						try {
							var pos = response.indexOf( '{"error":' );
							if (pos > 0) {
								console.log( LINGVICO_STORAGE['msg_get_pro_upgrader'] );
								var log = response.substr( 0, pos ),
								msg     = '';
								jQuery( log ).find( 'p' ).each(
									function() {
										msg += (msg !== '' ? "\n" : '') + jQuery( this ).text();
									}
								);
								console.log( msg );
								response = response.substr( pos );
							}
							rez = JSON.parse( response );
						} catch (e) {
							rez = { error: LINGVICO_STORAGE['msg_get_pro_error'] };
							console.log( response );
						}
					}
					// Remove progress spin
					jQuery( '.lingvico_pro_upgrade' )
					.find( 'span.lingvico_pro_upgrade_process' ).remove();
					// Show result
					alert( rez.error ? rez.error : LINGVICO_STORAGE['msg_get_pro_success'] );
					// Reload current page after update (if success)
					if (rez.error == '') {
						location.reload( true );
					}
				}
			);
		};
	}
);
