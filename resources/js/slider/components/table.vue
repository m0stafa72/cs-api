<template>
	<table id="example1" class="table table-bordered table-hover" style="text-align: center;">
        <thead>
            <tr>
              <th>{{ table.index }}</th>
              <th>{{ table.image }}</th>
              <th>{{ table.title }}</th>
              <th>{{ table.status }}</th>
              <th>{{ table.active }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(slider,index) in sliders" :key="index">
                <td>{{ index+1 }}</td>
                <td>
              		<img width="150" height="60" :src="slider.image" />
                </td>
                <td>{{ slider.title }}</td>
                <td>            	   
              		<label :class="['badge', (slider.status === 1 ) ? ' badge-success' : 'badge-danger' ]"> {{ (slider.status === 1 ) ? 'فعال  است  ' : 'غیر فعال است' }} </label>	
                </td>
                <td style="position: relative;">
              		
                    <EnableAndDisable 
                        :type="slider.status" 
                        :id="slider.id"
                        :key="slider.key" 
                        model="slider" 
                        v-on:EnableAndDisable="EnableAndDisable"
                        >
                    </EnableAndDisable>
                    <a href="" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i> ویرایش</a>    
                    <button data-toggle="modal" :data-target="'#deleteModal'+slider.id" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</button>	

                </td>

                
                <Delete 
                    :id="slider.id" 
                    :row_index="index" 
                    :row_key="slider.key" 
                    :title="slider.title" 
                    model="slider"
                    v-on:removeIndex="removeIndex"
                    ></Delete>
                

            </tr>
            
        </tbody>
        <tfoot>
            <tr>
              <th>{{ table.index }}</th>
              <th>{{ table.image }}</th>
              <th>{{ table.title }}</th>
              <th>{{ table.status }}</th>
              <th>{{ table.active }}</th>
            </tr>
        </tfoot>
    </table>
</template>

<script >
	export default {
		props : ['slider'],
		data () {
			return {
                sliders : this.slider,
				table: {
                    index : 'ردیف',
					image : 'عکس اسلایدر' ,
					title : 'عنوان' ,
					status : 'وضعیت' ,
					active : 'عملیات' ,
                },
                
			}
        },
        methods : {
            EnableAndDisable (data) {
                // console.log(data);
                this.sliders.forEach((slider,index) => {
                    if (slider.id == data.id ) {
                        slider.status = data.status
                    }
                }); 

                
            },
            removeIndex(event) {
                this.sliders.splice(this.sliders.indexOf(event), 1);
            }
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>