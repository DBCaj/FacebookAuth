<div>
  <a href="{{ route('logout') }}" onclick="return confirm('Are you sure you want to sign out?')">Log out</a>
  
  <h2>Dashboard</h2>
  <hr>
  <p>Welcome, <b>{{ Auth::user()->name }}</b>!</p>
  <p>Your role is <b>{{ Auth::user()->role }}</b>.</p>
</div>