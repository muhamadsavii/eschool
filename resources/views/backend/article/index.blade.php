<div class="pull-right">
    <a class="btn btn-primary" href="#" title="Create New" id="create_article"><i class="fa fa-plus fa-fw"></i></a>
</div>

<table class="table table-bordered" id="users-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Function</th>
        </tr>
    </thead>
</table>
{{ csrf_field() }}
@include('backend.article.scripts.index_script')

