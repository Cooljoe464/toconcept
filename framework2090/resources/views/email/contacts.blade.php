<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
<h2>New Contact Form Submission</h2>
<p><strong>Name:</strong> {{ $formData['name'] }}</p>
<p><strong>Email:</strong> {{ $formData['email'] }}</p>
<p><strong>Phone:</strong> {{ $formData['phone'] }}</p>
<p><strong>Gender:</strong> {{ $formData['gender'] }}</p>
<p><strong>Shoot Type:</strong> {{ $formData['shoot_type'] }}</p>
<p><strong>Location:</strong> {{ $formData['location'] }}</p>
<p><strong>Expected Number of Individuals:</strong> {{ $formData['no_of_individuals'] }}</p>
<p><strong>Referred By:</strong> {{ $formData['referred'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $formData['message'] }}</p>
</body>
</html>
