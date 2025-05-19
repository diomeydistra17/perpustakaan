<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/dashboard.css') }}">

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 1rem;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }

        .sidebar a {
            color: white;
        }

        .sidebar.closed {
            transform: translateX(-100%);
        }

        .main-content {
            margin-left: 250px;
            padding: 1rem;
            transition: margin-left 0.3s ease-in-out;
        }

        .main-content.full-width {
            margin-left: 0;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }

        .menu-toggle {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
     @include('components.layouts.sidebar')
    <!-- Menu Toggle Button (Mobile) -->
    <main class="main-content">
        @include('components.layouts.navigasi')
        {{ $slot }}
                <tbody>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Bootstrap & Feather JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();

        document.querySelector('.menu-toggle').addEventListener('click', () => {
            document.querySelector('.sidebar').classList.toggle('open');
        });
    </script>
</body>
</html>
