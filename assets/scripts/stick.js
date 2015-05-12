// Stick the sidebar to the top after scroll
//
// Avoids unnecessary dependency on jQuery
(function () {
	var hasClass = false;
	var headerSize = 0;
	var sidebar = document.getElementById('sidebar');

	var sticker = function () {
		var shouldStick = (window.scrollY > headerSize);

		// Check that it doesn't match to avoid thrashing the DOM
		if ( shouldStick !== hasClass ) {
			sidebar.className = shouldStick ? 'sticky' : '';
			hasClass = shouldStick
		}
	};

	window.addEventListener( 'scroll', sticker );
	document.addEventListener( 'DOMContentLoaded', function () {
		headerSize = document.getElementById('nav-bar').clientHeight;
		sticker();
	} );
})();
