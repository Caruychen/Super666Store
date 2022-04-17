<?php
    function clear_basket()
    {
        unset($_SESSION['basket']);
        unset($_SESSION['total_quantity']);
        unset($_SESSION['total_cost']);
    }
    function compute_summary()
    {
      $_SESSION['total_quantity'] = array_reduce($_SESSION['basket'], "sum_quantity");
      $_SESSION['total_cost'] = array_reduce($_SESSION['basket'], "sum_cost");
    }
    function logout()
    {
      unset($_SESSION['loggued_on_user']);
    }
    function is_loggedin()
    {
      return (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] !== "");
    }
?>