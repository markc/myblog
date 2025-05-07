<!-- Top navbar - used on all pages -->
<style>
    /* Force specific styles for the navbar to ensure visibility on all pages */
    .myblog-navbar {
        position: relative;
        z-index: 50;
        background-color: #161615 !important; /* Dark background regardless of theme */
        border-bottom: 1px solid #3E3E3A !important;
        width: 100% !important;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
    }
    
    .myblog-navbar .myblog-container {
        max-width: 80rem;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .myblog-navbar .myblog-flex {
        display: flex;
        justify-content: space-between;
        height: 4rem;
        align-items: center;
    }
    
    .myblog-navbar .myblog-logo {
        display: inline-block !important;
        padding: 0.375rem 1.25rem !important;
        background-color: black !important;
        color: #f59e0b !important; /* amber-500 */
        border: 1px solid #f59e0b !important;
        border-radius: 0.125rem !important;
        font-weight: 700 !important;
        font-size: 0.875rem !important;
        line-height: 1.25 !important;
        text-decoration: none !important;
    }
    
    .myblog-navbar .myblog-logo:hover {
        background-color: #f59e0b !important;
        color: black !important;
    }
    
    .myblog-navbar .myblog-nav {
        display: none;
    }
    
    @media (min-width: 768px) {
        .myblog-navbar .myblog-nav {
            display: flex;
            align-items: flex-end;
            gap: 1rem;
        }
    }
    
    .myblog-navbar .myblog-button {
        display: inline-block !important;
        padding: 0.375rem 1.25rem !important;
        background-color: #f59e0b !important; /* amber-400 */
        color: black !important;
        border: 1px solid black !important;
        border-radius: 0.125rem !important;
        font-weight: 700 !important;
        font-size: 0.875rem !important;
        line-height: 1.25 !important;
        text-decoration: none !important;
    }
    
    .myblog-navbar .myblog-button:hover {
        background-color: black !important;
        color: #f59e0b !important;
    }
    
    .myblog-navbar .myblog-button-alt {
        display: inline-block !important;
        padding: 0.375rem 1.25rem !important;
        background-color: black !important;
        color: #f59e0b !important; /* amber-500 */
        border: 1px solid #f59e0b !important;
        border-radius: 0.125rem !important;
        font-weight: 700 !important;
        font-size: 0.875rem !important;
        line-height: 1.25 !important;
        text-decoration: none !important;
    }
    
    .myblog-navbar .myblog-button-alt:hover {
        background-color: #f59e0b !important;
        color: black !important;
    }
    
    .myblog-navbar .myblog-mobile-button {
        display: flex;
        align-items: center;
    }
    
    @media (min-width: 768px) {
        .myblog-navbar .myblog-mobile-button {
            display: none;
        }
    }
    
    .myblog-navbar .myblog-mobile-icon {
        padding: 0.5rem;
        border-radius: 0.375rem;
        color: #d1d1d1;
    }
    
    .myblog-navbar .myblog-mobile-icon:hover {
        background-color: #1f1f1f;
    }
    
    .myblog-navbar .myblog-mobile-menu {
        border-top: 1px solid #3E3E3A;
        display: none;
    }
    
    @media (min-width: 768px) {
        .myblog-navbar .myblog-mobile-menu {
            display: none !important;
        }
    }
    
    .myblog-navbar .myblog-mobile-menu.is-open {
        display: block;
    }
    
    .myblog-navbar .myblog-mobile-item {
        display: block;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #d1d1d1;
        text-decoration: none;
    }
    
    .myblog-navbar .myblog-mobile-item:hover {
        color: #f59e0b;
    }
    
    .myblog-navbar .myblog-mobile-item.active {
        color: #f59e0b;
    }
    
    .myblog-navbar .myblog-mobile-divider {
        border-top: 1px solid #3E3E3A;
        margin-top: 0.5rem;
        padding-top: 0.5rem;
    }
</style>

<header class="myblog-navbar">
    <div class="myblog-container">
        <div class="myblog-flex">
            <a href="/" class="myblog-logo">
                MyBlog
            </a>

            <!-- Navigation links -->
            <div class="myblog-nav">
                <a href="/blogs" class="myblog-button">
                    Blog
                </a>
                <a href="/#about" class="myblog-button">
                    About
                </a>
                <a href="{{ url('/admin/login') }}" class="myblog-button">
                    Sign in
                </a>
                <a href="{{ url('/admin/register') }}" class="myblog-button-alt">
                    Sign up
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="myblog-mobile-button">
                <button type="button" class="myblog-mobile-icon" id="mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu (hidden by default) -->
    <div class="myblog-mobile-menu" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="myblog-mobile-item">Home</a>
            <a href="/blogs" class="myblog-mobile-item">Blog</a>
            <a href="/#about" class="myblog-mobile-item">About</a>
            <a href="{{ url('/admin/login') }}" class="myblog-mobile-item active">Sign in</a>
            <a href="{{ url('/admin/register') }}" class="myblog-mobile-item myblog-mobile-divider">Sign up</a>
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle with unique ID to avoid conflicts
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        
        if (btn && menu) {
            btn.addEventListener('click', function() {
                menu.classList.toggle('is-open');
            });
        }
    });
</script>