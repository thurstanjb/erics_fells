<template>
    <button :class.sync="buttonClass" @click="changeSection">{{name}}</button>
</template>

<script>
  export default {
    props: {
      'name-data': {
        type:String,
        default: 'overview'
      },
      'show-button': {
        type: String,
        default: 'false'
      }
    },

    data(){
      return {
        name: '',
        active: false,
        buttonClass: 'btn btn-outline-primary btn-block text-capitalize'
      }
    },

    created(){
      events.$on('setSection', (data) => {
        if(data.section.section !== this.nameData){
          this.active = false;
          this.checkClass();
        }else{
          this.active = true;
          this.checkClass();
        }
      })
    },

    mounted(){
      this.name = this.nameData.replace('-', ' ');
    },

    methods:{
      checkClass(){
        let newClass =  'btn btn-outline-primary btn-block text-capitalize';
        if(this.active){
          newClass =  'btn btn-outline-primary btn-block text-capitalize active';
        }
        this.buttonClass = newClass;
      },

      changeSection(){
        this.active = true;
        this.checkClass();
        events.$emit('changeSection', {section: this.nameData});

        if(this.showButton === 'true'){
          events.$emit('show_button')
        }else{
          events.$emit('hide_button')
        }
      }
    }
  }
</script>