<div>
      <h2>Login</h3>
      <hr><br>
  
      <form action="{{ route('login.auth') }}" method="POST">
        @csrf
        
        @error('invalid')
          <div style="color:white; background-color: #ff9999; padding:11px; border-radius:4px; margin-bottom:5px">
            {{ $message }}
          </div>
        @enderror
        
        <div>
          <label for="email">Email:</label>
          <br>
          <input type="email" name="email" autofocus required value="{{ old('email') }}">
        </div>
        <br>
        <div>
          <label for="password">Password:</label>
          <br>
          <input type="password" name="password" required>
        </div>
        <br>
        <div>
          <button style="background-color:red; color:white; padding:7px" type="reset">Clear</button>
          <button style="background-color:green; color:white; padding:7px" type="submit">Login</button>
        </div>
      </form>
        <br>
        <hr>
        <br>
        <div>
          <a href="{{ route('login.facebook') }}" role="button" style="background-color:blue; color:white; padding:7px; text-decoration:none">Or Login with Facebook</a>
        </div>
      
</div>