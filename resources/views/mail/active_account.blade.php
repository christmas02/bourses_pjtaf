<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un programme de bourses dédié à la promotion et à la valorisation des compétences dans le digital, le numérique et les sciences fondamentales appliquées">
    <meta name="keywords" content="Programme de bourses, promotion des compétences, valorisation des talents, formation académique, soutien éducatif">
    <meta name="author" content="Yango">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>Confirmation de votre compte - Yango Fellowship</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f6f7fb;
            display: block;
            width: 650px;
            padding: 0 12px;
        }

        a {
            text-decoration: none;
        }

        span {
            font-size: 14px;
        }

        p {
            font-size: 13px;
            line-height: 1.7;
            letter-spacing: 0.7px;
            margin-top: 0;
        }

        .text-center {
            text-align: center
        }

        @media only screen and (max-width: 767px) {
            body {
                width: auto;
                margin: 20px auto;
            }

            .logo-sec {
                width: 500px !important;
            }
        }

        @media only screen and (max-width: 575px) {
            .logo-sec {
                width: 400px !important;
            }
        }

        @media only screen and (max-width: 480px) {
            .logo-sec {
                width: 300px !important;
            }
        }

        @media only screen and (max-width: 360px) {
            .logo-sec {
                width: 250px !important;
            }
        }
    </style>
</head>

<body style="margin: 30px auto;">
    <table style="width: 100%">
        <tbody>
            <tr>
                <td>
                    <table style="background-color: #f6f7fb; width: 100%">
                        <tbody>
                            <tr>
                                <td>
                                    <table style="margin: 0 auto; margin-bottom: 30px">
                                        <tbody>
                                            <tr class="logo-sec" style="display: flex; align-items: center; justify-content: space-between; width: 650px;">
                                                <td>
                                                    <img class="img-fluid for-light" src="{{asset('/assets/images/logo/logo_dark.png')}}" alt="" style="width: 300px; height: auto;">
                                                </td>
                                                <td style="text-align: right; color:#999"><span></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style=" margin: 0 auto; background-color: #fff; border-radius: 8px">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 30px">
                                                    <p>Bienvenue, {{ $newUser['name'] }} !</p>

                                                    <p>
                                                        Afin de bénéficier pleinement des services de la plateforme de candidature
                                                        <strong>Bourses & Accélérateur de Jeunes Talents TOP TAX International</strong>, nous vous invitons à confirmer votre compte
                                                        en cliquant sur le bouton d’activation ci-dessous.
                                                    </p>

                                                    <p>
                                                        Pour toute assistance, veuillez nous contacter à l’adresse
                                                        <a href="mailto:info@fondationbenianh.org">info@fondationbenianh.org</a>
                                                        ou au <strong>+225 07 04 43 65 03</strong> (appels ou WhatsApp).
                                                    </p>

                                                    <div class="text-center">
                                                        <a href="{{ route('confirmCompte', [
                                                                        'user_id' => $newUser['user_id'],
                                                                        'token' => $newUser['confirmation_token']
                                                                    ]) }}"
                                                            style="background-color: #006666; color: #fff; display: inline-block;
                                                                                border-radius: 30px; margin-bottom: 18px; font-weight: 600;
                                                                                padding: 0.6rem 1.75rem; text-decoration: none;">
                                                            Activer mon compte
                                                        </a>
                                                    </div>

                                                    <p style="margin-bottom: 0">
                                                        Merci pour votre confiance.
                                                    </p>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style=" margin: 0 auto; margin-top: 30px">
                                        <tbody>
                                            <tr style="text-align: center">
                                                <td>
                                                    <p style="color: #999; margin-bottom: 0">Cocody Riviera Bonoumin Abidjan, Cote d'ivoire</p>
                                                    <p style="color: #999; margin-bottom: 0">Tous droits réservés, Fondation Benianh</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>