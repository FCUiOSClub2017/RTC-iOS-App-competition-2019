<template>
    <div class="container" id="teamEdit">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col col-sm-9 col-md-7">
                <div class="container pb-3">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 text-center">
                            <h3>{{title}}</h3>
                        </div>
                        <div class="col-4">
                            <h4>學校</h4></div>
                        <div class="col-8">
                            <Multiselect v-model="selectedUnivercityName" :options="optionsForUnivercityName" :loading="isLoadingForUnivercityName" :searchable="true" :internal-search="false" :hide-selected="false" :close-on-select="true" :clear-on-select="true" :show-no-results="false" :show-labels="false" :max-height="300" @search-change="asyncFindForUnivercityName" @select="onSelectUnivercityName" placeholder="" />
                        </div>
                        <br><br>
                        <div class="col-4">
                            <h4>學系</h4></div>
                        <div class="col-8">
                            <Multiselect v-model="selectedUnivercityCourse" :options="optionsForUnivercityCourse" :loading="isLoadingForUnivercityCourse" :searchable="true" :internal-search="false" :hide-selected="false" :close-on-select="true" :clear-on-select="true" :show-no-results="false" :max-height="300" :show-labels="false" @search-change="asyncFindForUnivercityCourse" placeholder="" />
                        </div>
                        <br><br>
                        <div class="col-4">
                            <h4>姓名</h4></div>
                        <div class="col-8">
                            <input type="text" v-model="name" name="name" placeholder="姓名" required>
                        </div>
                        <br><br>
                        <div class="col-4">
                            <h4>Email</h4></div>
                        <div class="col-8">
                            <input v-model="email" type="email" name="email" placeholder="電子郵箱" @change="emailOnChange" required>
                        </div>
                        <br><br>
                        <div class="col-4" v-if="emailDanger"></div>
                        <div class="col-8" v-if="emailDanger">
                            <a class="text-danger">此電子郵箱已被其他隊伍註冊！</a>
                        </div>
                        <br><br>
                        <div class="col-4" v-if="emailPass"></div>
                        <div class="col-8" v-if="emailPass">
                            <a class="text-success">此電子郵箱可以使用！</a>
                        </div>
                        <br><br>
                        <div class="col-4">
                            <h4>聯絡電話</h4></div>
                        <div class="col-8">
                            <input type="tel" v-model="phone" name="phone" placeholder="聯絡電話" v-bind:required="required">
                        </div>
                        <input type="hidden" name="univercity" v-bind:value="selectedUnivercityName" required>
                        <input type="hidden" name="course" v-bind:value="selectedUnivercityCourse" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Multiselect from 'vue-multiselect'
export default {
    props: ['title','level'],
    components: { Multiselect },
    data() {
        return {
            selectedUnivercityName: null,
            selectedUnivercityCourse: null,
            optionsForUnivercityName: [],
            optionsForUnivercityCourse: [],
            isLoadingForUnivercityName: true,
            isLoadingForUnivercityCourse: true,
            enableCourseSearch: false,
            emailDanger: false,
            emailPass: false,
            email: null,
            name: null,
            phone: null,
            required: true,
            id: Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15),
        }
    },
    mounted: function() {},
    created: function() {
        this.getTeamData()
    },
    methods: {
        getTeamData() {
            axios.patch(route('team.data.get',this.level)).then(response => {
                var data = response.data.result
                if (data) {
                    this.email = data.email
                    this.name = data.name
                    this.phone = data.phone
                    this.selectedUnivercityName = data.univercity.name
                    this.selectedUnivercityCourse = data.univercity.course
                    this.asyncFindForUnivercityName("")
                    this.asyncFindForUnivercityCourse("")
                }
                this.asyncFindForUnivercityName("")
                this.asyncFindForUnivercityCourse("")
            })
        },
        asyncFindForUnivercityName(query) {
            this.isLoadingForUnivercityName = true;
            axios.post(route('univercity.name'), { name: query }).then(response => {
                this.optionsForUnivercityName = response.data
                this.isLoadingForUnivercityName = false
            })
        },
        onSelectUnivercityName(value) {
            this.selectedUnivercityName = value,
                this.selectedUnivercityCourse = null,
                this.asyncFindForUnivercityCourse("")
        },
        asyncFindForUnivercityCourse(query) {
            this.isLoadingForUnivercityCourse = true;
            var data = {
                name: this.selectedUnivercityName ? this.selectedUnivercityName : "",
                course: query
            };
            axios.post(route('univercity.course'), data).then(response => {
                this.optionsForUnivercityCourse = response.data
                this.isLoadingForUnivercityCourse = false
            })
        },
        emailOnChange({ type, target }) {
            var data = {
                email: target.value
            };
            if (data.email == "" || data.email == null) {
                this.emailDanger = false;
                this.emailPass = false;
                return;
            }
            console.log(data)
            axios.put(route('team.check.email',this.level), data).then(response => {
                if (typeof(response.data.result) === "boolean") {
                    this.emailDanger = response.data.result
                    this.emailPass = !this.emailDanger;
                } else {
                    this.emailDanger = false;
                    this.emailPass = false;
                }
            });
        },
    }
}
</script>