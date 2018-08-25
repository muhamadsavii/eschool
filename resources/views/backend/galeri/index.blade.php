<div class="pull-right">
    <a class="btn btn-primary" href="#" title="Create New" id="create_galeri"><i class="fa fa-plus fa-fw"></i></a>
</div>

<table class="table table-bordered" id="galeri-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            
            <th>Created At</th>
            <th>Updated At</th>
            <th>Function</th>
        </tr>
    </thead>
</table>
{{ csrf_field() }}
@include('backend.galeri.scripts.index_script')

