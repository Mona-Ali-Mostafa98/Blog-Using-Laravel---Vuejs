<div class="row">
    <div class="col">
        <div class="form-floating mb-3 position-relative">
            <input type="text" value="{{ old('name', $user['name']) }}"
                   class="form-control border-0 border-bottom shadow" name="name"
                   placeholder="enter your name" aria-label="name"
                   aria-describedby="name" required>
            <label for="name">Name</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-floating mb-3 position-relative">
            <input type="email" value="{{ old('email', $user['email']) }}"
                   class="form-control border-0 border-bottom shadow" name="email"
                   placeholder="enter your email" aria-label="email"
                   aria-describedby="email" required>
            <label for="email">Email</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-floating mb-3 position-relative">
            <input type="password" value="{{ old('password') }}"
                   class="form-control border-0 border-bottom shadow" name="password"
                   placeholder="enter your password" aria-label="password"
                   aria-describedby="password">
            <label for="password">Password</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-floating mb-3 position-relative">
            <input type="password" value="{{ old('password_confirmation') }}"
                   class="form-control border-0 border-bottom shadow" name="password_confirmation"
                   placeholder="enter your password_confirmation" aria-label="password_confirmation"
                   aria-describedby="password_confirmation">
            <label for="password_confirmation">Password Confirmation</label>
        </div>
    </div>
</div>

