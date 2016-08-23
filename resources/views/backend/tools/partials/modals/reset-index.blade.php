<div class="modal fade" id="reset-index" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>Depending on the number of blog posts and tags on the site, this could take a significant amount of time to run.</p>
            </div>
            <div class="modal-footer">
                <form class="form-inline" action="{{ url('admin/tools/reset_index') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-link btn-icon-text">
                        <i class="zmdi zmdi-refresh-alt"></i> Reset Index
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>