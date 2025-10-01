<?php
  // Carreguem la lògica: prepara $errors, $old i $success
  require_once __DIR__ . '/server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register demo</title>
</head>
<body>

  <main>
    <h1>Register</h1>

    <?php if (!empty($success)) : ?>
      <section>
        <p>✅ <?= htmlspecialchars($success) ?></p>
      </section>
    <?php endif; ?>

    <?php if (!empty($errors)) : ?>
      <section>
        <p>❌ Hi ha errors al formulari.</p>
      </section>
    <?php endif; ?>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <fieldset>
        <legend>Dades bàsiques</legend>

        <div>
          <label for="username">Name</label>
          <input
            type="text"
            name="username"
            value="<?= htmlspecialchars($old['username'] ?? '') ?>"
          >
          <span id="username-error"><?= $errors['username'] ?? '' ?></span>
        </div>

        <div>
          <label for="email">Email</label>
          <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($old['email'] ?? '') ?>"
          >
          <span id="email-error"><?= $errors['email'] ?? '' ?></span>
        </div>

        <div>
          <label for="password">Password</label>
          <input
            type="password"
            name="password"
          >
          <span id="password-error"><?= $errors['password'] ?? '' ?></span>
        </div>
      </fieldset>

      <fieldset>
        <legend>Perfil</legend>

        <div>
          <span>Gender</span>
          <div>
            <input
              type="radio"
              name="gender"
              value="male"
              id="gender-male"
              <?= (isset($old['gender']) && $old['gender'] === 'male') ? 'checked' : '' ?>
            >
            <label for="gender-male">Male</label>
          </div>
          <div>
            <input
              type="radio"
              name="gender"
              value="female"
              id="gender-female"
              <?= (isset($old['gender']) && $old['gender'] === 'female') ? 'checked' : '' ?>
            >
            <label for="gender-female">Female</label>
          </div>
          <span id="gender-error"><?= $errors['gender'] ?? '' ?></span>
        </div>

        <div>
          <span>Interests</span>
          <?php
            $allInterests = ['computing' => 'Computing', 'web' => 'Web'];
            foreach ($allInterests as $val => $label) :
                $checked = (!empty($old['interests']) && in_array($val, $old['interests'], true)) ? 'checked' : '';
                ?>
            <div>
              <input
                type="checkbox"
                name="interests[]"
                id="int-<?= $val ?>"
                value="<?= $val ?>"
                <?= $checked ?>
              >
              <label for="int-<?= $val ?>"><?= $label ?></label>
            </div>
            <?php endforeach; ?>
          <span id="interests-error"><?= $errors['interests'] ?? '' ?></span>
        </div>
      </fieldset>

      <div>
        <button type="submit">Register</button>
      </div>
    </form>
  </main>

</body>
</html>
