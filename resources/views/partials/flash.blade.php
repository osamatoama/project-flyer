@if(session()->has('flash_message'))
	<script>
		swal({
			title: "{{ session('flash_message.title') }}",
			text: "{{ session('flash_message.message') }}",
			icon: "{{ session('flash_message.type') }}",
			timer: 2000,
			button: false
		});
	</script>
@endif

