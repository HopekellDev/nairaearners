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
        $this->site_description=$site_description;


    }
}