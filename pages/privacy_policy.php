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
    </style>
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