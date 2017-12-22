require('./bootstrap');

window.Vue = require('vue');

import 'babel-polyfill'
import VueClipboards from 'vue-clipboards';
import conditionalSelect from './components/ConditionalSelect.vue';
import resourceBox from './components/ResourceBox.vue';
import criteriaBox from './components/CriteriaBox.vue';
import linkAdder from './components/LinkAdder.vue';
import flash from './components/Flash.vue';

Vue.component('conditional-select', conditionalSelect);
Vue.component('resource-box', resourceBox);
Vue.component('criteria-box', criteriaBox);
Vue.component('link-adder', linkAdder);
Vue.component('flash', flash);

Vue.use(VueClipboards);

window.events = new Vue({});

window.flash = function(message, type) {
    window.events.$emit('flash', message, type);
};

const app = new Vue({
    el: '#app',
    data: {
        table_data: [],
        table_loading: false,
        countries: [],
        programmes: [],
        modules: []
    },
    computed: {
        criterialist: function() {
            return this.table_data.map((e) => e.description).join("\n");
        },
        showCopy: function() {
            return this.criterialist && !this.table_loading;
        }
    },
    methods: {
        updatetable (val) {
            this.table_data = [];
            if (val != "") {
            this.table_loading = true;
            axios.get('/table-data/' + val)
                .then((response) => {
                    this.table_data = response.data;
                    this.table_loading = false;
                })
                .catch((error) => {
                    this.table_loading = false;
                    alert(`Opps! Something went wrong, we could not fetch information form the server
                          Please contact your system adminastrator if this keeps happening`);
                });
            }
        },
        copySuccess(e) {
            window.flash('Copied to clipboard', 'success');
        },
        copyError(e) {
            window.flash('We could not copy to your clipboard','error');
        }
    },
    directives: {
        'resource-focus' (el, binding) { if (binding.value) el.focus() } }
});
