<div>
    <form wire:submit="store" class="form-group mb-3 ">
        @csrf
        <label for="name" class="form-label"></label>
        <input type="text" class="form-control p-2 @error('name') border border-danger border-2 @enderror"
            name="name" placeholder="Your name" value="{{ old('name') }}" wire:model="name">
        @error('name')
            <div class="text-danger p-1">{{ $message }}</div>
        @enderror
        <label for="username" class="form-label"></label>
        <input type="text" name="username"
            class="form-control p-2 @error('username') border border-danger border-2 @enderror" placeholder="Username"
            value="{{ old('username') }}" wire:model="username">
        @error('username')
            <div class="text-danger p-1">{{ $message }}</div>
        @enderror
        <label for="email" class="form-label"></label>
        <input type="email" name="email"
            class="form-control p-2 @error('email') border border-danger border-2 @enderror" placeholder="Your email"
            value="{{ old('email') }}" wire:model="email">
        @error('email')
            <div class="text-danger p-1">{{ $message }}</div>
        @enderror
        <label for="password" class="form-label"></label>
        <input type="password" name="password"
            class="form-control p-2 @error('password') border border-danger border-2 @enderror"
            placeholder="Your password" wire:model="password">
        @error('password')
            <div class="text-danger p-1">{{ $message }}</div>
        @enderror
        <label for="password_confirmation" class="form-label"></label>
        <input type="password" name="password_confirmation" class="form-control p-2" placeholder="Repeat your password"
            wire:model="password_confirmation">
        <div class="container-fluid btn-group p-2"><button class="btn btn-primary btn-block rounded mt-3"
                type="submit">Register</button></div>
    </form>
</div>
