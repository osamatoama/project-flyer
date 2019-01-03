<template>
  <div class="row mt-4">
    <div
      class="col-lg-3 col-md-6 position-relative"
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
  /**
   * proprieties that's need to assign to this component
   * @type array
   */
  props: ["id", "canDelete"],
  data() {
    return {
      photos: []
    };
  },
  computed: {
    /**
     * private channel name
     * @return object
     */
    privateChannel() {
      return window.Echo.private(`flyers.${this.id}`);
    },
    /**
     * retrieve the get photos Url
     * @return string
     */
    photosUrl() {
      return  Helpers.proccesRoute('flyers.get_photos', {'flyer': this.id});
    }
  },
  methods: {
    /**
     * retrieve the delete photo url
     * @param  int id
     * @return string
     */
    deleteUrl(id) {

      return Helpers.proccesRoute('flyers.delete_photo',{'photo': id});
    },
    /**
     * get all photos associated with the given flyer
     * @return void
     */
    getPhotos() {
      window.axios
        .get(this.photosUrl)
        .then(response => (this.photos = response.data));
    },
    /**
     * listen when add new photo and update photos collection
     * @return void
     */
    listenForAddingNewPhoto() {
      this.privateChannel.listen(".add.flyer.photo", ({ photo }) =>
        this.photos.push(photo)
      );
    },
    /**
     * post request to delete photo
     * @param  int id
     * @return void
     */
    deleteFlyerPhoto(id) {
      let el = this.$refs[`photo-${id}`][0];
      $(el).fadeOut(800);

      window.axios.delete(this.deleteUrl(id));
    }
  },
  /**
   * created event hook
   * @return void
   */
  created() {

    this.getPhotos();
    this.listenForAddingNewPhoto();
  }
};
</script>
