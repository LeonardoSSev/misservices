<script>
    export default{
        props: ['users'],

        computed: {
            
        },

        data () {
            return {
                list: [],
            }
        },

        mounted (){
            console.log(JSON.parse(this.users))
            this.list = JSON.parse(this.users)
        },

        methods: {
            searchData(event){

            }
        }
    }
</script>

<template>
    <div>
        <!-- <a href="{{ route('admin.user.create') }}">Adicionar</a> -->
        <div class="col-lg-3">
            <input type="text" v-on:keyup="filterTerm()" class="form-control" placeholder="Pesquise um usuário..." name="pesquisar">
        </div>
        <div class="col-lg-12">
        <table class="table ">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th width="150px">Ações</th>
            </thead>
            <tbody>
                    <tr v-for="u in list">
                        <div class="loading"></div>
                        <td>{{ u.id }}</td>
                        <td>{{ u.name }}</td>
                        <td>{{ u.email }}</td>
                        <td>
                        <a href="/admin/user/roles/"><i class="fa fa-lg fa-lock" title="Papéis de "></i></a>
                            <a href="/admin/user/edit/"><i class="fa fa-lg fa-pencil" title="Editar "></i></a>
                            <a href="/admin/user/delete/"><i class="fa fa-lg fa-times" title="Excluir "></i></a>
                            <a href="/admin/user/view/"><i class="fa fa-lg fa-eye" title="Visualizar "></i></a>
                            <!-- <a href="{{route('admin.user.roles', $user->id)}}"><i class="fa fa-lg fa-lock" title="Papéis de {{ $user->name }}"></i></a>
                            <a href="{{route('admin.user.edit', $user->id)}}"><i class="fa fa-lg fa-pencil" title="Editar {{ $user->name }}"></i></a>
                            <a href="{{route('admin.user.delete', $user->id)}}"><i class="fa fa-lg fa-times" title="Excluir {{ $user->name }}"></i></a>
                            <a href="{{route('admin.user.view', $user->id)}}"><i class="fa fa-lg fa-eye" title="Visualizar {{ $user->name }}"></i></a> -->
                        </td>
                    </tr>
            </tbody>
        </table>
        </div>
    </div>
</template>