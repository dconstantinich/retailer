<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="icon" href="img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png">
    <meta name="keywords" content="Теги сайта">
    <meta name="description" content="Описание сайта">
    <meta name="author" lang="ru" content="Helen Portna">
<!--    <link rel="stylesheet" href="css/main.min.css">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="popup-bg"></div>
<header class="header">
    <div class="header-overlay">
        <div class="wrap">
            <div class="block__left">
                <div class="header-overlay">
                    <div class="logo-wrap">
                        <div class="logo">
                            <svg class="logo-color">
                                <use xlink:href="img/logo.svg#logo"> </use>
                            </svg>
                        </div>
                    </div>
                    <div class="header__dates">
                        <ul class="date__items">
                            <li class="dates__item none-mob">5.06 - 6.06</li>
                            <li class="dates__item">5.09 - 6.09</li>
                            <li class="dates__item active">
                                <div class="arrow arrow-top"></div>
                                <svg class="calendar">
                                    <use xlink:href="img/icons/calendar.svg#calendar"> </use>
                                </svg><span>6.12</span>
                                <div class="arrow arrow-bottom"></div>
                            </li>
                            <li class="dates__item">31.01</li>
                            <li class="dates__item none-mob">20.02</li>
                            <li class="dates__item none-mob">4.04</li>
                            <li class="dates__item none-mob">6.06</li>
                            <li class="dates__item none-mob">4.07</li>
                            <li class="dates__item none-mob">5.09</li>
                            <li class="dates__item none-mob">3.10</li>
                            <li class="dates__item none-mob">7.11</li>
                        </ul>
                    </div>
                    <div class="header__main">
                        <div class="header__title">
                            <div class="subtitle">Центр переговоров</div>
                            <div class="lines"></div>
                            <div class="main-title">Retailer Недвижимость</div>
                        </div>
                        <div class="header__info">
                            <div class="header__">
                                <p class="title">Event Hall Даниловский</p>
                                <p>Москва, ул. Дубининская, д.71, стр.5</p>
                            </div>
                            <svg class="marker">
                                <use xlink:href="img/icons/marker.svg#marker"> </use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block__right registration">
                <div class="registration__title"><a href="#" class="title">
                        <svg class="register">
                            <use xlink:href="img/icons/register.svg#register"> </use>
                        </svg>Регистрация на переговоры</a><a href="#" class="login">Вход</a></div>
                <div class="registration__form">
                    <form action="#">
                        <div class="form-line">
                            <label for="name">Имя</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="tabs">
                            <div class="form-line">
                                <ul class="tabs__caption">
                                    <li class="btn btn--tabs active">Ищу площади</li>
                                    <li class="btn btn--tabs">Предлагаю площади</li>
                                </ul>
                            </div>
                            <div class="form-line">
                                <label for="tel">Номер</label>
                                <input type="tel" name="tel" id="tel">
                            </div>
                            <div class="form-line">
                                <label for="name">Email</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="form-line header__choosen">
                                <ul class="choosen__items scroll">
                                    <li class="choosen__item">Familia<span class="cross"></span></li>
                                    <li class="choosen__item">Обувь для всей семьи<span class="cross"></span></li>
                                    <li class="choosen__item">Ralf Ringer<span class="cross"></span></li>
                                    <li class="choosen__item">Jack Wolfskin<span class="cross"></span></li>
                                    <li class="choosen__item">34PLAY<span class="cross"></span></li>
                                    <li class="choosen__item">Incanto<span class="cross"></span></li>
                                    <li class="choosen__item">Алеф<span class="cross"></span></li>
                                </ul>
                                <div class="double-arrows">
                                    <div class="double-arrows--wrap"></div>
                                </div>
                            </div>
                            <div class="form-line">
                                <div class="tabs__content active"> <a href="#" class="btn btn--transparent header-popup">Выбрать свой список ритейлеров</a></div>
                                <div class="tabs__content"> <a href="#" class="btn btn--transparent">Выбрать операторов торговых площадей</a></div>
                            </div>
                            <div class="form-line">
                                <div class="btn btn--black">Зарегистрироваться</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<?= $content ?>
<footer class="footer">
    <div class="wrap">
        <div class="footer__wrap">
            <div class="logo-wrap">
                <div class="logo">
                    <svg class="logo-color">
                        <use xlink:href="img/logo.svg#logo"></use>
                    </svg>
                </div>
            </div>
            <div class="social"><a href="#" class="social__item fb">
                    <svg class="fb">
                        <use xlink:href="img/icons/fb.svg#fb"></use>
                    </svg></a><a href="#" class="social__item tw">
                    <svg class="skype">
                        <use xlink:href="img/icons/skype.svg#skype"></use>
                    </svg></a><a href="#" class="social__item ins">
                    <svg class="whatsapp">
                        <use xlink:href="img/icons/whatsapp.svg#whatsapp"></use>
                    </svg></a></div>
            <div class="footer-info">
                <div class="footer-info__wrap">
                    <div class="footer-info__title">Эксперт в коммуникациях на рынке торговой недвижимости</div>
                    <div class="footer-info__text">15 лет мы знакомим нужных друг другу людей и способствуем заключению выгодных сделок</div>
                </div>
            </div>
            <div class="contacts">
                <div class="contacts__tel">
                    <svg class="tel">
                        <use xlink:href="img/icons/phone_white.svg#phone_white"></use>
                    </svg><a href="tel:+78005006606">+ 7(800) 500-66-06</a>
                </div>
                <div class="contacts__mail">
                    <svg class="mail">
                        <use xlink:href="img/icons/mail.svg#mail"></use>
                    </svg><a href="mailto:ask@retailer.ru">ask@retailer.ru</a>
                </div>
            </div>
            <div class="rights">Хорошего понедельника! © 2018 - RETAILER.ru</div>
        </div>
    </div>
</footer>
<!--<script src="js/scripts.min.js"></script>-->
<!--<script src="js/common.js"></script>-->
<?php $this->endBody() ?>
</body>
<!-- END body-->
</html>
<?php $this->endPage() ?>