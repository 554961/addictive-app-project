<?php
// Include site navbar
include __DIR__ . '/../components/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Privacy & Policy</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <style>
        /* Christmas themed colors and layout */
        body {
            background: linear-gradient(180deg, #8b0f0f 0%, #b22222 60%); /* deep red */
            color: #072f07; /* dark green text */
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        main.policy-container {
            max-width: 900px;
            margin: 120px auto 60px; /* leave room for fixed navbar */
            background: rgba(255,255,255,0.95);
            border-radius: 10px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.35);
            border: 4px solid rgba(2, 80, 2, 0.12);
            position: relative; /* needed for drips */
            overflow: visible; /* allow drips to extend outside */
        }

        h1 {
            color: #0b5f0b; /* green */
            margin-top: 0;
        }

        .accent {
            color: #a80000; /* darker red accent */
            font-weight: 700;
        }

        section { margin-top: 18px; }
        p { line-height: 1.6; }

        .policy-note { background: rgba(240,248,240,0.9); padding: 12px; border-radius: 6px; border: 1px dashed #cfcfcf; }

        /* Snow animation */
        .snowflake {
            position: fixed;
            top: -10%;
            color: #fff;
            user-select: none;
            pointer-events: none;
            font-size: 16px;
            opacity: 0.9;
            animation-name: fall;
            animation-duration: 12s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        @keyframes fall {
            0% { transform: translateY(-10vh) translateX(0) rotate(0deg); }
            100% { transform: translateY(120vh) translateX(30vw) rotate(360deg); }
        }

        /* Create many flakes with different timings */
        .f1 { left: 5%; animation-duration: 10s; font-size: 14px; opacity: 0.9; }
        .f2 { left: 20%; animation-duration: 14s; font-size: 18px; opacity: 0.8; animation-delay: 2s; }
        .f3 { left: 35%; animation-duration: 11s; font-size: 12px; opacity: 0.95; animation-delay: 1s; }
        .f4 { left: 50%; animation-duration: 16s; font-size: 20px; opacity: 0.85; animation-delay: 4s; }
        .f5 { left: 65%; animation-duration: 13s; font-size: 15px; opacity: 0.9; animation-delay: 3s; }
        .f6 { left: 80%; animation-duration: 17s; font-size: 17px; opacity: 0.7; animation-delay: 5s; }

        /* Footer spacing so it doesn't overlap */
        footer { margin-top: 40px; }

        /* Responsive tweaks */
        @media (max-width: 600px) {
            .policy-container { margin: 100px 12px; padding: 18px; }
            .snowflake { font-size: 12px; }
        }

        /* ========== Dripping snowy border ========== */
        /* small decorative droplets that form along the top border and drip down */
        .snow-drip {
            position: absolute;
            top: -6px; /* start slightly above the border */
            width: 10px;
            height: 16px;
            pointer-events: none;
            background: radial-gradient(circle at 50% 35%, #fff 0%, #f0f8ff 40%, transparent 60%);
            border-radius: 50% 50% 40% 40%;
            box-shadow: 0 2px 6px rgba(0,0,0,0.12);
            transform-origin: top center;
            opacity: 0.98;
            animation-name: drip-fall;
            animation-timing-function: cubic-bezier(.2,.9,.26,1);
        }

        @keyframes drip-fall {
            0% { transform: translateY(0) scaleY(1); opacity: 1; }
            70% { transform: translateY(var(--drip-length, 60px)) scaleY(0.85); opacity: 0.9; }
            100% { transform: translateY(calc(var(--drip-length, 60px) + 10px)) scaleY(0.75); opacity: 0; }
        }

        /* Slight wobble while falling for realism */
        .snow-drip.wobble { animation-name: drip-fall, drip-sway; animation-duration: var(--drip-duration, 4s), 1.2s; animation-iteration-count: 1, infinite; animation-fill-mode: forwards; }
        @keyframes drip-sway {
            0%   { transform: translateX(0); }
            50%  { transform: translateX(6px); }
            100% { transform: translateX(0); }
        }

        /* Drips that originate from buttons */
        .btn-drip {
            position: absolute;
            bottom: -6px;
            width: 6px;
            height: 10px;
            background: linear-gradient(#fff, #eaf6ff);
            border-radius: 50% 50% 40% 40%;
            box-shadow: 0 2px 6px rgba(0,0,0,0.12);
            transform-origin: top center;
            animation: btn-drip 1.6s ease-in forwards;
            pointer-events: none;
        }

        @keyframes btn-drip {
            0% { transform: translateY(0) scaleY(1); opacity: 1; }
            80% { transform: translateY(18px) scaleY(0.8); opacity: 0.8; }
            100%{ transform: translateY(28px) scaleY(0.65); opacity: 0; }
        }

        /* Ensure clickable elements can show drips */
        button, .btn, a.button, input[type="submit"] { position: relative; overflow: visible; }

        /* Small accessibility-friendly reduction on reduced-motion preference */
        @media (prefers-reduced-motion: reduce) {
            .snow-drip, .btn-drip { animation: none; opacity: 0.9; }
        }

    </style>

    <!-- Add the JavaScript that creates drips dynamically -->
    <script>
        // Create and animate drips on the policy container and on buttons
        document.addEventListener('DOMContentLoaded', function(){
            const container = document.querySelector('.policy-container');
            if (!container) return;

            function makeDrip(parent, leftPct, len, duration, wobble){
                const d = document.createElement('div');
                d.className = 'snow-drip' + (wobble ? ' wobble' : '');
                d.style.left = leftPct + '%';
                d.style.setProperty('--drip-length', Math.round(len) + 'px');
                d.style.setProperty('--drip-duration', (duration || 4) + 's');
                d.style.animationDuration = (duration || 4) + 's';
                parent.appendChild(d);
                d.addEventListener('animationend', function(){ d.remove(); });
                // remove after a safety timeout in case animationend doesn't fire
                setTimeout(()=> d.remove(), (duration || 4) * 1000 + 500);
                return d;
            }

            // initial decorative drips along top border
            for (let i = 0; i < 9; i++){
                const left = 4 + Math.random() * 92; // avoid edges
                makeDrip(container, left, 40 + Math.random() * 90, 3 + Math.random() * 4, Math.random() > 0.5);
            }

            // occasional random drips every 1-2 seconds
            setInterval(function(){
                const left = 4 + Math.random() * 92;
                makeDrip(container, left, 30 + Math.random() * 110, 3 + Math.random() * 5, Math.random() > 0.6);
            }, 1400 + Math.random() * 900);

            // Add drips to buttons on hover
            function spawnButtonDrip(btn){
                const bd = document.createElement('div');
                bd.className = 'btn-drip';
                const left = 10 + Math.random() * 80;
                bd.style.left = left + '%';
                btn.appendChild(bd);
                bd.addEventListener('animationend', function(){ bd.remove(); });
                setTimeout(()=> bd.remove(), 2000);
            }

            const buttons = document.querySelectorAll('button, .btn, a.button, input[type="submit"]');
            buttons.forEach(b => {
                b.addEventListener('mouseenter', function(){ spawnButtonDrip(b); });
            });
        });
    </script>
</head>
<body>

    <!-- Snowflakes -->
    <div aria-hidden="true">
        <span class="snowflake f1">❄</span>
        <span class="snowflake f2">❅</span>
        <span class="snowflake f3">❄</span>
        <span class="snowflake f4">❆</span>
        <span class="snowflake f5">❄</span>
        <span class="snowflake f6">❅</span>
    </div>

    <main class="policy-container" role="main">
        <h1>Privacy &amp; Policy</h1>
        <p class="policy-note"><strong class="accent">Christmas Casino</strong> takes your privacy and responsible gambling seriously. Below are the main points of our policy — replace the placeholders with your full policy details.</p>

        <section>
            <h2>Introduction</h2>
            <p><!-- TODO: Add an introductory paragraph explaining the scope of this policy and that this is for a gambling site with seasonal theming. -->
            </p>
        </section>

        <section>
            <h2>Age and eligibility</h2>
            <p><!-- TODO: State the minimum age, verification steps, and jurisdiction restrictions. Example: Users must be 18+ (or jurisdiction equivalent). -->
            </p>
        </section>

        <section>
            <h2>Data collected</h2>
            <p>We may collect personal information needed to provide gambling services, including name, email, date of birth, payment details, and verification documents. <!-- TODO: Expand with storage and retention details. -->
            </p>
        </section>

        <section>
            <h2>How we use your data</h2>
            <p><!-- TODO: Explain purposes such as account management, fraud prevention, KYC, marketing (if applicable), legal compliance, and analytics. -->
            </p>
        </section>

        <section>
            <h2>Responsible gambling</h2>
            <p>We are committed to promoting safe play. <!-- TODO: Add details about limits, self-exclusion, support links, and warning signs for problem gambling. -->
            </p>
        </section>

        <section>
            <h2>Security</h2>
            <p>We implement reasonable technical and organizational measures to protect your data. <!-- TODO: Add specific security measures, encryption, and breach reporting procedures. -->
            </p>
        </section>

        <section>
            <h2>Cookies</h2>
            <p><!-- TODO: Describe the cookies used, purpose (analytics, session, preferences), and how users can opt out. -->
            </p>
        </section>

        <section>
            <h2>Third parties</h2>
            <p><!-- TODO: List third-party providers (payment processors, identity verification, analytics) and links to their privacy pages. -->
            </p>
        </section>

        <section>
            <h2>Contact</h2>
            <p>If you have questions about this policy, please contact us: <!-- TODO: Add contact email or link to Contact Us page -->
            </p>
        </section>

        <p style="margin-top:22px; font-size:0.95rem; color:#5a5a5a">Last updated: <!-- TODO: Add last updated date --> </p>
    </main>

<?php
// Include site footer
include __DIR__ . '/../components/footer.php';
?>

</body>
</html>