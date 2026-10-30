<x-app-layout>

    <style>
        .sd-page { background: #f1f5f9; padding: 32px 16px 40px; min-height: 100vh; }
        .sd-wrap { max-width: 80rem; margin: 0 auto; display: flex; flex-direction: column; gap: 28px; }

        /* Header */
        .sd-head { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; }
        .sd-eyebrow { margin: 0 0 4px; font-size: 12px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: #2563eb; }
        .sd-title { margin: 0; font-size: 26px; font-weight: 800; color: #1e293b; letter-spacing: -.01em; }
        .sd-sub { margin: 4px 0 0; font-size: 14px; color: #64748b; }

        /* Buttons */
        .sd-btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 11px 20px; border-radius: 12px; font-size: 14px; font-weight: 700; text-decoration: none; line-height: 1; transition: transform .2s, box-shadow .2s, background .2s; white-space: nowrap; }
        .sd-btn:hover { transform: translateY(-2px); }
        .sd-btn svg { width: 18px; height: 18px; flex-shrink: 0; }
        .sd-btn-primary { background: linear-gradient(90deg, #2563eb, #4f46e5); color: #fff; box-shadow: 0 8px 18px rgba(79,70,229,.3); }
        .sd-btn-primary:hover { color: #fff; box-shadow: 0 10px 22px rgba(79,70,229,.4); }
        .sd-btn-white { background: #fff; color: #1d4ed8; }
        .sd-btn-white:hover { background: #eff6ff; color: #1d4ed8; }
        .sd-btn-ghost { background: rgba(255,255,255,.12); color: #fff; border: 1px solid rgba(255,255,255,.4); }
        .sd-btn-ghost:hover { background: rgba(255,255,255,.22); color: #fff; }
        .sd-btn-sm { padding: 9px 14px; font-size: 13px; border-radius: 10px; }

        /* Banner */
        .sd-banner { position: relative; overflow: hidden; border-radius: 24px; padding: 40px; color: #fff; background: linear-gradient(120deg, #1d4ed8, #4338ca 55%, #6366f1); box-shadow: 0 20px 40px rgba(67,56,202,.25); }
        .sd-banner-body { position: relative; z-index: 2; max-width: 640px; }
        .sd-chip { display: inline-flex; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; font-size: 12px; font-weight: 600; background: rgba(255,255,255,.14); border: 1px solid rgba(255,255,255,.25); }
        .sd-dot { width: 8px; height: 8px; border-radius: 50%; background: #34d399; }
        .sd-banner h3 { margin: 18px 0 0; font-size: 30px; font-weight: 800; line-height: 1.2; }
        .sd-banner p { margin: 12px 0 0; font-size: 15px; line-height: 1.7; color: #dbeafe; }
        .sd-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 26px; }
        .sd-circle { position: absolute; border-radius: 50%; border: 34px solid rgba(255,255,255,.08); pointer-events: none; }
        .sd-circle.a { width: 260px; height: 260px; right: -50px; top: -80px; }
        .sd-circle.b { width: 260px; height: 260px; right: 160px; bottom: -120px; border-width: 30px; }

        /* Stat cards */
        .sd-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; }
        .sd-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(15,23,42,.06); transition: transform .25s, box-shadow .25s; display: flex; flex-direction: column; justify-content: space-between; min-height: 190px; }
        .sd-card:hover { transform: translateY(-4px); box-shadow: 0 18px 32px rgba(15,23,42,.1); }
        .sd-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; }
        .sd-card-label { margin: 0; font-size: 14px; font-weight: 600; color: #64748b; }
        .sd-card-num { margin: 12px 0 0; font-size: 42px; font-weight: 800; line-height: 1; color: #1e293b; }
        .sd-card-status { margin: 14px 0 0; display: flex; align-items: center; gap: 10px; font-size: 26px; font-weight: 800; line-height: 1; color: #059669; }
        .sd-pulse { position: relative; width: 12px; height: 12px; border-radius: 50%; background: #10b981; }
        .sd-pulse::after { content: ""; position: absolute; inset: 0; border-radius: 50%; background: #34d399; animation: sd-ping 1.6s ease-out infinite; }
        @keyframes sd-ping { 0% { transform: scale(1); opacity: .8; } 100% { transform: scale(2.6); opacity: 0; } }
        .sd-icon { width: 56px; height: 56px; border-radius: 16px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .sd-icon svg { width: 28px; height: 28px; }
        .sd-icon.blue { background: #eff6ff; color: #2563eb; }
        .sd-icon.indigo { background: #eef2ff; color: #4f46e5; }
        .sd-icon.green { background: #ecfdf5; color: #059669; }
        .sd-card-foot { display: flex; align-items: center; justify-content: space-between; margin-top: 22px; padding-top: 16px; border-top: 1px solid #f1f5f9; font-size: 12px; color: #94a3b8; font-weight: 500; }
        .sd-link { font-size: 14px; font-weight: 700; text-decoration: none; }
        .sd-link.blue { color: #2563eb; } .sd-link.indigo { color: #4f46e5; }
        .sd-link:hover { text-decoration: underline; }
        .sd-ready { background: #ecfdf5; color: #059669; font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: 999px; }

        /* Table panel */
        .sd-panel { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; overflow: hidden; box-shadow: 0 1px 3px rgba(15,23,42,.06); }
        .sd-panel-head { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; padding: 22px 24px; border-bottom: 1px solid #f1f5f9; }
        .sd-panel-title { display: flex; align-items: center; gap: 14px; }
        .sd-panel-title .sd-icon { width: 42px; height: 42px; border-radius: 12px; }
        .sd-panel-title .sd-icon svg { width: 22px; height: 22px; }
        .sd-panel-title h3 { margin: 0; font-size: 18px; font-weight: 800; color: #1e293b; }
        .sd-panel-title p { margin: 3px 0 0; font-size: 12px; color: #94a3b8; }
        .sd-btn-blue { background: #2563eb; color: #fff; }
        .sd-btn-blue:hover { background: #1d4ed8; color: #fff; }

        .sd-scroll { overflow-x: auto; }
        .sd-table { width: 100%; min-width: 760px; border-collapse: collapse; table-layout: fixed; }
        .sd-table th { background: #f8fafc; padding: 14px 24px; font-size: 12px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #64748b; text-align: center; vertical-align: middle; }
        .sd-table td { padding: 16px 24px; font-size: 14px; text-align: center; vertical-align: middle; border-top: 1px solid #f1f5f9; }
        .sd-table th:first-child, .sd-table td:first-child { text-align: left; }
        .sd-table tbody tr { transition: background .2s; }
        .sd-table tbody tr:hover { background: rgba(239,246,255,.6); }

        .sd-student { display: flex; align-items: center; gap: 14px; }
        .sd-avatar { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #fff; font-size: 16px; font-weight: 800; background: linear-gradient(135deg, #3b82f6, #4f46e5); box-shadow: 0 4px 10px rgba(79,70,229,.25); }
        .sd-name { margin: 0; font-weight: 700; color: #1e293b; }
        .sd-id { margin: 3px 0 0; font-size: 12px; color: #94a3b8; }

        .sd-badge { display: inline-flex; align-items: center; justify-content: center; min-width: 84px; padding: 6px 14px; border-radius: 999px; font-size: 12px; font-weight: 700; }
        .sd-badge.male { background: #e0f2fe; color: #0369a1; }
        .sd-badge.female { background: #fce7f3; color: #be185d; }
        .sd-badge.other { background: #f1f5f9; color: #475569; }
        .sd-badge.enroll { min-width: 70px; border-radius: 8px; background: #f1f5f9; color: #475569; font-family: ui-monospace, monospace; }
        .sd-badge.dept { min-width: 96px; border-radius: 8px; background: #eef2ff; color: #4338ca; border: 1px solid #e0e7ff; }

        .sd-view { display: inline-flex; align-items: center; justify-content: center; gap: 6px; width: 92px; height: 36px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; box-shadow: 0 4px 10px rgba(37,99,235,.25); transition: background .2s, transform .2s; }
        .sd-view:hover { background: #1d4ed8; color: #fff; transform: translateY(-1px); }
        .sd-view svg { width: 16px; height: 16px; }

        .sd-empty { text-align: center !important; padding: 56px 24px !important; }
        .sd-empty .sd-icon { margin: 0 auto 14px; background: #f1f5f9; color: #94a3b8; width: 64px; height: 64px; }
        .sd-empty h4 { margin: 0; font-size: 16px; font-weight: 700; color: #334155; }
        .sd-empty p { margin: 6px 0 18px; font-size: 14px; color: #94a3b8; }

        .sd-panel-foot { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 8px; padding: 14px 24px; border-top: 1px solid #f1f5f9; background: #f8fafc; font-size: 12px; color: #64748b; }
        .sd-panel-foot a { font-weight: 700; color: #2563eb; text-decoration: none; }
        .sd-panel-foot a:hover { color: #1d4ed8; }

        .sd-footer { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 8px; font-size: 12px; color: #94a3b8; }

        @media (max-width: 640px) {
            .sd-banner { padding: 28px 22px; }
            .sd-banner h3 { font-size: 24px; }
            .sd-title { font-size: 22px; }
        }
    </style>

    {{-- Header --}}
    <x-slot name="header">
        <div class="sd-head">
            <div>
                <p class="sd-eyebrow">Student Management System</p>
                <h2 class="sd-title">System Dashboard</h2>
                <p class="sd-sub">Welcome back! Here's what's happening in your system.</p>
            </div>

            <a href="{{ route('students.create') }}" class="sd-btn sd-btn-primary">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add New Student
            </a>
        </div>
    </x-slot>

    <div class="sd-page">
        <div class="sd-wrap">

            {{-- Welcome Banner --}}
            <div class="sd-banner">
                <div class="sd-banner-body">
                    <span class="sd-chip"><span class="sd-dot"></span> Dashboard Overview</span>

                    <h3>Manage Your Students Efficiently</h3>

                    <p>Keep track of students, departments, and student enrollment information from one convenient place.</p>

                    <div class="sd-actions">
                        <a href="{{ route('students.index') }}" class="sd-btn sd-btn-white">Manage Students <span>&rarr;</span></a>
                        <a href="{{ route('departments.index') }}" class="sd-btn sd-btn-ghost">Manage Departments</a>
                    </div>
                </div>

                <div class="sd-circle a"></div>
                <div class="sd-circle b"></div>
            </div>

            {{-- Statistics --}}
            <div class="sd-grid">

                {{-- Total Students --}}
                <div class="sd-card">
                    <div class="sd-card-top">
                        <div>
                            <p class="sd-card-label">Total Students</p>
                            <h3 class="sd-card-num">{{ \App\Models\Student::count() }}</h3>
                        </div>
                        <div class="sd-icon blue">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="28" height="28">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a4 4 0 00-5.5-3.7M9 20H2v-2a4 4 0 017.5-1.9M16 3.1a4 4 0 010 7.8M8 3.1a4 4 0 000 7.8M12 14a4 4 0 100-8 4 4 0 000 8z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="sd-card-foot">
                        <span>All registered students</span>
                        <a href="{{ route('students.index') }}" class="sd-link blue">View all &rarr;</a>
                    </div>
                </div>

                {{-- Total Departments --}}
                <div class="sd-card">
                    <div class="sd-card-top">
                        <div>
                            <p class="sd-card-label">Total Departments</p>
                            <h3 class="sd-card-num">{{ \App\Models\Department::count() }}</h3>
                        </div>
                        <div class="sd-icon indigo">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="28" height="28">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h2m-2 4h2m-2 4h2m4-8h2m-2 4h2m-2 4h2M10 21v-3a2 2 0 014 0v3"/>
                            </svg>
                        </div>
                    </div>
                    <div class="sd-card-foot">
                        <span>Available departments</span>
                        <a href="{{ route('departments.index') }}" class="sd-link indigo">View all &rarr;</a>
                    </div>
                </div>

                {{-- System Status --}}
                <div class="sd-card">
                    <div class="sd-card-top">
                        <div>
                            <p class="sd-card-label">System Status</p>
                            <h3 class="sd-card-status"><span class="sd-pulse"></span> Online</h3>
                        </div>
                        <div class="sd-icon green">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="28" height="28">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.6-4A12 12 0 0112 3a12 12 0 01-8.6 3A12 12 0 003 9c0 5.5 3.8 10.2 9 11.6 5.2-1.4 9-6.1 9-11.6 0-1-.1-2-.4-3z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="sd-card-foot">
                        <span>Application interface</span>
                        <span class="sd-ready">Ready</span>
                    </div>
                </div>

            </div>

            {{-- Recent Students --}}
            <div class="sd-panel">

                <div class="sd-panel-head">
                    <div class="sd-panel-title">
                        <div class="sd-icon blue">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 21v-2a6 6 0 0112 0v2M19 8v6m3-3h-6"/>
                            </svg>
                        </div>
                        <div>
                            <h3>Recent Students</h3>
                            <p>The latest students added to the system</p>
                        </div>
                    </div>

                    <a href="{{ route('students.index') }}" class="sd-btn sd-btn-blue sd-btn-sm">
                        View All Students <span>&rarr;</span>
                    </a>
                </div>

                <div class="sd-scroll">
                    <table class="sd-table">
                        <colgroup>
                            <col style="width: 32%">
                            <col style="width: 16%">
                            <col style="width: 16%">
                            <col style="width: 20%">
                            <col style="width: 16%">
                        </colgroup>

                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Gender</th>
                                <th>Enrollment</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse (\App\Models\Student::with('department')->latest()->take(5)->get() as $student)
                                <tr>
                                    <td>
                                        <div class="sd-student">
                                            <div class="sd-avatar">{{ strtoupper(substr($student->student_name ?? '?', 0, 1)) }}</div>
                                            <div>
                                                <p class="sd-name">{{ $student->student_name }}</p>
                                                <p class="sd-id">Student ID: {{ $student->id }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        @if ($student->gender === 'Male')
                                            <span class="sd-badge male">Male</span>
                                        @elseif ($student->gender === 'Female')
                                            <span class="sd-badge female">Female</span>
                                        @else
                                            <span class="sd-badge other">{{ $student->gender ?? 'N/A' }}</span>
                                        @endif
                                    </td>

                                    <td><span class="sd-badge enroll">{{ $student->enrollment }}</span></td>

                                    <td><span class="sd-badge dept">{{ $student->department->dept_name ?? 'No Department' }}</span></td>

                                    <td>
                                        <a href="{{ route('students.show', $student) }}" class="sd-view">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.5 12s3.5-7 9.5-7 9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7z"/>
                                            </svg>
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="sd-empty">
                                        <div class="sd-icon">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="32" height="32">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-5.5-3.7M9 20H2v-2a4 4 0 017.5-1.9M16 3.1a4 4 0 010 7.8M8 3.1a4 4 0 000 7.8"/>
                                            </svg>
                                        </div>
                                        <h4>No Students Yet</h4>
                                        <p>Start by adding your first student.</p>
                                        <a href="{{ route('students.create') }}" class="sd-btn sd-btn-blue sd-btn-sm">+ Add Student</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="sd-panel-foot">
                    <span>Showing the latest 5 student records</span>
                    <a href="{{ route('students.index') }}">Go to Student Management &rarr;</a>
                </div>
            </div>

            {{-- Footer --}}
            <div class="sd-footer">
                <span>Student Management System</span>
                <span>Powered by Laravel</span>
            </div>

        </div>
    </div>

</x-app-layout>
