<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'User Management')</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  :root {
    --bg: #0f1117; --surface: #1a1d27; --surface2: #21253a;
    --border: rgba(255,255,255,0.07); --border2: rgba(255,255,255,0.13);
    --text: #e8eaf0; --text-muted: #7a7f9a;
    --accent: #4f6ef7; --accent-glow: rgba(79,110,247,0.18);
    --danger: #ef4444; --danger-bg: rgba(239,68,68,0.12);
    --warning: #f59e0b; --warning-bg: rgba(245,158,11,0.12);
    --success: #10b981; --success-bg: rgba(16,185,129,0.12);
    --radius: 10px; --radius-lg: 16px;
  }
  body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }

  /* Sidebar */
  .sidebar {
    position: fixed; top: 0; left: 0; width: 240px; height: 100vh;
    background: var(--surface); border-right: 1px solid var(--border);
    display: flex; flex-direction: column; padding: 1.5rem 1rem; z-index: 50;
  }
  .sidebar-logo {
    font-size: 1.1rem; font-weight: 700; color: #fff; margin-bottom: 2rem;
    display: flex; align-items: center; gap: 10px; padding: 0 0.5rem;
  }
  .sidebar-logo span { font-size: 1.4rem; }
  .nav-label {
    font-size: 0.65rem; font-weight: 700; color: var(--text-muted);
    letter-spacing: 0.1em; text-transform: uppercase; padding: 0 0.5rem;
    margin-bottom: 0.5rem; margin-top: 1rem;
  }
  .nav-item {
    display: flex; align-items: center; gap: 10px; padding: 0.6rem 0.75rem;
    border-radius: var(--radius); color: var(--text-muted); text-decoration: none;
    font-size: 0.875rem; font-weight: 500; transition: all .15s; margin-bottom: 2px;
  }
  .nav-item:hover { background: var(--surface2); color: var(--text); }
  .nav-item.active { background: var(--accent-glow); color: #7a9bf8; }
  .nav-item svg { flex-shrink: 0; }

  /* Main */
  .main { margin-left: 240px; padding: 2rem; min-height: 100vh; }

  /* Topbar */
  .topbar {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 2rem;
  }
  .page-title h1 { font-size: 1.5rem; font-weight: 700; color: #fff; letter-spacing: -0.02em; }
  .page-title p { font-size: 0.85rem; color: var(--text-muted); margin-top: 3px; }

  /* Buttons */
  .btn {
    height: 40px; padding: 0 18px; border-radius: var(--radius);
    font-size: 0.875rem; font-weight: 600; font-family: inherit;
    cursor: pointer; border: none; transition: all .15s;
    display: inline-flex; align-items: center; gap: 7px; text-decoration: none; white-space: nowrap;
  }
  .btn-primary { background: var(--accent); color: #fff; }
  .btn-primary:hover { background: #6378f8; transform: translateY(-1px); }
  .btn-ghost { background: var(--surface); color: var(--text-muted); border: 1px solid var(--border2); }
  .btn-ghost:hover { background: var(--surface2); color: var(--text); }
  .btn-danger { background: var(--danger-bg); color: var(--danger); border: 1px solid rgba(239,68,68,0.2); }
  .btn-danger:hover { background: rgba(239,68,68,0.2); }
  .btn-warning { background: var(--warning-bg); color: var(--warning); border: 1px solid rgba(245,158,11,0.2); }
  .btn-warning:hover { background: rgba(245,158,11,0.2); }
  .btn-sm { height: 32px; padding: 0 12px; font-size: 0.78rem; }

  /* Alert */
  .alert {
    padding: 0.875rem 1.25rem; border-radius: var(--radius); margin-bottom: 1.25rem;
    font-size: 0.875rem; display: flex; align-items: center; gap: 10px;
  }
  .alert-success { background: var(--success-bg); color: var(--success); border: 1px solid rgba(16,185,129,0.2); }
  .alert-danger  { background: var(--danger-bg);  color: var(--danger);  border: 1px solid rgba(239,68,68,0.2); }

  /* Card */
  .card {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: var(--radius-lg); overflow: hidden;
  }
  .card-body { padding: 1.5rem; }

  /* Form */
  .form-group { margin-bottom: 1.1rem; }
  .form-group label {
    display: block; font-size: 0.78rem; font-weight: 700; color: var(--text-muted);
    margin-bottom: 6px; text-transform: uppercase; letter-spacing: .04em;
  }
  .form-control {
    width: 100%; height: 42px; padding: 0 14px;
    background: var(--surface2); border: 1px solid var(--border2);
    border-radius: var(--radius); color: var(--text); font-size: 0.875rem;
    font-family: inherit; outline: none; transition: border-color .2s;
  }
  .form-control:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-glow); }
  .form-control.is-invalid { border-color: var(--danger); }
  .invalid-feedback { color: var(--danger); font-size: 0.78rem; margin-top: 5px; }

  /* Table */
  .table-wrap { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg); overflow: hidden; }
  table { width: 100%; border-collapse: collapse; }
  thead th {
    background: rgba(255,255,255,0.03); padding: 13px 18px;
    font-size: 0.72rem; font-weight: 700; color: var(--text-muted);
    text-align: left; letter-spacing: 0.06em; text-transform: uppercase;
    border-bottom: 1px solid var(--border); white-space: nowrap;
  }
  tbody tr { border-bottom: 1px solid var(--border); transition: background .15s; }
  tbody tr:last-child { border-bottom: none; }
  tbody tr:hover { background: rgba(255,255,255,0.025); }
  td { padding: 14px 18px; font-size: 0.875rem; color: var(--text); vertical-align: middle; }

  .id-badge {
    display: inline-flex; align-items: center; justify-content: center;
    width: 28px; height: 28px; background: var(--accent-glow); color: #7a9bf8;
    border-radius: 7px; font-size: 0.75rem; font-weight: 700;
  }
  .avatar {
    width: 34px; height: 34px; border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 0.75rem; font-weight: 700; color: #fff;
    margin-right: 10px; flex-shrink: 0;
  }
  .name-cell { display: flex; align-items: center; }
  .email-cell { color: var(--text-muted); font-size: 0.82rem; }

  /* Pagination */
  .pagination-wrap {
    display: flex; align-items: center; justify-content: space-between;
    padding: 14px 20px; border-top: 1px solid var(--border); flex-wrap: wrap; gap: 10px;
  }
  .pagination-info { font-size: 0.8rem; color: var(--text-muted); }
  .pagination-info b { color: var(--text); }
  .pagination { display: flex; align-items: center; gap: 4px; }
  .page-link {
    width: 34px; height: 34px; border-radius: 8px; border: 1px solid var(--border2);
    background: transparent; color: var(--text-muted); font-size: 0.85rem;
    font-weight: 500; cursor: pointer; font-family: inherit;
    display: inline-flex; align-items: center; justify-content: center;
    text-decoration: none; transition: all .15s;
  }
  .page-link:hover { background: var(--surface2); color: var(--text); }
  .page-link.active { background: var(--accent); color: #fff; border-color: var(--accent); }
  .page-link.disabled { opacity: 0.3; pointer-events: none; }

  /* Detail row */
  .detail-row {
    display: flex; padding: 0.875rem 0;
    border-bottom: 1px solid var(--border); font-size: 0.875rem;
  }
  .detail-row:last-child { border-bottom: none; }
  .detail-label { width: 160px; color: var(--text-muted); font-weight: 600; font-size: 0.8rem; flex-shrink: 0; }
  .detail-value { color: var(--text); }

  /* Responsive */
  @media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); }
    .main { margin-left: 0; padding: 1rem; }
  }
</style>
@stack('styles')
</head>
<body>

<!-- Sidebar -->
<nav class="sidebar">
  <div class="sidebar-logo">
    <span>⚡</span> AdminPanel
  </div>

  <div class="nav-label">Menu</div>
  <a href="{{ url('/') }}" class="nav-item {{ request()->is('/') ? 'active' : '' }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
    Dashboard
  </a>
  <a href="{{ route('users.index') }}" class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
    Users
  </a>
  <a href="{{ route('destinations.index') }}" class="nav-item {{ request()->routeIs('destinations.*') ? 'active' : '' }}">
    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
    Destinasi
  </a>

  <div style="margin-top: auto;">
    <div class="nav-label">Akun</div>
    
      @csrf
      <button type="submit" class="nav-item" style="width:100%;background:none;border:none;cursor:pointer;color:var(--text-muted);">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Logout
      </button>
    </form>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-outline-light rounded-pill,
      px-4 fw-bold">Logout</button>
    </form>

  </div>
</nav>

<!-- Main Content -->
<main class="main">
  @if(session('success'))
    <div class="alert alert-success">✓ {{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger">✕ {{ session('error') }}</div>
  @endif

  @yield('content')
</main>

@stack('scripts')
</body>
</html>
