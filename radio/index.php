<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Station</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Heavy Metal Radio Station</h1>
    
    <!-- Form to add Genre -->
    <form action="add_genero.php" method="POST">
        <h2>Add Genre</h2>
        <label>Name:</label> <input type="text" name="nombre" required>
        <label>Description:</label> <input type="text" name="descripcion">
        <button type="submit">Add Genre</button>
    </form>

    <!-- Form to add Song -->
    <form action="add_cancion.php" method="POST">
        <h2>Add Song</h2>
        <label>Title:</label> <input type="text" name="Titulo" required>
        <label>Artist:</label> <input type="text" name="Artista" required>
        <label>Album:</label> <input type="text" name="Album">
        <label>Release Year:</label> <input type="number" name="ReleaseYear" min="1900" max="2025" required>
        <label>Genre:</label>
        <select name="GeneroID" required>
            <option value="">Select Genre</option>
            <?php include 'fetch_generos.php'; ?>
        </select>
        <button type="submit">Add Song</button>
    </form>

    <!-- Form to add Booth -->
    <form action="add_cabina.php" method="POST">
        <h2>Add Booth</h2>
        <label>Name:</label> <input type="text" name="Nombre" required>
        <label>Location:</label> <input type="text" name="Locacion">
        <label>Capacity:</label> <input type="number" name="Capacidad">
        <button type="submit">Add Booth</button>
    </form>

    <!-- Form to add Frequency -->
    <form action="add_frecuencia.php" method="POST">
        <h2>Add Frequency</h2>
        <label>Wave (AM/FM):</label> <input type="text" name="onda" required>
        <label>Value:</label> <input type="number" name="valor" step="0.1" required>
        <button type="submit">Add Frequency</button>
    </form>

    <!-- Form to add Radio Host -->
    <form action="add_radio_host.php" method="POST">
        <h2>Add Radio Host</h2>
        <label>Name:</label> <input type="text" name="Nombre" required>
        <label>Alias:</label> <input type="text" name="Alias">
        <label>Experience (years):</label> <input type="number" name="Experiencia" min="0">
        <label>Booth:</label>
        <select name="cabinaID" required>
            <option value="">Select Booth</option>
            <?php include 'fetch_cabinas.php'; ?>
        </select>
        <button type="submit">Add Radio Host</button>
    </form>

    <!-- Form to add Program -->
    <form action="add_programa.php" method="POST">
        <h2>Add Program</h2>
        <label>Name:</label> <input type="text" name="Nombre" required>
        <label>Air Time:</label> <input type="time" name="AirTime" required>
        <label>Duration (minutes):</label> <input type="number" name="DuracionMinutos" min="1" required>
        <label>Frequency:</label>
        <select name="FrecuenciaID" required>
            <option value="">Select Frequency</option>
            <?php include 'fetch_frecuencias.php'; ?>
        </select>
        <label>Host:</label>
        <select name="HostID" required>
            <option value="">Select Host</option>
            <?php include 'fetch_hosts.php'; ?>
        </select>
        <button type="submit">Add Program</button>
    </form>

    <!-- Form to add Playlist Entry -->
    <form action="add_playlist.php" method="POST">
        <h2>Add Playlist Entry</h2>
        <button type="submit">Add to Playlist</button>
        <label>Position:</label> <input type="number" name="Posicion" min="1" required>
        <label>Song:</label>
        <select name="CancionID" required>
            <option value="">Select Song</option>
            <?php include 'fetch_canciones.php'; ?>
        </select>
        
        <label>Program:</label>
        <select name="ProgramaID" required>
            <option value="">Select Program</option>
            <?php include 'fetch_programas.php'; ?>
        </select>
        
    </form>
</body>
</html>
