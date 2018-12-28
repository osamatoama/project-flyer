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
  computed: {
    privateChannel() {
      return window.Echo.private(`flyers.${this.id}`);
    },
    photosUrl() {
      return `${window.Laravel.baseBath}/api/flyer/photos/${this.id}`;
    }
  },
  methods: {
    deleteUrl(id) {
      return `${window.Laravel.baseBath}/api/flyer/photos/${id}/delete`;
    },
    getPhotos() {
      window.axios
        .get(this.photosUrl)
        .then(response => (this.photos = response.data));
    },
    listenForAddingNewPhoto() {
      this.privateChannel.listen(".add.flyer.photo", ({ photo }) =>
        this.photos.push(photo)
      );
    },
    deleteFlyerPhoto(id) {
      let el = this.$refs[`photo-${id}`][0];
      $(el).fadeOut(800);

      window.axios.delete(this.deleteUrl(id));
    }
  },
  created() {
    this.getPhotos();
    this.listenForAddingNewPhoto();
  }
};
</script>
