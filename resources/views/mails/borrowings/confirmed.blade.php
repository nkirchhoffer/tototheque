<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Confirmation de l'emprunt</title>
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
    <h2>Cher {{ $borrowing->user->name }},</h2>

    <p>Nous avons l'honneur de vous confirmer l'emprunt de l'ouvrage <b>{{ $borrowing->replica->book->title }}</b> édité par <b>{{ $borrowing->replica->publisher->name }}</b>. Le début théorique de l'emprunt est le <b>{{ $borrowing->starting_at->locale('fr_FR')->isoFormat('LL') }}</b> et se termine théoriquement le <b>{{ $borrowing->finishing_at->locale('fr_FR')->isoFormat('LL') }}</b>. Vous recevrez un e-mail lorsque votre emprunt sera prêt, comportant les horaires de retrait et les modalités de rendu.</p>
    <p>Nous vous remercions de nous faire confiance.</p>

    <p class="access">Si vous souhaitez annuler votre emprunt, cliquez sur le lien ci-contre :
        <a href="{{ route('borrowings.cancel', ['borrowing' => $borrowing]) }}">{{ route('borrowings.cancel', ['borrowing' => $borrowing]) }}</a></p>
</section>
</body>
</html>