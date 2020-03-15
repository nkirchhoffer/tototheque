<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Vérification de l'adresse mail</title>
        <style type="text/css">
            body {
                background-color: #e6e6e6;
                text-align: center;
                font-family: Arial, serif;
            }

            section.container {
                width: 50%;
                background-color: #fff;
                border-radius: 10px;
                padding: 10px 25px 50px 25px;

                margin: auto;
            }

            h2 {
                text-align: left;
                margin-bottom: 50px;
            }

            .btn {

            }
        </style>
    </head>
    <body>
        <section class="container">
            <h2>Cher {{ $user->name }},</h2>

            <p>Votre inscription à Totothèque a bien été prise en compte ! Cependant, nous vous demandons de bien vouloir vérifier votre adresse e-mail en cliquant sur le lien ci-dessous :</p>
            <a class="btn"href="{{ route('verification', $token->token) }}">Vérifier mon adresse mail</a>

            <p class="access">Si vous rencontrez des problèmes lors de l'affichage du lien, vous pouvez cliquer sur le lien ci-contre :
                <a href="{{ route('verification', $token->token) }}">{{ route('verification', $token->token) }}</a></p>
        </section>
    </body>
</html>