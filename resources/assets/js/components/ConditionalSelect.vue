<template>
<div id="column is-three-fifths is-offset-one-fifth">
    <div class="field control has-icons-left">
        <div class="select is-fullwidth is-primary is-medium">
            <select
                tabindex="1"
                v-model="country"
                name="country"
                class="fixedwidth"
                :disabled="country_loading == 1">
                <option value=""> --- Select Country --- </option>
                <option v-for="country in countries"
                    :value="country.id"
                    :selected="country.selected == true">
                    {{ country.name }}
                </option>
            </select>
        </div>
        <span class="icon is-medium is-left">
            <i  v-if="country_loading" class="fa fa-spinner fa-spin"></i>
            <i v-else class="fa fa-globe"></i>
        </span>
    </div>
    <div v-if="country" class="field control has-icons-left">
        <div class="select is-fullwidth is-primary is-medium">
            <select
                tabindex="2"
                v-model="programme"
                name="programme"
                class="fixedwidth"
                :disabled="programme_loading == 1">
                <option value=""> --- Select Programme --- </option>
                <option v-for="programme in programmes"
                    :value="programme.id"
                    :selected="programme.selected == true">
                    {{ programme.name }}
                </option>
            </select>
        </div>
        <span class="icon is-medium is-left">
            <i  v-if="programme_loading" class="fa fa-spinner fa-spin"></i>
            <i v-else class="fa fa-book"></i>
        </span>
    </div>
    <div v-if="programme" class="field control has-icons-left">
        <div class="select is-fullwidth is-primary is-medium">
            <select
                tabindex="3"
                v-model="module"
                name="module"
                class="fixedwidth"
                :disabled="module_loading == 1"
                >
                <option value=""> --- Select Module --- </option>
                <option v-for="module in modules"
                    :value="module.id"
                    :selected="module.selected == true">
                    {{ module.name }}
                </option>
            </select>
        </div>
        <span class="icon is-medium is-left">
            <i  v-if="module_loading" class="fa fa-spinner fa-spin"></i>
            <i v-else class="fa fa-file-text-o"></i>
        </span>
    </div>
</div>
</template>
<script>
    export default {
        data() {
            return {
                countries: [],
                country: "",
                country_loading: true,
                programmes: [],
                programme: "",
                programme_loading: true,
                modules: [],
                module: "",
                module_loading: true,
            }
        },
        created() {
            axios.get('/countries')
                .then((response) => {
                    this.countries = response.data;
                    this.country_loading = false;
                })
                .catch(function(error) {
                    alert(`Opps! Something went wrong, we could not fetch information form the server
Please contact your system adminastrator if this keeps happening`);
                    this.country_loading = false;
                });
        },
        computed: {},
        watch: {
            country: function(val) {
                this.programme = "";
                this.module = "";
                this.programmes = [];
                this.modules = [];
                if (val != "") {
                    this.programme_loading = true;
                    axios.get('/programmes/' + val)
                        .then((response) => {
                            this.programmes = response.data;
                            this.programme_loading = false;
                        })
                        .catch(function(error) {
                            alert(`Opps! Something went wrong, we could not fetch information form the server
Please contact your system adminastrator if this keeps happening`);
                            this.programme_loading = false;
                        });
                }
            },
            programme: function(val) {
                this.module = "";
                this.modules = [];
                if (val != "") {
                    this.module_loading = true;
                    axios.get('/modules/' + val)
                        .then((response) => {
                            this.modules = response.data;
                            this.module_loading = false;
                        })
                        .catch(function(error) {
                            alert(`Opps! Something went wrong, we could not fetch information form the server
Please contact your system adminastrator if this keeps happening`);
                            this.module_loading = false;
                        });
                }
            },
            module: function(val) {
                this.$emit('updatetable', this.module);
            },
        }
    }
</script>
<style lang="scss">
.fixedwidth {
// width:50em;
align-items: stretch
}
</style>