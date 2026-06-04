<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading... - Instiki Point</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: { primary: '#6366F1', dark: '#0F172A' }
                }
            }
        }
    </script>
    <style>
        .dot-pulse { animation: pulse-dot 1.5s infinite ease-in-out; }
        .dot-2 { animation-delay: 0.2s; }
        .dot-3 { animation-delay: 0.4s; }

        @keyframes pulse-dot {
            0%, 100% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 1; }
        }

        .animate-zoom-in {
            animation: zoomIn 1.2s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }
        @keyframes zoomIn {
            0% { transform: scale(0.3); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .animate-slide-up {
            opacity: 0;
            animation: slideUp 0.8s ease-out forwards;
        }
        .delay-200 { animation-delay: 0.2s; }
        .delay-400 { animation-delay: 0.4s; }

        @keyframes slideUp {
            0% { transform: translateY(30px); opacity: 0; filter: blur(4px); }
            100% { transform: translateY(0); opacity: 1; filter: blur(0); }
        }

        .animate-glow {
            animation: breatheGlow 3s ease-in-out infinite alternate;
        }
        @keyframes breatheGlow {
            0% { transform: translate(-50%, -50%) scale(0.8); opacity: 0.4; }
            100% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.8; }
        }
    </style>
</head>
<body class="bg-primary dark:bg-dark h-screen w-screen flex flex-col items-center justify-center overflow-hidden transition-opacity duration-700 ease-in-out opacity-100" id="splashBody">

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-white/10 dark:bg-primary/20 rounded-full blur-3xl animate-glow"></div>

    <div class="relative z-10 flex flex-col items-center">
        <img src="{{ asset('images/logo_instiki.png') }}" alt="Logo Instiki" class="w-24 h-24 rounded-2xl shadow-2xl mb-5 border-2 border-white/20 animate-zoom-in">

        <h1 class="text-4xl font-extrabold tracking-widest text-white drop-shadow-lg animate-slide-up delay-200">
            INSTIKI<span class="text-yellow-400">POINT</span>
        </h1>

        <p class="text-indigo-200 dark:text-gray-400 text-xs tracking-[0.2em] mt-2 uppercase animate-slide-up delay-400">
            Student SKP Portal
        </p>
    </div>

    <div class="absolute bottom-16 flex flex-col items-center animate-slide-up delay-400">
        <div class="flex gap-2.5 mb-4">
            <div class="w-2.5 h-2.5 bg-white rounded-full dot-pulse"></div>
            <div class="w-2.5 h-2.5 bg-white rounded-full dot-pulse dot-2"></div>
            <div class="w-2.5 h-2.5 bg-white rounded-full dot-pulse dot-3"></div>
        </div>
        <p class="text-white/70 text-xs font-medium tracking-wide">Loading...</p>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        });

        setTimeout(() => {
            document.getElementById('splashBody').classList.remove('opacity-100');
            document.getElementById('splashBody').classList.add('opacity-0');

            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 700);

        }, 2800);
    </script>
</body>
</html>