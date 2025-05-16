
# 🔐 Démonstration de la vulnérabilité XSS réfléchie en PHP

Ce projet démontre une vulnérabilité de type **Cross-Site Scripting (XSS) réfléchie** à l'aide d'un système de connexion PHP minimal. Il inclut une version vulnérable et une version corrigée, avec des explications détaillées, des liens d’attaque, et les meilleures pratiques de sécurisation.

---

## 📚 Définition du XSS Réfléchi

Le **XSS réfléchi** se produit lorsqu’une application web renvoie des données saisies par l’utilisateur dans la réponse HTML sans les valider ni les échapper correctement. Cela permet à un attaquant d’injecter du JavaScript qui sera exécuté par le navigateur.

---

## 🧪 Liens d’attaque à tester

### 1. Fuite d’informations (non malveillante mais risquée)
```
http://localhost:8000/process.php?username=test&password=wrong
```
➡ Affiche directement les identifiants dans la page **et dans l’URL**, risquant d’exposer des informations sensibles.

### 2. Script XSS malveillant
```
http://localhost:8000/process.php?username=<script>alert(1)</script>&password=123
```
➡ Le script JavaScript est **exécuté**, prouvant que l'application est vulnérable.

---

## ⚙️ Instructions d'installation

1. Installez PHP sur votre machine :
   ```
   php -v
   ```

2. Créez un dossier `xss-demo` contenant :
   - `index.php`
   - `process.php`

3. Lancez un serveur local :
   ```
   php -S localhost:8000
   ```

4. Allez sur : `http://localhost:8000/index.php`

---

## 🔓 Code vulnérable

### `index.php` (formulaire vulnérable)

[insérer ici le code HTML complet du formulaire vulnérable, déjà dans le projet]

### `process.php` (réflexion non sécurisée)

```php
<?php
header("Content-Type: text/html; charset=UTF-8");

$username = $_GET['username'];
$password = $_GET['password'];

if ($username === 'test' && $password === 'password') {
    $message = "Login successful!";
} else {
    $message = "Invalid username or password. You entered: username=" . $username . ", password=" . $password;
}

$response = "<html><body><p>$message</p></body></html>";
echo $response;
?>
```

---

## ✅ Code sécurisé (même structure, corrigée)

### `process.php` corrigé

```php
<?php
header("Content-Type: text/html; charset=UTF-8");

$username = isset($_GET['username']) ? htmlspecialchars($_GET['username'], ENT_QUOTES, 'UTF-8') : '';
$password = isset($_GET['password']) ? htmlspecialchars($_GET['password'], ENT_QUOTES, 'UTF-8') : '';

if ($username === 'test' && $password === 'password') {
    $message = "Login successful!";
} else {
    $message = "Invalid username or password. You entered: username=" . $username . ", password=" . $password;
}

$response = "<html><body><p>$message</p></body></html>";
echo $response;
?>
```

---

## ✅ Mesures de sécurité appliquées

- `htmlspecialchars()` empêche le navigateur d’exécuter du code HTML/JS
- Préservation du comportement initial
- Facilement testable avec les mêmes URL

---

## 📌 Conclusion

Ce projet montre :

- Comment un XSS réfléchi fonctionne
- Pourquoi il est dangereux
- Comment le corriger proprement sans réécrire toute l'application

> Toujours valider et échapper les données utilisateur !

---

## 🔗 Ressources utiles

- [OWASP : Cross-Site Scripting](https://owasp.org/www-community/attacks/xss/)
- [PHP : htmlspecialchars()](https://www.php.net/manual/fr/function.htmlspecialchars.php)
- [MDN Web Docs : XSS](https://developer.mozilla.org/fr/docs/Web/Security/Types_of_attacks/XSS)
