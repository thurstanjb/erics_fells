<template>
    <div class="card">
        <div class="card-header">
            Menu
        </div>
        <div class="card-body">
            <menu-button name-data="overview"></menu-button>

            <menu-button name-data="users" show-button="true" v-if="editUsers"></menu-button>
            <menu-button name-data="roles" v-if="editUsers"></menu-button>
            <menu-button name-data="permissions" v-if="editUsers"></menu-button>
        </div>
    </div>
</template>

<script>
    import MenuButton from './MenuButton';
    export default {

      props:{
        'edit-users': Boolean
      },

      components:{
        'menu-button': MenuButton
      }
    }
</script>