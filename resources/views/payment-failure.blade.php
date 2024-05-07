<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement échoué</title>
</head>
<body>
    <h1>Paiement échoué</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <p>Un problème est survenu lors du traitement de votre paiement. Veuillez réessayer plus tard ou contacter l'assistance.</p>
    
</body>
</html>