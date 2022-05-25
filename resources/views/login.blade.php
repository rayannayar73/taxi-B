<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>EVALUATION de STAGE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site de don et de collecte de fond. Pour aider les animaux et les populations dans les antarctiques contre les dégats causés par le réchauffement climatique dans le monde" />
        <meta name="keywords" content="iceberg, grand blanc, ours polaire, pingoins, orques, baleine blanche, climat, réchauffement climat, antarctiques, température, sauver, don, collecte de fond" />
        <link href="{{ asset('login/css/all.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
	</head>
	<body>
        <div class="bod">
            <div class="menu">
                <div class="image">
                </div>
                <form action="{{ route('login.valider') }}" method="get">
                    <div class="soratra" id="inputes">
                        <p><?php if(isset($error))echo $error?><input class="inputT" type="text" placeholder="Email" name="login"/></p>
                        <p><input class="inputT" type="Password" placeholder="Mot de passe" name="mdp"/></p>
                        <p><input class="boutton" id="logIn" type="submit" value="Log In"/></p>
                    </div>
                </form>
            </div>
        </div>
	</body>
</html>