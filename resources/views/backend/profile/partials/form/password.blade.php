<form class="keyboard-save" action="{{ url('auth/password') }}" method="POST" role="form" autocomplete="false" id="passwordUpdate">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="POST">

  <br>

  <div class="form-group">
      <div class="fg-line">
        <label class="fg-label">Current Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Current Password">
      </div>
  </div>

  <br>

  <div class="form-group">
      <div class="fg-line">
        <label class="fg-label">New Password</label>
        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
      </div>
  </div>

  <br>

  <div class="form-group">
      <div class="fg-line">
        <label class="fg-label">Confirm New Password</label>
        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm New Password">
      </div>
  </div>

  <div class="form-group">
      <button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> Save</button>
      &nbsp;
      <a href="{{ url('admin/profile') }}"><button type="button" class="btn btn-link">Cancel</button></a>
  </div>
</form>
