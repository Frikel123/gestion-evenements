<!-- resources/views/dashboard/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS -->
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur le tableau de bord participant</h1>
        
        <div class="row">
            <div class="col-md-4">
                <h2>Événements à venir</h2>
                <!-- Display upcoming events here -->
            </div>
            <div class="col-md-4">
                <h2>Mes événements</h2>
                <!-- Display user-specific events here -->
            </div>
            <div class="col-md-4">
                <h2>Statistiques</h2>
                <!-- Display statistics or analytics here -->
            </div>
        </div>

        <footer>
            <p>&copy; {{ date('Y') }} Votre Application de Gestion d'Événements</p>
        </footer>
    </div>
</body>
</html>
