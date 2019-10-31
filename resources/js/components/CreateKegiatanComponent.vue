<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Kegiatan</div>

                    <div class="card-body">

                        <form @submit.prevent="addKegiatan">

                            <div class="form-group row">
                                <label for="kodekegiatan" class="col-md-4 col-form-label text-md-right">Kode Kegiatan</label>

                                <div class="col-md-6">
                                    <input id="kodekegiatan" type="text" class="form-control" name="kodekegiatan" v-model="kegiatan.kodekegiatan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namakegiatan" class="col-md-4 col-form-label text-md-right">Nama Kegiatan</label>

                                <div class="col-md-6">
                                    <input id="namakegiatan" type="text" class="form-control" name="namakegiatan" v-model="kegiatan.namakegiatan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Tanggal Kegiatan</label>
                                <div class="input-group date col-md-6">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="tanggal_kegiatan" v-model="kegiatan.tanggal_kegiatan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="penyelenggara_kegiatan" class="col-md-4 col-form-label text-md-right">Penyelenggara</label>

                                <div class="col-md-6">
                                    <input id="penyelenggara_kegiatan" type="text" class="form-control" name="penyelenggara_kegiatan" v-model="kegiatan.penyelenggara">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    $(function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

    export default {
        data(){
            return {
                kegiatan:{}
            }
        },
        methods: {
            addKegiatan(){
                let uri = 'http://127.0.0.1:8000/api/createkegiatan';
                this.axios.post(uri, this.kegiatan).then((response) => {
                    this.$router.push({name: 'listkegiatan'});
                });
            }
        }
    }
</script>

<style scoped>

</style>
