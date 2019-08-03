<template>
    <table id="example1" class="table table-bordered table-hover" style="text-align: center;">
        <thead>
            <th>{{ thead.id }}</th>
            <th>{{ thead.name + ' '+ thead.lname }} </th>
            <th>{{ thead.email }}</th>
            <th>{{ thead.status }}</th>
            <th>{{ thead.type }}</th>
            <th>{{ thead.action }}</th>
        </thead>
        <tbody>
            
            <tr v-for="(user,index) in Users" :key="index">
                <td>{{index + 1}}</td>                
                <td>{{user.name +' '+user.lastname }}</td>
                <th>{{ user.email }}</th>
                <td>
                    <label :class="['badge', (user.status === 1 ) ? ' badge-success' : 'badge-danger' ]"> {{ (user.status === 1 ) ? 'فعال  است  ' : 'غیر فعال است' }} </label>	
                </td>
                <td>
                    <label :class="['badge' , (user.type === 0) ? 'badge-danger' : 'badge-success'] ">{{ (user.type === 0) ? 'ادمین سایت' : 'کاربر عادی' }}</label>
                </td>
                <td>
                    <a href="" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> ویرایش</a>    
                </td>
            </tr>
                
            
        </tbody>
        <tfoot>
            <th>{{ thead.id }}</th>
            <th>{{ thead.name + ' '+ thead.lname }} </th>
            <th>{{ thead.email }}</th>
            <th>{{ thead.status }}</th>
            <th>{{ thead.type }}</th>
            <th>{{ thead.action }}</th>
        </tfoot>
    </table>
</template>
<script>
export default {
    props : ['users'],

    data () {
        return {
            thead : {
                id : 'ردیف',
                name : 'نام',
                lname : 'نام خانوادگی',
                email : 'ایمیل ',
                status : 'نوع کاربر',
                type : 'وضعیت',
                action : 'عملیات'
            },
            Users : this.users,
        }
    }
}
</script>

