<?php
session_start();

if (isset($_SESSION['connected_id']) && !empty($_SESSION['connected_id']) && $_SESSION['connected_type'] == "admin")
{
    echo "oui";
}
else
{
    echo "non";
}
