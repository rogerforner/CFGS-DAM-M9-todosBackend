<template>
    <tr>
        <td>{{index + from }}</td>
        <td>
            <div v-if="!editing" @dblclick="editTodo(page,todo.id)">
                <span>{{todo.name}}</span>
            </div>
            <div v-else @keyup.esc="uneditTodo(page)" @keyup.enter="editTodo(page,todo.id)">
                <input v-model="todo.name" size="60">
                <div  style="float: right;">
                    <button type="button" class="btn btn-success btn-flat btn-xs" @click="editTodo(page,todo.id)">
                        <i class="fa fa-fw fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-flat btn-xs" @click="uneditTodo(page)">
                        <i class="fa fa-fw fa-close"></i>
                    </button>
                </div>
            </div>
        </td>
        <td align="center">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-flat">
                    <span>{{todo.priority}}</span>
                </button>
                <button type="button" class="btn btn-default dropdown-toggle btn-flat" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li v-for="n in 10"><a href="#" @click="editTodoPriority(page,(n-1))">{{(n-1)}}</a></li>
                </ul>
            </div>
        </td>
        <td align="center">
            <div v-if="todo.done">
                <input type="checkbox" class="checkbox icheck" checked @click="editTodoDone(page,todo.done)">
            </div>

            <div v-else>
                <input type="checkbox" class="checkbox icheck" @click="editTodoDone(page,todo.done)">
            </div>
        </td>
        <td align="center">
            <div class="progress progress-sm active" title="65%">
                <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 65%"></div>
            </div>
        </td>
        <td align="center"><span class="label label-warning">65%</span></td>
        <td align="center">
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-flat" title="Edit" @click="editTodo(page,todo.id)">
                    <i class="fa fa-pencil"></i>
                </button>

                <button type="button" class="btn btn-danger btn-flat" title="Delete" @click="deleteTodo(todo.id)">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
</template>
<script>

export default {
    props: ['todo','index','from','fetchPage','page'],

    data() {
        return {
            editing: false,
            editingPriority: false,
        }
    },
    created() {
        console.log('Component todolist created.');
    },
    methods: {
        editTodo: function(pageNum) {
            if (this.editing == true) {
                this.editTodoToApi();
                this.editing = false;
                return this.fetchPage(pageNum);
            }
            this.editing = true;
            return this.fetchPage(pageNum);
        },
        editTodoToApi: function(){
            this.$http.put('/api/v1/task/' + this.todo.id, {
                name: this.todo.name,
            }).then((response) => {
                console.log('Name of task ' + this.todo.id + ' updated succesfully! Now is known as \"' + this.todo.name + '\".');
            }, (response) => {
                sweetAlert("Oops...", "Something went wrong!", "error");
                console.log(response);
            });
        },
        editTodoPriority: function(pageNum,number) {
            this.editTodoPriorityToApi(number);
            return this.fetchPage(pageNum);
        },
        editTodoPriorityToApi: function(number) {
            this.$http.put('/api/v1/task/' + this.todo.id,{
                priority: number,
            }).then((response) => {
                console.log('Priority of task ' + this.todo.id + ' updated succesfully! Now has \"' + number + '\".');
            }, (response) => {
                sweetAlert("Oops...", "Something went wrong!", "error");
                console.log(response);
            });
        },
        editTodoDone: function(pageNum,doneStatus) {
            doneStatus = this.todo.done = !this.todo.done;
            this.editTodoDoneToApi(doneStatus);
            return this.fetchPage(pageNum);
        },
        editTodoDoneToApi: function(doneStatus) {
            this.$http.put('/api/v1/task/' + this.todo.id,{
                done: doneStatus,
            }).then((response) => {
                console.log('Done status of task ' + this.todo.id + ' updated succesfully! Now has \"' + doneStatus + '\".');
            }, (response) => {
                sweetAlert("Oops...", "Something went wrong!", "error");
                console.log(response);
            });
        },
        uneditTodo: function(pageNum) {
            this.editing = false;
            this.editingPriority = false;
            return this.fetchPage(pageNum);
        },
        deleteTodo: function(id) {
            console.log('Deleting todo');
            this.$emit('todo-deleted',id);
        },
    }
}

</script>
