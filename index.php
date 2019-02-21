<?php
    include_once 'php/header.php';
?>


<body>
    <header>
        <h1>Feeds</h1>
    </header>

    <div id="container">
        <section id="aanmelden">
            <form action="php/login.php" method="POST">
                <input type="text" name="mail" minlength="3" maxlength="40" placeholder="Mailadres" required>
                <input type="password" name="pwd" minlength="3" maxlength="12" placeholder="Wachtwoord" required>
                <button type="submit" name="submit">Aanmelden</button>
                <a href="registreren.php">Registreren</a>
            </form>
        </section>
    </div>
</body>
</html>