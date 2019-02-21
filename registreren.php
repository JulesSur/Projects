<?php
    include_once 'php/header.php';
?>


<body>
    <header>
        <h2>Registreren</h2>
    </header>

    <div id="container">
        <section id="aanmelden">
            <form class="signup-form" action="php/signup.php" method="POST">
                <input type="text" name="mail" minlength="3" maxlength="40" placeholder="Mailadres" required>
                <input type="password" name="pwd" minlength="3" maxlength="12" placeholder="Wachtwoord" required>
                <input id="loginPaswoordCheck" type="password" minlength="3" maxlength="12" placeholder="Bevestig Wachtwoord" required>
                <button type="submit" name="submit">Registreren</button>
            </form>
        </section>
    </div>
</body>
</html>
