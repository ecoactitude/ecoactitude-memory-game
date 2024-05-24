<script>
	(function(w,d,s,l,i){
		w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
		var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
		j.async=true;
		j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;
		f.parentNode.insertBefore(j,f);

		// window.ONP     = window.ONP || {};
		// window.ONP.gtm = window.ONP.gtm || {loaded: false, error: false};

		// Dispatching custom events
		j.addEventListener('load', function gtmContainerLoaded(e) {
			window.ONP.gtm.loaded = true;
			window.ONP.gtm.error = false;
			j.removeEventListener('load', gtmContainerLoaded);
			window.dispatchEvent(new CustomEvent('gtmContainerLoaded'))
		});

		j.addEventListener('error', function gtmContainerError(e) {
			window.ONP.gtm.loaded = false;
			window.ONP.gtm.error = true;
			j.removeEventListener('error', gtmContainerError);
			window.dispatchEvent(new CustomEvent('gtmContainerError'))
		});
	})(window,document,'script','dataLayer', '{!! $gtm_ui !!}');
</script>
