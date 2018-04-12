<template>
    <div class="container pb-3">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h3>指導老師</h3></div>
            <div class="col-4">
                <h4>學校</h4></div>
            <div class="col-8">
                <Multiselect v-model="selectedUnivercityName" :options="optionsForUnivercityName" :loading="isLoadingForUnivercityName" :multiple="false" :searchable="true" :internal-search="false" :hide-selected="true" :close-on-select="false" :clear-on-select="true" :show-no-results="false" :max-height="600" @search-change="asyncFindForUnivercityName" placeholder="請選擇學校" />
            </div>
            <div class="col-4">
                <h4>學系</h4></div>
            <div class="col-8">
                <Multiselect v-model="selectedUnivercityCourse" :options="optionsForUnivercityCourse" :loading="isLoadingForUnivercityCourse" :multiple="false" :searchable="true" :internal-search="false" :hide-selected="true" :close-on-select="false" :clear-on-select="true" :show-no-results="false" :max-height="600" @search-change="asyncFindForUnivercityCourse" placeholder="請選擇學系" />
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
            selectedUnivercityName: null,
            selectedUnivercityCourse: null,
            optionsForUnivercityName: [],
            optionsForUnivercityCourse: [],
            isLoading: true,
            enableCourseSearch:false,
        }
    },
    mounted: function() {
        console.log("team member edit compoment mounted")
    },
    created: function() {
        console.log("team member edit compoment created")
        // axios.post('api/filter/tags').then(response => {
        //     this.options = response.data
        //     this.isLoading = false
        // })
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
        getUnivercityName(query){
            
        },
        getUnivercityCourse(query){
            
        }
    }
}
</script>