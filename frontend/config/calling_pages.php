<?php

if (isset($_GET["p"])) {
    $page = $_GET["p"];
} else {
    $page = "home";
}

 
class switch_pages {

    public function pages($page) {

        switch ($page) {

            case "home":
                
                $home = new home(); //declare a variable home from class home.php 
                $home->display_home($page); //execute funtion display home 
                break;

            

            



            case "contact":
                $contact_us = new contact_us();
                $contact_us->display_contact_us($page);
                break;



            

            case "login":
                $login = new login();
                $login->display_login($page);
                break;
            case "profile":
                $profile = new profile();
                $profile->display_profile($page);
                break;

            
            case "games":
                $games = new games();
                $games->display_games($page);
                break;
            case "choosen_games":
                $choosen_game = new games();
                $choosen_game->dispaly_choosen_game($page);
                break;
            
            
            
            case "requestgame":
                $choosen_game = new requestgame();
                $choosen_game->display_request_games($page);
                
                break;


            case "show_result":
                $result = new games();
                $result->test();
                break;

            case "logout":
                $user_logout = new login();
                $user_logout->logout();
                break;

            default :
                $notfound = new notfound();
                $notfound->notfound404($page);
                break;
        }
    }

}
