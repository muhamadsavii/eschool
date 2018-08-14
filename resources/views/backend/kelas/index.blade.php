<div class="pull-right">
    <a class="btn btn-primary" href="#" title="Create New" id="create_kelas"><i class="fa fa-plus fa-fw"></i></a>
</div>

<table class="table table-bordered" id="kelas-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Function</th>
        </tr>
    </thead>
</table>
{{ csrf_field() }}
@include('backend.kelas.scripts.index_script')

