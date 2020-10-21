/**
 * Install Wpazure kit
 
 */

/* global rynobiz_install_demo */

'use strict';

// Activate plugin.
var rynobizActivatePlugin = function( url, redirect ) {
	if ( 'undefined' === typeof( url ) || ! url ) {
		return;
	}

	var request = new Request(
		url,
		{
			method: 'GET',
			credentials: 'same-origin',
			headers: new Headers({
				'Content-Type': 'text/xml'
			})
		}
	);

	fetch( request )
		.then( function( data ) {
			location.reload();
		} )
		.catch( function( error ) {
			console.log( error );
		} );
}

// Download and Install plugin.
var rynobizinstallPlugin = function() {
	var installBtn = document.querySelector( '.rynobiz-install-demo' );
	if ( ! installBtn ) {
		return;
	}

	installBtn.addEventListener( 'click', function( e ) {
		e.preventDefault();

		var t        = this,
			url      = t.getAttribute( 'href' ),
			slug     = t.getAttribute( 'data-slug' ),
			redirect = t.getAttribute( 'data-redirect' );

		t.innerHTML = wp.updates.l10n.installing;

		t.classList.add( 'updating-message' );
		wp.updates.installPlugin(
			{
				slug: slug,
				success: function () {
					t.innerHTML = rynobiz_install_demo.activating + '...';
					rynobizActivatePlugin( url, redirect );
				}
			}
		);
	} );
}

// Activate plugin manual.
var rynobizHandleActivate = function() {
	var activeButton = document.querySelector( '.rynobiz-active-now' );
	if ( ! activeButton ) {
		return;
	}

	activeButton.addEventListener( 'click', function( e ) {
		e.preventDefault();

		var t        = this,
			url      = t.getAttribute( 'href' ),
			redirect = t.getAttribute( 'data-redirect' );

		t.classList.add( 'updating-message' );
		t.innerHTML = rynobiz_install_demo.activating + '...';

		rynobizActivatePlugin( url, redirect );
	} );
}

document.addEventListener( 'DOMContentLoaded', function() {
	rynobizinstallPlugin();
	rynobizHandleActivate();
} );
