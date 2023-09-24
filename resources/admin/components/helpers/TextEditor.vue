<template>
  <div class="ckeditor">
    <textarea v-bind:id="id" v-bind:value="value"></textarea>
  </div>
</template>

<script>
  const CKEDITOR = window.CKEDITOR;
  let index = 0;
  if (!CKEDITOR) {
    throw new Error('[VueCkeditor] cannot locate CKEDITOR.');
  }
  export default {
    name: 'vue-ckeditor',
    props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: () => `editor-${index+=1}`
      },
      height: {
        type: String,
        default: '250px',
      },
      toolbar: {
        type: Array,
        default: () => [
          'Format',
          ['Bold', 'Italic', 'Strike', 'Underline'],
          ['BulletedList', 'NumberedList', 'Blockquote'],
          ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
          ['Link', 'Unlink'],
          ['FontSize', 'TextColor'],
          ['Image', 'Table'],
          ['Undo', 'Redo'],
          ['Source', 'Maximize']
        ]
      },
      extraplugins: {
        type: String,
        default: ''
      }
    },
    data() {
      return {
        count: 0
      }
    },
    beforeUpdate() {
      const { id } = this;

      console.log(this.value);

      if (this.value !== CKEDITOR.instances[id].getData()) {
        CKEDITOR.instances[id].setData(this.value);
      }
    },
    mounted() {
      const { id } = this;
      const config = {
        toolbar: this.toolbar,
        height: this.height,
        extraPlugins: this.extraplugins
      };
      CKEDITOR.replace(id, config);
      CKEDITOR.instances[id].setData(this.value);
      CKEDITOR.instances[id].on('change', () => {
        const value = CKEDITOR.instances[id].getData();
        if (value !== this.value) {
          this.$emit('input', value);
        }

        $('.modal').on('hidden.bs.modal', function () {
            CKEDITOR.instances[id].setData("")
        })
      });
    },
    destroyed() {
      const { id } = this;
      if (CKEDITOR.instances[id]) {
        console.log("destroyed");
        CKEDITOR.instances[id].destroy();
      }
    },
  }
</script>