<template>
    <div class="container">
        <div class="row align-items-center justify-content-center" v-if="level5 || level4">
            <div class="col-4" v-if="level5">
                <TeamMemberEdit ref="edit5" level="5"></TeamMemberEdit>
            </div>
            <div class="col-1" v-if="level5 && level4"></div>
            <div class="col-4" v-if="level4">
                <TeamMemberEdit ref="edit4" level="4"></TeamMemberEdit>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" v-if="level1">
            <div class="col-4" v-if="level1">
                <TeamMemberEdit ref="edit1" level="1"></TeamMemberEdit>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" v-if="level2 || level3">
            <div class="col-4" v-if="level2">
                <TeamMemberEdit ref="edit2" level="2"></TeamMemberEdit>
            </div>
            <div class="col-1" v-if="level2 && level3"></div>
            <div class="col-4" v-if="level3">
                <TeamMemberEdit ref="edit3" level="3"></TeamMemberEdit>
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
            level5: this._isShow("5"),
            level1: this._isShow("1"),
            level2: this._isShow("2"),
            level3: this._isShow("3"),
            level4: this._isShow("4"),
            view_level: this.level ? this.level : -1,
            value: [],
            options: [],
            isLoading: true,
            univercityNameData:null,
        }
    },
    mounted: function() {
        //
    },
    created: function() {
        axios.post('/univercity/name', { name: "" }).then(response => {
            this.univercityNameData = response.data
        })
    },
    methods: {
        defaultUnivercityNameData() {
            if (this.univercityNameData != null)
                return this.univercityNameData
            return false;
        },
        checkEmailWithOther(data) {
            var email = data.email;
            var exceptLevel = data.level;
            var i;
            console.log(this.$refs)
            for (i = 1; i <= 5; i++) {
                if (this.$refs['edit' + i] != undefined && i != exceptLevel){
                    console.log(this.$refs['edit' + i]["get email"])
                    if (this.$refs['edit' + i].email == this.$refs['edit' + exceptLevel].email) {
                        if (i == 5 && exceptLevel == 4)
                            continue;
                        if (i == 4 && exceptLevel == 5)
                            continue;
                        return false;
                    }
                }
            }
            return true;
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