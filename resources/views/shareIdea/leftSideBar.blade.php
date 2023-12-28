<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('homepage') ? 'text-white bg-primary rounded' : '')}} nav-link text-dark" href="{{ route('homepage')}}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{(Route::is('terms') ? 'text-white bg-primary rounded' : '')}} nav-link" href="{{ route('terms')}}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
        @auth
            @if (Route::is('profile'))
            <div class="card-footer text-center py-2">
                <a class="btn btn-link btn-sm" href="{{ route('homepage')}}">Back to Home</a>
            </div>
            @else
            <div class="card-footer text-center py-2">
                <a class="btn btn-link btn-sm" href="{{ route('profile')}}">View Profile </a>
            </div>
            @endif
        @endauth
</div>