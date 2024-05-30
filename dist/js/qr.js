// script.js file

function domReady(fn) {
	if (
		document.readyState === "complete" ||
		document.readyState === "interactive"
	) {
		setTimeout(fn, 1000);
	} else {
		document.addEventListener("DOMContentLoaded", fn);
	}
}


domReady(function () {

	// If found you qr code
	function onScanSuccess(decodeText, decodeResult) {
		
		window.location.href="add_to_cart.php?id="+decodeText, decodeResult;
	
		document.getElementById('demo').innerText =decodeText, decodeResult;
		document.getElementById('qr_info').value =decodeText, decodeResult;
	}
	


	let htmlscanner = new Html5QrcodeScanner(
		"my-qr-reader",
		{ fps: 10, qrbos: 250 }
	);
	htmlscanner.render(onScanSuccess);
});
