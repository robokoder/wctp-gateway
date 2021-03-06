<div class="modal fade" data-backdrop="static" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content shadow-sm border-success">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="createUserModalLabel">{{ __('Create user account') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/system/user/create" role="form">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" required name="name" class="form-control" value="">
                        <small class="form-text text-muted">The name or nickname to use for display purposes.</small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" required name="email" class="form-control" value="">
                        <small class="form-text text-muted">The email address for password resets and notifications.</small>
                    </div>
                    <div class="form-group">
                        <label>Timezone</label>
                        <select required name="timezone" class="form-control">
                            @foreach( timezone_identifiers_list() as $tz )
                                <option @if( $tz == 'America/New_York') {{ ' selected="selected" ' }} @endif
                                        value="{{ $tz }}">{{ $tz }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Select the timezone to display throughout the application.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" role="button" class="btn btn-success">Create Account</button>
                </div>
            </form>
        </div>
    </div>
</div>
