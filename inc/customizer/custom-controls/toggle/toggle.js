/**
 * File toggle.js
 *
 * Handles toggle button Enable/Disable
 *
 * @package Astra
 */

	wp.customize.controlConstructor['ast-toggle'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this,
		    checkboxValue = control.setting._value;

			// Save the value.
			this.container.on( 'click', '.switch', function() {
				var checkbox = jQuery( this ).prev( 'input' );
				if ( checkbox.is( ':checked' ) ) {
					jQuery( this ).prev( 'input' ).prop( 'checked', false );
				} else {
					jQuery( this ).prev( 'input' ).prop( 'checked', true );
				}
				checkbox.trigger( 'change' );
			});

			this.container.on( 'change', 'input', function() {
				checkboxValue = ( jQuery( this ).is( ':checked' ) ) ? true : false;
				control.setting.set( checkboxValue );
			});

		}

	});
