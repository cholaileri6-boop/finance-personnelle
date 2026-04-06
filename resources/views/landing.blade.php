<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>FinanceFlow – Gérez votre argent intelligemment</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800;900&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --black: #0d0d0d;
            --black2: #1a1a1a;
            --black3: #2a2a2a;
            --gray: #555;
            --gray-lt: #888;
            --silver: #c8c8c8;
            --offwhite: #f5f3ef;
            --white: #ffffff;
            --gold: #c9a84c;
            --gold-lt: #e8c97a;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--white);
            color: var(--black);
            overflow-x: hidden;
        }

        body::after {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 9999;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            opacity: .4;
        }

        /* ── NAV ── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 22px 64px;
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, .06);
            transition: padding .3s, box-shadow .3s;
        }

        nav.scrolled {
            padding: 14px 64px;
            box-shadow: 0 2px 30px rgba(0, 0, 0, .07);
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--black);
            text-decoration: none;
        }

        .logo-sq {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: var(--black);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: .85rem;
        }

        .logo-dot {
            color: var(--gold);
        }

        .nav-links {
            display: flex;
            gap: 34px;
            list-style: none;
        }

        .nav-links a {
            color: var(--gray);
            text-decoration: none;
            font-size: .88rem;
            font-weight: 500;
            transition: color .2s;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 1.5px;
            background: var(--black);
            transition: width .3s;
        }

        .nav-links a:hover {
            color: var(--black);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-ctas {
            display: flex;
            gap: 10px;
        }

        .btn-nav-out {
            padding: 9px 20px;
            border: 1.5px solid #ddd;
            border-radius: 9px;
            background: transparent;
            color: var(--black);
            font-family: 'Inter', sans-serif;
            font-size: .85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all .2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-nav-out:hover {
            border-color: var(--black);
            background: var(--black);
            color: var(--white);
        }

        .btn-nav-fill {
            padding: 9px 20px;
            border: none;
            border-radius: 9px;
            background: var(--black);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: .85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-nav-fill:hover {
            background: var(--black3);
            transform: translateY(-1px);
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .hero-left {
            background: var(--offwhite);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 140px 64px 80px;
            position: relative;
            z-index: 2;
        }

        .hero-left::after {
            content: '';
            position: absolute;
            right: -1px;
            top: 0;
            bottom: 0;
            width: 60px;
            background: var(--offwhite);
            clip-path: polygon(0 0, 40% 50%, 0 100%);
            z-index: 3;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 100px;
            padding: 5px 14px;
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--gray);
            margin-bottom: 26px;
            animation: fadeUp .8s ease both;
        }

        .tag-line {
            width: 20px;
            height: 1.5px;
            background: var(--gold);
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 4.5vw, 4.2rem);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: -.02em;
            animation: fadeUp .8s .08s ease both;
        }

        .hero h1 em {
            font-style: italic;
            color: var(--gold);
        }

        .hero-desc {
            margin-top: 22px;
            font-size: 1rem;
            color: var(--gray);
            line-height: 1.75;
            max-width: 420px;
            animation: fadeUp .8s .16s ease both;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            margin-top: 38px;
            flex-wrap: wrap;
            animation: fadeUp .8s .24s ease both;
        }

        .btn-black {
            padding: 15px 32px;
            border: none;
            border-radius: 12px;
            background: var(--black);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .2);
        }

        .btn-black:hover {
            background: var(--black3);
            transform: translateY(-3px);
            box-shadow: 0 10px 32px rgba(0, 0, 0, .25);
        }

        .btn-ghost {
            padding: 15px 32px;
            border: 1.5px solid rgba(0, 0, 0, .15);
            border-radius: 12px;
            background: transparent;
            color: var(--black);
            font-family: 'Inter', sans-serif;
            font-size: .95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all .3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 9px;
        }

        .btn-ghost:hover {
            border-color: var(--black);
            background: rgba(0, 0, 0, .04);
        }

        .hero-trust {
            display: flex;
            gap: 22px;
            margin-top: 46px;
            align-items: center;
            animation: fadeUp .8s .32s ease both;
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: .78rem;
            color: var(--gray-lt);
        }

        .trust-item i {
            color: var(--black);
            font-size: .75rem;
        }

        .trust-div {
            width: 1px;
            height: 18px;
            background: rgba(0, 0, 0, .1);
        }

        .hero-right {
            position: relative;
            overflow: hidden;
            background: #111;
        }

        .hero-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .75;
            display: block;
            filter: grayscale(20%) contrast(1.05);
            animation: zoomIn 8s ease infinite alternate;
        }

        @keyframes zoomIn {
            from {
                transform: scale(1)
            }

            to {
                transform: scale(1.06)
            }
        }

        .hero-right::before {
            content: '';
            position: absolute;
            inset: 0;
            z-index: 1;
            background: linear-gradient(135deg, rgba(0, 0, 0, .55) 0%, rgba(0, 0, 0, .15) 100%);
        }

        /* Floating cards */
        .float-card {
            position: absolute;
            z-index: 2;
            background: rgba(255, 255, 255, .97);
            border-radius: 16px;
            padding: 16px 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
            backdrop-filter: blur(10px);
            animation: floatCard 5s ease-in-out infinite;
        }

        .float-card:nth-child(2) {
            animation-delay: -2s
        }

        .float-card:nth-child(3) {
            animation-delay: -3.5s
        }

        @keyframes floatCard {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-10px)
            }
        }

        .fc-balance {
            top: 18%;
            left: 8%;
            min-width: 180px;
        }

        .fc-chart {
            bottom: 28%;
            right: 6%;
            min-width: 160px;
        }

        .fc-alert {
            bottom: 10%;
            left: 10%;
            min-width: 200px;
        }

        .fc-label {
            font-size: .65rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--gray-lt);
            margin-bottom: 5px;
        }

        .fc-value {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--black);
            line-height: 1;
        }

        .fc-sub {
            font-size: .7rem;
            color: var(--gray-lt);
            margin-top: 4px;
        }

        .fc-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 6px;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: .65rem;
            font-weight: 700;
        }

        .fc-badge-ok {
            background: rgba(34, 197, 94, .1);
            color: #16a34a;
        }

        .fc-badge-warn {
            background: rgba(245, 158, 11, .1);
            color: #d97706;
        }

        .fc-bars {
            display: flex;
            align-items: flex-end;
            gap: 4px;
            height: 40px;
            margin-top: 8px;
        }

        .fc-bar {
            width: 14px;
            border-radius: 3px 3px 0 0;
            background: var(--black);
            opacity: .15;
        }

        .fc-bar.active {
            opacity: 1;
        }

        /* ── STATS BAND ── */
        .stats-band {
            background: var(--black);
            color: var(--white);
            padding: 40px 64px;
            display: flex;
            justify-content: center;
        }

        .band-stat {
            flex: 1;
            max-width: 220px;
            text-align: center;
            padding: 0 30px;
            position: relative;
        }

        .band-stat::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 40px;
            width: 1px;
            background: rgba(255, 255, 255, .12);
        }

        .band-stat:last-child::after {
            display: none;
        }

        .band-val {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 800;
        }

        .band-val span {
            color: var(--gold);
        }

        .band-lbl {
            font-size: .75rem;
            color: rgba(255, 255, 255, .45);
            letter-spacing: .06em;
            text-transform: uppercase;
            margin-top: 4px;
        }

        /* ── SHARED ── */
        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 14px;
        }

        .section-tag::before {
            content: '';
            width: 24px;
            height: 1.5px;
            background: var(--gold);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.9rem, 3vw, 2.8rem);
            font-weight: 900;
            line-height: 1.15;
            letter-spacing: -.02em;
        }

        .section-sub {
            color: var(--gray);
            font-size: .97rem;
            line-height: 1.75;
            margin-top: 12px;
            max-width: 520px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 64px;
        }

        /* ── PROBLEM ── */
        .problem {
            padding: 120px 0;
            background: var(--offwhite);
        }

        .problem-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: start;
            margin-top: 60px;
        }

        .problem-cards {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .p-card {
            background: var(--white);
            border-radius: 16px;
            padding: 24px 26px;
            border: 1px solid rgba(0, 0, 0, .06);
            display: flex;
            gap: 16px;
            align-items: flex-start;
            transition: all .3s;
        }

        .p-card:hover {
            transform: translateX(8px);
            border-color: rgba(0, 0, 0, .15);
            box-shadow: 0 8px 30px rgba(0, 0, 0, .06);
        }

        .p-icon {
            font-size: 1.4rem;
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: var(--offwhite);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .p-card h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .p-card p {
            font-size: .85rem;
            color: var(--gray);
            line-height: 1.6;
        }

        .prob-quote-box {
            background: var(--black);
            color: var(--white);
            border-radius: 20px;
            padding: 36px;
            position: relative;
            overflow: hidden;
        }

        .prob-quote-box::before {
            content: '"';
            position: absolute;
            top: -30px;
            left: 16px;
            font-family: 'Playfair Display', serif;
            font-size: 140px;
            color: rgba(255, 255, 255, .05);
            line-height: 1;
        }

        .prob-q {
            font-size: 1.05rem;
            line-height: 1.75;
            font-style: italic;
            position: relative;
            z-index: 1;
        }

        .prob-q strong {
            color: var(--gold);
            font-style: normal;
        }

        .prob-stats {
            display: flex;
            gap: 0;
            margin-top: 24px;
        }

        .prob-stat {
            flex: 1;
            text-align: center;
            padding: 0 12px;
            position: relative;
        }

        .prob-stat::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 1px;
            background: rgba(255, 255, 255, .1);
        }

        .prob-stat:last-child::after {
            display: none;
        }

        .prob-stat-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 800;
            color: var(--gold);
        }

        .prob-stat-lbl {
            font-size: .68rem;
            color: rgba(255, 255, 255, .4);
            margin-top: 3px;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        /* ── SOLUTION ── */
        .solution {
            padding: 120px 0;
        }

        .sol-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .sol-steps {
            margin-top: 36px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .sol-step {
            display: flex;
            gap: 18px;
        }

        .sol-step-num {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            flex-shrink: 0;
            background: var(--black);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: .9rem;
            font-weight: 800;
        }

        .sol-step h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .sol-step p {
            font-size: .85rem;
            color: var(--gray);
            line-height: 1.6;
        }

        .sol-right {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .sol-mini {
            background: var(--offwhite);
            border-radius: 16px;
            padding: 20px;
            border: 1px solid rgba(0, 0, 0, .06);
            transition: all .3s;
        }

        .sol-mini:hover {
            background: var(--black);
            color: var(--white);
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, .12);
        }

        .sol-mini:hover p {
            color: rgba(255, 255, 255, .55);
        }

        .sol-mini-icon {
            font-size: 1.5rem;
            margin-bottom: 12px;
        }

        .sol-mini h5 {
            font-family: 'Playfair Display', serif;
            font-size: .95rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sol-mini p {
            font-size: .78rem;
            color: var(--gray);
            line-height: 1.5;
            transition: color .3s;
        }

        .sol-mini.span2 {
            grid-column: span 2;
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .sol-mini.span2 .sol-mini-icon {
            font-size: 2rem;
            margin-bottom: 0;
            flex-shrink: 0;
        }

        /* ── FEATURES ── */
        .features {
            padding: 120px 0;
            background: var(--offwhite);
        }

        .feat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 50px;
        }

        .feat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .feat-card {
            background: var(--white);
            border-radius: 18px;
            padding: 28px;
            border: 1px solid rgba(0, 0, 0, .06);
            transition: all .35s;
            cursor: default;
            position: relative;
            overflow: hidden;
        }

        .feat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--black);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .35s;
        }

        .feat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, .08);
            border-color: transparent;
        }

        .feat-card:hover::after {
            transform: scaleX(1);
        }

        .feat-icon-wrap {
            width: 50px;
            height: 50px;
            border-radius: 13px;
            background: var(--offwhite);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 18px;
            transition: background .35s;
        }

        .feat-card:hover .feat-icon-wrap {
            background: var(--black);
        }

        .feat-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .feat-card p {
            font-size: .83rem;
            color: var(--gray);
            line-height: 1.65;
        }

        .feat-num {
            position: absolute;
            top: 20px;
            right: 22px;
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: rgba(0, 0, 0, .05);
        }

        /* ── AVANTAGES ── */
        .avantages {
            padding: 120px 0;
        }

        .av-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .av-img-wrap {
            position: relative;
        }

        .av-photo {
            width: 100%;
            border-radius: 24px;
            display: block;
            filter: grayscale(100%) contrast(1.1);
            box-shadow: 0 30px 80px rgba(0, 0, 0, .15);
            aspect-ratio: 4/5;
            object-fit: cover;
        }

        .av-badge {
            position: absolute;
            bottom: -20px;
            right: -20px;
            background: var(--black);
            color: var(--white);
            border-radius: 18px;
            padding: 22px 26px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .2);
        }

        .av-badge-val {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            font-weight: 900;
            color: var(--gold);
        }

        .av-badge-lbl {
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: rgba(255, 255, 255, .5);
            margin-top: 3px;
        }

        .av-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 32px;
        }

        .av-row {
            display: flex;
            gap: 14px;
            align-items: center;
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, .07);
            transition: all .25s;
        }

        .av-row:hover {
            background: var(--black);
            color: var(--white);
            border-color: var(--black);
        }

        .av-row:hover .av-chk {
            background: var(--gold);
            color: var(--black);
        }

        .av-chk {
            width: 26px;
            height: 26px;
            border-radius: 7px;
            background: var(--offwhite);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .72rem;
            color: var(--black);
            flex-shrink: 0;
            transition: all .25s;
        }

        .av-row span {
            font-size: .9rem;
            font-weight: 500;
        }

        /* ── CTA ── */
        .cta-section {
            margin: 0 64px 80px;
            border-radius: 28px;
            background: var(--black);
            color: var(--white);
            padding: 90px 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 70% 70% at 50% -10%, rgba(201, 168, 76, .15), transparent);
        }

        .cta-section h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 900;
            line-height: 1.15;
            letter-spacing: -.02em;
            position: relative;
            z-index: 1;
        }

        .cta-section h2 em {
            color: var(--gold);
            font-style: italic;
        }

        .cta-section p {
            color: rgba(255, 255, 255, .5);
            font-size: 1rem;
            max-width: 480px;
            margin: 16px auto 38px;
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        .cta-btns {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .btn-cta-w {
            padding: 16px 38px;
            border: none;
            border-radius: 13px;
            background: var(--white);
            color: var(--black);
            font-family: 'Inter', sans-serif;
            font-size: .97rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, .3);
        }

        .btn-cta-w:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, .4);
            background: var(--offwhite);
        }

        .btn-cta-g {
            padding: 16px 38px;
            border: 1.5px solid rgba(255, 255, 255, .2);
            border-radius: 13px;
            background: transparent;
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: .97rem;
            font-weight: 500;
            cursor: pointer;
            transition: all .3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 9px;
        }

        .btn-cta-g:hover {
            border-color: rgba(255, 255, 255, .5);
            background: rgba(255, 255, 255, .06);
        }

        .cta-note {
            margin-top: 20px;
            font-size: .75rem;
            color: rgba(255, 255, 255, .3);
            position: relative;
            z-index: 1;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--offwhite);
            border-top: 1px solid rgba(0, 0, 0, .07);
            padding: 70px 0 0;
        }

        .foot-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 50px;
            margin-bottom: 50px;
        }

        .foot-brand-desc {
            font-size: .85rem;
            color: var(--gray);
            line-height: 1.75;
            margin: 14px 0 20px;
            max-width: 250px;
        }

        .foot-socials {
            display: flex;
            gap: 8px;
        }

        .soc-btn {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            border: 1px solid rgba(0, 0, 0, .1);
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            font-size: .82rem;
            text-decoration: none;
            transition: all .2s;
        }

        .soc-btn:hover {
            background: var(--black);
            color: var(--white);
            border-color: var(--black);
        }

        .foot-col h4 {
            font-family: 'Playfair Display', serif;
            font-size: .95rem;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .foot-links {
            display: flex;
            flex-direction: column;
            gap: 9px;
            list-style: none;
        }

        .foot-links a {
            color: var(--gray);
            text-decoration: none;
            font-size: .85rem;
            transition: color .2s;
        }

        .foot-links a:hover {
            color: var(--black);
        }

        .foot-bottom {
            border-top: 1px solid rgba(0, 0, 0, .07);
            padding: 22px 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .foot-bottom p {
            font-size: .78rem;
            color: var(--gray-lt);
        }

        .foot-techs {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .tech-tag {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: .68rem;
            font-weight: 600;
            background: var(--white);
            border: 1px solid rgba(0, 0, 0, .08);
            color: var(--gray);
        }

        /* ── MODAL ── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9000;
            background: rgba(0, 0, 0, .6);
            backdrop-filter: blur(14px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity .3s;
        }

        .modal-overlay.open {
            opacity: 1;
            pointer-events: all;
        }

        .modal {
            background: var(--white);
            border-radius: 24px;
            padding: 48px 44px;
            width: 100%;
            max-width: 430px;
            position: relative;
            transform: translateY(24px) scale(.97);
            transition: transform .35s cubic-bezier(.22, 1, .36, 1), opacity .35s;
            opacity: 0;
            box-shadow: 0 40px 100px rgba(0, 0, 0, .2);
        }

        .modal-overlay.open .modal {
            transform: translateY(0) scale(1);
            opacity: 1;
        }

        .modal-close {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: var(--offwhite);
            border: 1px solid rgba(0, 0, 0, .08);
            color: var(--gray);
            cursor: pointer;
            font-size: .85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
        }

        .modal-close:hover {
            background: var(--black);
            color: var(--white);
        }

        .modal-head {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .modal-head span {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 800;
        }

        .modal h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            font-weight: 900;
            margin-bottom: 5px;
        }

        .modal-sub {
            font-size: .87rem;
            color: var(--gray);
            margin-bottom: 26px;
        }

        .m-tabs {
            display: flex;
            background: var(--offwhite);
            border-radius: 10px;
            padding: 4px;
            margin-bottom: 26px;
        }

        .m-tab {
            flex: 1;
            padding: 9px;
            border-radius: 8px;
            border: none;
            background: transparent;
            color: var(--gray);
            font-family: 'Inter', sans-serif;
            font-size: .88rem;
            font-weight: 500;
            cursor: pointer;
            transition: all .25s;
        }

        .m-tab.active {
            background: var(--black);
            color: var(--white);
        }

        .fg {
            margin-bottom: 16px;
        }

        .fg label {
            display: block;
            font-size: .78rem;
            font-weight: 600;
            color: var(--gray);
            margin-bottom: 7px;
            letter-spacing: .02em;
            text-transform: uppercase;
        }

        .fg input {
            width: 100%;
            padding: 11px 14px;
            border-radius: 10px;
            background: var(--offwhite);
            border: 1.5px solid transparent;
            color: var(--black);
            font-family: 'Inter', sans-serif;
            font-size: .92rem;
            outline: none;
            transition: all .2s;
        }

        .fg input:focus {
            border-color: var(--black);
            background: var(--white);
        }

        .fg input::placeholder {
            color: rgba(0, 0, 0, .3);
        }

        .btn-msubmit {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 11px;
            background: var(--black);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: .97rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .3s;
            margin-top: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-msubmit:hover {
            background: var(--black3);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(0, 0, 0, .18);
        }

        .m-foot {
            text-align: center;
            font-size: .78rem;
            color: var(--gray);
            margin-top: 16px;
        }

        .m-foot a {
            color: var(--black);
            font-weight: 600;
            text-decoration: none;
        }

        /* ── REVEAL ── */
        .reveal {
            opacity: 0;
            transform: translateY(36px);
            transition: all .75s cubic-bezier(.22, 1, .36, 1);
        }

        .reveal-l {
            opacity: 0;
            transform: translateX(-36px);
            transition: all .75s cubic-bezier(.22, 1, .36, 1);
        }

        .reveal-r {
            opacity: 0;
            transform: translateX(36px);
            transition: all .75s cubic-bezier(.22, 1, .36, 1);
        }

        .reveal.in,
        .reveal-l.in,
        .reveal-r.in {
            opacity: 1;
            transform: none;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        .scroll-top {
            position: fixed;
            bottom: 26px;
            right: 26px;
            z-index: 500;
            width: 40px;
            height: 40px;
            border-radius: 11px;
            background: var(--black);
            border: none;
            color: var(--white);
            font-size: .9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: translateY(12px);
            pointer-events: none;
            transition: all .3s;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .2);
        }

        .scroll-top.vis {
            opacity: 1;
            transform: translateY(0);
            pointer-events: all;
        }

        .scroll-top:hover {
            transform: translateY(-3px);
        }

        /* ── RESPONSIVE ── */
        @media(max-width:1050px) {
            .hero {
                grid-template-columns: 1fr;
            }

            .hero-left {
                padding: 110px 40px 60px;
            }

            .hero-left::after {
                display: none;
            }

            .hero-right {
                min-height: 50vw;
            }

            .sol-grid,
            .problem-grid,
            .av-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .foot-grid {
                grid-template-columns: 1fr 1fr;
            }

            .feat-grid {
                grid-template-columns: 1fr 1fr;
            }

            nav {
                padding: 16px 28px;
            }

            nav.scrolled {
                padding: 10px 28px;
            }

            .nav-links {
                display: none;
            }

            .container,
            .stats-band {
                padding-left: 28px;
                padding-right: 28px;
            }

            .cta-section {
                margin: 0 28px 60px;
                padding: 60px 40px;
            }

            .foot-bottom {
                padding: 22px 28px;
            }
        }

        @media(max-width:640px) {
            .feat-grid {
                grid-template-columns: 1fr;
            }

            .foot-grid {
                grid-template-columns: 1fr;
            }

            .sol-right {
                grid-template-columns: 1fr;
            }

            .sol-mini.span2 {
                grid-column: auto;
            }

            .stats-band {
                flex-wrap: wrap;
                gap: 24px;
                padding: 40px 28px;
            }

            .band-stat::after {
                display: none;
            }

            .modal {
                padding: 36px 22px;
                margin: 16px;
            }

            .fc-alert {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- ═══ NAVBAR ═══ -->
    <nav id="nav">
        <a href="#" class="nav-logo">
            <div class="logo-sq"><i class="fas fa-chart-line"></i></div>
            <span class="logo-dot"></span>
        </a>
        <ul class="nav-links">
            <li><a href="#probleme">Problème</a></li>
            <li><a href="#solution">Solution</a></li>
            <li><a href="#fonctionnalites">Fonctionnalités</a></li>
            <li><a href="#avantages">Avantages</a></li>
        </ul>
        <div class="nav-ctas">
            <a href="#" class="btn-nav-out" onclick="openModal('login');return false;"><i
                    class="fas fa-sign-in-alt"></i> Se connecter</a>
            <a href="#" class="btn-nav-fill" onclick="openModal('register');return false;"><i
                    class="fas fa-rocket"></i> S'inscrire</a>
        </div>
    </nav>

    <!-- ═══ HERO ═══ -->
    <section class="hero" id="home">
        <div class="hero-left">
            <div class="hero-tag"><span class="tag-line"></span>Gestion financière personnelle</div>
            <h1>Maîtrisez votre<br>argent avec <em>clarté</em></h1>
            <p class="hero-desc">FinanceFlow vous offre une vision précise de vos revenus et dépenses, une planification
                budgétaire intelligente et des alertes en temps réel.</p>
            <div class="hero-actions">
                <a href="#" class="btn-black" onclick="openModal('register');return false;"><i
                        class="fas fa-rocket"></i> Commencer maintenant</a>
                <a href="#fonctionnalites" class="btn-ghost"><i class="fas fa-compass"></i> Découvrir</a>
            </div>
            <div class="hero-trust">
                <div class="trust-item"><i class="fas fa-lock"></i> Sécurisé</div>
                <div class="trust-div"></div>
                <div class="trust-item"><i class="fas fa-clock"></i> 24h/24</div>
                <div class="trust-div"></div>
                <div class="trust-item"><i class="fas fa-star"></i> 100% gratuit</div>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&auto=format&fit=crop&q=80"
                alt="Gestion financière" class="hero-photo"
                onerror="this.src='https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=1200&auto=format&fit=crop&q=80'" />
            <div class="float-card fc-balance">
                <div class="fc-label">Solde du mois</div>
                <div class="fc-value">342 500 <small style="font-size:1rem">F</small></div>
                <div class="fc-sub">Octobre 2025</div>
                <span class="fc-badge fc-badge-ok"><i class="fas fa-arrow-up" style="font-size:.6rem"></i> +12% vs
                    sept.</span>
            </div>
            <div class="float-card fc-chart">
                <div class="fc-label">Dépenses semaine</div>
                <div class="fc-bars">
                    <div class="fc-bar" style="height:50%"></div>
                    <div class="fc-bar" style="height:70%"></div>
                    <div class="fc-bar" style="height:40%"></div>
                    <div class="fc-bar" style="height:85%"></div>
                    <div class="fc-bar active" style="height:60%"></div>
                    <div class="fc-bar" style="height:30%"></div>
                    <div class="fc-bar" style="height:65%"></div>
                </div>
                <div class="fc-sub" style="margin-top:6px">42 000 F cette semaine</div>
            </div>
            <div class="float-card fc-alert">
                <div style="display:flex;align-items:center;gap:10px">
                    <span style="font-size:1.2rem"><i class="fas fa-exclamation-triangle"></i></span>
                    <div>
                        <div class="fc-label" style="margin:0 0 2px">Alerte budget</div>
                        <div style="font-size:.8rem;font-weight:600;color:#111">Alimentation · 82% utilisé</div>
                        <span class="fc-badge fc-badge-warn" style="margin-top:5px"><i class="fas fa-exclamation"
                                style="font-size:.55rem"></i> Seuil bientôt atteint</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ STATS BAND ═══ -->
    <div class="stats-band">
        <div class="band-stat">
            <div class="band-val">100<span>%</span></div>
            <div class="band-lbl">Gratuit</div>
        </div>
        <div class="band-stat">
            <div class="band-val">24<span>h</span></div>
            <div class="band-lbl">Accessible</div>
        </div>
        <div class="band-stat">
            <div class="band-val"><span>SSL</span></div>
            <div class="band-lbl">Sécurisé</div>
        </div>
        <div class="band-stat">
            <div class="band-val">9<span>+</span></div>
            <div class="band-lbl">Fonctionnalités</div>
        </div>
    </div>

    <!-- ═══ PROBLÈME ═══ -->
    <section class="problem" id="probleme">
        <div class="container">
            <div class="reveal">
                <div class="section-tag">Le problème</div>
                <h2 class="section-title">Pourquoi gérer son argent<br>est si compliqué ?</h2>
            </div>
            <div class="problem-grid">
                <div class="problem-cards reveal-l">
                    <div class="p-card">
                        <div class="p-icon"><i class="fas fa-frown-open"></i></div>
                        <div>
                            <h4>Manque de visibilité</h4>
                            <p>Impossible de savoir exactement combien on dépense par mois et dans quelles catégories.
                            </p>
                        </div>
                    </div>
                    <div class="p-card">
                        <div class="p-icon"><i class="fas fa-file-lines"></i></div>
                        <div>
                            <h4>Outils inadaptés</h4>
                            <p>Les carnets et Excel sont fastidieux, incomplets et difficiles à maintenir dans la durée.
                            </p>
                        </div>
                    </div>
                    <div class="p-card">
                        <div class="p-icon"><i class="fas fa-triangle-exclamation"></i></div>
                        <div>
                            <h4>Dépassements silencieux</h4>
                            <p>On dépasse son budget sans s'en rendre compte — souvent trop tard pour corriger le tir.
                            </p>
                        </div>
                    </div>
                    <div class="p-card">
                        <div class="p-icon"><i class="fas fa-face-dizzy"></i></div>
                        <div>
                            <h4>Stress financier</h4>
                            <p>L'absence de suivi crée une anxiété constante en fin de mois et une perte de contrôle.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="reveal-r">
                    <div class="prob-quote-box">
                        <p class="prob-q">« <strong>Plus de 60%</strong> des gens ne savent pas exactement combien ils
                            dépensent chaque mois. Le manque de suivi financier est la première cause des difficultés
                            économiques personnelles. »</p>
                        <div class="prob-stats">
                            <div class="prob-stat">
                                <div class="prob-stat-val" data-target="68">0%</div>
                                <div class="prob-stat-lbl">Sans budget</div>
                            </div>
                            <div class="prob-stat">
                                <div class="prob-stat-val" data-target="54">0%</div>
                                <div class="prob-stat-lbl">Fin de mois dure</div>
                            </div>
                            <div class="prob-stat">
                                <div class="prob-stat-val" data-target="73">0%</div>
                                <div class="prob-stat-lbl">Sans suivi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ SOLUTION ═══ -->
    <section class="solution" id="solution">
        <div class="container">
            <div class="sol-grid">
                <div class="reveal-l">
                    <div class="section-tag">La solution</div>
                    <h2 class="section-title">FinanceFlow, votre tableau de bord financier personnel</h2>
                    <p class="section-sub">Simple, clair et sécurisé — tout ce qu'il vous faut pour reprendre le
                        contrôle de vos finances en quelques minutes.</p>
                    <div class="sol-steps">
                        <div class="sol-step">
                            <div class="sol-step-num">01</div>
                            <div>
                                <h4>Enregistrez vos transactions</h4>
                                <p>Ajoutez revenus et dépenses en quelques secondes avec catégorisation automatique.</p>
                            </div>
                        </div>
                        <div class="sol-step">
                            <div class="sol-step-num">02</div>
                            <div>
                                <h4>Visualisez vos habitudes</h4>
                                <p>Graphiques mensuels interactifs pour comprendre où va votre argent.</p>
                            </div>
                        </div>
                        <div class="sol-step">
                            <div class="sol-step-num">03</div>
                            <div>
                                <h4>Pilotez votre budget</h4>
                                <p>Fixez des limites, recevez des alertes et exportez vos rapports PDF.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sol-right reveal-r">
                    <div class="sol-mini">
                        <div class="sol-mini-icon"><i class="fas fa-chart-bar"></i></div>
                        <h5>Tableau de bord</h5>
                        <p>Solde, revenus, dépenses — vue complète en un clin d'œil.</p>
                    </div>
                    <div class="sol-mini">
                        <div class="sol-mini-icon"><i class="fas fa-bell"></i></div>
                        <h5>Alertes budgétaires</h5>
                        <p>Notifications avant tout dépassement de budget.</p>
                    </div>
                    <div class="sol-mini">
                        <div class="sol-mini-icon"><i class="fas fa-folder"></i></div>
                        <h5>Catégorisation</h5>
                        <p>Organisez chaque transaction par type de dépense.</p>
                    </div>
                    <div class="sol-mini span2">
                        <div class="sol-mini-icon"><i class="fas fa-lock"></i></div>
                        <div>
                            <h5>Sécurité renforcée</h5>
                            <p>Authentification sécurisée, données chiffrées, accès personnel uniquement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ FONCTIONNALITÉS ═══ -->
    <section class="features" id="fonctionnalites">
        <div class="container">
            <div class="feat-header reveal">
                <div>
                    <div class="section-tag">Fonctionnalités</div>
                    <h2 class="section-title">Tout ce dont vous avez besoin</h2>
                </div>
                <p style="color:var(--gray);font-size:.9rem;max-width:280px;text-align:right;line-height:1.6">Conçu
                    pour la simplicité, sans sacrifier la puissance.</p>
            </div>
            <div class="feat-grid">
                <div class="feat-card reveal" style="transition-delay:.04s">
                    <div class="feat-num">01</div>
                    <div class="feat-icon-wrap"><i class="fas fa-lock"></i></div>
                    <h3>Authentification sécurisée</h3>
                    <p>Inscription et connexion protégées. Mots de passe chiffrés, sessions sécurisées.</p>
                </div>
                <div class="feat-card reveal" style="transition-delay:.08s">
                    <div class="feat-num">02</div>
                    <div class="feat-icon-wrap"><i class="fas fa-money-bill-wave"></i></div>
                    <h3>Gestion des revenus</h3>
                    <p>Ajoutez, modifiez et supprimez vos sources de revenus. Salaire, freelance, location.</p>
                </div>
                <div class="feat-card reveal" style="transition-delay:.12s">
                    <div class="feat-num">03</div>
                    <div class="feat-icon-wrap"><i class="fas fa-receipt"></i></div>
                    <h3>Suivi des dépenses</h3>
                    <p>Enregistrez chaque dépense avec sa catégorie. Alimentation, transport, loisirs.</p>
                </div>
                <div class="feat-card reveal" style="transition-delay:.16s">
                    <div class="feat-num">04</div>
                    <div class="feat-icon-wrap"><i class="fas fa-chart-line"></i></div>
                    <h3>Graphiques statistiques</h3>
                    <p>Visualisations mensuelles avec Chart.js. Barres, camemberts et courbes d'évolution.</p>
                </div>
                <div class="feat-card reveal" style="transition-delay:.20s">
                    <div class="feat-num">05</div>
                    <div class="feat-icon-wrap"><i class="fas fa-bullseye"></i></div>
                    <h3>Budget mensuel</h3>
                    <p>Définissez votre budget et recevez des alertes avant de dépasser vos limites.</p>
                </div>
                <div class="feat-card reveal" style="transition-delay:.28s">
                    <div class="feat-num">07</div>
                    <div class="feat-icon-wrap"><i class="fas fa-folder"></i></div>
                    <h3>Catégorisation avancée</h3>
                    <p>Organisez vos transactions par catégories personnalisées pour analyser vos habitudes.</p>
                </div>
                <div class="feat-card reveal" style="transition-delay:.32s">
                    <div class="feat-num">08</div>
                    <div class="feat-icon-wrap"><i class="fas fa-clock"></i></div>
                    <h3>Historique complet</h3>
                    <p>Accédez à toutes vos transactions passées. Filtrez par date, catégorie ou montant.</p>
                </div>
                <div class="feat-card reveal" style="transition-delay:.36s">
                    <div class="feat-num">09</div>
                    <div class="feat-icon-wrap"><i class="fas fa-desktop"></i></div>
                    <h3>Tableau de bord global</h3>
                    <p>Solde actuel, revenus totaux, dépenses — votre situation financière en un écran.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ AVANTAGES ═══ -->
    <section class="avantages" id="avantages">
        <div class="container">
            <div class="av-grid">
                <div class="av-img-wrap reveal-l">
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&auto=format&fit=crop&q=80"
                        alt="Avantages FinanceFlow" class="av-photo"
                        onerror="this.src='https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800&auto=format&fit=crop&q=80'" />
                    <div class="av-badge">
                        <div class="av-badge-val">+28%</div>
                        <div class="av-badge-lbl">d'économies en moyenne</div>
                    </div>
                </div>
                <div class="reveal-r">
                    <div class="section-tag">Pourquoi FinanceFlow</div>
                    <h2 class="section-title">Simple à utiliser,<br>puissant dans les résultats</h2>
                    <p class="section-sub">Des fonctionnalités complètes condensées dans une interface épurée et
                        accessible à tous.</p>
                    <div class="av-list">
                        <div class="av-row">
                            <div class="av-chk"><i class="fas fa-check"></i></div><span>Interface intuitive, prise en
                                main immédiate</span>
                        </div>
                        <div class="av-row">
                            <div class="av-chk"><i class="fas fa-check"></i></div><span>Accessibilité 24h/24, 7j/7
                                depuis tout appareil</span>
                        </div>
                        <div class="av-row">
                            <div class="av-chk"><i class="fas fa-check"></i></div><span>Données chiffrées et
                                sécurisées à tout moment</span>
                        </div>
                        <div class="av-row">
                            <div class="av-chk"><i class="fas fa-check"></i></div><span>Alertes intelligentes avant
                                dépassement de budget</span>
                        </div>
                        <div class="av-row">
                            <div class="av-chk"><i class="fas fa-check"></i></div><span>Graphiques visuels pour
                                analyser vos habitudes</span>
                        </div>
                        <div class="av-row">
                            <div class="av-chk"><i class="fas fa-check"></i></div><span>100% gratuit, sans publicités
                                intrusives</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ CTA ═══ -->
    <div class="cta-section reveal" id="cta">
        <div class="section-tag" style="justify-content:center">Démarrez aujourd'hui</div>
        <h2>Prenez enfin le contrôle<br>de votre <em>argent</em></h2>
        <p>Rejoignez FinanceFlow et transformez votre façon de gérer vos finances dès maintenant. Gratuit, simple,
            efficace.</p>
        <div class="cta-btns">
            <a href="#" class="btn-cta-w" onclick="openModal('register');return false;"><i
                    class="fas fa-user-plus"></i> Créer mon compte</a>
            <a href="#" class="btn-cta-g" onclick="openModal('login');return false;"><i
                    class="fas fa-sign-in-alt"></i> Se connecter</a>
        </div>
        <p class="cta-note"><i class="fas fa-lock" style="margin-right:5px"></i>Inscription gratuite · Données
            sécurisées · Sans engagement</p>
    </div>

    <!-- ═══ FOOTER ═══ -->
    <footer>
        <div class="container">
            <div class="foot-grid">
                <div>
                    <a href="#" class="nav-logo" style="text-decoration:none;display:inline-flex">
                        <div class="logo-sq"><i class="fas fa-chart-line"></i></div>
                        Finance<span class="logo-dot">Flow</span>
                    </a>
                    <p class="foot-brand-desc">Application web de gestion financière personnelle. Suivez vos revenus,
                        maîtrisez vos dépenses, planifiez votre avenir.</p>
                    <div class="foot-socials">
                        <a href="#" class="soc-btn"><i class="fab fa-github"></i></a>
                        <a href="#" class="soc-btn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="soc-btn"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="soc-btn"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="foot-col">
                    <h4>Application</h4>
                    <ul class="foot-links">
                        <li><a href="#" onclick="openModal('login');return false;">Tableau de bord</a></li>
                        <li><a href="#" onclick="openModal('login');return false;">Mes revenus</a></li>
                        <li><a href="#" onclick="openModal('login');return false;">Mes dépenses</a></li>
                        <li><a href="#" onclick="openModal('login');return false;">Mon budget</a></li>
                        <li><a href="#" onclick="openModal('login');return false;">Statistiques</a></li>
                        <li><a href="#" onclick="openModal('login');return false;">Rapports PDF</a></li>
                    </ul>
                </div>
                <div class="foot-col">
                    <h4>Navigation</h4>
                    <ul class="foot-links">
                        <li><a href="#home">Accueil</a></li>
                        <li><a href="#probleme">Le problème</a></li>
                        <li><a href="#solution">La solution</a></li>
                        <li><a href="#fonctionnalites">Fonctionnalités</a></li>
                        <li><a href="#avantages">Avantages</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
        <div class="foot-bottom">
            <p>© 2025 FinanceFlow  · Tous droits réservés</p>
            
        </div>
    </footer>

    <!-- ═══ MODAL ═══ -->
    <div class="modal-overlay" id="modal" onclick="closeModalOut(event)">
        <div class="modal">
            <button class="modal-close" onclick="closeModal()"><i class="fas fa-times"></i></button>
            <div class="modal-head">
                <div class="logo-sq" style="width:30px;height:30px;font-size:.75rem"><i
                        class="fas fa-chart-line"></i></div>
                <span>FinanceFlow</span>
            </div>

            <p class="modal-sub" id="m-sub">Connectez-vous pour accéder à votre espace</p>

            <div class="m-tabs">
                <button class="m-tab active" id="t-login" onclick="switchTab('login')">Se connecter</button>
                <button class="m-tab" id="t-reg" onclick="switchTab('register')">S'inscrire</button>
            </div>

            <div id="f-login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="fg">
                        <label>Adresse e-mail</label>
                        <input type="email" name="email" placeholder="votre@email.com" required autofocus />
                    </div>
                    <div class="fg">
                        <label>Mot de passe</label>
                        <input type="password" name="password" placeholder="••••••••" required />
                    </div>
                    <button type="submit" class="btn-msubmit">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>
                </form>
                <p class="m-foot">Pas encore de compte ? <a href="#"
                        onclick="switchTab('register');return false;">S'inscrire gratuitement</a></p>
            </div>

            <div id="f-reg" style="display:none">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="fg">
                        <label>Nom complet</label>
                        <input type="text" name="name" placeholder="Jean Dupont" required />
                    </div>
                    <div class="fg">
                        <label>Adresse e-mail</label>
                        <input type="email" name="email" placeholder="votre@email.com" required />
                    </div>
                    <div class="fg">
                        <label>Mot de passe</label>
                        <input type="password" name="password" placeholder="Min. 8 caractères" required />
                    </div>
                    <div class="fg">
                        <label>Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" placeholder="Répétez le mot de passe"
                            required />
                    </div>
                    <button type="submit" class="btn-msubmit">
                        <i class="fas fa-user-plus"></i> Créer mon compte
                    </button>
                </form>
                <p class="m-foot">Déjà un compte ? <a href="#" onclick="switchTab('login');return false;">Se
                        connecter</a></p>
            </div>
        </div>
    </div>

    <button class="scroll-top" id="st" onclick="window.scrollTo({top:0,behavior:'smooth'})"><i
            class="fas fa-arrow-up"></i></button>

    <script>
        const nav = document.getElementById('nav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', scrollY > 40);
            document.getElementById('st').classList.toggle('vis', scrollY > 300);
        });
        const obs = new IntersectionObserver(e => {
            e.forEach(x => {
                if (x.isIntersecting) x.target.classList.add('in');
            });
        }, {
            threshold: .12
        });
        document.querySelectorAll('.reveal,.reveal-l,.reveal-r').forEach(el => obs.observe(el));
        const cntObs = new IntersectionObserver(e => {
            e.forEach(x => {
                if (!x.isIntersecting) return;
                x.target.querySelectorAll('[data-target]').forEach(el => {
                    const t = +el.dataset.target;
                    let c = 0;
                    const s = t / 60;
                    const ti = setInterval(() => {
                        c = Math.min(c + s, t);
                        el.textContent = Math.floor(c) + '%';
                        if (c >= t) clearInterval(ti);
                    }, 16);
                });
                cntObs.disconnect();
            });
        }, {
            threshold: .5
        });
        const qs = document.querySelector('.prob-stats');
        if (qs) cntObs.observe(qs);

        function openModal(tab) {
            document.getElementById('modal').classList.add('open');
            document.body.style.overflow = 'hidden';
            switchTab(tab);
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('open');
            document.body.style.overflow = '';
        }

        function closeModalOut(e) {
            if (e.target === document.getElementById('modal')) closeModal();
        }
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeModal();
        });

        function switchTab(tab) {
            const l = tab === 'login';
            document.getElementById('t-login').classList.toggle('active', l);
            document.getElementById('t-reg').classList.toggle('active', !l);
            document.getElementById('f-login').style.display = l ? 'block' : 'none';
            document.getElementById('f-reg').style.display = l ? 'none' : 'block';
            document.getElementById('m-title').textContent = l ? 'Bon retour ! 👋' : 'Créez votre compte 🚀';
            document.getElementById('m-sub').textContent = l ? 'Connectez-vous pour accéder à votre espace' :
                'Gratuit, sécurisé, sans engagement';
        }
    </script>
</body>

</html>
