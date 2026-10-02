<?php
include 'db.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $conn->prepare('select password from user Where email = ?');
    $sql->bind_param('s', $email);
    $sql->execute();
    $user = $sql->get_result()->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $email;
        header('Location: home.php');
        
    }

   
}
?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h3 class="text-center my-4">Login page</h3>
           <div
                class="container boder shadow p-3 rounded col-4 "
            >
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="email"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="password"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">password</label>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        submit
                    </button>
                    
                </form>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
