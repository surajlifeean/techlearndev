@if(Auth::guard('web')->check())

	<p>

		You are logged in as<strong>User</strong>

	</p>
@else

<p>

	Logged Out as <strong>User</strong>

	</p>
@endif

@if(Auth::guard('admin')->check())

	<p>

		You are logged in as<strong>Admin</strong>

	</p>
@else

<p>

	Logged Out as <strong>Admin</strong>

	</p>
@endif