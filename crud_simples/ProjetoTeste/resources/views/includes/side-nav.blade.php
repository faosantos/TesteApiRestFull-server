<!-- Sidebar -->
<ul class="sidebar navbar-nav bg-success">
    <li class="nav-item active">
        <a class="nav-link" href="/">
            {{-- <i class="fas fa-fw fa-users"></i> --}}
            <i class="fas fa-graduation-cap"></i>
            <span>Alunos</span>
        </a>
    </li>
    <li class="nav-item active">
        <a href="#" class="nav-link">
            {{-- <i class="fas fa-fw fa-car-alt"></i> --}}
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Turmas</span>
        </a>
    </li>
    <li class="nav-item active">
        <a href="#" class="nav-link">
            <i class="fas fa-fw fa-book"></i>
            <span>Agenda</span>
        </a>
    </li>
    @if (Auth::user()->email == "admin@gettrack.com.br")
        <li class="nav-item active">
            <a href="/create-user" class="nav-link">
                <i class="fas fa-fw fa-user"></i>
                <span>Adicionar Técnico</span>
            </a>
        </li>
    @endif
</ul>