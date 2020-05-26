<?php require "php/Init.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Магазин плюшевых мишек</title>
  <!-- MDB icon -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <style>
    html,
    body,
    header,
    .carousel{
      height: 60vh;
    }

    @media (max-width: 740px){
      html,
      body,
      header,
      .carousel{
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px){
      html,
      body,
      header,
      .carousel{
        height: 100vh;
      }
    }
  </style>
</head>
<body>



    <!-- Modals -->  


     <!-- Create user Modal-->
   <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Регистрация пользователя</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="create_user_form">
          <div class="form-group">
            <label for="exampleInputEmail1">Логин</label>
            <input type="text" class="form-control" id="login" aria-describedby="login">
            <div class="invalid-feedback">
              Логин не должен быть пустым!
            </div>
          </div>
          <div class="invalid-feedback" id="login_exists_error" style="padding-bottom: 10px;">Такой логин уже существует!</div>
          <div class="form-group">
            <label for="exampleInputEmail1">Пароль</label>
            <input type="password" class="form-control" id="password" aria-describedby="password">
            <div class="invalid-feedback">
              Пароль не должен быть пустым!
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Имя</label>
            <input type="text" class="form-control" id="firstname" aria-describedby="firstname">
            <div class="invalid-feedback">
              Имя не должен быть пустым!
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Фамилия</label>
            <input type="text" class="form-control" id="lastname" aria-describedby="lastname">
              <div class="invalid-feedback">
                Фамилия не должен быть пустым!
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Отчество</label>
            <input type="text" class="form-control" id="middlename" aria-describedby="middlename">
              <div class="invalid-feedback">
                Отчество не должен быть пустым!
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Номер</label>
            <input type="text" class="form-control" id="phone" aria-describedby="middlename">
              <div class="invalid-feedback">
                Номер не должен быть пустым!
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Почта</label>
            <input type="text" class="form-control" id="email" aria-describedby="middlename">
              <div class="invalid-feedback">
                Почта не должна быть пустой!
              </div>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
          <a class="btn btn-primary" href="#" id="create_user">Создать аккаунт</a>
        </div>
      </div>
    </div>
  </div>


  
     <!-- Login user Modal-->
     <div class="modal fade" id="loginUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <form id="login_user_form">
            <div class="form-group">
              <label for="exampleInputEmail1">Логин</label>
              <input type="text" class="form-control" id="login_in" aria-describedby="login">
              <div class="invalid-feedback">
                Логин не должен быть пустым!
              </div>
            </div>
            <div class="invalid-feedback" id="login_exists_error" style="padding-bottom: 10px;">Такой логин уже существует!</div>
            <div class="form-group">
              <label for="exampleInputEmail1">Пароль</label>
              <input type="password" class="form-control" id="password_in" aria-describedby="password">
              <div class="invalid-feedback">
                Пароль не должен быть пустым!
              </div>
            </div>
           
          </form>
          </div>
          <div class="modal-footer">
            <div class="invalid-feedback text-center" id="wrong_pass_login">
              <strong>Неверный логин или пароль!</strong>
            </div>
            <button class="btn btn-danger" type="button" data-dismiss="modal" data-toggle="modal" data-target="#createUser">Еще нет аккаунта?</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
            <a class="btn btn-primary" href="#" id="login_user">Войти</a>
            
          </div>
        </div>
      </div>
    </div>


     <!-- Message user Modal-->
    <div class="modal fade" id="msgUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Отправка сообщения</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <form id="msg_user_form">
            <div class="form-group">
              <label for="exampleInputEmail1">Ваше имя</label>
              <input type="text" class="form-control" id="msg_name" aria-describedby="login">
              <div class="invalid-feedback">
                Имя не должно быть пустым!
              </div>
            </div>
            <div class="invalid-feedback" id="login_exists_error" style="padding-bottom: 10px;">Такой логин уже существует!</div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="text" class="form-control" id="msg_email" aria-describedby="email">
              <div class="invalid-feedback">
                Почта не должна быть пустой!
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Тема</label>
              <input type="text" class="form-control" id="msg_topic" aria-describedby="password">
              <div class="invalid-feedback">
                Тема не должна быть пустой!
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Сообщение</label>
              <textarea class="form-control" id="msg_content" rows="3"></textarea>
              <div class="invalid-feedback">
                Сообщение не должно быть пустым!
              </div>
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
            <a class="btn btn-primary" href="#" id="msg_send">Отправить</a>
          </div>
        </div>
      </div>
    </div>


   <!-- Modals-->  


  <!-- Start your project here-->  
      <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
          <div class="container">
              <a href="index.php" class="navbar-brand waves-effect">
                <img src="img/logo.png" alt="" width="140px">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
              aria-controls="nvabarContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a href="index.php" class="nav-link waves-effect">Главная</a>
                  </li>
                  <li class="nav-item">
                    <a href="#"  data-toggle="modal" data-target="#msgUser" class="nav-link waves-effect">Связь с нами</a>
                  </li>
                  <li class="nav-item">
                    <a href="#footer" class="nav-link waves-effect">Контакты</a>
                  </li>
                </ul>
                <ul class="navbar-nav nav-flex-icons">
                  <li class="nav-item">
                    <a href="cart.php" class="nav-link waves-effect">
                      <span class="badge red z-depth-1 mr-1" id="amount_items"><?php print $db->get_amount_items(); ?></span>
                      <i class="fa fa-shopping-cart"></i>
                      <span class="clearfix d-none d-sm-inline-block">Корзина</span>
                    </a>
                  </li>             
                  <li class="nav-item">
                    <a href="#" class="nav-link waves-effect">
                      <i class="fa fa-user"></i>
                      <strong class="ml-1" data-toggle="modal" data-target="#loginUser" id="login_navbar">Вход</strong>
                    </a>
                  </li>
                </ul>
              </div>
          </div>
      </nav>

      <div id="carousel-ex" class="carousel slide carousel-fade pt-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li class="active" data-target="#carousel-ex" data-slide-to="0"></li>
            <li data-target="#carousel-ex" data-slide-to="1"></li>
            <li data-target="#carousel-ex" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="view" style="background-image: url('https://images.pexels.com/photos/1234232/pexels-photo-1234232.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');
                background-repeat: no-repeat; background-size: cover;">
                    <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                        <div class="text-center white-text mx-5 wow fadeIn">
                          <h1 class="md-4">
                            <strong>Интернет-магазин плюшевых мишек</strong>
                          </h1>
                          <p>
                            <strong>Приветствую, уважаемый посетитель! На данном сайте Вы сможете приобрести плюшевых мишек по хорошей цене.</strong>
                          </p>
                          <p class="mb-4 d-none d-md-block">
                            <strong>Плюшевые мишки - это эталон радости, любви и добра! Если Вы хотите породовать вашу вторую половинку или же родственника, то этот сайт точно для Вас!</strong>
                          </p>
                          <a href="#bears" class="btn btn-outline-white btn-lg">
                            Перейти к мишкам <i class="fas fa-hand-point-down"></i>
                          </a>
                        </div>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="view" style="background-image: url('https://images.pexels.com/photos/105532/pexels-photo-105532.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
                background-repeat: no-repeat; background-size: cover;">
                    <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                        <div class="text-center white-text mx-5 wow fadeIn">
                          <h1 class="md-4">
                            <strong>Интернет-магазин плюшевых мишек</strong>
                          </h1>
                          <p>
                            <strong>Приветствую, уважаемый посетитель! На данном сайте Вы сможете приобрести плюшевых мишек по хорошей цене.</strong>
                          </p>
                          <p class="mb-4 d-none d-md-block">
                            <strong>Плюшевые мишки - это эталон радости, любви и добра! Если Вы хотите породовать вашу вторую половинку или же родственника, то этот сайт точно для Вас!</strong>
                          </p>
                          <a href="#bears" class="btn btn-outline-white btn-lg">
                            Перейти к мишкам <i class="fas fa-hand-point-down"></i>
                          </a>
                        </div>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="view" style="background-image: url('https://images.pexels.com/photos/54547/pexels-photo-54547.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
                background-repeat: no-repeat; background-size: cover;">
                    <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                        <div class="text-center white-text mx-5 wow fadeIn">
                          <h1 class="md-4">
                            <strong>Интернет-магазин плюшевых мишек</strong>
                          </h1>
                          <p>
                            <strong>Приветствую, уважаемый посетитель! На данном сайте Вы сможете приобрести плюшевых мишек по хорошей цене.</strong>
                          </p>
                          <p class="mb-4 d-none d-md-block">
                            <strong>Плюшевые мишки - это эталон радости, любви и добра! Если Вы хотите породовать вашу вторую половинку или же родственника, то этот сайт точно для Вас!</strong>
                          </p>
                          <a href="#bears" class="btn btn-outline-white btn-lg">
                            Перейти к мишкам <i class="fas fa-hand-point-down"></i>
                          </a>
                        </div>
                    </div>
                </div>
              </div>
          </div>

          <a href="#carousel-ex" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </a>
          <a href="#carousel-ex" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </a>


      </div>

      <main>
        <div class="container">

          <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">
            <span class="navbar-brand text-center">Товары:</span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nextNav"
                 aria-controls="nextNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

             
          </nav>  

          <section class="text-center mb-4" id="bears">
            <div class="row wow fadeIn">

              
                <?php $db->show_items(); ?>
              

              
            </div>
          </section>
        </div>
      </main>

      <footer class="page-footer text-center font-small mt-4 wow fadeIn" id="footer">
        <div class="pt-4">
          <a href="#" class="btn btn-outline-white" role="button">MixaShop</a>
          <a href="#" class="btn btn-outline-white" role="button">Интернет-магазин</a>
        </div>
        <hr class="my-4">
        <div class="pb-4">
          <a href="#footer">
            <i class="fa fa-phone mr-2"></i>
            <strong>+7(964) 913-05-54</strong>
          </a>
          <a href="#footer">
            <i class="fas fa-map-marked-alt mr-2 ml-3"></i>
            <strong>Россия, г. Майкоп, ул. Пушкина 12</strong>
          </a>
        </div>
        <div class="footer-copyright py-3">
          Все права защищены
        </div>
      </footer>
  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
  <script src="js/redirection.js"></script>
  <script src="js/login.js"></script>
  <script src="js/registration.js"></script>
  <script src="js/cart.js"></script>
  <script src="js/mailer.js"></script>
</body>
</html>
