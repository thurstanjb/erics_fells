<template>
    <div>
        <ul>
            <li v-for="user in users">{{user.name}}</li>
        </ul>
    </div>
</template>

<script>
    export default{

      data(){
        return {
          users: {},
        }
      },

      mounted(){
        axios.get('/admin/users')
          .then(response => {
            this.users = response.data;
            events.$emit('loaded');
          })
          .catch(error => {
            console.error(error);
          })
      }
    }
</script>