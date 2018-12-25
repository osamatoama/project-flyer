<template>
  <div class="row mt-4">
    <div
      class="col-md-3 position-relative"
      v-for="photo in photos"
      :ref="'photo-' + photo.id"
      :key="photo.id"
    >
      <span
        v-if="canDelete == 'can'"
        class="delete-flyer-photo"
        @click="deleteFlyerPhoto(photo.id)"
      >X</span>
      <img class="img-fluid flyer-photo w-100" :src="photo.path">
    </div>
  </div>
</template>


<script>
export default {
  props: ["id", "canDelete"],
  data() {
    return {
      photos: []
    };
  },
  methods: {
    getPhotos() {
      let url = `${window.Laravel.baseBath}api/flyer/photos/${this.id}`;
      window.axios.get(url).then(response => {
        this.photos = response.data;
      });
    },
    getNewPhotosWhenAddOne() {
      window.Echo.channel(`flyers.${this.id}`).listen(
        ".add.flyer.photo",
        event => {
          this.photos.push(event.photo);
        }
      );
    },
    deleteFlyerPhoto(id) {
      let el = this.$refs[`photo-${id}`][0];
      $(el).fadeOut(800);
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