<!DOCTYPE html>
<html>
<head>
    <title>QR Code View</title>
</head>
<body>
    <h1>QR Code</h1>
    <img src="data:image/svg+xml;base64,{{ base64_encode($QR_Image) }}" alt="QR Code">
</br>
   <h1>Secret: {{ $secret }}</h1>
</body>
</html>
