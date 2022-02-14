<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome admin efitness page | </title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{route('user.store')}}" method="post">
                @csrf
              <h1>Register Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Email" name="email" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="name" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <label for="">Loại user</label>
              <div>
                <select name="role" id="">
                    <option value="0">Người dùng</option>
                    <option value="1">Cộng tác viên</option>
                    <option value="2">Quản trị hệ thống</option>
                </select>
              </div>
              <br>
              <div>
                  <button type="submit" class="btn btn-primary">
                Register
            </button>
              </div>
              

              
            </form>
          </section>
        </div>

       
      </div>
    </div>
  </body>
</html>
