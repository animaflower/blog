<div class="card">
    <div class="card-header">
        <h2>Maintenance Mode
            <small>Enable or disable maintenance mode for your site. Once activated, all public traffic
                will see a <em>Be Back Soon</em> page. As an logged in user, you will
                still have full access the administrative area of the blog. Once your changes have been made,
                make the site active again by disabling maintenance mode.
            </small>
        </h2>
    </div>
    <div class="card-body card-padding">
        @if($data['status'] === 'Active')
            <form class="form-inline" action="{{ url('admin/tools/enable_maintenance_mode') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-primary btn-icon-text">
                    <i class="zmdi zmdi-alert-octagon"></i> Enable Maintenance Mode
                </button>
            </form>
        @else
            <form class="form-inline" action="{{ url('admin/tools/disable_maintenance_mode') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-warning btn-icon-text">
                    <i class="zmdi zmdi-alert-octagon"></i> Disable Maintenance Mode
                </button>
            </form>
        @endif
    </div>
</div>