Vue.component('check-box', {
    template:`<input class="checked mr-3" :value="value" type="checkbox" v-on:click="addname()"/>`,
    props:['value','array'],
    data:function() {
        return {
            // check:[],
            // value:''
            // name:{}
        }
    },
    methods: {
        addname:function(){
            var x = this.array.push(this.value)
            console.log(x)
        }
    },
})