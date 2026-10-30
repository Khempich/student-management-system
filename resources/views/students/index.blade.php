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
        .sd-btn-dark { background: #1e293b; color: #fff; }
        .sd-btn-dark:hover { background: #0f172a; color: #fff; }
        .sd-btn-light { background: #fff; color: #475569; border: 1px solid #cbd5e1; }
        .sd-btn-light:hover { background: #f1f5f9; color: #1e293b; }

        /* Alerts */
        .sd-alert { border-radius: 14px; padding: 14px 18px; font-size: 14px; font-weight: 500; }
        .sd-alert.ok { background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; }
        .sd-alert.err { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .sd-alert ul { margin: 0; padding-left: 20px; list-style: disc; }

        /* Panel */
        .sd-panel { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; overflow: hidden; box-shadow: 0 1px 3px rgba(15,23,42,.06); }

        /* Filter bar */
        .sd-filter { display: flex; flex-wrap: wrap; align-items: flex-end; gap: 16px; padding: 22px 24px; border-bottom: 1px solid #f1f5f9; background: #fff; }
        .sd-field { flex: 1 1 220px; min-width: 200px; }
        .sd-field label { display: block; margin-bottom: 8px; font-size: 13px; font-weight: 700; color: #475569; }
        .sd-input { width: 100%; height: 44px; padding: 0 14px; border: 1px solid #cbd5e1; border-radius: 12px; background: #f8fafc; font-size: 14px; color: #1e293b; box-sizing: border-box; transition: border-color .2s, box-shadow .2s, background .2s; }
        .sd-input:focus { outline: none; background: #fff; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,.18); }
        .sd-filter .sd-btn { height: 44px; padding: 0 20px; }

        /* Table */
        .sd-scroll { overflow-x: auto; }
        .sd-table { width: 100%; min-width: 1040px; border-collapse: collapse; table-layout: fixed; }
        .sd-table th { background: #f8fafc; padding: 14px 16px; font-size: 12px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #64748b; text-align: center; vertical-align: middle; border-bottom: 1px solid #e2e8f0; }
        .sd-table td { padding: 14px 16px; font-size: 14px; color: #475569; text-align: center; vertical-align: middle; border-top: 1px solid #f1f5f9; }
        .sd-table tbody tr:first-child td { border-top: 0; }
        .sd-table tbody tr { transition: background .2s; }
        .sd-table tbody tr:hover { background: rgba(239,246,255,.6); }
        .sd-table th.left, .sd-table td.left { text-align: left; padding-left: 24px; }

        .sd-student { display: flex; align-items: center; gap: 12px; }
        .sd-avatar { width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #fff; font-size: 15px; font-weight: 800; background: linear-gradient(135deg, #3b82f6, #4f46e5); box-shadow: 0 4px 10px rgba(79,70,229,.25); }
        .sd-name { font-weight: 700; color: #1e293b; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .sd-muted { color: #94a3b8; font-weight: 600; }

        .sd-badge { display: inline-flex; align-items: center; justify-content: center; min-width: 78px; padding: 6px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; }
        .sd-badge.male { background: #e0f2fe; color: #0369a1; }
        .sd-badge.female { background: #fce7f3; color: #be185d; }
        .sd-badge.other { background: #f1f5f9; color: #475569; }
        .sd-badge.enroll { min-width: 64px; border-radius: 8px; background: #eef2ff; color: #4338ca; font-family: ui-monospace, monospace; }
        .sd-badge.dept { min-width: 92px; border-radius: 8px; background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0; }

        /* Row actions */
        .sd-actions { display: flex; align-items: center; justify-content: center; gap: 6px; }
        .sd-actions form { margin: 0; display: inline-flex; }
        .sd-act { display: inline-flex; align-items: center; justify-content: center; gap: 5px; height: 34px; padding: 0 12px; border-radius: 9px; border: 0; font-size: 13px; font-weight: 700; text-decoration: none; cursor: pointer; transition: background .2s, color .2s, transform .2s; }
        .sd-act:hover { transform: translateY(-1px); }
        .sd-act svg { width: 15px; height: 15px; flex-shrink: 0; }
        .sd-act.view { background: #d1fae5; color: #047857; } .sd-act.view:hover { background: #059669; color: #fff; }
        .sd-act.edit { background: #dbeafe; color: #1d4ed8; } .sd-act.edit:hover { background: #2563eb; color: #fff; }
        .sd-act.del { background: #fee2e2; color: #b91c1c; } .sd-act.del:hover { background: #dc2626; color: #fff; }

        /* Empty */
        .sd-empty { text-align: center !important; padding: 56px 24px !important; }
        .sd-empty h4 { margin: 0; font-size: 17px; font-weight: 700; color: #334155; }
        .sd-empty p { margin: 6px 0 18px; font-size: 14px; color: #94a3b8; }

        /* Footer */
        .sd-pagination { padding: 16px 24px; border-top: 1px solid #f1f5f9; }
        .sd-pagination:empty { display: none; }
        .sd-panel-foot { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 8px; padding: 14px 24px; border-top: 1px solid #f1f5f9; background: #f8fafc; font-size: 13px; color: #64748b; }
        .sd-panel-foot b { color: #2563eb; font-weight: 800; }
        .sd-panel-foot small { font-size: 12px; color: #94a3b8; }

        @media (max-width: 640px) {
            .sd-title { font-size: 22px; }
            .sd-filter .sd-btn { flex: 1; }
        }
    </style>

    <x-slot name="header">
        <div class="sd-head">
            <div>
                <p class="sd-eyebrow">Student Management System</p>
                <h2 class="sd-title">Student Management</h2>
                <p class="sd-sub">Search, filter and manage all registered students.</p>
            </div>

            <a href="{{ route('students.create') }}" class="sd-btn sd-btn-primary">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Add Student
            </a>
        </div>
    </x-slot>

    <div class="sd-page">
        <div class="sd-wrap">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="sd-alert ok">{{ session('success') }}</div>
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

                {{-- Search and Filter --}}
                <form action="{{ route('students.index') }}" method="GET" class="sd-filter">

                    <div class="sd-field">
                        <label for="search">Search Student</label>
                        <input type="text" id="search" name="search" value="{{ request('search') }}"
                               placeholder="Enter student name or enrollment..." class="sd-input">
                    </div>

                    <div class="sd-field">
                        <label for="dept_id">Filter by Department</label>
                        <select id="dept_id" name="dept_id" class="sd-input">
                            <option value="">All Departments</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                        @selected((string) request('dept_id') === (string) $department->id)>
                                    {{ $department->dept_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="sd-btn sd-btn-dark">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                            <circle cx="11" cy="11" r="7" stroke-width="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 16 4 4"/>
                        </svg>
                        Search
                    </button>

                    <a href="{{ route('students.index') }}" class="sd-btn sd-btn-light">Reset</a>
                </form>

                {{-- Students Table --}}
                <div class="sd-scroll">
                    <table class="sd-table">
                        <colgroup>
                            <col style="width: 8%">
                            <col style="width: 18%">
                            <col style="width: 10%">
                            <col style="width: 12%">
                            <col style="width: 12%">
                            <col style="width: 14%">
                            <col style="width: 26%">
                        </colgroup>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="left">Student Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Enrollment</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td class="sd-muted">#{{ $student->id }}</td>

                                    <td class="left">
                                        <div class="sd-student">
                                            <div class="sd-avatar">{{ strtoupper(substr($student->student_name ?? '?', 0, 1)) }}</div>
                                            <span class="sd-name">{{ $student->student_name }}</span>
                                        </div>
                                    </td>

                                    <td>
                                        @if (strtolower($student->gender ?? '') === 'male')
                                            <span class="sd-badge male">Male</span>
                                        @elseif (strtolower($student->gender ?? '') === 'female')
                                            <span class="sd-badge female">Female</span>
                                        @else
                                            <span class="sd-badge other">{{ $student->gender ?? 'Not specified' }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $student->dob ? \Illuminate\Support\Carbon::parse($student->dob)->format('Y-m-d') : '—' }}
                                    </td>

                                    <td><span class="sd-badge enroll">{{ $student->enrollment }}</span></td>

                                    <td><span class="sd-badge dept">{{ $student->department->dept_name ?? 'No Department' }}</span></td>

                                    <td>
                                        <div class="sd-actions">

                                            <a href="{{ route('students.show', $student) }}" title="View Student" class="sd-act view">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                View
                                            </a>

                                            <a href="{{ route('students.edit', $student) }}" title="Edit Student" class="sd-act edit">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="15" height="15">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.586-8.414a2 2 0 112.828 2.828L11.5 16H8v-3.5l9.414-9.414z"/>
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('students.destroy', $student) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this student?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" title="Delete Student" class="sd-act del">
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
                                    <td colspan="7" class="sd-empty">
                                        <h4>No students found</h4>
                                        <p>Try changing your search or department filter.</p>
                                        <a href="{{ route('students.create') }}" class="sd-btn sd-btn-blue">Add Student</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="sd-pagination">
                    {{ $students->appends(request()->query())->links() }}
                </div>

                {{-- Footer --}}
                <div class="sd-panel-foot">
                    <span>Total students displayed on this page: <b>{{ $students->count() }}</b></span>
                    <small>Student Management System</small>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
