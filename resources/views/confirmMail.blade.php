<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//FR">
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <title>{{ $details['title'] }}</title>
</head>

<body style="background: #eee; font-family: Roboto;">
    <div style="
        width: 700px;
        max-width: 100%;
        height: fit-content;
        margin: auto;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 3px;
      ">
        <div style="
          width: 100%;
          height: 30%;
          background: #a6e6ff;
          padding-top: 20px;
          padding-bottom: 20px;
          border-top-left-radius: 2px;
          border-top-right-radius: 2px;
          display: flex;
          justify-content: center;
          align-items: center;
        ">
            <h1 style="font-size: 40px; margin: auto; color: #3D3D3D;">Reapers</h1>
        </div>
        <div style="width: 100%; height: fit-content; text-align: center">
            <h1>{{ $details['title'] }}</h1>
            <div style="font-size: 19px; margin-top: 30px; padding-left: 15px; padding-right: 15px;">
                <p>{{ $details['body'] }}</p>
            </div>
            <div style="width: fit-content; height: fit-content; margin: 30px auto;">
                <a href="{{ $details['link'] }}" style="padding: 10px; background: #02acf0; color: #fff; text-decoration: none; font-weight: bold; border-radius: 3px;">{{ $details['link_label'] }}</a>
            </div>
        </div>
    </div>
</body>

</html>
