<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mass Email Form</title>
    <?php require('layouts/header.html')?>
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
    <?php require('layouts/navbar.html');?>
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert alert-success">All emails have been sent Successfully!</div>
    <?php endif; ?>
    <div class="card shadow my-3">
        <div class="card-header">
            <h3 class="text-center">Send Bulk Emails</h3>
        </div>
        <div class="card-body">
        <form action="send-email.php" method="POST">
            <div class="form-group mt-3">
                <label for="emails">Enter Email Addresses (comma-separated):</label>
                <!-- <textarea class="form-control" id="emails" name="emails" oninput="autoSize(this)" rows="2" required></textarea> -->
                <input type="text" class="form-control" id="emails" name="emails" required>
            </div>

            <div class="form-group mt-3">
                <label for="subject">Email Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>

            <div class="form-group mt-3">
                <label for="message">Email Message:</label>
                <textarea class="form-control" id="message" name="message" oninput="autoSize(this)" rows="4" required></textarea>
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
        delimiters: ", ",  // Allow emails to be separated by a comma
        pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,  // Email validation pattern
        whitelist: [],
        maxTags: Infinity,  // No limit on the number of tags
        dropdown: {
            enabled: 0,  // No suggestions dropdown
        }
    });
</script>
</body>
</html>
