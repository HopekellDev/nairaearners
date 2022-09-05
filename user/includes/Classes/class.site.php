<?php
include "./includes/db.php";

class WebSettings {
    function getSetings()
    {
        global $conn;
        $site_seetings = $conn->query("SELECT * FROM settings WHERE id = 1");
        $row = $site_seetings->fetch_assoc();
        extract($row);
        $this->site_name = $site_name;
        $this->currency = $currency;
        $this->currency_symbol = $currency_symbol;
        $this->reg_bonus = $reg_bonus;
        $this->min_withdraw = $min_withdraw;
        $this->ads_fee = $ads_fee ;
        $this->pstk_public_key = $pstk_public_key;
        $this->site_url = $site_url;
        $this->site_email=$site_email;
        $this->site_phone=$site_phone;
        $this->seo_title=$seo_title;
        $this->site_description = $site_description;
        $this->bank_details = $bank_details;
        $this->usdt_wallet = $usdt_wallet;
        $this->busd_wallet = $busd_wallet;


    }
}


class SMTPSettings
{
    function getSettings()
    {
        global $conn;
        $mail_seetings = $conn->query("SELECT * FROM mail_settings WHERE id = 1");
        $mail = $mail_seetings->fetch_assoc();
        extract($mail);
        $this->smtp_host = $smtp_host;
        $this->smtp_port = $smtp_port;
        $this->encryption = $encryption;
        $this->smtp_user = $smtp_user;
        $this->smtp_pass = $smtp_pass;
        $this->smtp_email = $smtp_email;
        $this->smtp_from = $smtp_from;
    }
}


// FontEnd
Class FrontEnd
{
    function GetFrontEnd()
    {
        global $conn;

        $frontend = $conn->query("SELECT * FROM frontend WHERE id= 1 Limit 1");
        $row = $frontend->fetch_assoc();
        extract($row);
        $this->logo = $logo;
        $this->icon = $icon;
    }
}