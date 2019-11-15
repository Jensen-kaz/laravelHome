<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            DB::table('articles')->insert([
                'name' => 'Статья ' . $i . '',
                'text' => '<p>По статистике именно вышеперечисленные проблемы заставляют нездорового человека заниматься самолечением.</p>

<p>До недавнего времени попасть к врачу&nbsp;можно было лишь следующим образом: в регистратуре нужно заказать талон к требуемому специалисту, там же забрать медицинскую карточку и пройти к кабинету. Казалось бы, ничего сложного, однако на практике всё выглядит совсем не так.</p>

<p>К окошкам регистратуры обычно выстраиваются огромные очереди, при этом, отстояв в одной из них, никогда нельзя угадать, хватит ли талонов, и сможете ли Вы попасть на приём вообще.</p>

<p>Также существует практика выдачи дополнительных талонов&nbsp;без номера,&nbsp;то есть к врачу попасть можно, но тут уж как с основными &laquo;талонодержателями&raquo; договоришься. И,&nbsp;скорее всего,&nbsp;к доктору попадешь уже после всех остальных.</p>

<p><img alt="" src="/upload/articles/26510134b.jpg" style="height:493px; width:650px" title="Очереди в регистратуру - одна из проблем современного лечения" /></p>

<p>Можно избежать стояний в очередях записавшись на приём по телефону, однако и здесь потребуются воистину железные нервы &ndash; чаще всего телефон будет отвечать Вам короткими гудками.</p>

<p>Многие поликлиники и медицинские центры нашли способ, как сделать запись к доктору максимально удобной&nbsp;для своих посетителей и клиентов &ndash; интернет-регистратура. Система позволяет записаться к нужному специалисту, не отходя от компьютера, лишь бы интернет был под рукой.</p>

<h2>Как записаться к врачу через интернет в любом городе?</h2>

<p>Чтобы записаться на приём через интернет-регистратуру, необходимо выполнить следующие условия:</p>

<ol>
	<li>Иметь в свободном доступе компьютер с возможностью выхода в Интернет.</li>
	<li>Войти на сайт вашего медицинского учреждения или воспользоваться единой системой (в некоторых регионах уже такие созданы), где Вы можете выбрать свой регион, город и поликлинику.</li>
	<li>Пройти процедуру регистрации. Если Вы хотите обратиться в медицинское учреждение, к которому Вы адресно не относитесь, получить талон вы сможете только после того, как лично принесёте соответствующее заявление в регистратуру данного лечебного заведения.</li>
	<li>При регистрации необходимо точно указать свои паспортные данные и номер страхового полиса, также&nbsp;некоторые сервисы требуют наличие зарегистрированного электронного ящика.</li>
	<li>Выбрать специалиста, которого Вы хотите посетить, и ознакомиться с графиком его работы.</li>
	<li>Просмотреть свободное время для записи и выбрать для себя наиболее удобное.</li>
	<li>Подождать пока Ваша заявка будет рассмотрена и подтверждена.</li>
	<li>Подтвердить свою заявку, в противном случае она будет аннулирована.</li>
</ol>

<p>В целом процедура записи к доктору через интернет-регистратуру довольно проста, к тому же, сама система поможет Вам, если Вы что-то делаете неправильно.</p>

<p class="text-attention">Необходимо помнить: если у Вас не заведена карта в регистратуре, то в получении электронного талона Вам откажут.</p>

<p>Записаться можно как минимум за сутки, а некоторые медицинские учреждения ведут записи на приём только на неделю вперёд &ndash; всё это нужно учитывать при планировании посещения больницы.</p>

<p>Если по каким-то причинам Вы не можете прийти на приём, обязательно выпишитесь &ndash; на освободившееся время доктор сможет принять&nbsp;другого&nbsp;нуждающийсегося&nbsp;в помощи пациента.</p>

<p><img alt="" src="/upload/articles/na-priem-k-vrachu-cherez-internet.jpg" title="Запись к врачу через интернет - простая и быстрая процедура" /></p>

<h2>Плюсы процедуры</h2>

<p>Такая процедура имеет достоинства:</p>

<ol>
	<li>Некоторые сервисы предлагают услугу вызова специалиста на дом. Схема использования&nbsp;этой удобной опции также очень проста и схожа с заказом талона.&nbsp;Однако стоит учитывать, что в большинстве медицинских учреждений услуги вызова доктора на дом предоставляют только в первой половине дня.</li>
	<li>Отсутствие очередей в медрегистратуре.</li>
	<li>Быстрая и удобная процедура записи.</li>
	<li>Возможность мониторинга расписания врачей и выбора более удобного для себя времени.</li>
	<li>Удобство для самих докторов, которые могут заранее посмотреть степень загруженности своего рабочего дня и общее количество пациентов, которых они должны принять.</li>
</ol>

<p><img alt="" src="/upload/articles/2645e09f3.jpg" style="height:432px; width:650px" title="Запись к врачу по интернету позволит сэкономить время" /></p>

<p>Интернет-регистратуры имеют и свои минусы:</p>

<ol>
	<li>Отсутствие единого программного обеспечения &ndash; каждый город самостоятельно разрабатывает программную платформу со своими обязательными правилами регистрации, интерфейсом и прочими нюансами.</li>
	<li>Сложность использования такой системы людьми пожилого возраста, а значит необходимость проведения разъяснительных лекций и ликбезов.</li>
	<li>Запись онлайн не избавляет полностью от стояния в очередях, так как заказанный талон всё равно нужно будет забрать в регистратуре.</li>
	<li>Возникновение конфликтных ситуаций среди пациентов, которые осуществили запись через электронную систему, и тех, кто обратился за помощью по острой боли.</li>
	<li>Возмущение &laquo;живой&raquo; очереди, вынужденной уступать интернет-талону.</li>
	<li>Недобросовестные пациенты, записавшись через электронную систему, могут&nbsp;не прийти на указанное время. С&nbsp;такими &laquo;злостными прогульщиками&raquo; каждая поликлиника борется по-своему, например, заносят в чёрный список пациента, попадая в который он&nbsp;не сможет пользоваться интернет-регистратурой в течение одного месяца.</li>
</ol>

<p class="text-quote">Несмотря на некоторые минусы записи через интернет, специалисты утверждают, что будущее именно за электронной регистратурой, а все недочеты и проблемы &ndash; это явления временные, связанные с внедрением новых технологий в наше весьма консервативное общество.</p>

<p>Возможно, совсем скоро пациенты и вовсе перейдут на электронные амбулаторные карты. Это позволит создать полную электронную базу данных, где будет храниться подробнейшая информация обо всех пациентах. В&nbsp;другом городе&nbsp;при Вашем экстренном обращении за медицинской помощью&nbsp;лечащий врач сможет изучить полную&nbsp;историю&nbsp;болезни, что увеличит шанс на быстрое&nbsp;и оптимальное лечение.</p>

<p>К тому же электронная база уберет всю ненужную бумажную волокиту, отнимающую много времени. Электронная система позволит в автоматическом режиме производить выписку анализов, сокращая тем самым время постановки диагноза.<img alt="" src="/upload/articles/kak-zapisatsya-k-vrachu-cherez-internet.jpg" title="Процедура онлайн-регистрации к врачу имеет свои плюсы и минусы" /></p>

<p>Использование специализированных интернет-сервисов для записи на приём к врачу &ndash; это очень удобно и максимально экономит ваши время и нервы.&nbsp;Автоматизированная запись со временем сделает посещения поликлиники приятной и беспроблемной процедурой &ndash; очередей больше не будет, работа для самих докторов будет более удобна, и каждый пациент без лишних проблем сможет получить своевременную помощь.</p>

<p><strong>Если Вы хотите быстро получить ответ на свой вопрос</strong> по волнующей Вас проблеме от внимательных и компетентных врачей -<a href="https://sprosivracha.com/"> задайте вопрос врачу</a> в режиме онлайн. Сервис работатет без выходных.</p>'
            ]);
        }
    }
}
