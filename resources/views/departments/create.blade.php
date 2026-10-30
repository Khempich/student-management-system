<x-app-layout>

    <style>
        .sd-page { background: #f1f5f9; padding: 32px 16px 40px; min-height: 100vh; }
        .sd-wrap { max-width: 40rem; margin: 0 auto; display: flex; flex-direction: column; gap: 24px; }

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

        /* Alerts */
        .sd-alert { border-radius: 14px; padding: 14px 18px; font-size: 14px; font-weight: 500; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .sd-alert ul { margin: 0; padding-left: 20px; list-style: disc; }

        /* Form card */
        .sd-panel { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; overflow: hidden; box-shadow: 0 1px 3px rgba(15,23,42,.06); }
        .sd-banner { display: flex; align-items: center; gap: 16px; padding: 26px 28px; color: #fff; background: linear-gradient(120deg, #1d4ed8, #4338ca 55%, #6366f1); }
        .sd-banner-icon { width: 52px; height: 52px; border-radius: 16px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,.16); border: 1px solid rgba(255,255,255,.25); flex-shrink: 0; }
        .sd-banner-icon svg { width: 26px; height: 26px; }
        .sd-banner h3 { margin: 0; font-size: 22px; font-weight: 800; }
        .sd-banner p { margin: 4px 0 0; font-size: 14px; color: #dbeafe; }

        .sd-form { padding: 28px; }
        .sd-field label { display: block; margin-bottom: 8px; font-size: 13px; font-weight: 700; color: #475569; }
        .sd-field label span { color: #ef4444; }
        .sd-input { width: 100%; height: 46px; padding: 0 14px; border: 1px solid #cbd5e1; border-radius: 12px; background: #f8fafc; font-size: 14px; color: #1e293b; box-sizing: border-box; transition: border-color .2s, box-shadow .2s, background .2s; }
        .sd-input:focus { outline: none; background: #fff; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,.18); }
        .sd-input.invalid { border-color: #f87171; background: #fef2f2; }
        .sd-error { margin: 6px 0 0; font-size: 12px; font-weight: 600; color: #dc2626; }

        .sd-form-foot { display: flex; flex-wrap: wrap; align-items: center; gap: 12px; margin-top: 28px; padding-top: 22px; border-top: 1px solid #f1f5f9; }

        @media (max-width: 640px) {
            .sd-form { padding: 20px; }
            .sd-banner { padding: 20px; }
            .sd-title { font-size: 22px; }
            .sd-form-foot .sd-btn { flex: 1; }
        }
    </style>

    <x-slot name="header">
        <div class="sd-head">
            <div>
                <p class="sd-eyebrow">Student Management System</p>
                <h2 class="sd-title">Create Department</h2>
                <p class="sd-sub">Add a new department to the system.</p>
            </div>

            <a href="{{ route('departments.index') }}" class="sd-back">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Departments
            </a>
        </div>
    </x-slot>

    <div class="sd-page">
        <div class="sd-wrap">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="sd-alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="sd-panel">

                {{-- Banner --}}
                <div class="sd-banner">
                    <div class="sd-banner-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="26" height="26">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h2m-2 4h2m-2 4h2m4-8h2m-2 4h2m-2 4h2M10 21v-3a2 2 0 014 0v3"/>
                        </svg>
                    </div>
                    <div>
                        <h3>Create New Department</h3>
                        <p>Enter the department information below.</p>
                    </div>
                </div>

                {{-- Create Department Form --}}
                <form action="{{ route('departments.store') }}" method="POST" class="sd-form">
                    @csrf

                    {{-- Department Name --}}
                    <div class="sd-field">
                        <label for="dept_name">Department Name <span>*</span></label>
                        <input type="text" id="dept_name" name="dept_name"
                               value="{{ old('dept_name') }}"
                               placeholder="Enter department name"
                               class="sd-input @error('dept_name') invalid @enderror" required>
                        @error('dept_name') <p class="sd-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="sd-form-foot">
                        <button type="submit" class="sd-btn sd-btn-primary">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            Save Department
                        </button>

                        <a href="{{ route('departments.index') }}" class="sd-btn sd-btn-light">Cancel</a>
                    </div>
                </form>

            </div>

        </div>
    </div>

</x-app-layout>