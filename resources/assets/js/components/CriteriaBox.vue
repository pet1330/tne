<template>
    <div v-if="exists" class="column">
        <div class="box bookmark box-0 box-equal-height">
            <article class="column has-text-centered">
                <div v-if="editingDescription" class="field">
                    <div class="control">
                        <input @keyup.enter="update" v-model="criteria.description" class="input is-primary is-outlined" type="text" placeholder="Edit Country">
                    </div>
                </div>
                <h3 v-else class="subtitle has-text-dark is-4">{{ criteria.description }}</h3>
            </article>
            <br>
            <div v-if="editingDescription" class="columns">
                <div class="column is-offset-4 is-4 field is-grouped is-grouped-centered">
                    <span @click="update" class="button is-primary">Save</span>
                    <span @click="cancel" class="button is-text" style="margin-left: 0.5em;">cancel</span>
                </div>
                <div class="column is-offset-2 is-2">
                    <span v-if="deleting" class="button has-text-danger">
                        <i class="fa fa-spinner fa-spin"></i>
                    </span>
                    <span v-else @click="remove" class="button has-text-danger">
                        <i class="fa fa-trash"></i>
                    </span>
                </div>
            </div>
            <div v-else class="field is-grouped is-grouped-centered">
                <p class="control">
                    <a @click="togglelinks" class="button is-primary">{{ this.showlinks ? 'Hide Links' : 'Show Links' }}</a>
                    <span v-if="!showlinks" @click="edit" class="button is-text" style="margin-left: 0.5em;">Edit</span>
                </p>
            </div>
            <transition name="fade">
            <div v-if="showlinks" class="content showlinks">
                    <p>Current Link</p>
                    <div v-if="criteria.links && criteria.links.length">
                        <div v-for="l in criteria.links" class="box">
                            <div class="field is-grouped">
                                <div class="control is-expanded">
                                    <p class="button is-white">{{ l.description }}</p>
                                </div>
                                <div class="control">
                                    <span @click="removelink(l)" class="button is-white has-text-danger"><i class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="box is-fullwidth">
                        <p class="button is-white is-fullwidth">
                            This Criteria has no links
                        </p>
                    </div>
                    <hr>
                    <div class="content">
                    <p>Add New Link</p>
                    <link-adder v-on:addlink="addlink"></link-adder>
                </div>
            </div>
        </transition>
        </div>
    </div>
</template>

<script>
export default {

  props: ['attributes', 'path'],
  data () {
    return {
        editingDescription: false,
        originalDescription: null,
        criteria: this.attributes,
        exists: true,
        showlinks: false,
        deleting: false
    }
  },
  methods: {
    update: function() {
        if(this.criteria.description.length) {
            axios.patch(this.path, this.criteria)
            .then((response)=> {
                this.editingDescription = false;
                this.criteria = response.data
                window.flash('Criteria Updated', 'success');
            }).catch((error) => {
                window.flash('Criteria Updated', 'error');
                this.editingDescription = false;
                this.criteria.description = this.originalDescription;
            });
        }
    },
    edit: function() {
        this.originalDescription = this.criteria.description;
        this.editingDescription = true;
    },
    cancel: function() {
        this.editingDescription = false;
        this.criteria.description = this.originalDescription;
    },
    remove: function() {
        if (confirm("Are you sure you want to delete " + this.criteria.description )) {
            this.deleting = true;
            axios.delete(this.path)
            .then((response)=> {
                this.deleting = false;
                this.exists = false;
                window.flash('Criteria removed', 'success');
            }).catch((error) => {
                this.deleting = false;
                window.flash('Opps! Something went wrong!', 'error');
            });
        }
    },
    removelink: function(link) {
        if (confirm("Are you sure you want to delete " + link.description )) {
            this.criteria.links.splice(this.criteria.links.indexOf(link), 1);
            axios.delete(this.path + '/links/' + link.id)
            .then((response)=> {
                window.flash('link deleted', 'success');
            }).catch((error) => {
                window.flash('Opps! Something went wrong', 'error');
            });
        }
    },

    togglelinks: function () {
        this.showlinks = ! this.showlinks;
    },
    addlink: function (val) {
        axios.post(this.path + '/links', { link_id: val })
        .then((response) => {
            this.criteria.links.push(response.data)
        }).catch((error) => {
            window.flash("Opps! Something went wrong!", 'error');
            this.editingDescription = false;
        });
    }
  }
}
</script>

<style lang="scss">

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s
  }
  .fade-enter, .fade-leave-active {
    opacity: 0
  }

</style>