<x-app-layout>

    <style>
        .sd-page { background: #f1f5f9; padding: 32px 16px 40px; min-height: 100vh; }
        .sd-wrap { max-width: 52rem; margin: 0 auto; display: flex; flex-direction: column; gap: 24px; }

        /* Header */
        .sd-head { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; }
        .sd-eyebrow { margin: 0 0 4px; font-size: 12px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; color: #2563eb; }
        .sd-title { margin: 0; font-size: 26px; font-weight: 800; color: #1e293b; letter-spacing: -.01em; }
        .sd-sub { margin: 4px 0 0; font-size: 14px; color: #64748b; }
        .sd-back { display: inline-flex; align-items: center; gap: 6px; font-size: 14px; font-weight: 600; color: #64748b; text-decoration: none; }
        .sd-back:hover { color: #2563eb; }
        .sd-back svg { width: 16px; height: 16px; }

        /* Buttons */
        .sd-btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; height: 46px; padding: 0 26px; border-radius: 12px; font-size: 14px; font-weight: 700; text-decoration: none; line-height: 1; border: 0; cursor: pointer; transition: transform .2s, box-shadow .2s, background .2s; white-space: nowrap; }
        .sd-btn:hover { transform: translateY(-2px); }
        .sd-btn svg { width: 18px; height: 18px; flex-shrink: 0; }
        .sd-btn-primary { background: linear-gradient(90deg, #2563eb, #4f46e5); color: #fff; box-shadow: 0 8px 18px rgba(79,70,229,.3); }
        .sd-btn-primary:hover { color: #fff; box-shadow: 0 10px 22px rgba(79,70,229,.4); }
        .sd-btn-light { background: #fff; color: #475569; border: 1px solid #cbd5e1; }
        .sd-btn-light:hover { background: #f1f5f9; color: #1e293b; }

        /* Card */
        .sd-panel { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; overflow: hidden; box-shadow: 0 1px 3px rgba(15,23,42,.06); }

        .sd-banner { position: relative; overflow: hidden; display: flex; align-items: center; gap: 20px; padding: 32px 28px; color: #fff; background: linear-gradient(120deg, #1d4ed8, #4338ca 55%, #6366f1); }
        .sd-banner > * { position: relative; z-index: 2; }
        .sd-circle { position: absolute !important; z-index: 1 !important; border-radius: 50%; border: 30px solid rgba(255,255,255,.08); width: 220px; height: 220px; right: -50px; top: -90px; pointer-events: none; }
        .sd-avatar { width: 76px; height: 76px; border-radius: 22px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 32px; font-weight: 800; color: #fff; background: rgba(255,255,255,.18); border: 1px solid rgba(255,255,255,.35); }
        .sd-banner h3 { margin: 0; font-size: 26px; font-weight: 800; line-height: 1.2; }
        .sd-chips { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 12px; }
        .sd-chip { display: inline-flex; align-items: center; padding: 5px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; background: rgba(255,255,255,.16); border: 1px solid rgba(255,255,255,.28); }

        .sd-body { padding: 28px; }
        .sd-section { margin: 0 0 16px; font-size: 13px; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; color: #94a3b8; }
        .sd-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        .sd-tile { display: flex; align-items: center; gap: 14px; padding: 16px 18px; border: 1px solid #e2e8f0; border-radius: 16px; background: #f8fafc; }
        .sd-tile-icon { width: 42px; height: 42px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .sd-tile-icon svg { width: 21px; height: 21px; }
        .sd-tile-icon.blue { background: #dbeafe; color: #2563eb; }
        .sd-tile-icon.pink { background: #fce7f3; color: #db2777; }
        .sd-tile-icon.indigo { background: #e0e7ff; color: #4f46e5; }
        .sd-tile-icon.green { background: #d1fae5; color: #059669; }
        .sd-tile-icon.amber { background: #fef3c7; color: #d97706; }
        .sd-tile p { margin: 0; }
        .sd-label { font-size: 12px; font-weight: 600; color: #94a3b8; }
        .sd-value { margin-top: 3px !important; font-size: 15px; font-weight: 700; color: #1e293b; }

        .sd-desc { margin-top: 24px; }
        .sd-desc-box { padding: 18px 20px; border: 1px solid #e2e8f0; border-radius: 16px; background: #f8fafc; font-size: 14px; line-height: 1.8; color: #334155; white-space: pre-line; }
        .sd-desc-box.empty { color: #94a3b8; font-style: italic; }

        .sd-foot { display: flex; flex-wrap: wrap; align-items: center; gap: 12px; margin-top: 28px; padding-top: 22px; border-top: 1px solid #f1f5f9; }

        @media (max-width: 640px) {
            .sd-grid { grid-template-columns: 1fr; }
            .sd-banner { flex-direction: column; align-items: flex-start; padding: 24px 20px; }
            .sd-body { padding: 20px; }
            .sd-title { font-size: 22px; }
            .sd-foot .sd-btn { flex: 1; }
        }
    </style>

    <x-slot name="header">
        <div class="sd-head">
            <div>
                <p class="sd-eyebrow">Student Management System</p>
                <h2 class="sd-title">Student Details</h2>
                <p class="sd-sub">View complete information of this student.</p>
            </div>

            <a href="{{ route('students.index') }}" class="sd-back">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Students
            </a>
        </div>
    </x-slot>

    <div class="sd-page">
        <div class="sd-wrap">

            <div class="sd-panel">

                {{-- Profile Banner --}}
                <div class="sd-banner">
                    <div class="sd-circle"></div>

                    <div class="sd-avatar">{{ strtoupper(substr($student->student_name ?? '?', 0, 1)) }}</div>

                    <div>
                        <h3>{{ $student->student_name }}</h3>
                        <div class="sd-chips">
                            <span class="sd-chip">Student ID: {{ $student->id }}</span>
                            <span class="sd-chip">{{ $student->department->dept_name ?? 'No Department' }}</span>
                        </div>
                    </div>
                </div>

                <div class="sd-body">

                    <h4 class="sd-section">Personal & Enrollment Information</h4>

                    <div class="sd-grid">

                        {{-- Gender --}}
                        <div class="sd-tile">
                            <div class="sd-tile-icon pink">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="21" height="21">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 21v-1a6 6 0 016-6h4a6 6 0 016 6v1"/>
                                </svg>
                            </div>
                            <div>
                                <p class="sd-label">Gender</p>
                                <p class="sd-value">{{ $student->gender ?? 'N/A' }}</p>
                            </div>
                        </div>

                        {{-- Date of Birth --}}
                        <div class="sd-tile">
                            <div class="sd-tile-icon blue">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="21" height="21">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="sd-label">Date of Birth</p>
                                <p class="sd-value">
                                    {{ $student->dob
                                        ? \Illuminate\Support\Carbon::parse($student->dob)->format('Y-m-d')
                                        : 'N/A' }}
                                </p>
                            </div>
                        </div>

                        {{-- Enrollment Number --}}
                        <div class="sd-tile">
                            <div class="sd-tile-icon indigo">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="21" height="21">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                            </div>
                            <div>
                                <p class="sd-label">Enrollment Number</p>
                                <p class="sd-value">{{ $student->enrollment }}</p>
                            </div>
                        </div>

                        {{-- Enrollment Date --}}
                        <div class="sd-tile">
                            <div class="sd-tile-icon green">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="21" height="21">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="sd-label">Enrollment Date</p>
                                <p class="sd-value">
                                    {{ $student->enrollment_date
                                        ? \Illuminate\Support\Carbon::parse($student->enrollment_date)->format('Y-m-d')
                                        : 'N/A' }}
                                </p>
                            </div>
                        </div>

                        {{-- Department --}}
                        <div class="sd-tile" style="grid-column: 1 / -1;">
                            <div class="sd-tile-icon amber">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="21" height="21">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h2m-2 4h2m-2 4h2m4-8h2m-2 4h2m-2 4h2M10 21v-3a2 2 0 014 0v3"/>
                                </svg>
                            </div>
                            <div>
                                <p class="sd-label">Department</p>
                                <p class="sd-value">{{ $student->department->dept_name ?? 'No Department' }}</p>
                            </div>
                        </div>

                    </div>

                    {{-- Description --}}
                    <div class="sd-desc">
                        <h4 class="sd-section">Description</h4>
                        <div class="sd-desc-box {{ $student->description ? '' : 'empty' }}">{{ $student->description ?: 'No description available.' }}</div>
                    </div>

                    {{-- Buttons --}}
                    <div class="sd-foot">
                        <a href="{{ route('students.edit', $student) }}" class="sd-btn sd-btn-primary">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.586-8.414a2 2 0 112.828 2.828L11.5 16H8v-3.5l9.414-9.414z"/>
                            </svg>
                            Edit Student
                        </a>

                        <a href="{{ route('students.index') }}" class="sd-btn sd-btn-light">Back to Students</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
