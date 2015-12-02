# EZCaptcha
A simple, drop-in bot prevention tool.

Usage
=====
1. Edit config.php and upload the files to your site.
2. Display img/captcha.php as an image on any page you wish to secure.
3. Check `hash('sha256', $_POST['captcha'])` against `$_COOKIE['captcha']`
4. If they match, the answer is valid.
