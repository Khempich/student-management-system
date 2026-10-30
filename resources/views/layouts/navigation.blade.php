<nav class="nv-bar" id="nvBar">
    <style>
        .nv-bar { position: sticky; top: 0; z-index: 50; background: rgba(255,255,255,.92); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border-bottom: 1px solid #e2e8f0; box-shadow: 0 1px 8px rgba(15,23,42,.05); }
        .nv-inner { max-width: 80rem; margin: 0 auto; height: 68px; padding: 0 24px; display: flex; align-items: center; justify-content: space-between; gap: 24px; }
        .nv-left { display: flex; align-items: center; gap: 36px; }

        /* Brand */
        .nv-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .nv-logo { width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #fff; background: linear-gradient(135deg, #2563eb, #4f46e5); box-shadow: 0 6px 14px rgba(79,70,229,.3); }
        .nv-logo svg { width: 22px; height: 22px; }
        .nv-brand-text { display: flex; flex-direction: column; line-height: 1.15; }
        .nv-brand-text b { font-size: 16px; font-weight: 800; color: #1e293b; letter-spacing: -.01em; }
        .nv-brand-text span { font-size: 11px; font-weight: 600; color: #64748b; letter-spacing: .06em; text-transform: uppercase; }

        /* Links */
        .nv-links { display: flex; align-items: center; gap: 6px; }
        .nv-link { display: inline-flex; align-items: center; gap: 8px; padding: 9px 16px; border-radius: 10px; font-size: 14px; font-weight: 600; color: #475569; text-decoration: none; transition: background .2s, color .2s; }
        .nv-link svg { width: 18px; height: 18px; flex-shrink: 0; }
        .nv-link:hover { background: #f1f5f9; color: #1e293b; }
        .nv-link.active { background: #eff6ff; color: #1d4ed8; }

        /* User */
        .nv-right { display: flex; align-items: center; }
        .nv-user { position: relative; }
        .nv-user-btn { display: flex; align-items: center; gap: 10px; padding: 6px 12px 6px 6px; border: 1px solid #e2e8f0; border-radius: 999px; background: #fff; cursor: pointer; font-size: 14px; font-weight: 600; color: #334155; transition: box-shadow .2s, border-color .2s; }
        .nv-user-btn:hover { border-color: #cbd5e1; box-shadow: 0 2px 8px rgba(15,23,42,.08); }
        .nv-avatar { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 14px; font-weight: 800; background: linear-gradient(135deg, #3b82f6, #4f46e5); }
        .nv-chevron { width: 16px; height: 16px; color: #94a3b8; transition: transform .2s; }
        .nv-user.open .nv-chevron { transform: rotate(180deg); }

        .nv-menu { display: none; position: absolute; right: 0; top: calc(100% + 10px); width: 230px; padding: 8px; background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; box-shadow: 0 18px 40px rgba(15,23,42,.14); }
        .nv-user.open .nv-menu { display: block; }
        .nv-menu-head { padding: 10px 12px 12px; margin-bottom: 6px; border-bottom: 1px solid #f1f5f9; }
        .nv-menu-head b { display: block; font-size: 14px; color: #1e293b; }
        .nv-menu-head span { display: block; margin-top: 2px; font-size: 12px; color: #94a3b8; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .nv-item { display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 12px; border: 0; border-radius: 10px; background: transparent; font-size: 14px; font-weight: 600; color: #475569; text-decoration: none; text-align: left; cursor: pointer; transition: background .2s, color .2s; box-sizing: border-box; }
        .nv-item svg { width: 18px; height: 18px; flex-shrink: 0; }
        .nv-item:hover { background: #f1f5f9; color: #1e293b; }
        .nv-item.danger { color: #dc2626; }
        .nv-item.danger:hover { background: #fef2f2; color: #b91c1c; }
        .nv-menu form { margin: 0; }

        /* Mobile */
        .nv-burger { display: none; width: 42px; height: 42px; border: 1px solid #e2e8f0; border-radius: 12px; background: #fff; cursor: pointer; align-items: center; justify-content: center; color: #475569; }
        .nv-burger svg { width: 22px; height: 22px; }
        .nv-mobile { display: none; padding: 12px 16px 16px; border-top: 1px solid #f1f5f9; background: #fff; }
        .nv-mobile.open { display: block; }
        .nv-mobile .nv-link { display: flex; width: 100%; box-sizing: border-box; margin-bottom: 4px; }
        .nv-mobile-user { margin-top: 10px; padding-top: 12px; border-top: 1px solid #f1f5f9; }
        .nv-mobile-user .who { display: flex; align-items: center; gap: 10px; padding: 0 6px 10px; font-size: 14px; font-weight: 700; color: #1e293b; }
        .nv-mobile form { margin: 0; }

        @media (max-width: 820px) {
            .nv-links, .nv-user { display: none; }
            .nv-burger { display: flex; }
            .nv-inner { padding: 0 16px; }
        }
        @media (min-width: 821px) { .nv-mobile, .nv-mobile.open { display: none; } }
    </style>

    <div class="nv-inner">
        <div class="nv-left">
            {{-- Brand --}}
            <a href="{{ route('dashboard') }}" class="nv-brand">
                <span class="nv-logo">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M12 14l6.16-3.42A12 12 0 0118 17M12 14l-6.16-3.42A12 12 0 006 17m0 0c0 1.1 2.7 2 6 2s6-.9 6-2"/>
                    </svg>
                </span>
                <span class="nv-brand-text">
                    <b>StudentMS</b>
                    <span>Management</span>
                </span>
            </a>

            {{-- Links --}}
            <div class="nv-links">
                <a href="{{ route('dashboard') }}" class="nv-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3v-6h6v6h3a1 1 0 001-1V10"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}" class="nv-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5.5-3.7M9 20H2v-2a4 4 0 017.5-1.9M16 3.1a4 4 0 010 7.8M8 3.1a4 4 0 000 7.8M12 14a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>
                    Students
                </a>

                <a href="{{ route('departments.index') }}" class="nv-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h2m-2 4h2m-2 4h2m4-8h2m-2 4h2m-2 4h2M10 21v-3a2 2 0 014 0v3"/>
                    </svg>
                    Departments
                </a>
            </div>
        </div>

        <div class="nv-right">
            {{-- User dropdown (desktop) --}}
            <div class="nv-user" id="nvUser">
                <button type="button" class="nv-user-btn" id="nvUserBtn" aria-haspopup="true">
                    <span class="nv-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    {{ Auth::user()->name }}
                    <svg class="nv-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div class="nv-menu">
                    <div class="nv-menu-head">
                        <b>{{ Auth::user()->name }}</b>
                        <span>{{ Auth::user()->email }}</span>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="nv-item">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 21v-1a6 6 0 016-6h4a6 6 0 016 6v1"/>
                        </svg>
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nv-item danger">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

            {{-- Hamburger (mobile) --}}
            <button type="button" class="nv-burger" id="nvBurger" aria-label="Menu">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div class="nv-mobile" id="nvMobile">
        <a href="{{ route('dashboard') }}" class="nv-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('students.index') }}" class="nv-link {{ request()->routeIs('students.*') ? 'active' : '' }}">Students</a>
        <a href="{{ route('departments.index') }}" class="nv-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">Departments</a>

        <div class="nv-mobile-user">
            <div class="who">
                <span class="nv-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                {{ Auth::user()->name }}
            </div>
            <a href="{{ route('profile.edit') }}" class="nv-item">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nv-item danger">Log Out</button>
            </form>
        </div>
    </div>

    <script>
        (function () {
            var user = document.getElementById('nvUser');
            var btn = document.getElementById('nvUserBtn');
            var burger = document.getElementById('nvBurger');
            var mobile = document.getElementById('nvMobile');

            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                user.classList.toggle('open');
            });
            document.addEventListener('click', function (e) {
                if (!user.contains(e.target)) user.classList.remove('open');
            });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') user.classList.remove('open');
            });
            burger.addEventListener('click', function () {
                mobile.classList.toggle('open');
            });
        })();
    </script>
</nav>