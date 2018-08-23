<div class="pull-right">
    <a class="btn btn-primary" href="#" title="Create New" id="create_guru"><i class="fa fa-plus fa-fw"></i></a>
</div>

<table class="table table-bordered" id="guru-table">
    <thead>
        <tr>
            <th>Nik</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Function</th>
        </tr>
    </thead>
</table>
{{ csrf_field() }}
@include('backend.guru.scripts.index_script')

