<template>
    <div v-if="exists" class="column">
        <div class="box bookmark box-0 box-equal-height">
            <article class="column has-text-centered">
                <div v-if="editingName" class="field">
                    <div class="control">
                        <input @keyup.enter="update" v-model="resource.name" class="input is-primary is-outlined" type="text" placeholder="Edit Country">
                    </div>
                </div>
                <h3 v-else class="subtitle has-text-dark is-4">{{ resource.name }}</h3>
            </article>
            <br>
            <div v-if="editingName" class="columns">
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
                    <a class="button is-primary" :href="path">View</a>
                    <span @click="edit" class="button is-text" style="margin-left: 0.5em;">Edit</span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {

  props: ['attributes', 'path'],
  data () {
    return {
        editingName: false,
        originalTitle: null,
        resource: this.attributes,
        exists: true,
        deleting: false
    }
  },
  methods: {
    update: function() {
        if( !this.resource.name.length || this.resource.name === this.originalTitle)
            return this.cancel();
        axios.patch(this.path, this.resource)
        .then((response)=> {
            this.editingName = false;
            this.resource = response.data;
            flash('Updated "' + this.originalTitle + '" to "' + this.resource.name + '"', 'success');
            this.originalTitle = "";
        }).catch((error) => {
            flash("Opps! Something went wrong!", 'error');
            this.cancel();
        });
    },
    edit: function() {
        this.originalTitle = this.resource.name;
        this.editingName = true;
    },
    cancel: function() {
        this.resource.name = this.originalTitle;
        this.editingName = false;
    },
    remove: function() {
        if (confirm("Are you sure you want to delete " + this.resource.name )) {
            this.deleting = true;
            axios.delete(this.path)
            .then((response)=> {
                flash(this.resource.name + ' Deleted', 'success');
                this.exists = false;
                this.deleting = false;
            }).catch((error) => {
                flash('Something went wrong!', 'error');
                this.deleting = false;
            });
        }
    }
  }
}
</script>