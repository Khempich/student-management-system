<x-app-layout>

    <style>
        .sd-page { background: #f1f5f9; padding: 32px 16px 40px; min-height: 100vh; }
        .sd-wrap { max-width: 80rem; margin: 0 auto; display: flex; flex-direction: column; gap: 24px; }

        /* Header */
        .sd-head { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; }
        .sd-eyebrow { margin: 0 0 4px; font-size: 12px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: #2563eb; }
        .sd-title { margin: 0; font-size: 26px; font-weight: 800; color: #1e293b; letter-spacing: -.01em; }
        .sd-sub { margin: 4px 0 0; font-size: 14px; color: #64748b; }

        /* Buttons */
        .sd-btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 11px 20px; border-radius: 12px; font-size: 14px; font-weight: 700; text-decoration: none; line-height: 1; border: 0; cursor: pointer; transition: transform .2s, box-shadow .2s, background .2s; white-space: nowrap; }
        .sd-btn:hover { transform: translateY(-2px); }
        .sd-btn svg { width: 18px; height: 18px; flex-shrink: 0; }
        .sd-btn-primary { background: linear-gradient(90deg, #2563eb, #4f46e5); color: #fff; box-shadow: 0 8px 18px rgba(79,70,229,.3); }
        .sd-btn-primary:hover { color: #fff; box-shadow: 0 10px 22px rgba(79,70,229,.4); }
        .sd-btn-blue { background: #2563eb; color: #fff; }
        .sd-btn-blue:hover { background: #1d4ed8; color: #fff; }

        /* Alerts */
        .sd-alert { border-radius: 14px; padding: 14px 18px; font-size: 14px; font-weight: 500; }
        .sd-alert.ok { background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; }
        .sd-alert.err { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .sd-alert ul { margin: 0; padding-left: 20px; list-style: disc; }

        /* Panel */
        .sd-panel { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; overflow: hidden; box-shadow: 0 1px 3px rgba(15,23,42,.06); }
        .sd-panel-head { display: flex; align-items: center; gap: 14px; padding: 22px 24px; border-bottom: 1px solid #f1f5f9; }
        .sd-icon { width: 42px; height: 42px; border-radius: 12px; display: flex; align-items: center; justify-content: center; background: #eef2ff; color: #4f46e5; flex-shrink: 0; }
        .sd-icon svg { width: 22px; height: 22px; }
        .sd-panel-head h3 { margin: 0; font-size: 18px; font-weight: 800; color: #1e293b; }
        .sd-panel-head p { margin: 3px 0 0; font-size: 12px; color: #94a3b8; }

        /* Table */
        .sd-scroll { overflow-x: auto; }
        .sd-table { width: 100%; min-width: 640px; border-collapse: collapse; table-layout: fixed; }
        .sd-table th { background: #f8fafc; padding: 14px 16px; font-size: 12px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #64748b; text-align: center; vertical-align: middle; border-bottom: 1px solid #e2e8f0; }
        .sd-table td { padding: 14px 16px; font-size: 14px; color: #475569; text-align: center; vertical-align: middle; border-top: 1px solid #f1f5f9; }
        .sd-table tbody tr:first-child td { border-top: 0; }
        .sd-table tbody tr { transition: background .2s; }
        .sd-table tbody tr:hover { background: rgba(239,246,255,.6); }
        .sd-table th.left, .sd-table td.left { text-align: left; padding-left: 24px; }

        .sd-muted { color: #94a3b8; font-weight: 600; }
        .sd-dept { display: flex; align-items: center; gap: 12px; }
        .sd-avatar { width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #fff; font-size: 15px; font-weight: 800; background: linear-gradient(135deg, #6366f1, #4338ca); box-shadow: 0 4px 10px rgba(79,70,229,.25); }
        .sd-name { font-weight: 700; color: #1e293b; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

        .sd-badge { display: inline-flex; align-items: center; justify-content: center; min-width: 48px; padding: 6px 14px; border-radius: 999px; font-size: 13px; font-weight: 800; background: #dbeafe; color: #1d4ed8; }

        /* Row actions */
        .sd-actions { display: flex; align-items: center; justify-content: center; gap: 8px; }
        .sd-actions form { margin: 0; display: inline-flex; }
        .sd-act { display: inline-flex; align-items: center; justify-content: center; gap: 6px; height: 36px; min-width: 88px; padding: 0 14px; border-radius: 10px; border: 0; font-size: 13px; font-weight: 700; text-decoration: none; cursor: pointer; transition: background .2s, color .2s, transform .2s; }
        .sd-act:hover { transform: translateY(-1px); }
        .sd-act svg { width: 15px; height: 15px; flex-shrink: 0; }
        .sd-act.edit { background: #dbeafe; color: #1d4ed8; } .sd-act.edit:hover { background: #2563eb; color: #fff; }
        .sd-act.del { background: #fee2e2; color: #b91c1c; } .sd-act.del:hover { background: #dc2626; color: #fff; }

        /* Empty */
        .sd-empty { text-align: center !important; padding: 56px 24px !important; }
        .sd-empty h4 { margin: 0; font-size: 17px; font-weight: 700; color: #334155; }
        .sd-empty p { margin: 6px 0 0; font-size: 14px; color: #94a3b8; }

        /* Footer */
        .sd-pagination { padding: 16px 24px; border-top: 1px solid #f1f5f9; }
        .sd-pagination:empty { display: none; }
        .sd-panel-foot { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 8px; padding: 14px 24px; border-top: 1px solid #f1f5f9; background: #f8fafc; font-size: 13px; color: #64748b; }
        .sd-panel-foot b { color: #2563eb; font-weight: 800; }
        .sd-panel-foot small { font-size: 12px; color: #94a3b8; }

        @media (max-width: 640px) { .sd-title { font-size: 22px; } }
    </style>

    <x-slot name="header">
        <div class="sd-head">
            <div>
                <p class="sd-eyebrow">Student Management System</p>
                <h2 class="sd-title">Department Management</h2>
                <p class="sd-sub">Manage your departments and students.</p>
            </div>

            <a href="{{ route('departments.create') }}" class="sd-btn sd-btn-primary">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Add Department
            </a>
        </div>
    </x-slot>

    <div class="sd-page">
        <div class="sd-wrap">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="sd-alert ok">{{ session('success') }}</div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="sd-alert err">{{ session('error') }}</div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="sd-alert err">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="sd-panel">

                <div class="sd-panel-head">
                    <div class="sd-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="22" height="22">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h2m-2 4h2m-2 4h2m4-8h2m-2 4h2m-2 4h2M10 21v-3a2 2 0 014 0v3"/>
                        </svg>
                    </div>
                    <div>
                        <h3>All Departments</h3>
                        <p>List of departments and their total students</p>
                    </div>
                </div>

                {{-- Department Table --}}
                <div class="sd-scroll">
                    <table class="sd-table">
                        <colgroup>
                            <col style="width: 12%">
                            <col style="width: 38%">
                            <col style="width: 20%">
                            <col style="width: 30%">
                        </colgroup>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="left">Department Name</th>
                                <th>Total Students</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($departments as $department)
                                <tr>
                                    <td class="sd-muted">#{{ $department->id }}</td>

                                    <td class="left">
                                        <div class="sd-dept">
                                            <div class="sd-avatar">{{ strtoupper(substr($department->dept_name ?? '?', 0, 1)) }}</div>
                                            <span class="sd-name">{{ $department->dept_name }}</span>
                                        </div>
                                    </td>

                                    <td><span class="sd-badge">{{ $department->students_count }}</span></td>

                                    <td>
                                        <div class="sd-actions">

                                            <a href="{{ route('departments.edit', $department) }}" class="sd-act edit">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.586-8.414a2 2 0 112.828 2.828L11.5 16H8v-3.5l9.414-9.414z"/>
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('departments.destroy', $department) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this department?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="sd-act del">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="sd-empty">
                                        <h4>No departments found</h4>
                                        <p>Click "Add Department" to create your first department.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="sd-pagination">
                    {{ $departments->links() }}
                </div>

                <div class="sd-panel-foot">
                    <span>Total departments displayed on this page: <b>{{ $departments->count() }}</b></span>
                    <small>Student Management System</small>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
