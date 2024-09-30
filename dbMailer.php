<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mass Email Form</title>
    <?php require('layouts/header.html') ?>
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <style>
        textarea {
            resize: none;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <?php require('layouts/navbar.html'); ?>
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="alert alert-success">All emails have been sent Successfully!</div>
        <?php endif; ?>
        <?php
        // Include the database configuration file
        require('config.php');

        // Fetch active emails
        $tableName = 'clients'; // Replace with your table name
        $emails = [];

        try {
            // Query to get active emails
            $sql = "SELECT email FROM $tableName WHERE status = 'active' AND email IS NOT NULL AND email != ''";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            // Fetch emails
            while ($row = $stmt->fetch()) {
                $emails[] = $row['email'];
            }
        } catch (PDOException $e) {
            echo "Error fetching emails: " . $e->getMessage();
        }

        // Convert emails array to a comma-separated string
        $emailList = implode(', ', $emails);
        // echo $emailList;
        ?>
        <div class="card shadow my-3 w-50 m-auto">
            <div class="card-header">
                <h3 class="text-center">Send Bulk Emails</h3>
            </div>
            <div class="card-body">
                <form action="send-email.php" method="POST">
                    <div class="form-group mt-3">
                        <label for="emails">Enter Email Addresses (comma-separated):</label>
                        <input type="text" class="form-control" id="emails" name="emails" value="<?= htmlspecialchars($emailList); ?>" placeholder="Enter Reciptent address" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="subject">Email Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Email subject" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="message">Email Message:</label>
                        <textarea class="form-control" id="message" name="message" oninput="autoSize(this)" rows="4" placeholder="Enter Email Message" required></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="link">Full URL Link Subject: (optional)</label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="https://www.example.com/">
                    </div>

                    <button type="submit" class="btn btn-primary my-2">Send Emails</button>
                </form>
            </div>
        </div>

    </div>
    <script>
        function autoSize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    </script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script>
        // Initialize Tagify on the #emails input
        var input = document.querySelector('#emails');
        var tagify = new Tagify(input, {
            delimiters: ", ", // Allow emails to be separated by a comma
            pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/, // Email validation pattern
            whitelist: [],
            maxTags: Infinity, // No limit on the number of tags
            dropdown: {
                enabled: 0, // No suggestions dropdown
            }
        });
    </script>
</body>

</html>