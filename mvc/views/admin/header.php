<header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="./">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <?php
                            if (isset($_SESSION['username']))
                            {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth/listuser"><i class="fa fa-home"></i>Go to administration</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"><i class="fa fa-user"></i>:<?php echo $_SESSION['name'] ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth/logout">Logout</a>
                                    </li>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth/login">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth/register">Register</a>
                                    </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- <a href="auth/register">Register</a> -->
    </header>