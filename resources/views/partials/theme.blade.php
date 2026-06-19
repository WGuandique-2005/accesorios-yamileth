<style>
    :root {
        --ay-bg: #fff8f8;
        --ay-surface: #ffffff;
        --ay-surface-soft: #fdf0f4;
        --ay-surface-strong: #f7ebee;
        --ay-text: #201a1d;
        --ay-text-muted: #5d5f5f;
        --ay-border: #e3d7db;
        --ay-brand: #8a486f;
        --ay-brand-hover: #733b5c;
        --ay-shadow: 0 20px 40px -10px rgba(138, 72, 111, 0.12);
    }

    html.dark {
        --ay-bg: #151116;
        --ay-surface: #1f1a20;
        --ay-surface-soft: #2a232a;
        --ay-surface-strong: #342b33;
        --ay-text: #f6eef2;
        --ay-text-muted: #c5b7bf;
        --ay-border: #433940;
        --ay-brand: #f0a4c6;
        --ay-brand-hover: #f4b8d7;
        --ay-shadow: 0 20px 45px -20px rgba(0, 0, 0, 0.45);
    }

    html {
        color-scheme: light;
    }

    html.dark {
        color-scheme: dark;
    }

    html,
    body {
        background: var(--ay-bg) !important;
    }

    body {
        color: var(--ay-text);
        transition: background-color 0.25s ease, color 0.25s ease;
    }

    html.dark body {
        background: var(--ay-bg) !important;
        color: var(--ay-text);
    }

    html.dark .bg-white,
    html.dark .bg-\[\#FFF8F8\],
    html.dark .bg-background,
    html.dark .bg-surface,
    html.dark .bg-surface-container-lowest,
    html.dark .bg-surface-container-low,
    html.dark .bg-surface-container,
    html.dark .bg-surface-container-high,
    html.dark .bg-surface-container-highest,
    html.dark .bg-gray-50,
    html.dark .bg-gray-100,
    html.dark .bg-gray-200,
    html.dark .bg-\[\#FDF0F4\],
    html.dark .bg-\[\#FFF0F0\],
    html.dark .bg-\[\#f9dce8\],
    html.dark .bg-\[\#F9A8D4\] {
        background-color: var(--ay-surface) !important;
    }

    html.dark .bg-gray-50,
    html.dark .bg-gray-100,
    html.dark .bg-gray-200,
    html.dark .bg-\[\#FDF0F4\],
    html.dark .bg-\[\#FFF0F0\],
    html.dark .bg-\[\#f9dce8\],
    html.dark .bg-\[\#F9A8D4\] {
        background-color: var(--ay-surface-soft) !important;
    }

    html.dark .bg-primary-container,
    html.dark .bg-secondary-container,
    html.dark .bg-tertiary-container {
        background-color: var(--ay-surface-strong) !important;
    }

    html.dark .border-gray-100,
    html.dark .border-gray-200,
    html.dark .border-outline-variant,
    html.dark .border-\[\#E3D7DB\],
    html.dark .border-\[\#eadde3\],
    html.dark .border-\[\#f9a8d4\]\/40,
    html.dark .border-gray-300 {
        border-color: var(--ay-border) !important;
    }

    html.dark .text-gray-900,
    html.dark .text-gray-800,
    html.dark .text-gray-700,
    html.dark .text-\[\#201A1D\],
    html.dark .text-on-background,
    html.dark .text-on-surface {
        color: var(--ay-text) !important;
    }

    html.dark .text-gray-600,
    html.dark .text-gray-500,
    html.dark .text-gray-400,
    html.dark .text-\[\#514349\],
    html.dark .text-on-surface-variant,
    html.dark .text-outline {
        color: var(--ay-text-muted) !important;
    }

    html.dark .text-primary,
    html.dark [class*="text-[#8A486F]"],
    html.dark [class*="text-[#78395F]"],
    html.dark [class*="text-[#6f3157]"],
    html.dark [class*="text-[#733b5c]"] {
        color: var(--ay-brand) !important;
    }

    html.dark .bg-primary,
    html.dark [class*="bg-[#8A486F]"],
    html.dark [class*="bg-[#733b5c]"],
    html.dark [class*="bg-[#6f3157]"] {
        background-color: var(--ay-brand) !important;
    }

    html.dark .glass-card {
        background: rgba(31, 26, 32, 0.9) !important;
        border-color: rgba(255, 255, 255, 0.08) !important;
        box-shadow: var(--ay-shadow) !important;
    }

    html.dark .gradient-bg {
        background: linear-gradient(135deg, #151116 0%, #1c1820 50%, #241e26 100%) !important;
    }

    html.dark .hero-pattern {
        background-color: #151116 !important;
        background-image: radial-gradient(rgba(240, 164, 198, 0.16) 1px, transparent 1px) !important;
    }

    html.dark .shadow-sm,
    html.dark .shadow-md,
    html.dark .shadow-lg {
        box-shadow: var(--ay-shadow) !important;
    }

    html.dark input,
    html.dark select,
    html.dark textarea {
        background-color: var(--ay-surface-soft) !important;
        color: var(--ay-text) !important;
        border-color: var(--ay-border) !important;
    }

    html.dark input::placeholder,
    html.dark textarea::placeholder {
        color: rgba(197, 183, 191, 0.8) !important;
    }

    html.dark .status-select,
    html.dark .toggle-btn {
        color: var(--ay-text) !important;
    }

    #ay-theme-toggle {
        position: fixed;
        right: 1rem;
        bottom: 1rem;
        z-index: 70;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        border-radius: 9999px;
        border: 1px solid var(--ay-border);
        background: rgba(255, 255, 255, 0.9);
        color: var(--ay-text);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        cursor: pointer;
        font: 600 0.875rem/1.1 Inter, sans-serif;
        transition: transform 0.2s ease, background-color 0.25s ease, color 0.25s ease, border-color 0.25s ease;
    }

    html.dark #ay-theme-toggle {
        background: rgba(31, 26, 32, 0.92);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
    }

    #ay-theme-toggle:hover {
        transform: translateY(-1px);
    }

    #ay-theme-toggle .ay-theme-icon {
        font-size: 18px;
        line-height: 1;
    }

    .admin-main {
        min-height: 100vh;
        padding: 1rem;
    }

    @media (min-width: 768px) {
        .admin-main {
            margin-left: 16rem;
            padding: 2rem;
        }
    }

    .admin-page {
        margin: 0 auto;
        display: flex;
        max-width: 96rem;
        flex-direction: column;
        gap: 1.5rem;
    }

    .admin-hero {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    @media (min-width: 1024px) {
        .admin-hero {
            flex-direction: row;
            align-items: flex-end;
            justify-content: space-between;
        }
    }

    .admin-card {
        border: 1px solid var(--ay-border);
        border-radius: 1.25rem;
        background: var(--ay-surface);
        box-shadow: var(--ay-shadow);
    }

    .admin-card-soft {
        border: 1px solid var(--ay-border);
        border-radius: 1.25rem;
        background: var(--ay-surface-soft);
    }

    .admin-table-shell {
        overflow: hidden;
        border: 1px solid var(--ay-border);
        border-radius: 1.25rem;
        background: var(--ay-surface);
        box-shadow: var(--ay-shadow);
    }

    .admin-scroll {
        overflow-x: auto;
    }

    .admin-mobile-stack {
        display: grid;
        gap: 1rem;
    }

    @media (min-width: 640px) {
        .admin-mobile-stack {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 1280px) {
        .admin-mobile-stack.cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .admin-mobile-stack.cols-5 {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }

        .admin-mobile-stack.cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }
</style>

<script>
    (function () {
        const storageKey = 'accesorios-yamileth-theme';
        const root = document.documentElement;

        function readTheme() {
            try {
                return localStorage.getItem(storageKey);
            } catch (error) {
                return null;
            }
        }

        function writeTheme(theme) {
            try {
                localStorage.setItem(storageKey, theme);
            } catch (error) {
                // Ignore storage failures and keep the current session theme.
            }
        }

        function updateTheme(theme, persist = true) {
            const nextTheme = theme === 'dark' ? 'dark' : 'light';
            root.classList.toggle('dark', nextTheme === 'dark');
            root.classList.toggle('light', nextTheme !== 'dark');
            root.dataset.theme = nextTheme;
            root.style.colorScheme = nextTheme;

            if (persist) {
                writeTheme(nextTheme);
            }

            document.dispatchEvent(new CustomEvent('ay-theme-change', {
                detail: { theme: nextTheme },
            }));
        }

        const preferred = readTheme();
        const fallbackTheme = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        updateTheme(preferred || fallbackTheme, false);

        function syncToggleButton() {
            const isDark = root.classList.contains('dark');

            document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
                button.setAttribute('aria-pressed', String(isDark));
                button.setAttribute('title', isDark ? 'Cambiar a tema claro' : 'Cambiar a tema oscuro');

                const icon = button.querySelector('[data-theme-icon]');
                const label = button.querySelector('[data-theme-label]');

                if (icon) {
                    icon.textContent = isDark ? '☀' : '☾';
                }

                if (label) {
                    label.textContent = isDark ? 'Tema claro' : 'Tema oscuro';
                }
            });
        }

        function mountToggleButton() {
            if (document.getElementById('ay-theme-toggle')) {
                syncToggleButton();
                return;
            }

            const button = document.createElement('button');
            button.id = 'ay-theme-toggle';
            button.type = 'button';
            button.setAttribute('data-theme-toggle', '');
            button.setAttribute('aria-pressed', 'false');

            button.innerHTML = '<span class="ay-theme-icon" aria-hidden="true" data-theme-icon>☾</span><span data-theme-label>Modo oscuro</span>';

            button.addEventListener('click', () => {
                updateTheme(root.classList.contains('dark') ? 'light' : 'dark');
            });

            document.body.appendChild(button);
            syncToggleButton();
        }

        document.addEventListener('DOMContentLoaded', () => {
            mountToggleButton();
        });

        window.addEventListener('storage', (event) => {
            if (event.key === storageKey && event.newValue) {
                updateTheme(event.newValue, false);
            }
        });

        document.addEventListener('ay-theme-change', syncToggleButton);
    })();
</script>
