<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeu concours - Faites tourner la roue !</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--------custom-css----------->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
     <!--------responsive-css----------->
    <link rel="stylesheet" type="text/css" href="{{asset('css/resposive.css')}}">
  </head>
  <body>

  <!-----------main-baner----------->
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
            <!-- <div id="wheel" class="wheel wheel_font-size--4">
              <svg font-size="0.6rem" height="616px" width="476px" viewBox="0 0 516 616"><g class="wrapper" transform="translate(258, 308)"><defs><filter id="shadow" x="-100%" y="-100%" width="550%" height="550%"><feOffset in="SourceAlpha" dx="0" dy="0" result="offsetOut"></feOffset><feGaussianBlur stdDeviation="9" in="offsetOut" result="drop"></feGaussianBlur><feColorMatrix in="drop" result="color-out" type="matrix" values="0 0 0 0   0
                0 0 0 0   0
                0 0 0 0   0
                0 0 0 .3 0
              "></feColorMatrix><feBlend in="SourceGraphic" in2="color-out" mode="normal"></feBlend></filter></defs><g class="wheelholder"><g><path class="slice" d="M1.1899950416728537,-237.9970250061979A238,238,0,0,1,237.9970250061979,-1.1899950416728646L0,0Z" stroke="#000000" stroke-width="3" fill="#fffb00"></path><path class="slice" d="M237.9970250061979,1.1899950416728646A238,238,0,0,1,1.1899950416728537,237.9970250061979L0,0Z" stroke="#000000" stroke-width="3" fill="#00f900"></path><path class="slice" d="M-1.1899950416728247,237.9970250061979A238,238,0,0,1,-237.9970250061979,1.1899950416728684L0,0Z" stroke="#000000" stroke-width="3" fill="#ff9300"></path><path class="slice" d="M-237.9970250061979,-1.18999504167281A238,238,0,0,1,-1.1899950416728828,-237.9970250061979L0,0Z" stroke="#000000" stroke-width="3" fill="#ff2600"></path><path class="hiddenarcs" id="middleArc0" d="M1.1899950416728537 -237.9970250061979A238 238 0 0 1 237.9970250061979 -1.1899950416728646" style="fill: none;"></path><path class="hiddenarcs" id="middleArc1" d="M1.1899950416728537 237.9970250061979A238 238 0 0 0237.9970250061979 1.1899950416728646" style="fill: none;"></path><path class="hiddenarcs" id="middleArc2" d="M-237.9970250061979 1.1899950416728684A238 238 0 0 0-1.1899950416728247 237.9970250061979" style="fill: none;"></path><path class="hiddenarcs" id="middleArc3" d="M-1.1899950416728828 -237.9970250061979A238 238 0 0 0-237.9970250061979 -1.18999504167281" style="fill: none;"></path><text class="middleArcText" dy="42"><textPath startOffset="50%" text-anchor="middle" fill="#000000" xlink:href="#middleArc0">une boisson</textPath></text><text class="middleArcText" dy="-35"><textPath startOffset="50%" text-anchor="middle" fill="#000000" xlink:href="#middleArc1">un dessert</textPath></text><text class="middleArcText" dy="-35"><textPath startOffset="50%" text-anchor="middle" fill="#000000" xlink:href="#middleArc2">une entrée</textPath></text><text class="middleArcText" dy="-35"><textPath startOffset="50%" text-anchor="middle" fill="#000000" xlink:href="#middleArc3">un burger + frites</textPath></text></g><circle cx="0" cy="0" r="95.2" fill="#ffffff" filter="url(#shadow)" stroke-width="4" stroke="#000000"></circle><g><circle cx="0" cy="0" r="236" fill="transparent" stroke-width="8" filter="url(#shadow)" stroke="#ffffff"></circle></g><image x="-59.5" y="-59.5" width="119" height="119" xlink:href="https://static.heypongo.com/contest-games/images/2602_logo_1692365848.png"></image><g><path d="M95.3,9.8c-16.5,0-23.7,15.6-21.9,27c3.4,21.7,21.9,42.2,21.9,42.2s18.5-20.5,21.9-42.2 C118.9,25.4,111.8,9.8,95.3,9.8z" transform="matrix(1, 0, 0, 1, -95, -288)" stroke="#ffffff" fill="#FFFFFF" filter="url(#shadow)" stroke-linejoin="round" stroke-width="4"></path></g></g></g></svg>
            </div> -->
            <div id="chart">

            </div>
    
          </div>

          <!------------------------>
          <div class="col-lg-6 form_wrap">
            <div>
            <form method="POST" action="{{ route('users.store') }}">
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

  </body>
  </html>
    <!-- Modal -->
    <div class="modal fade" id="welcome_popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
            <img src="{{asset('images/hearts.813d2d2e.gif')}}" alt="heart">
            <h4>Laissez-nous un avis et gagnez le gros lot</h4>

            <ul>
              <li><span>1</span>  Vous allez être redirigé vers notre page Google</li>
              <li><span>2</span> Laissez-nous un avis ⭐️</li>
              <li><span>3</span>  Revenez sur cet onglet et profitez de vos cadeaux ! 🎁</li>
            </ul>

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Laisser un avis</button>
          </div>
        </div>
      </div>
    </div>
<script src="{{asset('js/main.js')}}"></script>

