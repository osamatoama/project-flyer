<template>
	<div class="row mt-4">
		<div class="col-md-3 position-relative" v-for="photo in photos">
			<span class="delete-flyer-photo" @click="deleteFlyerPhoto(photo.id)">X</span>
			<img class="img-fluid flyer-photo" :src="photo.path">
		</div>
	</div>
</template>


<script>
export default {
	props:['id'],
	data() {
		return {
			photos: []
		}
	},
	methods: {
		getPhotos() {
			let url = `${window.Laravel.baseBath}api/flyer/photos/${this.id}`;
			window.axios.get(url).then(response => {
      			this.photos = response.data;
    		});
		},
		getNewPhotosWhenAddOne() {
			window.Echo.channel('flyers').listen('.add.flyer.photo', event => {
				this.photos.push(event.photo);
			});
		},
		deleteFlyerPhoto(id) {
			let url = `${window.Laravel.baseBath}api/flyer/photos/${id}/delete`;
			window.axios.get(url).then(response => {
				console.log(response);
    		});
		}
	},
  	created() {
    	this.getPhotos();
		this.getNewPhotosWhenAddOne();
  }
};
</script>