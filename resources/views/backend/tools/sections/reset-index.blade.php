<div class="card">
    <div class="card-header">
        <h2>Search Index
            @if ($data['indexModified'])
                <small>Last run on {{ date('M d, Y', $data['indexModified']) }} at {{ date('g:i A', $data['indexModified']) }}</small>
            @endif
            <div>
                <small>Here you can manually run a full index of the posts and tags currently in the system.</small>
            </div>
        </h2>
        <div class="alert alert-danger" style="margin: 1em 0;">
            This will trigger an overwrite of the existing index, replacing the data and forcing the system to rebuild.
        </div>
    </div>
    <div class="card-body card-padding">
        <a>
            <button class="btn btn-primary btn-icon-text" data-toggle="modal" data-target="#reset-index">
                <i class="zmdi zmdi-refresh-alt"></i> Reset Index
            </button>
        </a>
    </div>
</div>