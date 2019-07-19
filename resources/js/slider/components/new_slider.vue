<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">اطلاعات اسلایدر را وارد کنید :  </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div role="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان اسلایدر</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="exampleInputEmail1" 
                        v-model="title"
                        v-on:change="() => { this.error.title = '' } "
                        placeholder="عنوان اسلایدر را وارد کنید" />
                    <span class="text-danger"> {{ error.title }} </span>
                </div>
                <!-- textarea -->
                <div class="form-group">
                    <label>توضیحات</label>
                    <textarea 
                        class="form-control" 
                        rows="3" 
                        v-model="description"
                        v-on:change="() => { this.error.description = '' } "
                        placeholder="وارد کردن توضیحات ..."></textarea>
                    <span class="text-danger"> {{ error.description }} </span>
                </div>
                
                <div class="row">
                    <div class="form-group col-xs-6">
                        <div>
                            <input 
                                type="radio" 
                                id="withBtn"
                                v-on:change="handelRadio" 
                                name="r2" 
                                class="flat-red" />
                            <label style="cursor : pointer" for="withBtn"> با دکمه در زیر توضیحات</label>
                        </div>
                    </div>
                    <div class="form-group col-xs-6">
                        <div class="mr-3">
                            <input 
                                type="radio" 
                                id="noBtn"
                                v-on:change="handelRadio" 
                                :checked="noBtn ? 'checked' : '' "
                                name="r2" 
                                class="minimal-red" />
                            <label style="cursor : pointer" for="noBtn">نیاز به دکمه ندارد </label>
                        </div>
                    </div>
                </div>    
                
                <div v-if="!noBtn">
                    <div class="form-group">
                        <label for="exampleInputPassword1">متن دکمه</label>
                        <input
                            type="password"
                            class="form-control"
                            v-model="button"
                            id="exampleInputPassword1"
                            placeholder=" مثلا : ادامه مطلب"
                            
                        />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">لینک دکمه</label>
                        <input
                            type="password"
                            class="form-control"
                            v-model="link"
                            id="exampleInputPassword2"
                            placeholder="لینک دکمه را وارد کنید"
                            
                        />
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">انتخاب عکس </label>
                    <div class="input-group">
                        <div class="custom-file" >
                            <input 
                                type="file" 
                                v-on:change="handelImage"
                                class="" 
                                id="exampleInputFile" />
                            <label style="cursor : pointer" class="custom-file-label" for="exampleInputFile">انتخاب عکس  ( 1400X600 )  کلیک کنید</label>
                        </div>
                        
                    </div>
                    <span class="text-danger"> {{ error.image }} </span>
                    <span>{{ image.name }}</span>
                </div>
              
                <span class="mt-4">{{ success }}</span>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="progress" v-if="progress">
                    <div :class="['progress-bar progress-bar-striped ' , progressBg]" role="progressbar" :style="{width : uploadPercentage}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ uploadPercentage }}</div>
                </div>
                <div class="mt-4">
                    <button type="button" @click="handelUpload" :class="['btn btn-primary ' , wating ? 'disabled' : '']" >
                        <div v-if="wating">
                            <div  class="spinner-border text-success" role="status">
                            </div>
                        <span> منتظر باشید ...</span>
                        </div>
                        
                        <span v-else>ارسال </span>
                    </button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن </button>
                </div>

            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</template>
<script>

import Send from './../../send';

export default {
    data () {
        return {
            noBtn : true,
            withBtn : false,
            title : null,
            description : null,
            button : null,
            link : null,
            image : '',
            error : {
                title : '',
                description : '',
                image : '',
            },
            uploadPercentage : 0,
            progress : false,
            progressBg : 'bg-success',
            wating : false,
            success : '',
        }
    },

    methods: {
        handelRadio (event) {
            const rol = event.target.id;
            // console.log(rol);
            if (rol == 'noBtn') {
                this.noBtn = true;
                this.withBtn = false;
            } else if (rol == 'withBtn') {
                this.noBtn = false;
                this.withBtn = true;
            }
        },
        handelImage (event) {
            const files = event.target.files;
            this.image = files[0];
            this.error.image = '';
            // console.log(this.image);
        },
        validate () {
            let vilidat = true;

            if (this.title === '' || this.title === null ) {
                this.error.title = 'عنوان نباید خالی باشد ';
                vilidat = false;
                this.wating = false;
            }
            if (this.description === '' || this.description === null) {
                this.error.description = 'توضیحات نباید خالی باشد ';
                vilidat = false;
                this.wating = false;
            }
            if (this.image === '' ) {
                this.error.image = 'تصویر انتخاب نشده است  ';
                vilidat = false;
                this.wating = false;
            }
            return vilidat;
            

        },
        handelUpload() {
            this.progress = true;
            this.wating = true;
            this.uploadPercentage = 0;
            if (this.validate()) {
                
                let data = new FormData();
                data.append('title',this.title);
                data.append('description',this.description);
                data.append('button',this.button);
                data.append('link',this.link);
                data.append('image',this.image);

                
                let Url = '/admin/slider/new';
                axios.post(Url,data ,{
                        onUploadProgress : function( progressEvent ) {
                            this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) )+'%';
                            }.bind(this)
                        }).then(response => {
                    // console.log(response);
                    if (response.data.status == 'ok') {
                        this.success = 'با موفقیت ایجاد شد .';
                        this.wating = false;
                        this.noBtn = true;
                        this.withBtn = false;
                        this.title = null;
                        this.description = null;
                        this.button = null;
                        this.link = null;
                        this.image = '';
                        
                    }
                }).catch(error => {
                    console.log(error);
                    this.uploadPercentage = 'خطا در ایجاد ، دوباره تلاش کنید ';
                    this.progressBg = 'bg-danger';
                    this.wating = false;
                });

            }
            
        }
    },
    
};
</script>