<section>
    <h2 class="section-title">Nie jesteś zalogowany.</h2>
    <div class="section-content">Wprowadź poniżej swoje dane, aby skorzystać z funkcjonalności systemu.</div>
    
<?php if (isset($auth_err)): ?>
    <div class="error"><?php echo $auth_err; ?></div>
<?php endif; ?>

<?php 
    echo validation_errors('<div class="error">', '</div>');
    echo form_open('account/login');
?>
        <label for="username">Nazwa użytkownika</label>
        <input type="input" name="username">
        <label for="password">Hasło</label>
        <input type="password" name="password">
        <button type="submit" name="submit">Zaloguj się</button>
        <span>Nie masz konta? <a href="/account/signup">Zarejestruj się!</a></span>
    </form>
</section>