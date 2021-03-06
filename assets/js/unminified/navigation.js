/**
 * File navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 *
 * @package Astra
 */

/**
 * Get all of an element's parent elements up the DOM tree
 *
 * @param  {Node}   elem     The element.
 * @param  {String} selector Selector to match against [optional].
 * @return {Array}           The parent elements.
 */
var getParents = function ( elem, selector ) {

	// Element.matches() polyfill.
	if ( ! Element.prototype.matches) {
		Element.prototype.matches =
			Element.prototype.matchesSelector ||
			Element.prototype.mozMatchesSelector ||
			Element.prototype.msMatchesSelector ||
			Element.prototype.oMatchesSelector ||
			Element.prototype.webkitMatchesSelector ||
			function(s) {
				var matches = (this.document || this.ownerDocument).querySelectorAll( s ),
					i = matches.length;
				while (--i >= 0 && matches.item( i ) !== this) {}
				return i > -1;
			};
	}

	// Setup parents array.
	var parents = [];

	// Get matching parent elements.
	for ( ; elem && elem !== document; elem = elem.parentNode ) {

		// Add matching parents to array.
		if ( selector ) {
			if ( elem.matches( selector ) ) {
				parents.push( elem );
			}
		} else {
			parents.push( elem );
		}
	}
	return parents;
};

/* . */
/**
 * Toggle Class funtion
 *
 * @param  {Node}   elem     The element.
 * @param  {String} selector Selector to match against [optional].
 * @return {Array}           The parent elements.
 */
var toggleClass = function ( el, className ) {
	if ( el.classList.contains( className ) ) {
		el.classList.remove( className );
	} else {
		el.classList.add( className );
	}
};

( function() {

	var __main_header = document.querySelector( '.main-header-bar-navigation' );

	var menu_toggle = document.querySelector( '.main-header-menu-toggle' );


	/* Main Menu toggle click */
	if ( null != menu_toggle ) {

		menu_toggle.addEventListener( 'click', function( event ) {
	    	event.preventDefault();

	    	var menuHasChildren = document.getElementsByClassName( 'menu-item-has-children' );
			for ( var i = 0; i < menuHasChildren.length; i++ ) {
				menuHasChildren[i].classList.remove( 'ast-submenu-expanded' );

				var menuHasChildrenSubMenu = menuHasChildren[i].querySelectorAll( '.sub-menu' );
				for (var j = 0; j < menuHasChildrenSubMenu.length; j++) {
					menuHasChildrenSubMenu[j].style.display = 'none';
				};
			}

			var rel = this.getAttribute( 'rel' ) || '';

			switch ( rel ) {
				case 'main-menu':
						toggleClass( __main_header, 'toggle-on' );
						toggleClass( menu_toggle, 'toggled' );
					if ( __main_header.classList.contains( 'toggle-on' ) ) {
						__main_header.style.display = 'block';
					} else {
						__main_header.style.display = '';
					}
					break;
			}
	    }, false);
	}

	/* Submenu button click */
	var ast_menu_toggle = document.getElementsByClassName( 'ast-menu-toggle' );
	for (var i = 0; i < ast_menu_toggle.length; i++) {

		ast_menu_toggle[i].addEventListener( 'click', function ( event ) {
			event.preventDefault();

			var parent_li = this.parentNode;

			var parent_li_child = parent_li.querySelectorAll( '.menu-item-has-children' );
			for (var j = 0; j < parent_li_child.length; j++) {

				parent_li_child[j].classList.remove( 'ast-submenu-expanded' );

				var parent_li_child_sub_menu = parent_li_child[j].querySelector( '.sub-menu' );
				parent_li_child_sub_menu.style.display = 'none';
			};

			var parent_li_sibling = parent_li.parentNode.querySelectorAll( '.menu-item-has-children' );
			for (var j = 0; j < parent_li_sibling.length; j++) {

				if ( parent_li_sibling[j] != parent_li ) {

					parent_li_sibling[j].classList.remove( 'ast-submenu-expanded' );

					var all_sub_menu = parent_li_sibling[j].querySelectorAll( '.sub-menu' );
					for (var k = 0; k < all_sub_menu.length; k++) {
						all_sub_menu[k].style.display = 'none';
					};
				}
			};

			if ( parent_li.classList.contains( 'menu-item-has-children' ) ) {
				toggleClass( parent_li, 'ast-submenu-expanded' );

				if ( parent_li.classList.contains( 'ast-submenu-expanded' ) ) {
					parent_li.querySelector( '.sub-menu' ).style.display = 'block';
				} else {
					parent_li.querySelector( '.sub-menu' ).style.display = 'none';
				}
			}
		}, false);
	};

	document.body.addEventListener("astra-header-responsive-enabled", function() {

		if( null != __main_header ) {
			__main_header.classList.remove( 'toggle-on' );
			__main_header.style.display = '';
		}

		var sub_menu = document.getElementsByClassName( 'sub-menu' );
		for ( var i = 0; i < sub_menu.length; i++ ) {
			sub_menu[i].style.display = '';
		}

		var searchIcons = document.getElementsByClassName( 'ast-search-menu-icon' );
		for ( var i = 0; i < searchIcons.length; i++ ) {
			searchIcons[i].classList.remove( 'ast-dropdown-active' );
			searchIcons[i].style.display = '';
		}
	}, false);

	/* Add break point Class and related trigger */
	var updateHeaderBreakPoint = function () {

		if( null != document.getElementById( 'masthead' ) ) {

			var break_point = ast.break_point,
				headerWrap = document.getElementById( 'masthead' ).childNodes;

			for ( var i = 0; i < headerWrap.length; i++ ) {

				if ( headerWrap[i].tagName == 'DIV' && headerWrap[i].classList.contains( 'main-header-bar-wrap' ) ) {

					var header_content_bp = window.getComputedStyle( headerWrap[i] ).content;

					header_content_bp = header_content_bp.replace( /[^0-9]/g, '' );
					header_content_bp = parseInt( header_content_bp );

					// `ast-header-break-point` class will use for Responsive Style of Header.
					if ( header_content_bp != break_point ) {
						//remove menu toggled class.
						if ( null != menu_toggle ) {
							menu_toggle.classList.remove( 'toggled' );
						}
						document.body.classList.remove( "ast-header-break-point" );
						var responsive_enabled = new CustomEvent( "astra-header-responsive-enabled" );
						document.body.dispatchEvent( responsive_enabled );

					} else {

						document.body.classList.add( "ast-header-break-point" );
						var responsive_disabled = new CustomEvent( "astra-header-responsive-disabled" );
						document.body.dispatchEvent( responsive_disabled );
					}
				}
			}
		}
	}

	window.addEventListener("resize", function() {
		updateHeaderBreakPoint();
	});

	updateHeaderBreakPoint();

	/* Search Script */
	var SearchIcons = document.getElementsByClassName( 'astra-search-icon' );
	for (var i = 0; i < SearchIcons.length; i++) {

		SearchIcons[i].onclick = function() {
			if ( this.classList.contains( 'slide-search' ) ) {
				var sibling = this.parentNode.parentNode.querySelector( '.ast-search-menu-icon' );
				if ( ! sibling.classList.contains( 'ast-dropdown-active' ) ) {
					sibling.classList.add( 'ast-dropdown-active' );
					sibling.querySelector( '.search-field' ).setAttribute('autocomplete','off');
					setTimeout(function() {
						sibling.querySelector( '.search-field' ).focus();
					},200);
				} else {
					sibling.classList.remove( 'ast-dropdown-active' );
				}
			}
		}
	};

	/* Hide Dropdown on body click*/
	document.body.onclick = function( event ) {
		if ( ! this.classList.contains( 'ast-header-break-point' ) ) {
			if ( ! event.target.classList.contains( 'ast-search-menu-icon' ) && getParents( event.target, '.ast-search-menu-icon' ).length === 0 && getParents( event.target, '.ast-search-icon' ).length === 0  ) {

				var dropdownSearchWrap = document.getElementsByClassName( 'ast-search-menu-icon' );

				for (var i = 0; i < dropdownSearchWrap.length; i++) {
					dropdownSearchWrap[i].classList.remove( 'ast-dropdown-active' );
				};
			}
		}
	}

	AstMenuAlignment = function( selector ) {

		var parentList = document.querySelectorAll( selector );

		for (var i = 0; i < parentList.length; i++) {

			if ( null != parentList[i].querySelector( '.sub-menu' ) ) {

				var menuLeft    	 = parentList[i].getBoundingClientRect().left,
					windowWidth     = window.innerWidth,
					menuFromLeft     = (parseInt( windowWidth ) - parseInt( menuLeft ) ),
					menuGoingOutside = false;

				if( menuFromLeft < 240 || (parseInt( windowWidth ) > parseInt( menuLeft ) ) ) {
					menuGoingOutside = true;
				}

				// Submenu items goes outside?
				if( menuGoingOutside && ! parentList[i].classList.contains( 'ast-left-align-sub-menu' ) ) {
					parentList[i].classList.add( 'ast-left-align-sub-menu' );
				}

				// Submenu Container goes to outside?
				if( menuFromLeft < 240 ) {
					parentList[i].classList.add( 'ast-sub-menu-goes-outside' );
				}

			};
		};
	};

	AstMenuAlignment( 'ul.main-header-menu li' );

	/**
	 * Navigation Keyboard Navigation.
	 */
	var container, button, menu, links, subMenus, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];

	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );


	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );

} )();
