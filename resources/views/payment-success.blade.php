<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement effectué</title>
</head>
<body>
    <h1>Paiement éffectué avec succès</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>Votre paiement a été éffectué avec succès !</p>
    
</body>
</html>