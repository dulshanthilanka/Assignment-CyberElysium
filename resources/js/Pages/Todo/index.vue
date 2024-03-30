<template>
    <Applayout>
        <template #content>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="page-title">Students</h1>
                    </div>
                    <div class="col-lg-12">
                        <form @submit.prevent="submitForm">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="ENTER STUDENT" v-model="newTaskName" aria-label="default input example">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Function</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(task, index) in tasks" :key="index">
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ task['name'] }}</td>
                                        <td>{{ task['status'] }}</td>
                                        <td>
                                            <a :href="'/todos/' + task['id'] + '/delete'" class="btn btn-danger">DELETE</a>
                                            <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">UPDATE</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </Applayout>
</template>

<script>
import Applayout from '@Layouts/App.vue'

export default {
    components: {
        Applayout
    },
    props: {
        tasks: Array
    },
    data() {
        return {
            newTaskName: ''
        }
    },
    methods: {
        submitForm() {
            this.$inertia.post(route('todos.store'), {
                name: this.newTaskName
            });
            this.newTaskName = '';
        }
    }
}
</script>

<style lang="scss" scoped>
  .page-title {
        padding-top: 10vh;
        font-size: 5rem;
        color: black;
    }

    .input-group {
        display: flex;
        align-items: center;
    }

    .input-group input {
        flex: 1;
    }

    .input-group button {
        margin-left: 10px;
    }
</style>
