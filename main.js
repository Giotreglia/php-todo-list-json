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
        },
        addTask() {
            const data = {
                task: this.taskItem
            };

            axios.post('server.php', data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }
            ).then(response => {
                this.taskList = response.data;
                this.taskItem = '';
            })
        }
    },
    mounted() {
        this.getList();
    },
}).mount('#app')