<?php

$lang['catalog__title']                             = 'Katalog';
$lang['catalog__action_borrow']                     = 'Wypożycz';
$lang['catalog__action_cancel']                     = 'Anuluj';
$lang['catalog__action_confirm']                    = 'Potwierdź';
$lang['catalog__action_return']                     = 'Zwróć';
$lang['catalog__book_author']                       = 'Autor';
$lang['catalog__book_status']                       = 'Status';
$lang['catalog__book_title']                        = 'Tytuł';
$lang['catalog__borrowing_status']                  = [ 
                                                        'misc_err'      => 'Wystąpił nieznany błąd. Spróbuj ponownie.',
                                                        'auth_err'      => 'Nie masz uprawnień do wykonania tej operacji.',
                                                        'no_user'       => 'Nie ma użytkownika o podanym identyfikatorze!',
                                                        'bw_reserve'    => 'Książka została zarezerwowana.',
                                                        'bw_confirm'    => 'Wypożyczenie książki zostało potwierdzone.',
                                                        'bw_cancel'     => 'Rezerwacja książki została anulowana.',    
                                                        'bw_return'     => 'Zwrócenie książki zostało potwierdzone.'
                                                    ];

$lang['catalog__sections_main_title']               = 'Książki';
$lang['catalog__sections_main_text']                = 'Na poniższej liście znajdują się wszystkie książki zarejestrowane w systemie. Odwiedzaj tę stronę regularnie, aby nie przegapić żadnej pozycji!';
$lang['catalog__section_confirm_title']             = 'Potwierdź wypożyczenie.';
$lang['catalog__borrowing_confirm_box']             = 'Czy potwierdzasz wypożyczenie?';
$lang['catalog__section_cancel_title']              = 'Anuluj rezerwację.';
$lang['catalog__borrowing_cancel_box']              = 'Czy na pewno chcesz anulować rezerwację?';
$lang['catalog__section_return_title']              = 'Zwróć książkę.';
$lang['catalog__borrowing_return_box']              = 'Czy potwierdzasz zwrot książki?';

$lang['account__title']                             = 'Moje konto';
$lang['account__section_librarian_title']           = 'Bibliotekarz.';
$lang['account__section_librarian_text']            = 'Moduł przeznaczony wyłącznie dla bibliotekarza.';
$lang['account__section_main_title']                = 'Cześć';        
$lang['account__section_main_text']                 = 'To jest strona główna Twojego profilu ‒ tutaj możesz dostosować ustawienia idealne właśnie dla Ciebie.';
$lang['account__section_login_title']               = 'Nie jesteś zalogowany.';
$lang['account__section_login_text']                = 'Wprowadź poniżej swoje dane, aby skorzystać z funkcjonalności systemu.';
$lang['account__section_login_form_label_1']        = 'Nazwa użytkownika';
$lang['account__section_login_form_label_2']        = 'Hasło';
$lang['account__section_login_form_submit']         = 'Zaloguj się';
$lang['account__section_login_form_no_account']     = 'Nie masz konta?';
$lang['account__section_login_form_sign_up']        = 'Zarejestruj się!';
$lang['account__section_settings_title']            = 'Preferencje.';        
$lang['account__section_settings_text']             = 'Lorem ipsum.';
$lang['account__section_remove_title']              = 'Opuść nas.';
$lang['account__section_remove_text']               = 'Procedura spowoduje usunięcie większości danych powiązanych z Tobą w systemie.';
$lang['account__section_remove_box']                = 'Czy na pewno chcesz usunąć swoje konto?<br><strong><u>Operacja nieodwracalna.</u></strong>';
$lang['account__section_removal_success_title']     = 'Opuściłeś nas.'; 
$lang['account__section_removal_success_text']      = 'Mamy nadzieję, że spotkamy się już wkrótce!'; 

$lang['home__title']                                = 'Strona główna';
$lang['home__section_main_title']                   = 'Witaj świecie!';
$lang['home__section_main_text']                    = 'Witaj na stronie głównej <strong>libsys</strong> ‒ nowoczesnego narzędzia do zarządzania zasobami bibliotecznymi.<br>Skorzystaj z menu, aby odkryć wszystkie niezliczone funkcjonalności systemu!';

$lang['news__title']                                = 'Aktualności';
$lang['news__section_main_title']                   = 'Co nowego?';
$lang['news__read_more']                            = 'Czytaj więcej';
$lang['news__go_back']                              = 'Wróć do Aktualności';
$lang['news__add']                                  = 'Nowy wpis';
$lang['news__section_add_title']                    = 'Dodaj wpis.';
$lang['news__section_add_form_label_1']             = 'Tytuł';
$lang['news__section_add_form_label_1__err_req']    = 'Wpis musi posiadać tytuł.';
$lang['news__section_add_form_label_1__min_len']    = 'Tytuł wpisu musi składać się z co najmniej %s znaków.';
$lang['news__section_add_form_label_1__max_len']    = 'Tytuł wpisu nie może składać się z więcej niż %s znaków.';
$lang['news__section_add_form_label_2']             = 'Treść';
$lang['news__section_add_form_label_2__err_req']    = 'Wpis nie może być pusty.';
$lang['news__section_add_form_label_2__min_len']    = 'Treść wpisu musi składać się z co najmniej %s znaków.';
$lang['news__section_add_form_label_2__max_len']    = 'Treść wpisu nie może składać się z więcej niż %s znaków.';
$lang['news__section_add_form_submit']              = 'Zapisz';
$lang['news__addition_status_success']              = 'Wpis został dodany.';
$lang['news__addition_status_error']                = 'Wystąpił problem podczas dodawania wpisu.';

$lang['map__title']                                 = 'Lokalizacje';

$lang['field_required']                             = 'Pole &#x201e;%s&#x201d; jest wymagane.';
$lang['field_invalid_chars']                        = 'Pole &#x201e;%s&#x201d; zawiera niedozwolone znaki.';

$lang['contact__title']                             = 'Kontakt';
$lang['contact__section_main_title']                = 'Poznajmy się.';
$lang['contact__section_main_text']                 = 'Masz pytania związane z systemem <strong>libsys</strong>? Wiesz, jak udoskonalić jego działanie? Znalazłeś błąd? Jeżeli Twoja odpowiedź na co najmniej jedno z tych pytań jest twierdząca, nie wahaj się &#x2012; napisz do mnie już dziś!';
$lang['contact__section_main_form_label_1']         = 'Imię i nazwisko';
$lang['contact__section_main_form_label_2']         = 'E-mail';
$lang['contact__section_main_form_label_3']         = 'Wiadomość';
$lang['contact__section_main_form_submit']          = 'Wyślij';
$lang['contact__section_main_form_err_email']       = 'Musisz podać poprawny adres e-mail.';
$lang['contact__section_main_form_err_msg']         = 'Wiadomość musi składać się z co najmniej %s znaków.';
$lang['contact__form_status_success']               = 'Twoja wiadomość została wysłana.';
$lang['contact__form_status_error']                 = 'Wystąpił błąd. Spróbuj ponownie.';

$lang['logout__title']                              = 'Wyloguj się';
$lang['error__title']                               = 'Błąd';
$lang['error_404__section_main_text']               = 'Żądana strona nie została znaleziona.';

$lang['word_yes']                                   = 'Tak';
$lang['word_no']                                    = 'Nie';

$lang['alerts__redirect']                           = 'Przekierowanie nastąpi za';
$lang['alerts__account_deleted']                    = 'Twoje konto zostało usunięte.';

$lang['months_genitives']                           = ['stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia'];
$lang['year_genitive']                              = 'roku';
$lang['hour_abbreviated']                           = 'godz.';

$lang['book']                                       = 'Książka';
$lang['user']                                       = 'Użytkownik';
