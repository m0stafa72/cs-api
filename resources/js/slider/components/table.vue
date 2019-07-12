<template>
	<table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
              <th>{{ table.image }}</th>
              <th>{{ table.title }}</th>
              <th>{{ table.status }}</th>
              <th>{{ table.active }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(slider,index) in sliders" :key="index">
                <td>
              		<img width="100" height="50" :src="slider.image" />
                </td>
                <td>{{ slider.title }}</td>
                <td>            	   
              		<label :class="['badge', (slider.status === 1 ) ? ' badge-success' : 'badge-danger' ]"> {{ (slider.status === 1 ) ? 'فعال  داست  ' : 'غیر فعال است' }} </label>	
                </td>
                <td>
              		<button type="button" :class="['btn btn-sm ', (slider.status === 1 ) ? 'btn-danger' : 'btn-seccess' ]">
                    <!-- <div class="spinner-border text-success" role="status">
                      <span class="sr-only">Loading...</span>
                    </div> -->  
                    {{ (slider.status === 1 ) ? 'غیر فعال کردن'  : ' فعال کردن ' }} 
                  </button>	
                </td>
            </tr>
            
        </tbody>
        <tfoot>
            <tr>
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
		props : ['sliders'],
		data () {
			return {
				table: {
					image : 'عکس اسلایدر' ,
					title : 'عنوان' ,
					status : 'وضعیت' ,
					active : 'عملیات' ,
				}
			}
		},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>