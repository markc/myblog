<!-- Global footer for all pages -->
<style>
    /* Responsive styles for the footer that change with theme */
    .myblog-footer {
        width: 100% !important;
        box-shadow: 0 -1px 2px 0 rgba(0, 0, 0, 0.05) !important;
    }
    
    /* Light mode styles */
    html:not(.dark) .myblog-footer {
        background-color: white !important;
        border-top: 1px solid #e3e3e0 !important;
    }
    
    /* Dark mode styles */
    html.dark .myblog-footer {
        background-color: #161615 !important;
        border-top: 1px solid #3E3E3A !important;
    }
    
    .myblog-footer .myblog-container {
        max-width: 80rem;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .myblog-footer .myblog-flex {
        display: flex;
        justify-content: center;
        height: 4rem;
        align-items: center;
    }
    
    /* Light mode text */
    html:not(.dark) .myblog-footer .myblog-text {
        color: #f59e0b !important;
        font-size: 0.875rem !important;
    }
    
    /* Dark mode text */
    html.dark .myblog-footer .myblog-text {
        color: #f59e0b !important;
        font-size: 0.875rem !important;
    }
</style>

<footer class="myblog-footer">
    <div class="myblog-container">
        <div class="myblog-flex">
            <span class="myblog-text">
                &copy; {{ date('Y') }} MyBlog. All rights reserved.
            </span>
        </div>
    </div>
</footer>