<?php
include "./includes/db.php";

class WebSettings {
    var $site_name;
    var $currency;
    var $currency_symbol;
    var $reg_bonus;
    var $min_withdraw;
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


    }
}