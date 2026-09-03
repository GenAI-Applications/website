<?php
$defaultColor = '#2c3e50';
$submittedColor = $_GET['border_color'] ?? '';
$sanitizedColor = trim($submittedColor);

if ($sanitizedColor !== '' && !preg_match('/^(#[0-9a-fA-F]{3}|#[0-9a-fA-F]{6}|[a-zA-Z]{3,20})$/', $sanitizedColor)) {
    $sanitizedColor = $defaultColor;
}

$borderColor = $sanitizedColor !== '' ? $sanitizedColor : $defaultColor;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeQL vs AI Security Detections</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f9fc;
            margin: 0;
            padding: 24px;
        }
        .content {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            border: 4px solid <?= htmlspecialchars($borderColor, ENT_QUOTES, 'UTF-8') ?>;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
            vertical-align: top;
        }
        th {
            background: #eef3ff;
        }
        .controls {
            margin-top: 20px;
            padding: 12px;
            background: #f4f7ff;
            border-radius: 6px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            padding: 8px;
            width: 220px;
            margin: 0 8px;
        }
        button {
            padding: 8px 12px;
            border: 0;
            border-radius: 4px;
            background: #2f6feb;
            color: #ffffff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main class="content">
        <h1>CodeQL Security Scanning vs AI-Based Security Detections</h1>
        <p>Both approaches improve application security, but they operate differently and are best used together.</p>

        <table aria-label="Comparison between CodeQL and AI-based security detections">
            <thead>
                <tr>
                    <th>Area</th>
                    <th>CodeQL Security Scanning</th>
                    <th>AI-Based Security Detections</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Analysis method</td>
                    <td>Uses static analysis with queries over code semantics and dataflow.</td>
                    <td>Uses learned patterns and contextual reasoning from models.</td>
                </tr>
                <tr>
                    <td>Consistency</td>
                    <td>Highly consistent for known vulnerability classes covered by rules.</td>
                    <td>Can vary by prompt, model behavior, and context quality.</td>
                </tr>
                <tr>
                    <td>Novel issues</td>
                    <td>Limited to what rules and query logic are designed to detect.</td>
                    <td>Can suggest potential unknown or emerging issue patterns.</td>
                </tr>
                <tr>
                    <td>Explainability</td>
                    <td>Findings are tied to explicit query logic and code paths.</td>
                    <td>Explanations can be helpful but may require human validation.</td>
                </tr>
                <tr>
                    <td>Best use</td>
                    <td>Reliable baseline scanning integrated in CI.</td>
                    <td>Assistant-style review to augment rule-based scanning.</td>
                </tr>
            </tbody>
        </table>

        <section class="controls">
            <form method="get" action="index.php">
                <label for="border_color">Border color:</label>
                <input
                    type="text"
                    id="border_color"
                    name="border_color"
                    value="<?= htmlspecialchars($submittedColor, ENT_QUOTES, 'UTF-8') ?>"
                    placeholder="e.g. #1e90ff or green"
                >
                <button type="submit">Apply</button>
            </form>
        </section>
    </main>
</body>
</html>
