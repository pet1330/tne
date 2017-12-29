@extends('layout')
@section('content')
<div class="content column is-three-fifths is-offset-one-fifth">
    <conditional-select @updatetable="updatetable" class="content"></conditional-select>
    <article v-show="table_data.length | table_loading" class="message is-primary">
        <div class="message-header">
            <p>Learning Outcomes</p>
        </div>
        <div class="message-body">
            <ul>
                <li v-for="criteria in table_data" :key="criteria.module.name">
                    @{{ criteria.description }}
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
    </article>
</div>
@endsection