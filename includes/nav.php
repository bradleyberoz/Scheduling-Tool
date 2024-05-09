<nav class='navbar navbar-expand-lg navbar-dark bg-primary fixed-top' aria-label='magmaNav'>
    <div class='container-fluid'>
        <a class='navbar-brand' href='index.php'><img src='images/magma_logo.png' id='navLogo' />Magma Events</a>
        
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSMU' aria-controls='navbarSMU' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        
        <div class='collapse navbar-collapse' id='navbarMagma'>
            
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0  '>
                <li class='nav-item'>
                    <a class='nav-link' aria-current='page' href='#about'>About</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='#services'>Services</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='#support'>Support</a>
                </li>
                

                <?php if (isset($_SESSION['usertype'])) { 
                ?>
                <li class='nav-item'>
                    <a class='nav-link' href='#'>You are logged in as a <?php echo $_SESSION['usertype'] ?></a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='scripts/logoutScript.php'>Log Out</a>
                </li>
                <?php } ?>
            </ul>
        </div>

    </div>
</nav>
