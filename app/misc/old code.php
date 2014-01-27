<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Sign Up</h4>
			</div>
			<div class="modal-body">
				@if ($errors->any())
				<ul>
					{{ implode('', $errors->all('<p class="error">:message</p>')) }}
				</ul>
				@endif
				{{ Form::open(array('route' => 'user.store', 'class' => 'form .form-horizontal')) }}
				<p>
					{{ Form::label('email', 'E-mail: ') }}
					{{ Form::text('email', '', array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The email you wish to use when signing up')) }}
				</p>
				<p>
					{{ Form::label('fname', ' First Name: ') }}
					{{ Form::text('fname', '', array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Your first name')) }}
				</p>
				<p>
					{{ Form::label('lname', 'Last Name: ') }}
					{{ Form::text('lname', '', array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Your last name')) }}
				</p>
				<p>
					{{ Form::label('tel', 'Telephone: ') }}
					{{ Form::text('tel', '', array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'If you want to allow investors to reach you through phone, enter your phone number including country code')) }}
				</p>
				<p>
					{{ Form::label('password', 'Password: ') }}
					{{ Form::password('password', array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The pasword must contain at least six (6) characters')) }}
				</p>
				<p>
					{{ Form::label('accepted_terms', 'I accept Pitch.XXXs Terms and Agreements: ') }}
					{{ Form::checkbox('accepted_terms', 1, false, array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Basically, you allow Pitch.XXX and our signed up investors to watch your video. If investors find the idea interesting, they may forward it to more suitable investors in their network.')) }}
					{{ link_to('toa', 'Read our full Terms of Agreement', array('target' => '_blank')) }}

				</p>
			</div>
			<div class="modal-footer">
				{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">

				{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}

				<!-- Email -->
				<div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
					{{ Form::label('email', 'E-Mail', array('class' => 'control-label')) }}

					<div class="controls">
						{{ Form::text('email', Input::old('email'), array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The e-mail you used to sign up')) }}
						{{ $errors->first('email') }}
					</div>
				</div>

				<!-- Password -->
				<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
					{{ Form::label('password', 'Password', array('class' => 'control-label')) }}

					<div class="controls">
						{{ Form::password('password', array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The password you used to sign up. It should be at least six (6) characters')) }}
						{{ $errors->first('password') }}
						{{link_to_action('AuthController@getPasswordReminder', 'forgot password?') }}

					</div>
				</div>
			</div>
			<div class="modal-footer">
				{{ Form::submit('Login', array('class' => 'btn')) }}
			</div>
			{{ Form::close() }}
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->