<?php

if (isset($_GET["p"])) {
    $page = $_GET["p"];
} elseif (isset($_SESSION["isAdminloggedin"])) {
    $page = "home";
}

class switch_pages {

    public function pages($page) {

        switch ($page) {

            case "home":
                $home = new admin();
                $home->display_overview($page);
                break;

            case "profile":
                $sec = new profile();
                $sec->display_account();
                break;



            case "add_user":
                $new_user = new admin();
                $new_user->display_add_user();
                break;

            case "add_admin":
                $new_user = new admin();
                $new_user->display_add_admin();
                break;

            case "logout":
                $logout = new admin();
                $logout->logout();
                break;

            case "edit_user":
                $edit_user = new admin();
                $edit_user->display_edit_user_role();
                break;

            case "appoint_user":
                $appoint_users = new admin();
                $appoint_users->appoint_user();
                break;


            case "delete":
                $users = new admin();
                $users->delete();
                break;

            case "appoint_admin":
                $set_admin = new admin();
                $set_admin->appoint_admin();
                break;


            case "UsersList":
                $users = new lists();
                $users->user_list();
                break;

            case "Users":
                $users = new lists();
                $users->users();
                break;

            case "admin_table":
                $users = new lists();
                $users->admin();
                break;


            case "admins":
                $adminlist = new lists();
                $adminlist->admin_list();
                break;

            case "security":
                $sec = new profile();
                $sec->display_security($page);
                break;

            case "show_games":
                $show_games = new game();
                $show_games->display_game_area();
                break;
            
            case "pc_features":
                $pc_features_list = new lists();
                $pc_features_list->pc_features_list();
                break;
            
             case "add_pc_features":
                $add_pc_features_list = new game();
                $add_pc_features_list->display_pc_features();
                break;
                

            case "add_game":
                $add_game = new game();
                $add_game->display_add_game();
                break;


            case "edit_game":
                $game_edit = new game();
                $game_edit->display_edit_game();
                break;

            case "show_messages":
                $show_messages = new contact_us();
                $show_messages->message_list();
                break;
            case "reply":
                $reply = new contact_us();
                $reply->display_reply();
                break;



            default :
                $notfound = new notfound();
                $notfound->notfound404($page);
                break;
        }
    }

}
