<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Product Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #001f3f;
            --primary-blue: #0052cc;
            --primary-bright: #1e90ff;
            --secondary-blue: #00d4ff;
            --light-bg: #f5f7fa;
            --card-shadow: 0 4px 20px rgba(0, 82, 204, 0.15);
            --gradient-primary: linear-gradient(135deg, #0052cc 0%, #1e90ff 100%);
            --gradient-dark: linear-gradient(135deg, #001f3f 0%, #0052cc 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(180deg, #f5f7fa 0%, #e8ecf1 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            padding-top: 70px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styling */
        .navbar {
            background: var(--gradient-dark);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            border-bottom: 3px solid var(--secondary-blue);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            color: #fff !important;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            border-radius: 6px;
            padding: 0.5rem 1rem !important;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff !important;
        }

        /* Main Content */
        .container-lg {
            flex: 1;
            padding: 2rem 1rem;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: all 0.3s ease;
            border-top: 5px solid var(--primary-blue);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 82, 204, 0.25);
        }

        .card-header {
            background: var(--gradient-primary) !important;
            color: white;
            border: none;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.25rem;
            letter-spacing: 0.3px;
        }

        .card-body {
            padding: 2rem;
            background-color: #fff;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            transition: all 0.3s ease;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 82, 204, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #003d99 0%, #1678d9 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(0, 82, 204, 0.4);
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ff9800 0%, #ffb74d 100%);
            color: white;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #f57c00 0%, #ffa726 100%);
            color: white;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #f44336 0%, #e91e63 100%);
            color: white;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #d32f2f 0%, #c2185b 100%);
            color: white;
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }

        /* Forms */
        .form-label {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.7rem;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        .form-control,
        .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 0.85rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: #fafbfc;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(0, 82, 204, 0.15);
            background-color: #fff;
        }

        .input-group-text {
            background: linear-gradient(135deg, #0052cc 0%, #1e90ff 100%);
            color: white;
            border: none;
            font-weight: 600;
        }

        /* Alerts */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 1.2rem;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .alert-success {
            background: linear-gradient(135deg, #4caf50 0%, #66bb6a 100%);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f44336 0%, #e91e63 100%);
            color: white;
        }

        .alert-info {
            background: linear-gradient(135deg, #2196f3 0%, #42a5f5 100%);
            color: white;
        }

        .alert ul {
            margin-bottom: 0;
            padding-left: 1.5rem;
        }

        .alert li {
            margin-bottom: 0.3rem;
        }

        /* Tables */
        .table {
            color: #333;
            font-weight: 500;
        }

        .table thead {
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
        }

        .table thead th {
            border: none;
            color: var(--primary-dark);
            font-weight: 700;
            padding: 1.2rem 1rem;
            letter-spacing: 0.3px;
            border-bottom: 3px solid var(--primary-blue);
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #e8ecf1;
        }

        .table tbody tr:hover {
            background-color: #f8f9fb;
        }

        .table tbody td {
            vertical-align: middle;
            padding: 1rem;
            color: #555;
        }

        /* Badges */
        .badge {
            padding: 0.6rem 0.9rem;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.3px;
            border-radius: 6px;
        }

        .badge.bg-secondary {
            background: var(--gradient-primary) !important;
        }

        .badge.bg-info {
            background: linear-gradient(135deg, #00bcd4 0%, #00d4ff 100%) !important;
        }

        .badge.bg-success {
            background: linear-gradient(135deg, #4caf50 0%, #66bb6a 100%) !important;
        }

        /* Action Buttons Group */
        .btn-group-action {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        /* Page Header */
        h1, h2, h3 {
            color: var(--primary-dark);
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        /* Footer */
        footer {
            background: var(--gradient-dark);
            color: white;
            border-top: 3px solid var(--secondary-blue);
            margin-top: auto;
            padding: 2rem 0 !important;
        }

        footer p {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container-lg {
                padding: 1rem 0.5rem;
            }

            .card-body {
                padding: 1.5rem 1rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }

            .d-grid {
                gap: 0.5rem !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-lg">
            <a class="navbar-brand" href="{{ route('products.index') }}">
                📦 Product Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">📊 Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}">➕ Create New</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-lg py-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <div class="container-lg">
            <p class="mb-0">&copy; 2025 Product Management System. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
