<section>
    <h2 class="section-title">Nie jesteś zalogowany.</h2>
    <div class="section-content">Wprowadź poniżej swoje dane, aby skorzystać z funkcjonalności systemu.</div>
    
    <?php 
  
    if (isset($auth_err))
    {
        echo $auth_err;
    }

    echo validation_errors();
    echo form_open('account/login');

    ?>
        <input type="input" name="username" placeholder="Login">
        <input type="password" name="password" placeholder="Hasło">
        <input type="submit" name="submit" value="Zaloguj się">
    </form>

    Nie masz konta? <a href="#">Zarejestruj się</a>
</section>