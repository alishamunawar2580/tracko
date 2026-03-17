<!-- Tracko Loader -->
<div class="tracko-loader" id="tracko-loader">
    <div class="loader-container">
        <div class="loader-o">
            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="loaderGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#2ECC71;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#F39C12;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="50" cy="50" r="40" fill="none" stroke="url(#loaderGradient)" stroke-width="8" stroke-linecap="round" class="loader-circle"/>
            </svg>
        </div>
        <p class="loader-text">Loading...</p>
    </div>
</div>

<style>
.tracko-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(255, 255, 255, 0.98);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.tracko-loader.hidden {
    opacity: 0;
    visibility: hidden;
}

.loader-container {
    text-align: center;
}

.loader-o {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
}

.loader-o svg {
    width: 100%;
    height: 100%;
    animation: rotate 1.5s linear infinite;
}

.loader-circle {
    stroke-dasharray: 251.2;
    stroke-dashoffset: 0;
    animation: dash 1.5s ease-in-out infinite;
}

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes dash {
    0% {
        stroke-dashoffset: 251.2;
    }
    50% {
        stroke-dashoffset: 62.8;
    }
    100% {
        stroke-dashoffset: 251.2;
    }
}

.loader-text {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 500;
    color: #0B3C5D;
    margin: 0;
}
</style>

<script>
// Auto-hide loader after page load
window.addEventListener('load', function() {
    setTimeout(function() {
        const loader = document.getElementById('tracko-loader');
        if (loader) {
            loader.classList.add('hidden');
            setTimeout(function() {
                loader.style.display = 'none';
            }, 300);
        }
    }, 500);
});

// Function to show loader
function showLoader() {
    const loader = document.getElementById('tracko-loader');
    if (loader) {
        loader.style.display = 'flex';
        loader.classList.remove('hidden');
    }
}

// Function to hide loader
function hideLoader() {
    const loader = document.getElementById('tracko-loader');
    if (loader) {
        loader.classList.add('hidden');
        setTimeout(function() {
            loader.style.display = 'none';
        }, 300);
    }
}
</script>
