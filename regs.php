<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

$array = array(
    'Ваш логин: Tost. Добро пожаловать',
    'Ваш логин: Николай. Добро пожаловать',
    'Ваш логин: Анна Семинович. Добро пожаловать',
    'Ваш логин: Борис_Бурда-2. Добро пожаловать',
);

$q = 'Поиском достать логин. 
      Особенности: логин стоит после двоеточия, может представлять из себя рус и англ символы, пробелы, тире и подчеркивание.';
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Достать логин'.'</h2>';
foreach($array as $k=>$value){
	if (preg_match('#:\s([\s\w\-]+)\.#ui',$value,$matches)){
		$logins[] = $matches;
		echo '<br><b>В строке </b>"'.htmlspecialchars($array[$k]).'" <b>login </b> '.$logins[$k][1];
	} else {
		echo '<br><b>В строке </b>"'.htmlspecialchars($array[$k]).'" <b>login </b> не найден, регулярное выражение не прошло.';
	}
}
if(!empty($logins)){
	echo '<pre>logins '.print_r($logins,1);
}
echo '<hr>';


$array = array(
    'main',
    'READ',
    'news"&\\/files',
	'../../index',
	'news',
	'kill_crash-and-destroy',
	'loveYou',
);

$q = 'Проверить допустимые имена файлов.
	  Необходимо недопустить попадания ТОЛЬКО запрещенных файловой системой имён, а так же попытки перейти между каталогами';
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Проверить допустимые имена файлов'.'</h2>';
foreach($array as $k=>$value){
	if (preg_match('#[\"\|\/\:\*\?\<\>\+\%\!\@\.\\\\]#ui',$value)){
		echo '<br><b>'.htmlspecialchars($array[$k]).'</b>'.'<i> недопустимое имя файла.</i>';
	} else {
		$valid[] = $value;
		echo '<br><b>'.htmlspecialchars($array[$k]).'</b>'.' допустимое имя файла.';
	}
}
if(!empty($valid)){
	echo '<pre>'.print_r($valid,1);
}
echo '<hr>';


$array = array(
	'file.jpg',
	'zzz.png',
	'afafaf.php',
	'quad.jpg.',
	'quad2.JPG',
	'quad3.jpg.vir',
	'gif.doc',
	'file.virus',
);

$q = 'Загрузка фотографий. Необходимо допустить ТОЛЬКО: jpg,png,gif расширения';
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Загрузка фотографий. Необходимо допустить ТОЛЬКО: jpg,png,gif расширения'.'</h2>';
foreach($array as $k=>$value){
	if (preg_match('#\w+\.(jpg|png|gif)$#ui',$value,$matches)){
		echo '<br><b>'.htmlspecialchars($array[$k]).'</b>'.' допустимое имя файла.';
	} else {
		echo '<br><b>'.htmlspecialchars($array[$k]).'</b>'.'<i> недопустимое имя файла.</i>';
	}
}
echo '<hr>';

$array = array(
	'Длинная строка. Главное, что мы научимся с ней идеально работать.  HOW do you do? Вот так и живём.Классно!',
);

$q = array(
	'Одна строка, заданий много:',
	'Получить все слова. Самая простая регулярка, поиск по всей строке, указать надо лишь допустимые символы и количество',
	'Получить все английские слова.',
	'Получить слова, которые стоят после точки. Обращаю внимание, что пробел после точки может БЫТЬ и даже не один, а может и не быть, символ пробела: \s',
	'Необходимо получить 5 символ от начала строки. Начало строки: ^ , и не забудем использовать кармашек, чтобы туда ушел нужный нам символ',
	'Получить все слова, в которых первым символ будет начинаться с большой буквы. Подсказка, необходимо использовать 2 квадратных скобки!',
);
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Одна строка, заданий много'.'</h2>';
foreach($array as $k=>$value){
	if (preg_match_all('#[\w+]{2,}#ui',$value,$matches)){
		$valid_1[] = $matches;
	} else {
		$valid_1[] = 'регулярка не прошла';
	}
	if (preg_match_all('#[a-zA-Z]{2,}#ui',$value,$matches)){
		$valid_2[] = $matches;
	} else {
		$valid_2[] = 'регулярка не прошла';
	}
	if (preg_match_all('#\.\s*(\w+)#ui',$value,$matches)){
		$valid_3[] = $matches;
	} else {
		$valid_3[] = 'регулярка не прошла';
	}
	if (preg_match_all('#^(.){5}#ui',$value,$matches)){
		$valid_4[] = $matches;
		$res = $matches[1][0];
	} else {
		$valid_4[] = 'регулярка не прошла';
	}
	if (preg_match_all('#[[:upper:]]+[[:alpha:]]\w+#u',$value,$matches)){
		$valid_5[] = $matches;
	} else {
		$valid_5[] = 'регулярка не прошла';
	}
}
echo '<pre><h3>Все слова:"Длинная строка. Главное, что мы научимся с ней идеально работать.  HOW do you do? Вот так и живём.Классно!"</h3><br>'.print_r($valid_1,1);
echo '<pre><h3>Все английские слова:"Длинная строка. Главное, что мы научимся с ней идеально работать.  HOW do you do? Вот так и живём.Классно!"</h3><br>'.print_r($valid_2,1);
echo '<pre><h3>Все слова поcле точки:"Длинная строка. Главное, что мы научимся с ней идеально работать.  HOW do you do? Вот так и живём.Классно!"</h3><br>'.print_r($valid_3,1);
echo '<pre><h3>5 символ от начала строки:"Длинная строка. Главное, что мы научимся с ней идеально работать.  HOW do you do? Вот так и живём.Классно!"</h3><br>'.print_r($valid_4,1);
echo 'ПЯТЫЙ СИМВОЛ ОТ НАЧАЛА СТРОКИ - '.$res;
echo '<pre><h3>Все слова с большой буквы:"Длинная строка. Главное, что мы научимся с ней идеально работать.  HOW do you do? Вот так и живём.Классно!"</h3><br>'.print_r($valid_5,1);
echo '<hr>';

$array = array(
	'10 , 22, 2.1, 2.5, 10.10, 500.1, 77, 10.11.12.13',
);

$q = array(
	'Достать ВСЕ дробные числа. Дробные - это числа, разделенные точкой',
);
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Достать ВСЕ дробные числа'.'</h2>';
foreach($array as $k=>$value){
	if (preg_match_all('#\s*(\d+\.\d+)[,*\s*]#ui',$value,$matches)){
		$valid_6[] = $matches;
	} else {
		$valid_6[] = 'регулярка не прошла';
	}
}
if(!empty($valid_6)){
	echo '<pre>'.print_r($valid_6,1);
}
echo '<hr>';


$array = array(
	'site.ru',
	'barakuda',
	'zimbabwe_ru',
	'zimbabwe',
	'zzz-zimbabwe',
	'http://site.ru',
	'www.site.com',
	'www.zimbabwe.com',
	'zimbabwe.com.ua',
	'http://zimbabwe.ru',
);

$q = array(
	'Получить ссылки на реальные сайты (обязательно доменное имя), где имя сайта zimbabwe',
	'Немного сложная работа со строкой. Осуществить проверку каждого слова на присутствие в начале http://, и там, где его нет - дописать.
	 Для этих целей используем обход цикла foreach, и проверку preg_match. Не забываем про экранирование при помощи preg_quote',
	'Похожее задание, но для сайтов, где не указано доменное имя - дописать .ru, это продолжение предыдущего задания, делается аналогично, в одном цикле 2 отдельных условия!',
);
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Получить ссылки на реальные сайты (обязательно доменное имя), где имя сайта zimbabwe'.'</h2>';
foreach($array as $k=>$value) {
	if(preg_match('#^[http://]*?[www\.]*?zimbabwe[\.ru|ua|com]+#ui', $value, $matches)) {
		$valid_7[] = $matches;
	} else {
		$valid_7[] = 'регулярка не прошла';
	}
}
if(!empty($valid_7)){
	echo '<pre>'.print_r($valid_7,1);
}

echo '<h2>'.'Немного сложная работа со строкой...'.'</h2>';
echo '<pre>'.print_r($array,1);
echo '<h2>'.'осуществить проверку каждого слова на присутствие в начале http://, и там, где его нет - дописать'.'</h2>';

echo 'через preg_replace<br>';
foreach($array as $k=>$value){
	$valid_repl[] = preg_replace('#^[^http://](\w+.*)#ui','http://'.$value,$value);
}
if(!empty($valid_repl)){
	echo '<pre>'.print_r($valid_repl,1);
}

echo 'через preg_match<br>';
foreach($array as $k=>$value) {
	if(preg_match('#^[^http://]#ui', $value, $matches)) {
		$array[$k] = 'http://'.$value;
	} else {
		$array[$k] = $value;
	}
}
echo '<pre>'.print_r($array,1);
echo '<h2>'.'где не указано доменное имя - дописать .ru'.'</h2>';
foreach($array as $k=>$value) {
	if(preg_match('#\.\w+$#ui', $value, $matches)) {
		$array[$k] = $value;
	} else {
		$array[$k] = $value.'.ru';
	}

	if(preg_match('#^[^http://]#ui', $array[$k], $matches)) {
		$array[$k] = 'http://'.$array[$k];
	} else {
		$array[$k] = $array[$k];
	}
}
echo '<pre>'.print_r($array,1);
echo '<hr>';

$array = array(
	'inpost',
	'Barabulka_ru',
	'Zimbabwe.ru',
	'Max',
	'Yojik',
	'Иван Тарасов',
	'Ёжик',
	'Борис Николаевич Кощуновский',
	'Ооооооооооооооооооооочень длинное имя',
	'Я',
	'go->drink->die',
	'Don`t sleep',
	'<Пивасик',
	'1',
	'123456789',
	'77777',
	'7ф777я7',
);

$q = array(
	'Теперь идут операции по работе с логинами и паролями. Очень важно именно при РЕГИСТРАЦИИ:',
	'Проверка на preg_match, разрешить только числам. Подсказка: числа точно так же как и буквы, а именно 0-9 (а-я)',
	'Пропустить только строки, состоящие из цифр 7 и символов ф,я',
	'Пропустить только рус и англ символы, подчеркивание и тире, пробел(!) длиной от 4 до 15 символов',
	'Выбрать логин, который начинается на M и заканчивается на x',
);
echo '<h2>'.'Проверка на preg_match, разрешить только числам. '.'</h2>';
echo '<pre>'.print_r($array,1);
foreach($array as $k=>$value) {
	if(preg_match('#^\d*$#ui', $value, $matches)) {
		$valid_8[] = $matches;
	} else {
		$valid_8[] = 'регулярка не прошла';
	}
}
if(!empty($valid_8)){
	echo '<pre>'.print_r($valid_8,1);
}

echo '<h2>'.'Пропустить только строки, состоящие из цифр 7 и символов ф,я'.'</h2>';
echo '<pre>'.print_r($array,1);
foreach($array as $k=>$value) {
	if(preg_match_all('#^[7фя]+$#ui', $value, $matches)) {
		$valid_9[] = $matches;
	} else {
		$valid_9[] = 'регулярка не прошла';
	}
}
if(!empty($valid_9)){
	echo '<pre>'.print_r($valid_9,1);
}

echo '<h2>'.'Пропустить только рус и англ символы, подчеркивание и тире, пробел(!) длиной от 4 до 15 символов'.'</h2>';
echo '<pre>'.print_r($array,1);
foreach($array as $k=>$value) {
	if (preg_match('#^[\w*\-*\s*]{4,15}$#ui', $value, $matches)) {
		$valid_10[] = $matches;
	} else {
		$valid_10[] = 'регулярка не прошла';
	}
}
if(!empty($valid_10)){
	echo '<pre>'.print_r($valid_10,1);
}

echo '<h2>'.'Выбрать логин, который начинается на M и заканчивается на x'.'</h2>';
echo '<pre>'.print_r($array,1);
foreach($array as $k=>$value) {
	if(preg_match('#^M\w*\d*\-*x$#ui', $value, $matches)) {
		$valid_11[] = $matches;
	} else {
		$valid_11[] = 'регулярка не прошла';
	}
}
if(!empty($valid_11)){
	echo '<pre>'.print_r($valid_11,1);
}
echo '<hr>';

$array = array(
	'Я тебя ооооочеень            СИЛЬНО            ЛЮБЛЮ          МОЙ                    Друг!',
);

$q = array(
	'Вчера писал для себя. Заменить подряд идущие пробелы на один. Чтобы не было их так много. preg_replace',
);
echo '<h2>'.'Заменить подряд идущие пробелы на один. Чтобы не было их так много. preg_replace'.'</h2>';
echo '<pre>'.print_r($array,1);
foreach($array as $value){
	$valid_12[] = preg_replace('#\s{2,}#ui',' ',$array);
}
if(!empty($valid_12)){
	echo '<pre>'.print_r($valid_12,1);
}
echo '<hr>';

$array = array(
	'Дата публикации:27 августа 08:43. Был отличный год!',
);

$q = array(
	'Строку мы знаем, меняется лишь день, месяц, время. Необходимо достать:',
	'Время, когда опубликовали',
	'Полностью дату, а именно (27 августа 08:43), она может меняться!',
);
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Необходимо достать время, когда опубликовали, затем полную дату и время'.'</h2>';
foreach($array as $k=>$value) {
	if(preg_match('#(\d\d\:\d\d)#ui', $value, $matches)) {
		$valid_13[] = $matches;
	} else {
		$valid_13[] = 'регулярка не прошла';
	}
	if(preg_match('#(\d\d*\s\w+\s\d\d\:\d\d)#ui', $value, $matches)) {
		$valid_13[] = $matches;
	} else {
		$valid_13[] = 'регулярка не прошла';
	}
}
if(!empty($valid_13)){
	echo '<b>время:</b> '.$valid_13[0][0].'<br>';
	echo '<b>полная дата и время:</b> '.$valid_13[1][0];
}
echo '<hr>';


$array = array(
	'<a href="file.php">Это ссылка, и тут было классно</a>',
	'<a    href     =       "file.php"     >Это ссылка, и тут было классно</a>',
	'<a    href=file.php >Это ссылка, и тут было классно</a>',
	"<a    href='file.php' >Это ссылка, и тут было классно</a>",
);

$q = array(
	'Используем карманы, необходимо получить путь, куда ссылается и текст внутри тега!
	 Стоит обратить внимание на момент, где символ МОЖЕТ БЫТЬ, а может и не БЫТЬ',
);
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Используем карманы, необходимо получить путь, куда ссылается и текст внутри тега'.'</h2>';
foreach($array as $k=>$value) {
	if(preg_match('#href\s*\=\s*[\'\"\s]*(.+[^\s\'\"])[\'\"\s]*>(.+)</a>#ui', $value, $matches)) {
		$link[] = $matches;
	}
	else {
		$link[] = 'регулярка не прошла';
	}
}
if(!empty($link)){
	echo '<pre>'.print_r($link,1);
}

echo '<hr>';

$array = array(
	'text@',
	'yandex@@mega.com',
	'beer@mail.com',
	"tost.dp.ua",
	"tostdpua@gmail.com",
);

$q = array(
	'Проверить на валидность е-мейла. Краткая информация (ВАЖНАЯ!), емеил состоит из набора символов маленьких. 
	 Присутствует в центре собака, слева имя ящика, которое может состоять из обычных символов англ И подчеркивания И тире.
	 Справа находятся домены, отделенные точками.',
);
echo '<pre>'.print_r($array,1);
echo '<h2>'.'Проверить на валидность е-мейл'.'</h2>';
foreach($array as $k=>$value) {
	if(preg_match('#^\-*\w+\-*\w*@\w+\.\w+#ui', $value, $matches)) {
		$valid_14[] = $matches;
	}
	else {
		$valid_14[] = 'invalid email';
	}
}
if(!empty($valid_14)){
	echo '<pre>'.print_r($valid_14,1);
}