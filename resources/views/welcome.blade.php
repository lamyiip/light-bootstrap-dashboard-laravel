<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnapRecruit - AI-Powered Recruitment CRM</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #eff6ff 0%, #e0e7ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            max-width: 960px;
            width: 100%;
            text-align: center;
        }
        h1 {
            font-size: 4rem;
            font-weight: 700;
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }
        .subtitle {
            font-size: 1.5rem;
            color: #4b5563;
            margin-bottom: 0.5rem;
        }
        .tech-stack {
            font-size: 1.1rem;
            color: #6b7280;
            margin-bottom: 2.5rem;
        }
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            padding: 2.5rem;
            margin-bottom: 2rem;
        }
        .card h2 {
            font-size: 1.5rem;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            text-align: left;
        }
        .feature {
            display: flex;
            gap: 1rem;
        }
        .checkmark {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            color: #10b981;
        }
        .feature-content h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }
        .feature-content p {
            font-size: 0.875rem;
            color: #6b7280;
        }
        .next-steps {
            background: #dbeafe;
            border: 1px solid #93c5fd;
            border-radius: 0.75rem;
            padding: 1.5rem;
        }
        .next-steps h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 1rem;
        }
        .steps {
            text-align: left;
            color: #1e40af;
        }
        .step {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            align-items: flex-start;
        }
        .bullet {
            width: 8px;
            height: 8px;
            background: #2563eb;
            border-radius: 50%;
            margin-top: 0.5rem;
            flex-shrink: 0;
        }
        code {
            background: #dbeafe;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-family: 'Courier New', monospace;
            font-size: 0.875rem;
        }
        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #6b7280;
        }
        .footer strong {
            color: #1f2937;
        }
        .status-badge {
            display: inline-block;
            background: #10b981;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SnapRecruit</h1>
        <p class="subtitle">AI-Powered Recruitment CRM</p>
        <p class="tech-stack">Built with VILT Stack (Vue, Inertia, Laravel, Tailwind)</p>

        <div class="card">
            <h2>🚀 Project Status</h2>
            <div class="features">
                <div class="feature">
                    <svg class="checkmark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div class="feature-content">
                        <h3>Laravel 11 + Inertia.js</h3>
                        <p>Modern SPA architecture configured</p>
                    </div>
                </div>

                <div class="feature">
                    <svg class="checkmark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div class="feature-content">
                        <h3>Vue 3 + Tailwind CSS</h3>
                        <p>Composition API ready</p>
                    </div>
                </div>

                <div class="feature">
                    <svg class="checkmark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div class="feature-content">
                        <h3>Database Schema</h3>
                        <p>Jobs, Candidates, Applications tables</p>
                    </div>
                </div>

                <div class="feature">
                    <svg class="checkmark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div class="feature-content">
                        <h3>SQLite Database</h3>
                        <p>Local development ready</p>
                    </div>
                </div>
            </div>

            <div class="status-badge">✓ Application is Running!</div>
        </div>

        <div class="next-steps">
            <h3>📖 Important: Node.js Update Required</h3>
            <div class="steps">
                <div class="step">
                    <div class="bullet"></div>
                    <span>Your Node.js version (14.17.0) is too old for Vite</span>
                </div>
                <div class="step">
                    <div class="bullet"></div>
                    <span>Please upgrade to Node.js 18+ to enable Vue.js frontend</span>
                </div>
                <div class="step">
                    <div class="bullet"></div>
                    <span>Download from: <strong>https://nodejs.org/</strong></span>
                </div>
                <div class="step">
                    <div class="bullet"></div>
                    <span>After upgrading, run: <code>npm install && npm run dev</code></span>
                </div>
                <div class="step">
                    <div class="bullet"></div>
                    <span>Check <code>README.md</code> for complete documentation</span>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Created by <strong>Mandy Lam</strong> • Full Stack Engineer</p>
        </div>
    </div>
</body>
</html>
