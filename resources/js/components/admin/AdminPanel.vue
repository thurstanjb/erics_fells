<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2 pr-1">
            <menu-list :edit-users="accessUser"></menu-list>
            </div>
            <div class="col-md-8 pl-0">
                <div class="card">
                    <div class="card-header text-capitalize">{{title}}
                        <action-button :type="section" class="float-right"></action-button></div>

                    <div class="card-body" v-show="loaded">
                        <component :is="section"></component>
                    </div>
                    <div class="col-12" v-show="!loaded">
                        <div class="col-2 offset-5 loading-box">
                            <div class="loading"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Menu from './Menu';
    import ActionButton from './ActionButton';

    import Overview from './sections/Overview';
    import Users from './sections/Users';

    export default {
        props:{
          'access-user': Boolean
        },

      data(){
          return {
            section: 'overview',
            title: 'Overview',
            loaded: false
        }
      },

      mounted(){
          this.changeSection({section:'overview'});
      },

      created(){
        events.$on('show_button', (data) => {
          console.log(data);
        });
        events.$on('hide_button', (data) => {
          console.log(data)
        });
        events.$on('changeSection', (section) => {
          this.changeSection(section);
        });
        events.$on('loaded', () => {
          this.loaded = true
        });
      },

      methods:{
          changeSection(section){
            this.section = section.section;
            this.loaded = false;
            this.title = section.section.toString().replace('-', ' ');

            events.$emit('setSection', {section: section});
          }
      },

      components:{
        'menu-list': Menu,
        'action-button': ActionButton,
        'overview': Overview,
        'users': Users
      }
    }
</script>