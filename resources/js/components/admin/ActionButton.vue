<template>
    <button class="btn btn-primary" @click="openForm" v-show="show">{{label}}</button>
</template>

<script>
  export default {
    props: {
      'type': String
    },

    data(){
      return {
        show: false,
        label: 'Add',
        button_type: 'add'
      }
    },

    created(){
      events.$on('show_button', () => {
        this.showForm();
      });
      events.$on('hide_button', () => {
        this.hideForm();
      });
    },

    methods:{
      openForm(){
        if(this.button_type === 'add'){
          events.$emit('open_' + this.type);
          this.label = 'Close';
          this.button_type = 'close';
        }else{
          events.$emit('close_' + this.type);
          this.resetLabel();
        }
      },

      showForm(){
        this.show = true;
        this.resetLabel();
      },

      hideForm(){
        this.show = false;
        this.resetLabel();
      },

      resetLabel(){
        this.label = 'Add';
        this.button_type = 'add';
      }
    }
  }
</script>