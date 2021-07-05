



<header>

  <div id="header-top">
     
    <img src="/phpmotors/images/site/logo.png" alt="phpmotors logo" />

    <div class='topLink'>
      <div style="height: 20px;">
        <?php if(isset($_SESSION['clientData'])) {
          $cookieFirstname = $_SESSION['clientData']['clientFirstname'];
          $link = "/phpmotors/accounts";
          if($_SESSION['clientData']['clientLevel'] > 1)
            $link = "/phpmotors/accounts/index.php?action=admin";
          
          echo "<a href='$link'><span> Welcome, $cookieFirstname </span></a>";
        }
        ?>
     </div>

      <?php 
        if (isset($_SESSION['loggedin'])) {
          echo '<a id="account" href="/phpmotors/accounts/index.php?action=logout" title="Logout from your session">Logout</a>';
        } else {
          echo '<a href="/phpmotors/accounts/?action=loginUser" title="Manage your account here" class="account">My Account</a>';
        }
      ?>
     
    </div>
  </div>

  

    <nav>
         <?php echo $navList; ?>
    </nav>

</header>