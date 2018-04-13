<template>
    <div class="container pb-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h3 v-if="level0">指導老師</h3>
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
                <input type="text" name="" value="" placeholder="">
            </div>
            <div class="col-4">
                <h4>Email</h4></div>
            <div class="col-8">
                <input type="email" name="" value="" placeholder="">
            </div>
            <div class="col-4">
                <h4>手機號碼</h4></div>
            <div class="col-8">
                <input type="tel" name="" value="" placeholder="">
            </div>
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
            level0: this._isShow("0"),
            level1: this._isShow("1"),
            level2: this._isShow("2"),
            level3: this._isShow("3"),
            selectedUnivercityName: [],
            selectedUnivercityCourse: [],
            optionsForUnivercityName: [],
            optionsForUnivercityCourse: [],
            isLoadingForUnivercityName: true,
            isLoadingForUnivercityCourse: true,
            enableCourseSearch:false,
        }
    },
    mounted: function() {
        console.log("team member edit compoment mounted")
    },
    created: function() {
        console.log("team member edit compoment created")
        this.asyncFindForUnivercityName("");
        this.asyncFindForUnivercityCourse("");
    },
    methods: {
        asyncFind(query) {
            console.log("find " + query)
            // this.isLoading = true
            // axios.post('api/filter/tags', { tag: query }).then(response => {
            //     this.options = response.data
            //     this.isLoading = false
            // })
        },
        asyncFindForUnivercityName(query){
            console.log(query)
            this.isLoadingForUnivercityName = true;
            axios.post('/univercity/name', { name: query }).then(response => {
                this.optionsForUnivercityName = response.data
                this.isLoadingForUnivercityName = false
            })
        },
        onSelectUnivercityName(a,b){
            console.log(a,b)
            this.asyncFindForUnivercityCourse("")
        },
        asyncFindForUnivercityCourse(query){
            console.log(query)
            this.isLoadingForUnivercityCourse = true;
            axios.post('/univercity/course', { 
                name: this.selectedUnivercityName,
                course: query
            }).then(response => {
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

    }
}
</script>