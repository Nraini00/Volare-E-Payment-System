

<form action="{{ route('auth.login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="adminEmail">Email:</label>
        <input type="email" name="email" id="adminEmail" required class="form-control">
    </div>
    <div class="form-group">
        <label for="adminPassword">Password:</label>
        <input type="password" name="password" id="adminPassword" required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<br>
<a class="small text-muted" href="{{ route('register.show') }}" style="font-size: 16px;">Register here</a>

