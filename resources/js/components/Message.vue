<template>
    <div v-if="user_id != this.$userId" class="container card bg-info mb-4 float-start" style="width: 58%;">
        <p>{{message}}</p>
        <p> <span class="text-danger">{{username}}</span> <small>{{formatDate}}</small></p>
    </div>

    <div v-else class="container card bg-default mb-4 float-end" style="width: 58%;">
        <p>{{message}}</p>
        <p> <span class="text-danger">You</span> <small>{{formatDate}}</small></p>
    </div>
</template>

<script>
    export default {
        props: ['user_id', 'userLoggedIn', 'username', 'message', 'created_at'],
        mounted() {
            //
        },
        computed: {
            formatDate(){
                //we convert the text into a date

                let dateAndTime = new Date(this.created_at);

                let year = dateAndTime.getFullYear();

                let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

                let month = months[dateAndTime.getMonth()];

                let day = dateAndTime.getDate();

                let time = dateAndTime.getHours() + ':' + dateAndTime.getMinutes();

                return `${day}  ${month}  ${year}  ${time}`
                
            }
        }
    }
</script>
