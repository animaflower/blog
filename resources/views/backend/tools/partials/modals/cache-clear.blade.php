<div class="modal fade" id="cache-clear" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>This will clear the current application cache as well as optimize the site for speed and performance.</p>
            </div>
            <div class="modal-footer">
                <form class="form-inline" action="{{ url('admin/tools/cache_clear') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-link btn-icon-text">
                        <i class="zmdi zmdi-delete"></i> Clear Cache
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>