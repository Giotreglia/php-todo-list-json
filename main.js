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
                console.log(this.taskList);
            })
        },
        setDone(index) {
            console.log(index);
            const data = {
                setTaskDone: index
            };
            axios.post('server.php', data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }
            ).then(response => {
                this.taskList = response.data;
            })
        },
        removeTask(index) {
            const data = {
                removeTask: index
            };
            axios.post('server.php', data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }
            ).then(response => {
                this.taskList = response.data;
            })
        }
    },
    mounted() {
        this.getList();
    },
}).mount('#app')