# vab-forms-with-chart
<p>«Forms with chart from VAB» - легкий и простой плагин для создания форм, анкет и опросников с возможностью вывода результатов в виде диаграмм.</p>
<p>«Forms with chart from VAB» может управлять многочисленными контактными формами, где вы можете гибко настраивать содержимое форм с достаточно простой разметкой. Формы имеют встроенную защиту от спама и не только.</p>
<p>Основное направление плагина это опросы и анкеты с выводом результатов в виде диаграмм таких полей как «Флажки», «Радиокнопки», «Выпадающий список» на чистом css, но подходит и для создание других вариантов форм обратной связи, в том числе с возможностью отправки вложений. Более подробно с работой плагина можно  ознакомиться по ссылке - <a href="https://vi.it-vab.ru/контакты/формы-опросы-анкеты-с-выводом-диаграм/" target="_blank" rel="noopener">Тема для WordPress с наличием Версии для слабовидящих. Обзор темы (3в1)</a>  (плагин встроен в тему).</p>
<p>В конфигурации по умолчанию этот плагин сам по себе не выполняет:</p>
<ul class="ul">
<li>отслеживать пользователей скрытно;</li>
<li>записывать любые персональные данные пользователя в базу данных;</li>
<li>отправлять любые данные на внешние серверы;</li>
<li>использовать файлы cookie.</li>
</ul>
<p>В настройках формы вы можете активировать действия плагина:</p>
<ul class="ul">
<li>записывает введенные данные формы в файл для отображения результатов диаграмм;</li>
<li>отключать / включать запись в лог файлы даты, IP адреса и пользовательского агента.</li>
</ul>
<p><strong style="color: #ff0000;">Важно!!!</strong> Не рекомендуется включать запись в лог файлы персональных данных на серверах, где не работают .htaccess файлы, не убедившись в корректности настроек веб сервера (для этого Вы можете связаться с хостинг провайдером, либо протестировать файлы txt в таблице «Информация для администратора», активировав опцию «<span class="ch">Блокировать доступ к лог файлам с помощью htaccess</span>» в настройках формы, при этом не забывая о кешировании браузера), чтобы эти данные не оказались в открытом доступе (Например, сервер Nginx + php-fpm).</p>
<p><strong>.htaccess</strong> — это конфигурационный файл веб-сервера Apache, позволяющий управлять работой веб-сервера и настройками сайта с помощью различных параметров (директив) без изменения основного конфигурационного файла веб-сервера.</p>
<ul class="ul">
Version: 1.1.5
<li>Добавлены фильтры для возможности добавления (проверки) полей, а также вывода сообщения</li>
<li>Добавлена опция, благодаря которой диаграммы отображаются только для администраторов;</li>
</ul>
<ul class="ul">
Фильтры:
<li>VABFWC_validate_filter - Возвращает либо true(истина), либо false(ложь). Если по какому-либо условию возвращается true (истина), форма остановит работу(сообщение не будет отправлено)</li>
 <li>VABFWC_fields_filter - Возвращает строку для вывода на экран. Разрешен Элемент HTML input с атрибутами 'type', 'id', 'class', 'name', 'value', 'checked', 'onfocus', 'onchange'</li>
 <li>VABFWC_message_filter - Возвращает строку для вывода на экран как текст(сообщение)</li>
</ul>
Как использовать фильтры?

<ul class="ul">
<li>
VABFWC_validate_filter
</li>

```
add_filter( 'VABFWC_validate_filter', 'VABFWC_filter_function', 10 );
if ( !function_exists(	'VABFWC_filter_function'	) )	{
	function VABFWC_filter_function( $str ){
		if	(	!isset(	$_COOKIE['VAB_cookie_agree']	)	||	$_COOKIE['VAB_cookie_agree']	!==	'yes'	)	{
			return true;
		}
		if	( sanitize_text_field( $_POST['new_field'] ) !== 'WordPress' ) {
			return true;
		}
	}}
``` 
<li>
VABFWC_fields_filter
</li>
```
add_filter( 'VABFWC_validate_filter', 'VABFWC_filter_function', 10 );
if ( !function_exists(	'VABFWC_filter_function'	) )	{
	function VABFWC_filter_function( $str ){
		if	(	!isset(	$_COOKIE['VAB_cookie_agree']	)	||	$_COOKIE['VAB_cookie_agree']	!==	'yes'	)	{
			return true;
		}
		if	( sanitize_text_field( $_POST['new_field'] ) !== 'WordPress' ) {
			return true;
		}
	}}
``` 
<li>
VABFWC_message_filter
</li>
```
add_filter( 'VABFWC_validate_filter', 'VABFWC_filter_function', 10 );
if ( !function_exists(	'VABFWC_filter_function'	) )	{
	function VABFWC_filter_function( $str ){
		if	(	!isset(	$_COOKIE['VAB_cookie_agree']	)	||	$_COOKIE['VAB_cookie_agree']	!==	'yes'	)	{
			return true;
		}
		if	( sanitize_text_field( $_POST['new_field'] ) !== 'WordPress' ) {
			return true;
		}
	}}
``` 
</ul>
