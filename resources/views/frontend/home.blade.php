@extends('layout')
@section('content')
<div class="content column is-three-fifths is-offset-one-fifth">
    <conditional-select @updatetable="updatetable" class="content"></conditional-select>
    <article v-show="table_data.selected.length | table_loading" class="message is-primary">
        <div class="columns">
            <div class="column">
        <div class="message-header">
            <p>Selected Learning Outcomes:</p>
        </div>
        <div class="message-body">
            <ul>
                <li v-for="description in table_data.selected">
                    @{{ description }}
                </li>
            </ul>
            <div class="has-text-centered">
                <i  v-if="table_loading" class="fa fa-spinner fa-spin fa fa-3x"></i>
                <button
                    tabindex="4"
                    class="button is-primary"
                    v-show="showCopy"
                    v-clipboard="criterialist"
                    @success="copySuccess"
                    @error="copyError">
                        Copy
                </button>
            </div>
        </div>
    </div>
    <div class="column">
        <div class="message-header">
            <p>Linked Learning Outcomes:</p>
        </div>
        <div class="message-body">
            <ul>
                <li v-for="description in table_data.linked">
                    @{{ description }}
                </li>
            </ul>
            <div class="has-text-centered">
                <i  v-if="table_loading" class="fa fa-spinner fa-spin fa fa-3x"></i>
                <div v-if="noLinks" class="is-fullwidth">
                <p class="button is-white is-fullwidth">
                No Connected Links
                </p>
                </div>
                <button
                    tabindex="4"
                    class="button is-primary"
                    v-show="showCopy"
                    v-else
                    v-clipboard="linkedlist"
                    @success="copySuccess"
                    @error="copyError">
                        Copy
                </button>
            </div>
        </div>
    </div>
    </div>
    </article>
    <div v-if="noLinks && noCriteria" class="box is-fullwidth">
        <p class="button is-white is-fullwidth">
            No Connected Links
        </p>
    </div>
</div>
@endsection