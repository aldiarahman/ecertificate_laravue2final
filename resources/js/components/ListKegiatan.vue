<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Kegiatan</div>

            <div class="card-body">
                <div>
                    <h3>List Kegiatan</h3>
                    <router-link :to="{ name: 'createkegiatan' }" class="btn btn-success mb-3">Tambah Kegiatan</router-link>
                    <table class="table">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Kode Kegiatan</th>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Penyelenggara</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        <tr v-for="kegiatan in kegiatans" v-bind:key="kegiatan.id" style="margin-bottom: 5px;">
                            <th scope="row">{{ kegiatan.id }}</th>
                            <td>{{ kegiatan.kodekegiatan }}</td>
                            <td>{{ kegiatan.namakegiatan }}</td>
                            <td>{{ kegiatan.tanggal_kegiatan }}</td>
                            <td>{{ kegiatan.penyelenggara }}</td>
                            <td>
                                <!-- <router-link :to="{name: 'editkegiatan', params: { id: kegiatan.id }}" type="button" class="btn btn-primary">Edit</router-link>-->
                                <!-- <button type="button" class="btn btn-danger" @click.prevent="deleteKegiatan(kegiatan.id)">Delete</button>-->
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                kegiatans: []
            }
        },
        created() {
            let uri = 'http://127.0.0.1:8000/api/listkegiatan';
            this.axios.get(uri).then(response => {
                this.kegiatans = response.data.data;
            });
        }
    }
</script>

<style scoped>

</style>
