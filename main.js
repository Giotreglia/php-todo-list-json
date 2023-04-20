const { createApp } = Vue

createApp({
    data() {
        return {
            taskItem: '',
            taskList: []
        }
    },
    methods: {
        getList() {
            axios.get('server.php')
                .then(response => {
                    this.taskList = response.data;
                    console.log(response);
                })
        }
    },
    mounted() {
        this.getList();
    },
}).mount('#app')