Dropzone.autoDiscover = false;
let token = document.head.querySelector('meta[name="csrf-token"]');
let addPhotoForm = new Dropzone(".dropzone", {
	paramName: 'photo',
	headers: {
        'X-CSRF-TOKEN': token.content,
        'X-Requested-With': 'XMLHttpRequest'
    },
	maxFileSize: 3,
	acceptedFiles: '.jpg,.png,.jpeg,.gif,.JPG',
	error(e) {

		let message = '';
		if(e.xhr && e.accepted == true) {
			// the message is sent to the server and not accepted or there is an error
			message = e.xhr.response
		} else if(e.accepted == false) {
			// the message is not accepted or rejected by client side
			message = ' the file type is not supported';
		}
		swal({
			title: "Error",
			text: message,
			icon: "error",
			timer: 2500,
			button: false
		});

	}
});
