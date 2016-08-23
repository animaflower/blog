<div class="card">
    <div class="card-header">
        <h2>Export Data
            <small>When you click the button below Canvas will create a directory of CSV files for you
                to save to your
                computer. This archive will contain all the posts, tags, user information and relations
                in the system.
                Once the download has completed, you can use it to easily import into another Canvas
                installation.
            </small>
        </h2>
    </div>
    <div class="card-body card-padding">
        <form class="form-inline" action="{{ url('admin/tools/download_archive') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-primary btn-icon-text">
                <i class="zmdi zmdi-archive"></i> Download Archive
            </button>
        </form>
    </div>
</div>