<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
        aria-expanded="false">
        {{ auth()->user()->name }}
    </button>
    <ul class="dropdown-menu" arialabelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
 this.closest('form').submit();">
                    Logout
                </a>
            </form>
        </li>
    </ul>
</div>

<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        @if (auth()->user()->role == 'dosen')
            <a href="{{ route('dashboard') }}" class="nav-link active">Dashboard</a>
            <a href="{{ route('mahasiswa.index') }}" class="nav-link">Mahasiswa</a>
            <a href="{{ route('registrasi.index') }}" class="nav-link">Registrasi</a>
        @elseif(auth()->user()->role == 'mahasiswa')
            <a href="{{ route('dashboard') }}" class="nav-link active">Dashboard</a>
            <a href="{{ route('registrasi.index') }}" class="nav-link">Registrasi</a>
        @endif
    </div>
</div>
