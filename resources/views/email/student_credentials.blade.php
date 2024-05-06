<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Credentials</title>
</head>
<body>
    <p>Dear {{ $name }},</p> <br>

    <p>We are pleased to provide you with your student login credentials:</p>
    <p><strong>ID Number:</strong> {{ $student_id }}</p>
    <p><strong>Password:</strong> {{ $password }}</p> <br>

    <p>Please keep this information confidential and do not share it with anyone.</p> <br>

    <p>Best regards,</p>
    <p>PRRMS Admin</p>
</body>
</html>
