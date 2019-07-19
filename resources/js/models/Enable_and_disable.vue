<template>
	
	<button @click="handelClick" type="button" :class="['btn btn-xs ', (status === 1 ) ? 'btn-warning' : 'btn-primary' ]">
        
        <div v-if="spinner" class="spinner-border spinner-border-sm text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        
        <i v-if="!spinner" :class="['fa ', (status === 1 ) ? 'fa-close' : 'fa-check' ]"></i>  
        {{ (status === 1 ) ? 'غیر فعال کردن  '  : 'فعال کردن ' }} 
    </button>

</template>
<script>
	export default {
		props : ['type','id','model'],

		data () {
			return {
				status : this.type,
				spinner : false,
			}
		},
		methods : {

			handelClick() {
				const BaseUrl = document.head.querySelector('meta[name="base-url"]');
				// console.log(BaseUrl.content);
				
				const state = this.status;
				const id = this.id;
				const model = this.model;
				const url = BaseUrl.content+"/admin/EnableAndDisable";
				
				this.spinner = true;
				let data = new FormData();
					data.append('status' , state);
					data.append('id' , id);
					data.append('model' , model);
				axios.post(url,data).then(response => {
					// console.log(response);
					if (response.data.type === 'ok') {
						const EnableAndDisable = {'id' : id , 'status' : response.data.status };
						this.$emit('EnableAndDisable',EnableAndDisable);
						this.status = response.data.status;
						this.spinner = false;

					}
				}).catch(error => {
					this.spinner = false;
					console.log(error);
				});
				

			}
		}
	}
</script>