<template>
  <div
    class="modal fade"
    :id="'deleteModal'+id"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- general form elements -->
        <div class="mb-0 card card-primary">
          <div class="card-header">
            <h3 class="card-title">آیا از حذف این فیلد مطمئن هستید ؟</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <p>
              <strong>عنوان :</strong>
              <small>{{ title }}</small>
            </p>
          </div>
          <div class="card-footer">
            <button @click="Delete" :class="['btn btn-danger' , wating ? 'disabled' : '']">
                <span v-if="!wating">بله ، حذف شود</span>
                <span v-else>
                    <div  class="spinner-border text-success" role="status">
                    </div>
                    لطفا کمی صبر کنید ...
                </span>
            </button>
            <button type="button" class="btn btn-secondary" :id="'dismiss'+id" data-dismiss="modal">انصراف</button>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</template>
<script>
import Send from "./../send";

export default {
  props: ["id","model","title","row_key","row_index"],
  data() {
    return {
      wating: false
    };
  },
  methods: {
    Delete() {
      this.wating = true;

      let data = new FormData();
          data.append('id' , this.id);
          data.append('key' , this.row_key);
          data.append('model' , this.model);

      Send.post('/admin/delete',data).then(response => {
        //   console.log(response);
        if (response.data.type === 'ok') {
            this.wating = false;
            document.getElementById('dismiss'+this.id).click();

            const remove_row_index = {'row_index' : this.row_index };
			this.$emit('removeIndex',remove_row_index);
        }
      }).catch (error => {
          console.log(error);
          this.wating = false;
      })
    }
  }
};
</script>

