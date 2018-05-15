<template>
    <Datepicker><input type="hidden" name="date" :value="date"></Datepicker>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
// import Multiselect from 'vue-multiselect'
export default {
    components: { Datepicker },
    props: {
        },
        // // Basic type check (`null` matches any type)
        // propA: Number,
        // // Multiple possible types
        // propB: [String, Number],
        // // Required string
        // propC: {
        //     type: String,
        //     required: true
        // },
        // // Number with a default value
        // propD: {
        //     type: Number,
        //     default: 100
        // },
        // // Object with a default value
        // propE: {
        //     type: Object,
        //     // Object or array defaults must be returned from
        //     // a factory function
        //     default: function() {
        //         return { message: 'hello' }
        //     }
        // },
        // // Custom validator function
        // propF: {
        //     validator: function(value) {
        //         // The value must match one of these strings
        //         return ['success', 'warning', 'danger'].indexOf(value) !== -1
        //     }
        // }
    },
    // components: { Multiselect },
    data() {
        return {
            value: this.defaultValue,
            id: Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15),
            result: null,
            inputClass: this.generateClass(),
        }
    },
    mounted: function() {},
    created: function() {
        // this.getTeamData()
    },
    methods: {
        generateClass() {
            if (this.result == null)
                return "form-control"
            if (this.result)
                return "form-control is-valid"
            return "form-control is-invalid"
        },
        asyncFindForUnivercityCourse(query) {
            // this.isLoadingForUnivercityCourse = true;
            // var data = {
            //     name: this.selectedUnivercityName ? this.selectedUnivercityName : "",
            //     course: query
            // };
            // axios.post('/team', data).then(response => {
            //     this.optionsForUnivercityCourse = response.data
            //     this.isLoadingForUnivercityCourse = false
            // })
        },
        onInput: _.debounce(function(e) {
            this.value = e.target.value;
            console.log(e, this.onInputCallback)
            if (this.onInputCallback !== null)
                this.onInputCallback({value:this.value,result:this.result})
        }, 250)
    }
}
</script>