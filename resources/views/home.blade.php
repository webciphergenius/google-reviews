<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeu concours - Faites tourner la roue !</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/resposive.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        // Function to set a cookie
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Function to get a cookie
        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        // Function to check if the modal should be shown
        function checkModal() {
            if (!getCookie('modal_shown')) {
                const myModal = new bootstrap.Modal(document.getElementById('welcome_popup'));
                myModal.show();
            }
        }

        // Function to handle the button click and set the cookie
        function handleButtonClick() {
            setCookie('modal_shown', 'true', 1); // Set cookie to expire in 1 day
        }

        document.addEventListener('DOMContentLoaded', function () {
            checkModal(); // Check if the modal should be shown

            // Set up the event listener for the button click
            document.getElementById('modalButton').addEventListener('click', function () {
                handleButtonClick(); // Set the cookie when button is clicked
            });
        });
    </script>
</head>
<body>

<!-----------main-banner----------->
<section class="main_hero_banner">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="banner_content">
                    <h1>TON PROCHAIN BURGER GRATUIT 🍔</h1>
                    <p>Clique et tente ta chance</p>
                    <a href="#" class="button theme_btn">🚀🚀🚀</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!---------------------------->

<!----------------form----------->
<section class="form_spinner_wrap">
    <div class="container">
        <div class="row alc">
            <div class="col-lg-6 text-center">
                <div id="chart"></div>
            </div>

            <div class="col-lg-6 form_wrap">
                <div>
                    <form id="userForm" method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <h2>Fais tourner la roue ...</h2>
                        <p>et dis nous qui tu es pour qu'on t'envoie le butin</p>

                        <div class="mb-3">
                            <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="numero_de_telephone" class="form-control" required size="20" maxlength="15" minlength="9" placeholder="Numéro de téléphone">
                        </div>
                        <div class="mb-3">
                            <input id="email" name="email" class="form-control" required="" type="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Je veux recevoir des cadeaux de la part de mon restaurant
                            </label>
                        </div>

                        <input type="submit" value="Lancer la roue" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!---------------------------------------->

<!------copyright----------->
<section class="copyright_wrap">
    <div class="container">
        <div class="row alc">
            <div class="col-12">
                <p>© Copyright</p>
            </div>
        </div>
    </div>
</section>
<!------------------------------------>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('userForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'THANKS !',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    title: 'ERROR',
                    text: 'The QRcode is already sent to given email',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'ERROR',
                text: 'The QRcode is already sent to given email',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    });
});
</script>

<!-- Modal -->
@if (!isset($_COOKIE['modal_shown']))    <!-- The cookie is not set -->
<div class="modal fade" id="welcome_popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img src="{{ asset('images/hearts.813d2d2e.gif') }}" alt="heart">
                <h4>Laissez-nous un avis et gagnez le gros lot</h4>
                <ul>
                    <li><span>1</span> Vous allez être redirigé vers notre page Google</li>
                    <li><span>2</span> Laissez-nous un avis ⭐️</li>
                    <li><span>3</span> Revenez sur cet onglet et profitez de vos cadeaux ! 🎁</li>
                </ul>
                <button id="modalButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Laisser un avis</button>
            </div>
        </div>
    </div>
</div>
@endif

@if(session('success'))
    <script>
        Swal.fire({
            title: 'THANKS !',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

</body>
</html>
