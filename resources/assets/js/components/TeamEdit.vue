<template>
    <div class="container">
        <div class="row align-items-center justify-content-center" v-if="level0 || level4">
            <div class="col-4" v-if="level0">
                <TeamMemberEdit level="0"></TeamMemberEdit>
            </div>
            <div class="col-1" v-if="level0 && level4"></div>
            <div class="col-4" v-if="level4">
                <TeamMemberEdit level="4"></TeamMemberEdit>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" v-if="level1">
            <div class="col-4" v-if="level1">
                <TeamMemberEdit level="1"></TeamMemberEdit>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" v-if="level2 || level3">
            <div class="col-4" v-if="level2">
                <TeamMemberEdit level="2"></TeamMemberEdit>
            </div>
            <div class="col-1" v-if="level2 && level3"></div>
            <div class="col-4" v-if="level3">
                <TeamMemberEdit level="3"></TeamMemberEdit>
            </div>
        </div>
            <input type="hidden" v-bind:name="'level'" v-bind:value="view_level">
    </div>
</template>
<script>
import TeamMemberEdit from './TeamMemberEdit'
export default {
    props: ['level'],
    components: { TeamMemberEdit },
    data() {
        return {
            level0: this._isShow("0"),
            level1: this._isShow("1"),
            level2: this._isShow("2"),
            level3: this._isShow("3"),
            level4: this._isShow("4"),
            view_level:this.level?level:-1
            value: [],
            options: [],
            isLoading: true,
        }
    },
    mounted: function() {
        // if(this.level!="")
        //     if(this.level!="0")
        //         this.level0 = false
        //     if(this.level!="1")
        //         this.level1 = false
        //     if(this.level!="2")
        //         this.level2 = false
        //     if(this.level!="3")
        //         this.level3 = false
    },
    created: function() {
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
        _isShow(str) {
            if (this.level != "")
                if (this.level != str)
                    return false
            return true
        },

    }
}
</script>