<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/store">ShopDT <span class="sr-only"></span></a>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['name'])): ?>
                    <a class="nav-link" href="/profile">Profile
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        </svg>
                    </a>
                    <a class="nav-link" href="/cart">Cart
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-cart4" viewBox="0 0 16 16">
                        </svg>
                    </a>
                    <a class="nav-link" href="/logout">Logout
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        </svg>
                    </a>
                <?php else: ?>
                    <a class="nav-link" href="/login">Login
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                         </svg>
                    </a>
                    <a class="nav-link" href="/register">Register
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-square" viewBox="0 0 16 16">
                    </svg>
                    </a>
                <?php endif; ?>


            </ul>
        </div>
    </div>
</nav>
