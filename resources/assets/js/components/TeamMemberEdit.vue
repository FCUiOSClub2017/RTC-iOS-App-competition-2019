<template>
    <div class="container pb-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h3 v-if="level5 || level4">指導老師</h3>
                <h3 v-if="level1">隊長</h3>
                <h3 v-if="level2 || level3">隊員</h3>
            </div>
            <div class="col-4">
                <h4>學校</h4></div>
            <div class="col-8">
                <Multiselect 
                    v-model="selectedUnivercityName" 
                    :options="optionsForUnivercityName" 
                    :loading="isLoadingForUnivercityName" 
                    :searchable="true" 
                    :internal-search="false" 
                    :hide-selected="false" 
                    :close-on-select="true" 
                    :clear-on-select="true" 
                    :show-no-results="false" 
                    :show-labels="false"
                    :max-height="300" 
                    @search-change="asyncFindForUnivercityName" 
                    @select="onSelectUnivercityName" 
                    placeholder="" />
            </div>
            <div class="col-4">
                <h4>學系</h4></div>
            <div class="col-8">
                <Multiselect 
                    v-model="selectedUnivercityCourse" 
                    :options="optionsForUnivercityCourse" 
                    :loading="isLoadingForUnivercityCourse" 
                    :searchable="true" 
                    :internal-search="false" 
                    :hide-selected="false" 
                    :close-on-select="true" 
                    :clear-on-select="true" 
                    :show-no-results="false" 
                    :max-height="300" 
                    :show-labels="false"
                    @search-change="asyncFindForUnivercityCourse" 
                    placeholder="" />
            </div>
            <div class="col-4">
                <h4>姓名</h4></div>
            <div class="col-8">
                <input type="text" v-model="name" v-bind:name="'name'+level" placeholder="姓名">
            </div>
            <div class="col-4">
                <h4>Email</h4></div>
            <div class="col-8">
                <input v-model="email" type="email" v-bind:name="'email'+level" placeholder="電子郵箱" @change="emailOnChange">
            </div>
            <div class="col-4" v-if="emailDanger"></div>
            <div class="col-8" v-if="emailDanger"><a class="text-danger">此電子郵箱已被其他隊伍註冊！</a></div>
            <div class="col-4" v-if="emailPass"></div>
            <div class="col-8" v-if="emailPass"><a class="text-success">此電子郵箱可以使用！</a></div>
            <div class="col-4">
                <h4>手機號碼</h4></div>
            <div class="col-8">
                <input type="tel" v-model="phone" v-bind:name="'phone'+level" placeholder="手機號碼" v-bind:required="required">
            </div>
            <input type="hidden" v-bind:name="'univercity'+level" v-bind:value="selectedUnivercityName">
            <input type="hidden" v-bind:name="'course'+level" v-bind:value="selectedUnivercityCourse">
        </div>
    </div>
</template>
<script>
import Multiselect from 'vue-multiselect'
export default {
    props: ['level'],
    components: { Multiselect },
    data() {
        return {
            level5: this._isShow("5"),
            level1: this._isShow("1"),
            level2: this._isShow("2"),
            level3: this._isShow("3"),
            level4: this._isShow("4"),
            selectedUnivercityName: null,
            selectedUnivercityCourse: null,
            optionsForUnivercityName: [],
            optionsForUnivercityCourse: [],
            isLoadingForUnivercityName: true,
            isLoadingForUnivercityCourse: true,
            enableCourseSearch:false,
            emailDanger:false,
            emailPass:false,
            email:null,
            name:null,
            phone:null,
            required:this.setRequired(),
        }
    },
    mounted: function() {
    },
    created: function() {
        this.defaultData()
    },
    methods: {
        defaultData(){
            var result = this.$parent.defaultUnivercityNameData();
            if(!result){
                setTimeout(this.defaultData,100);
                return ;
            }
            this.optionsForUnivercityName = result;
            this.isLoadingForUnivercityName = false
            this.isLoadingForUnivercityCourse = false
            this.getTeamData()
        },
        getTeamData(){
            axios.post('/team/data/get/'+this.level, {}).then(response => {
                var data = response.data.result
                console.log(response.data)
                if(data){
                    this.email = data.email
                    this.name = data.name
                    this.phone = data.phone
                    this.selectedUnivercityName = data.univercity.name
                    this.selectedUnivercityCourse = data.univercity.course
                    this.asyncFindForUnivercityCourse(this.selectedUnivercityCourse)
                }
            })
        },
        asyncFindForUnivercityName(query){
            this.isLoadingForUnivercityName = true;
            axios.post('/univercity/name', { name: query }).then(response => {
                this.optionsForUnivercityName = response.data
                this.isLoadingForUnivercityName = false
            })
        },
        onSelectUnivercityName(value){
            this.selectedUnivercityName = value,
            this.selectedUnivercityCourse = null,
            this.asyncFindForUnivercityCourse("")
        },
        asyncFindForUnivercityCourse(query){
            this.isLoadingForUnivercityCourse = true;
            var data = { 
                name: this.selectedUnivercityName?this.selectedUnivercityName:"",
                course: query
            };
            axios.post('/univercity/course', data).then(response => {
                this.optionsForUnivercityCourse = response.data
                this.isLoadingForUnivercityCourse = false
            })
        },
        _isShow(str) {
            if (this.level != "")
                if (this.level != str)
                    return false
            return true
        },
        emailOnChange({ type, target }){
            var data = { 
                level: this.level,
                email:target.value
            };
            if(data.email == "" || data.email == null)
            {
                this.emailDanger = false;
                this.emailPass = false;
                return;
            }
            var result = this.$parent.checkEmailWithOther(data);
            if(!result)
            {
                this.emailDanger = !result
                this.emailPass = !this.emailDanger;
            }
            else{
                this.emailDanger = false;
                this.emailPass = false;
                axios.post('/team/email', data).then(response => {
                    if(typeof(response.data.result) === "boolean"){
                        this.emailDanger = !response.data.result
                        this.emailPass = !this.emailDanger;
                    }else {
                        this.emailDanger = false;
                        this.emailPass = false;
                    }
                });
            }
        },
        setRequired(){
            var l = this.level
            if(l == 5 || l==4 ||l==1)
                return true;
            return false;
        },
    }
}
</script>