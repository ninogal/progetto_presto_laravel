<form action="{{ route('set_language_locale', $lang)}}" method="POST">
    @csrf
    <li class="nav-item">
        <button type="submit" class="dropdown-item text-center" style="background-color: transparent; border: none;">
            {{ $lang }}
        </button>
    </li>
</form>
