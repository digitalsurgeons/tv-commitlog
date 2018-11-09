<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <title>Laravel</title>

      <style>
        html, body {
          height: 100%;
          width: 100%;
        }

        body {
          background: url('https://source.unsplash.com/random?vaporwave,outrun,synthwave') no-repeat;
          background-size: cover;
          background-position: center center;
          align-items: center;
          justify-content: center;
          display: flex;
        }

        .container {
          margin-bottom: 0;
          width: 100%;
        }

        .card-author {
          font-size: 18px;
          font-weight: bold;
          margin-top: 0;
        }

        .card-avatar {
          margin-right: 10px;
        }

        .card .card-content p.card-time {
          margin-top: 20px;
        }

        .card-time .material-icons {
          margin-right: 10px;
        }

        .card-project {
          margin-right: 10px;
        }

        .card-emoji {
          margin-right: 10px;
        }

        .card-msg {
          font-size: 20px;
        }

        .card-msg {
          margin: 20px 0;
        }

        .card {
          opacity: .8;
        }
      </style>
  </head>
  <body>
    <section class="container row">
      <div class="col s12">
        @foreach ($commits as $commit)
          <article class="card">
            <div class="card-content">
              <h2 class="valign-wrapper card-author"><img src="http://i.pravatar.cc/30" class="circle card-avatar"><strong>{{ $commit['author_name'] }}</strong></h2>
              <h3 class="valign-wrapper card-msg"><span class="card-emoji">⚡</span> <strong class="card-project">Project Name</strong> / {{ $commit['title'] }}</h3>
              <p class="valign-wrapper card-time"><i class="material-icons">access_time</i> {{ $commit['committed_date'] }}</p>
            </div>
          </article>
        @endforeach
      </div>
    </section>
  </body>
</html>
